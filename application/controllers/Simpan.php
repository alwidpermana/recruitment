<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpan extends CI_Controller {

	function __construct(){
		parent::__construct();
		if (!$this->session->userdata("is_login")) {
			redirect(base_url());
		}
		$this->load->model("m_lowongan");
		$this->load->model("m_process_data");
		$this->load->model("m_data_master");

		// if ($this->session->userdata("is_login")) {
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
		$data['side'] = 'simpan';
		$data['menu'] = '';
		$data['sub_menu1'] = '';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Simpan Lamaran';
		$data['plant'] = $this->m_data_master->getPlant()->result();
		$data['departemen'] = $this->m_data_master->getDepartemen()->result();
		$data['jabatan'] = $this->m_data_master->getJabatan()->result();
		$this->load->view('simpan/index', $data);
	}
	public function getPaging()
	{
		$id = $this->session->userdata("user_id");
		$search = $this->input->get("search");
		$limit = $this->input->get("limit");
		$offset = $this->input->get("offset");
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$setToken = $this->session->userdata("user_id").'||'.date('Y-m-d');
		if (hash_verified($setToken,$this->session->userdata("token"))) {
			$id = '----';
		}
		$data['data'] = $this->m_lowongan->getDataSimpanLamaran($id, $search, '')->num_rows();
		$this->load->view("_partial/paging",$data);
	}
	public function getTabel()
	{
		$id = $this->session->userdata("user_id");
		$search = $this->input->get("search");
		$limit = $this->input->get("limit");
		$offset = $this->input->get("offset");
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$where = " LIMIT $limit OFFSET $offset";
		$setToken = $this->session->userdata("user_id").'||'.date('Y-m-d');
		if (!hash_verified($setToken,$this->session->userdata("token"))) {
			$id = '----';
		}
		$data['data'] = $this->m_lowongan->getDataSimpanLamaran($id, $search, $where)->result();
		$this->load->view('simpan/tabel', $data);
	}
	public function save()
	{
		$inputJabatan = $this->input->post("inputJabatan");
		$inputDepartemen = $this->input->post("inputDepartemen");
		$inputPlant = $this->input->post("inputPlant");
		$userId = $this->session->userdata("user_id");
		$getPelamar = $this->db->query("SELECT id from pelamar WHERE user_id = '$userId'")->row();
		$pelamarId = $getPelamar->id;
		$cek = $this->db->query("SELECT id FROM lamaran_masuk where jabatan = '$inputJabatan' AND departemen = '$inputDepartemen' AND plant = '$inputPlant'");
		$cekDataPelamar = $this->db->query("SELECT id FROM pelamar WHERE user_id = '$userId' AND foto IS NOT NULL AND nama IS NOT NULL AND email IS NOT NULL AND no_ktp IS NOT NULL AND cv IS NOT NULL AND ijazah_terakhir IS NOT NULL AND surat_lamaran IS NOT NULL AND ktp IS NOT NULL ");
		$setToken = $this->session->userdata("user_id").'||'.date('Y-m-d');
		if (hash_verified($setToken,$this->session->userdata("token"))) {
			if ($cekDataPelamar->num_rows()>0) {
				if ($cek->num_rows()==0) {
					$id = $this->uuid->v4();
					$tanggal = $this->uuid->getDateNow();
		    		$parsingData = array('id' =>$id,'departemen'=>$inputDepartemen,'jabatan'=>$inputJabatan,'plant'=>$inputPlant,'created_at'=>$tanggal,'pelamar_id'=>$pelamarId,'status'=>'OPEN');
					$data = $this->m_process_data->addData("lamaran_masuk",$parsingData);
					$message = 'Berhasil Menyimpan Lamaran';
					$sub_message = '';
					$status = 'success';
				}else{
					$data = true;
					$message = 'Lamaran Tersebut Telah Tersedia';
					$sub_message='';
					$status = 'warning';
				}
			}else{
				$data = true;
				$message = 'Lengkapi Data Profil Terlebih Dahulu!';
				$sub_message='';
				$status = 'warning';
			}
			
		}else{
			$data = true;
			$message = 'Anda Tidak Memiliki Akses';
			$sub_message='Silahkan Login Terlebih Dahulu!';
			$status = 'warning';
		}
		$response = array('data' =>$data ,'status'=>$status,'message'=>$message,'sub_message'=>$sub_message );
		echo json_encode($response);
	}
	public function hapus()
	{
		$id= $this->input->post("id");
		$data = $this->m_process_data->deleteData('lamaran_masuk',$id,'id');
		echo json_encode($data);
	}
}
