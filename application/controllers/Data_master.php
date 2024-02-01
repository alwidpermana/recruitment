<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_master extends CI_Controller {
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata("is_login")) {
			redirect(base_url());
		}elseif ($this->session->userdata("jenis") != 'Admin') {
			redirect(base_url('dashboard'));
		}
		$this->load->model("m_data_master");
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
	public function pengajuan()
	{
		$jenis = $this->input->get("jenis") == '' ? 'Operator' : $this->input->get("jenis");
		$status = $this->input->get("status") == '' ? 'OPEN': $this->input->get("status");
		$data['side'] = 'data_master-pengajuan';
		$data['menu'] = 'Data Master';
		$data['sub_menu1'] = 'Pengajuan';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['link3'] = 'javascript:;';
		$data['page'] = 'Pengajuan Tenaga Kerja';
		$data['data'] = $this->m_data_master->getDataPengajuan($jenis, $status)->result();
		$this->load->view("data_master/pengajuan/index",$data);
	}
	public function prasetup()
	{
		$inputPengajuan = $this->input->post("inputPengajuan");
		$filJenis = $this->input->post("filJenis");
		$jmlData = count($inputPengajuan);
		if ($jmlData==0) {
			$status = 'warning';
			$data = true;
			$message = 'Pilih Terlebih Dahulu Data Pengajuannya!';
			$sub_message='';
			$id ='';
		}else{
			$id = $this->uuid->v4();
			for ($i=0; $i <$jmlData ; $i++) { 
				$parsingData = array('no_pengajuan' =>$inputPengajuan[$i] ,'recruitment_id'=>$id );
				$data = $this->m_process_data->addData('temp_pengajuan',$parsingData);
			}

			if ($data == true) {
				$status = 'success';
				$message = 'Berhasil Menambah Data Temporary Pengajuan';
				$sub_message =  "Anda Akan Dialihkan ke Halaman Setup Recruitment";
			}else{
				$status = 'gagal';
				$message = 'Gagal Menambah Data Temporary Pengajuan';
				$sub_message =  "";
			}	
		}
		

		$response = array('data'=>$data, 'message' =>$message, 'status'=>$status,'sub_message'=>$sub_message,'id'=>$id);
		echo json_encode($response);
	}
	public function setup($id)
	{
		$data['side'] = 'data_master-pengajuan';
		$data['menu'] = 'Data Master';
		$data['sub_menu1'] = 'Pengajuan';
		$data['sub_menu2'] = 'Setup';
		$data['mobile'] = false;
		$data['link1'] = base_url().'data_master/pengajuan';
		$data['link2'] = 'javascript:;';
		$data['page'] = 'Setup Pengajuan Tenaga Kerja';
		$data['inputId'] = $id;
		$data['filJenis'] = $this->input->get("jenis");
		$data['no_recruitment'] = $this->m_data_master->getNoRecruitment();
		$getPengajuan = $this->m_data_master->getSumPengajuanSetup($id)->result();
		$wanitaP = 0;
		$priaP = 0;
		$jumlahP = 0;
		foreach ($getPengajuan as $key) {
			$wanitaP = $key->wanita;
			$priaP = $key->pria;
			$jumlahP = $key->wanita+$key->pria;
		}
		$data['wanitaP'] = $wanitaP;
		$data['priaP'] = $priaP;
		$data['jumlahP'] = $jumlahP;
		$this->load->view("data_master/setup/index", $data);
	}
	public function saveSetup()
	{
		$inputReferensiPria = $this->input->post("inputReferensiPria");
		$inputReferensiWanita = $this->input->post("inputReferensiWanita");
		$inputEksternalPria = $this->input->post("inputEksternalPria");
		$inputEksternalWanita = $this->input->post("inputEksternalWanita");
		$inputUmumPria = $this->input->post("inputUmumPria");
		$inputUmumWanita = $this->input->post("inputUmumWanita");
		$inputId = $this->input->post("inputId");
		$jumlahReferensi = $inputReferensiPria + $inputReferensiWanita;
		$jumlahEksternal = $inputEksternalPria + $inputEksternalWanita;
		$jumlahUmum = $inputUmumPria + $inputUmumWanita;
		$filJenis = $this->input->post("filJenis");
		$pria = $inputReferensiPria + $inputEksternalPria + $inputUmumPria;
		$wanita = $inputReferensiWanita + $inputEksternalWanita + $inputUmumWanita;
		$noRecruitment = $this->m_data_master->getNoRecruitment();
		$cekNoPengajuan = $this->m_data_master->cekNoPengajuan($inputId)->num_rows();
		date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d H:i:s');
		if ($cekNoPengajuan>0) {
			$status = 'warning';
			$message = 'Salah satu no pengajuan sudah masuk ke data recruitment';
			$sub_message='Pilih Kembali No Pengajuan!';
			$data = true;
		}elseif ($jumlahReferensi <=0 && $jumlahEksternal <= 0 && $jumlahUmum <= 0 ) {
			$status = 'warning';
			$message = 'Isi Setup Terlebih Dahulu';
			$sub_message='Pilih Kembali No Pengajuan!';
			$data = true;	
		}else{
			$cekData = $this->db->query("SELECT id FROM recruitment where id = '$inputId'");
			if ($cekData->num_rows() == 0) {
				$parsingData = array('id' =>$inputId,'no_recruitment'=>$noRecruitment,'jenis'=>$filJenis,'bulan'=>date("n"),'tahun'=>date("Y"),'created_at'=>$tanggal,'status'=>'OPEN');
				$data = $this->m_process_data->addData("recruitment",$parsingData);
				if ($data == true) {
					$this->m_data_master->updatePengajuan($inputId);
					$this->m_process_data->addData("setup",array('id'=>$this->uuid->v4(),'recruitment_id'=>$inputId, 'alokasi'=>'Referensi','pria'=>$inputReferensiPria, 'wanita'=>$inputReferensiWanita, 'created_at'=>$tanggal));
					$this->m_process_data->addData("setup",array('id'=>$this->uuid->v4(),'recruitment_id'=>$inputId, 'alokasi'=>'Eksternal','pria'=>$inputEksternalPria, 'wanita'=>$inputEksternalWanita, 'created_at'=>$tanggal));
					$this->m_process_data->addData("setup",array('id'=>$this->uuid->v4(),'recruitment_id'=>$inputId, 'alokasi'=>'Umum','pria'=>$inputUmumPria, 'wanita'=>$inputUmumWanita, 'created_at'=>$tanggal));
					$data = $this->m_process_data->deleteData('temp_pengajuan',$inputId,'recruitment_id');
					$status = 'success';
					$message = 'Berhasil Menyimpan Data Setup Recruitment';
					$sub_message = 'Anda akan dialihkan ke halaman monitoring recruitment';
				}
			}else{
				$data = $this->m_process_data->updateData('setup',array('pria'=>$inputReferensiPria,'wanita'=>$inputReferensiWanita,'updated_at'=>$tanggal), array('recruitment_id' => $inputId,'alokasi'=>'Referensi'));
				$data = $this->m_process_data->updateData('setup',array('pria'=>$inputEksternalPria,'wanita'=>$inputEksternalWanita,'updated_at'=>$tanggal), array('recruitment_id' => $inputId,'alokasi'=>'Eksternal'));
				$data = $this->m_process_data->updateData('setup',array('pria'=>$inputUmumPria,'wanita'=>$inputUmumWanita,'updated_at'=>$tanggal), array('recruitment_id' => $inputId,'alokasi'=>'Umum'));
			}
			
		}

		$response = array('data' =>$data ,'status'=>$status, 'message'=>$message,'sub_message'=>$sub_message);
		echo json_encode($response);
	}
	
}
