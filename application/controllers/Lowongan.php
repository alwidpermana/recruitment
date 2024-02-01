<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan extends CI_Controller {

	function __construct(){
		parent::__construct();
		if (!$this->session->userdata("is_login")) {
			redirect(base_url());
		}
		$this->load->model("m_lowongan");
		$this->load->model("m_process_data");

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
		$data['side'] = 'lowongan';
		$data['menu'] = '';
		$data['sub_menu1'] = '';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Lowongan';
		$this->load->view('lowongan/index', $data);
	}
	public function getTabelLowongan()
	{
		$alokasi = $this->session->userdata("jenis") == 'Admin'?'Referensi':$this->session->userdata("jenis");
		$search = $this->input->get("search");
		$limit= $this->input->get("limit");
		$offset =$this->input->get("offset")*10;
		$where = " LIMIT $limit OFFSET $offset";
		$setToken = $this->session->userdata("user_id").'||'.date('Y-m-d');
		if (!hash_verified($setToken,$this->session->userdata("token"))) {
			$alokasi = '---';
			$search = '---';
			$where = '';
		}
		$data['data'] = $this->m_lowongan->getLowongan($alokasi, $search, $where)->result();
		$this->load->view("lowongan/tabel", $data);
	}
	public function getPagingLowongan()
	{
		$alokasi = $this->session->userdata("jenis") == 'Admin'?'Referensi':$this->session->userdata("jenis");
		$search = $this->input->get("search");
		$limit = $this->input->get("limit");
		$offset = $this->input->get("offset");
		$data['limit'] = $limit;
		$data['offset'] = $offset;
		$setToken = $this->session->userdata("user_id").'||'.date('Y-m-d');
		if (!hash_verified($setToken,$this->session->userdata("token"))) {
			$alokasi = '---';
			$search = '---';
			$where = '';
		}
		$data['data'] = $this->m_lowongan->getLowongan($alokasi, $search, '')->num_rows();
		$this->load->view("_partial/paging",$data);
	}
	public function view($id)
	{
		$data['side'] = 'lowongan';
		$data['menu'] = 'Lowongan';
		$data['sub_menu1'] = 'View';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		$data['link1'] = base_url().'lowongan';
		$data['link2'] = 'javascript:;';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Lowongan';
		$getLowongan = $this->m_lowongan->cekLowonganByUserUmum($id, $this->session->userdata("user_id"));
		$statusLowongan = '';
		if ($getLowongan->num_rows()) {
			$dataLowongan = $getLowongan->row();
			$statusLowongan = $dataLowongan->status;
		}
		$data['status_lowongan'] = $statusLowongan;
		$data['lowongan'] = $getLowongan->num_rows();
		$data['recruitment'] = $this->m_lowongan->getRecruitmentById($id)->row();
		$data['requirement'] = $this->m_lowongan->getRequirement($id)->result();
		$setToken = $this->session->userdata("user_id").'||'.date('Y-m-d');
		if (hash_verified($setToken,$this->session->userdata("token"))) {
			if ($this->session->userdata("jenis") == 'Umum') {
				$html='';
			}else{
				$where = " WHERE id_lamaran IS NOT NULL ORDER BY nama ASC";
		 		$getData = $this->m_lowongan->getDataPelamar($id, '', $where);
		 		if ($getData->num_rows()>0) {
		 			$html='';
		 			foreach ($getData->result() as $key) {
		 				$html.='<tr>
		 							<td><div class="sw-10 sh-10 me-1 mb-1 d-inline-block"><img src="'.base_url().''.$key->foto.'" class="img-fluid img-fluid-height rounded-md" alt="thumb" /></td>
		 							<td>'.$key->nama.'</td>
		 							<td>'.$key->no_ktp.'</td>
		 							<td><button class="btn btn-sm btn-icon btn-icon-only btn-outline-primary align-top float-end hapusResult" type="button" data="'.$key->id_pelamar.'"><i class="bi bi-trash"></i></button></td>
		 						</tr>';
		 			}
		 		}else{
		 			$html='';
		 		}
			}
	 		
	 	}else{

	 	}
	 	$data['data'] = $html;
		$this->load->view('lowongan/view', $data);
	}
  	public function getDataPelamar()
  	{
	 	$id = $this->input->get("id");
	 	$inputSearch = $this->input->get("inputSearch");
	 	$setToken = $this->session->userdata("user_id").'||'.date('Y-m-d');
	 	if (hash_verified($setToken,$this->session->userdata("token"))) {
	 		$where = " WHERE id_lamaran IS NULL ORDER BY nama ASC LIMIT 10 OFFSET 0";
	 		$data = $this->m_lowongan->getDataPelamar($id, $inputSearch, $where);
	 		if ($data->num_rows()>0) {
	 			$html='';
	 			foreach ($data->result() as $key) {
	 				$html.='<tr>
	 							<td><div class="sw-10 sh-10 me-1 mb-1 d-inline-block"><img src="'.base_url().''.$key->foto.'" class="img-fluid img-fluid-height rounded-md" alt="thumb" /></td>
	 							<td>'.$key->nama.'</td>
	 							<td>'.$key->no_ktp.'</td>
	 							<td><a href="javascript:;" class="btn btn btn-lg btn-primary active-scale-down pilihPelamar" pelamarId="'.$key->id_pelamar.'" foto="'.$key->foto.'" nama="'.$key->nama.'" no="'.$key->no_ktp.'">Pilih</a></td>
	 						</tr>';
	 			}
	 		}else{
	 			$html='<tr><td colspan="4" class="text-center">Data Tidak Tersedia</td></tr>';
	 		}
	 		$status = 'success';
	 		$message = '';
	 		$sub_message='';
	 		$response = array('data' =>$data ,'status'=>$status,'message'=>$message, 'sub_message'=>$sub_message,'html'=>$html);
	 	}else{
	 		$data = true;
	 		$status = 'warning';
	 		$message = 'Anda tidak memiliki akses untuk menampilkan data ini';
	 		$sub_message = '';
	 		$tabel='';
	 		$response = array('data' =>$data ,'status'=>$status,'message'=>$message, 'sub_message'=>$sub_message);
	 	} 		

	 	echo json_encode($response);

  	}
  	public function saveLowongan()
  	{
  		$pelamarId = $this->input->post("pelamarId");
  		$id = $this->input->post("id");
  		$setToken = $this->session->userdata("user_id").'||'.date('Y-m-d');
	 	if (hash_verified($setToken,$this->session->userdata("token"))) {
	 		$nip = $this->m_lowongan->setNIP();
	 		$tanggal = $this->uuid->getDateNow();
	 		$getJenis = $this->db->query("SELECT jenis FROM recruitment where id = '$id'")->row();
	 		$jenis = $getJenis->jenis;
	 		$sub = $this->session->userdata("jenis");
	 		$dataResign = $this->m_lowongan->cekKaryawanResign($pelamarId);
	 		if ($dataResign->num_rows() == 0) {
	 			$type = 'Pelamar Baru';	
	 			$isisStatus = 'Aktif';
	 			$hasilTes = null;
	 			$statusData = 'OPEN';
	 		}else{
	 			$resign = $dataResign->row();
	 			$type = 'Ex-KPS';
	 			$isisStatus = $resign->kategori == 'Blacklist' ? 'Tidak Aktif':'Aktif';
	 			$hasilTes = $resign->kategori == 'Blacklist' ? 'NG':null; 
	 			$statusData = $resign->kategori == 'Blacklist' ? 'CLOSE':'OPEN'; 
	 		}
	 		
	 		$cekData = $this->db->query("SELECT id FROM lamaran WHERE pelamar_id = '$pelamarId' AND recruitment_id = '$id'");
	 		if ($cekData->num_rows() == 0) {
	 			$cekLamaran = $this->db->query("SELECT id FROM lamaran WHERE pelamar_id = '$pelamarId' AND recruitment_id != '$id' AND status = 'Aktif'");
	 			if ($cekLamaran->num_rows()==0) {
	 				$lamaranId = $this->uuid->v4();
		    		$parsingData = array('id' =>$lamaranId,'pelamar_id'=>$pelamarId,'recruitment_id'=>$id,'nip'=>$nip,'tgl'=>$tanggal,'jenis'=>$jenis,'sub'=>$sub,'type'=>$type,'status_data'=>$statusData,'status'=>$isisStatus,'created_at'=>$tanggal,'user_id'=>$this->session->userdata("user_id"), 'hasil_tes'=>$hasilTes);
					$data = $this->m_process_data->addData("lamaran",$parsingData);
					if ($data == true) {
						$status = 'success';
						$message="Berhasil Menyimpan Data Lamaran";
						$sub_message='';
					}
	 			}else{
	 				$data = true;
	 				$status = 'warning';
	 				$message = 'Data pelamar dalam proses lamaran lain di recruitment KPS';
	 				$sub_message = '';
	 			}
	 		}else{
	 			$data = true;
	 			$status = 'success';
	 			$message = "Data Telah Tersimpan";
	 			$sub_message = "";
	 		}
	 	}else{
	 		$data = true;
	 		$status = 'warning';
	 		$message = 'Anda tidak memiliki akses untuk menampilkan data ini';
	 		$sub_message = '';
	 	}
	 	$response = array('data' =>$data ,'message'=>$message, 'sub_message'=>$sub_message,'status'=>$status );
	 	echo json_encode($response);
  	}
  	public function hapusLamaran()
  	{
  		$id = $this->input->post("id");
  		$pelamarId = $this->input->post("pelamarId");
  		$data = $this->db->query("DELETE FROM lamaran WHERE pelamar_id = '$pelamarId' AND recruitment_id = '$id'");
  		echo json_encode($data);
  	}
  	public function apply_lamaran()
  	{
  		$userId = $this->session->userdata("user_id");
  		$id = $this->input->get("id");
  		
  		$cekDataPelamar = $this->db->query("SELECT id FROM pelamar WHERE user_id = '$userId' AND foto IS NOT NULL AND nama IS NOT NULL AND email IS NOT NULL AND no_ktp IS NOT NULL AND cv IS NOT NULL AND ijazah_terakhir IS NOT NULL AND surat_lamaran IS NOT NULL AND ktp IS NOT NULL ");
  		if ($cekDataPelamar->num_rows()>0) {
  			$dataPelamar = $cekDataPelamar->row();
  			$pelamarId =$dataPelamar->id;
  			$cekDataLamaran = $this->db->query("SELECT id FROM lamaran WHERE pelamar_id = '$pelamarId' AND recruitment_id != '$id'");
  			if ($cekDataLamaran->num_rows()==0) {
  				$cekThisLamaran = $this->db->query("SELECT id FROM lamaran WHERE pelamar_id = '$pelamarId' AND recruitment_id = '$id'");
  				if ($cekThisLamaran->num_rows() == 0) {
  					$lamaranId = $this->uuid->v4();
  					$tanggal = $this->uuid->getDateNow();
  					$nip = $this->m_lowongan->setNIP();
  					$getJenis = $this->db->query("SELECT jenis FROM recruitment where id = '$id'")->row();
	 				$jenis = $getJenis->jenis;
	 				$sub = 'Umum';
	 				$dataResign = $this->m_lowongan->cekKaryawanResign($pelamarId);
			 		if ($dataResign->num_rows() == 0) {
			 			$type = 'Pelamar Baru';	
			 			$isisStatus = 'Aktif';
			 			$hasilTes = null;
			 			$statusData = 'OPEN';
			 		}else{
			 			$resign = $dataResign->row();
			 			$type = 'Ex-KPS';
			 			$isisStatus = $resign->kategori == 'Blacklist' ? 'Tidak Aktif':'Aktif';
			 			$hasilTes = $resign->kategori == 'Blacklist' ? 'NG':null; 
			 			$statusData = $resign->kategori == 'Blacklist' ? 'CLOSE':'OPEN'; 
			 		}
  					$parsingData = array('id' =>$lamaranId,'pelamar_id'=>$pelamarId,'recruitment_id'=>$id,'nip'=>$nip,'tgl'=>$tanggal,'jenis'=>$jenis,'sub'=>$sub,'type'=>$type,'status_data'=>$statusData,'status'=>$isisStatus,'created_at'=>$tanggal,'user_id'=>$this->session->userdata("user_id"),'hasil_tes'=>$hasilTes);
					$data = $this->m_process_data->addData("lamaran",$parsingData);

					if ($data == true) {
						$status = 'success';
						$message = "Berhasil Meng-apply Lamaran";
						$sub_message="Mohon tunggu konfirmasi dari pihak PT. Karya Putra Sangkuriang";
					}
  				}else{
  					$data = true;
  					$status = 'warning';
  					$message = "Anda sudah meng-apply lamaran ini";
  					$sub_message = '';
  				}
  			}else{
  				$data= true;
	  			$status = 'warning';
	  			$message = 'Anda sedang dalam progress recruitment!';
	  			$sub_message = 'cek status recruitment';        
  			}
  		}else{
  			$data= true;	
  			$status = 'warning';
  			$message = 'Lengkapi Biodata Anda Terlebih Dahulu!';
  			$sub_message = '';	

  		}
  		$response = array('data' =>$data ,'status'=>$status,'message'=>$message,'sub_message'=>$sub_message);
  		echo json_encode($response);
  	}
  	public function cancelLamaran()
  	{
  		$id = $this->input->post("id");
  		$userId = $this->session->userdata("user_id");
  		$lamaran = $this->db->query("SELECT status FROM lamaran WHERE recruitment_id = '$id' AND user_id = '$userId' AND sub = 'Umum'")->row();
  		if ($lamaran->status == 'Aktif') {
  			$data = $this->m_lowongan->cancelLamaran($id, $userId);
  			if ($data == true) {
  				$message = 'Lowongan Berhasil di Cancel';
  				$sub_message = '';
  				$status = 'success';
  			}
  		}else{
  			$data = true;
  			$message = 'Data Lowongan Anda Sudah Tidak Bisa di Cancel';
  			$sub_message='Tunggu Konfirmasi dari Pihak HRD PT. Karya Putra Sangkuriang';
  			$status = 'warning';
  		}

  		$response = array('data' =>$data ,'status'=>$status,'message'=>$message,'sub_message'=>$sub_message);
  		echo json_encode($response);

  	}
}
