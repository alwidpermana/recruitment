<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_process_data');
		$this->load->model('m_auth');
		$this->load->library('encryption');
		$this->load->library('encrypt');
		// if ($this->session->userdata("is_login") == false) {
		// 	redirect(base_url("dashboard"));
		// }
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
		$this->load->view('auth/index');
	}
	public function create_account($value='')
	{
		$this->load->view('auth/daftar');
	}
	public function process_regist($value='')
	{
		$inputNama = $this->input->post("inputNama");
		$inputEmail = $this->input->post("inputEmail");
		$inputUsername = $this->input->post("inputUsername");
		$inputPassword = $this->input->post("inputPassword");
		$key = $this->encryption->create_key(16);
		$password = get_hash($inputPassword);
		$id = $this->uuid->v4();
		$tanggal = $this->uuid->getDateNow();
		$cekEmail = $this->db->query("SELECT id FROM user WHERE email = '$inputEmail'");
		if ($cekEmail->num_rows()>0) {
			$this->session->set_flashdata('message_login_error', 'Email Sudah Terdaftar! Gunakan Email Lain!');
			$this->load->view("auth/daftar");
		}else{
			$msg = 'url untuk '.$inputNama.' dengan password = '.$password.' dan email='.$inputEmail.' dengan tujuan email = '.$inputEmail; //Plain text 
           	//Key 32 character 
           	//default menggunakan MCRYPT_RIJNDAEL_256 
           	$urlVerif = $this->encryption->encrypt($msg);  
			$parsingData = array('id' =>$id ,'email'=>$inputEmail,'password'=>$password,'nama'=>$inputNama,'jenis'=>'Umum','url_verification'=>$urlVerif,'created_at'=>$tanggal);
			$data = $this->m_process_data->addData('user',$parsingData);	
			if ($data == true) {
				$this->sendEmail($urlVerif, $inputEmail);
				redirect("auth/confirm_register/".$id);
			}else{
				$this->session->set_flashdata('message_login_error', 'Gagal Mendaftarkan Akun! Cek Jaringan Internet Anda!');
				$this->load->view("auth/daftar");
			}
		}
	}
	public function sendEmail($urlVerif, $inputEmail)
	{
		 $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'mail.kps.co.id',
            'smtp_user' => 'no-reply@kps.co.id',  // Email gmail
            'smtp_pass'   => 'kps@kps0k',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@kps.co.id', 'PT. Karya Putra Sangkuriang (PT. KPS)');

        // Email penerima
        $this->email->to($inputEmail); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://images.pexels.com/photos/169573/pexels-photo-169573.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');

        // Subject email
        $this->email->subject('Verifikasi e-mail');

        // Isi email
        $message = '<h3>Terima kasih telah melakukan pendaftaran di e-recruitment PT. KPS</h3>';
        $message .= '<p>Silahkan melakukan aktivasi akun anda dengan menekan tombol dibawah ini</p>';
        $message .='<a href="https://recruitment.kps.co.id/auth/verifikasi_email?ver='.$urlVerif.'" style="background-color:rgb(178, 58, 72);color:white; font-family: sans-serif;font-size: 15px;border: white 3px solid;border-radius: 5px;padding: 12px 20px;">Aktivasi Sekarang</a><br>';
        $message.="<p>Masuk dengan email dan kata sandi yang didaftarkan serta lengkapi data anda di menu <b>Profile</b></p>";
        $message.="<p>Anda dapat melihat lowongan kerja dan mengirim lamaran pada menu <b>Lowongan</b> atau menyimpan lamaran di menu <b>Simpan Lamaran</b></p>";
        $message.='<p><b>WASPADA PENIPUAN</b> yang mengatasnamakan PT. Karya Putra Sangkuriang. PT. Karya Putra Sangkuriang <b>TIDAK PERNAH</b> memungut biaya apapun dan <b>TIDAK PERNAH</b> bekerja sama dengan pihak ketiga dalam melaksanakan proses perekrutan pekerja. Info resmi pengumuman lowongan pekerjaan dan proses perekrutan pekerja dapat dilihat di <a href="https://recruitment.kps.co.id">https://recruitment.kps.co.id</a> dan/atau e-mail dengan domain resmi PT. Karya Putra Sangkuriang (example.kps.co.id)</p><br>';
        $message.='<p>Salam,</p><p>Recruitment Team HRD</p>';
        $this->email->message($message);
        $this->email->send();
        // Tampilkan pesan sukses atau error
        // if ($this->email->send()) {
            // echo 'Sukses! email berhasil dikirim.';
        // } else {
            // echo 'Error! email tidak dapat dikirim.';
        // }
	}
	public function confirm_register($id)
	{
		$getEmail = $this->db->query("SELECT email FROM user WHERE id = '$id'");
		if ($getEmail->num_rows() == 0) {
			redirect(base_url());
		}else{
			$dataEmail = $getEmail->row();
			$data['email'] = $dataEmail->email;
			$this->load->view("auth/confirm-register", $data);	
		}
	}
	public function verifikasi_email()
	{
		$id = str_replace(' ', '+', substr($this->input->get("ver"), 17, 255));
		$getEmail = $this->db->query("SELECT email FROM user WHERE url_verification = '$id'");
		if ($getEmail->num_rows() == 0) {
			// redirect(base_url());
			echo "anjung";
		}else{
			$data = $this->m_process_data->updateData('user',array('status'=>'VERIFIED'), array('url_verification' => $id));
			if ($data == true) {
				$this->load->view("auth/verifikasi", $data);
			}else{
				// redirect(base_url());
				echo "asu";
			}
		}	
	}
	public function process_login($value='')
	{
		$inputEmail = $this->input->post("inputEmail");
		$inputPassword = $this->input->post("inputPassword");
		$data = $this->m_auth->getDataUser($inputEmail);
		if ($data->num_rows()==0) {
			$this->session->set_flashdata('message_login_error', 'Email Tidak Tersedia');
			$this->load->view("auth/index");
		}else{
			$user = $data->row();
			$status = $user->status;
			if ($status == 'VERIFIED') {
				if (hash_verified($inputPassword,$user->password)) {
					$setToken = $user->id.'||'.date('Y-m-d');
					$token = get_hash($setToken);
					$session_data = array('token' =>$token,'email'=>$inputEmail,'nama'=>$user->nama,'jenis'=>$user->jenis,'is_login'=>true,'user_id'=>$user->id);
					$this->session->set_userdata($session_data);
					redirect("dashboard");
				}else{
					$this->session->set_flashdata('message_login_error', 'Password Anda Salah');
					$this->load->view("auth/index");
				}
			}else{
				$this->session->set_flashdata('message_login_error', 'Akun Email anda belum terverifikasi!<br>Verifikasi akun email terlebih dahulu melewati email yang dikirim oleh PT.KPS');
				$this->load->view("auth/index");
			}
		}
	}
	
	public function logout()
	{
		$session_data = array('token' =>'','username'=>'','nama'=>'','jenis'=>'','is_login'=>false,'user_id'=>'');
		$this->session->set_userdata($session_data);
	    redirect(base_url());
	}
}
