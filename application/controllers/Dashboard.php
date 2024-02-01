<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata("is_login")) {
			redirect(base_url());
		}
		$this->load->library('encrypt');
		$this->load->model("m_dashboard");
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['side'] = 'dashboard';
		$data['menu'] = '';
		$data['sub_menu1'] = '';
		$data['mobile'] = '';
		$data['sub_menu2'] = '';
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Dashboard';
		if ($this->session->userdata("jenis") == 'Admin') {
			$this->load->view('dashboard/admin/index', $data);
		}elseif ($this->session->userdata("jenis") == 'Umum') {
			$this->load->model("m_profile");
			$cekData = $this->m_profile->cekDataPelamarByUserId()->num_rows();
			if ($cekData==0) {
				redirect(base_url("profile"));
			}else{
				$data['data'] = $this->m_dashboard->getDataPelamarByUserId()->row();
				$data['lamaran'] = $this->m_dashboard->getLamaranByUserId()->result();
				$maxNip = $this->m_dashboard->getMaxNIP();
				if ($maxNip->num_rows()>0) {
					$dataNIP = $maxNip->row();
					$nip = $dataNIP->nip;	
				}else{
					$nip='';
				}
				$userId = $this->session->userdata("user_id");
				$data['nip'] = $nip;
				$data['linimasa'] = $this->m_dashboard->getLiniMasa($userId, $nip)->result();
				$this->load->view('dashboard/umum/index', $data);	
			}
			
		}elseif ($this->session->userdata("jenis") == 'Eksternal') {
			$data['waiting'] = $this->m_dashboard->getMenunggu()->row();
			$data['tes'] = $this->m_dashboard->getTes()->row();
			$data['lulus'] = $this->m_dashboard->getLulus()->row();
			$data['tidak_lulus'] = $this->m_dashboard->getTidakLulus()->row();
			$data['perempuan'] = $this->m_dashboard->getGrafikBulanPerempuan()->result();
			$data['laki'] = $this->m_dashboard->getGrafikBulanLaki()->result();
			$data['data'] = $this->m_dashboard->getLowongan()->result();
			$this->load->view('dashboard/admin/index', $data);
		}
	}
	public function test()
	{
		$msg = $this->session->userdata("user_id").'||'.date('Y-m-d');; //Plain text 
	    $key =  //Key 32 character 
	       //default menggunakan MCRYPT_RIJNDAEL_256 
	       $hasil_enkripsi = $this->encrypt->encode($msg);  
	       $hasil_dekripsi = $this->encrypt->decode($hasil_enkripsi); 
	       echo "Pesan yang mau dienkripsi: ".$msg."<br/><br/>"; 
	       echo "Hasil enkripsi: ".$hasil_enkripsi."<br/><br/>"; 
	       echo "Hasil dekripsi: ".$hasil_dekripsi."<br/><br/>"; 
	       echo "Hasil token: ".$this->session->userdata("token")."<br/><br/>"; 
	}
	public function updatePassword()
	{
		$this->load->model("m_auth");
		$this->load->model("m_process_data");
		$inputPasswordLama = $this->input->post("inputPasswordLama");
		$inputPasswordBaru =$this->input->post("inputPasswordBaru");
		$inputKonfirmasiPassword = $this->input->post("inputKonfirmasiPassword");
		$inputEmail = $this->session->userdata("email");
		$user_id = $this->session->userdata('user_id');
		$cek = $this->db->query("SELECT password from user WHERE id = '$user_id'")->row();
		$this->load->library('encryption');
		$this->load->library('encrypt');
		$key = $this->encryption->create_key(16);
		$password = get_hash($inputPasswordBaru);
		if (hash_verified($inputPasswordLama,$cek->password)) {
			if ($inputPasswordBaru == '') {
				$data = true;
				$message = 'Password Baru harus diisi!';
				$sub_message = '';
				$status = 'warning';
			}elseif ($inputKonfirmasiPassword == '') {
				$data = true;
				$message = 'Konfirmasi Password harus diisi!';
				$sub_message = '';
				$status = 'warning';
			}elseif ($inputPasswordBaru != $inputKonfirmasiPassword) {
				$data = true;
				$message = 'Konfirmasi Password tidak sama dengan password baru!';
				$sub_message = '';
				$status = 'warning';
			}else{
				
				
				$data = $this->m_process_data->updateData('user',array('password'=>$password), array('id' => $user_id));
				$message = 'Berhasil Mengubah Data Password';
				$sub_message = '';
				$status = 'success';
			}
		}else{
			$data = true;
			$message= 'Password yang berlaku salah!';
			$sub_message = 'Masukkan password sebelumnya dengan benar';
			$status = 'warning';
		}
		$response = array('data' =>$data ,'message'=>$message,'sub_message'=>$sub_message,'status'=>$status,'password'=>$password);
		echo json_encode($response);
	}
}
