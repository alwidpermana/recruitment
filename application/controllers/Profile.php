<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata("is_login")) {
			redirect(base_url());
		}
		$this->load->model("m_profile");
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
		$data['side'] = 'profile_resume';
		$data['menu'] = '';
		$data['sub_menu1'] = '';
		$data['sub_menu2'] = '';
		$data['mobile'] = true;
		$data['link1'] = 'javascript:;';
		$data['link2'] = 'javascript:;';
		$data['page'] = 'Profile Resume';
		$id = $this->session->userdata("user_id");
		$data['data'] = $this->m_profile->getDataPelamarByUser($id)->row();
		$this->load->view("profile/index", $data);
	}
	public function addData()
	{
		$inputFoto = $this->input->post("inputFoto");
		$inputNama = $this->input->post("inputNama");
		$inputEmail = $this->input->post("inputEmail");
		$inputNoHP = $this->input->post("inputNoHP");
		$inputTempatLahir = $this->input->post("inputTempatLahir");
		$inputTglLahir = $this->input->post("inputTglLahir") == '' ? '' : date("Y-m-d", strtotime($this->input->post("inputTglLahir")));
		$inputJenisKelamin = $this->input->post("inputJenisKelamin");
		$inputStatusMenikah = $this->input->post("inputStatusMenikah");
		$inputJumlahAnak = $this->input->post("inputJumlahAnak") == '' ? 0 : $this->input->post("inputJumlahAnak");
		$inputGolonganDarah = $this->input->post("inputGolonganDarah");
		$inputAgama = $this->input->post("inputAgama");
		$inputNoKTP = $this->input->post("inputNoKTP");
		$inputAlamatKTP = $this->input->post("inputAlamatKTP");
		$inputAlamatDomisili = $this->input->post("inputAlamatDomisili");
		$inputKodePOS = $this->input->post("inputKodePOS");
		$size_file = $this->input->post("size_file");
		$setToken = $this->session->userdata("user_id").'||'.date('Y-m-d');
		$hiddenPhoto = $this->input->post("hiddenPhoto");
		


		if (hash_verified($setToken,$this->session->userdata("token"))) {
			if ($size_file>1000000) {
	        	$data = true;
	        	$status = 'warning';
	        	$message = 'Ukuran File Foto Melebihi 1 Mb';
	        	$sub_message = '';
	        }else{
	        	if ($inputNama == '') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Nama Lengkap!';
			    }elseif ($inputEmail == '') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Email!';
			    }elseif ($inputNoHP == '') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi No HP!';
			    }elseif ($inputTempatLahir == '') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Tempat Lahir!';
			    }elseif ($inputTglLahir == '') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Tanggal Lahir!';
			    }elseif ($inputNoKTP == '') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi No KTP!';
			    }elseif ($inputAlamatKTP == '') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Alamat KTP!';
			    }elseif ($inputAlamatDomisili == '') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Alamat Domisili!';
			    }elseif ($inputKodePOS=='') {
			    	$data=true;
			    	$status = 'warning';
			    	$message = 'Lengkapi Datanya Terlebih Dahulu';
			    	$sub_message='Isi Kode POS!';
			    }else{
			    	$config['upload_path']="./assets/arsip/photo-pelamar";
			        $config['allowed_types']='jpg|png|jpeg';
			        $config['encrypt_name'] = TRUE;
			         
			        $this->load->library('upload',$config);
		        	if($this->upload->do_upload("inputFoto")){
				    	$data = $this->upload->data();
						//Resize and Compress Image
			            // $config['image_library']='gd2';
			            $config['source_image']='./assets/arsip/photo-pelamar/'.$data['file_name'];
			            // $config['create_thumb']= FALSE;
			            $config['maintain_ratio']= FALSE;
			            // $config['quality']= '60%';
			            // $config['width']= 1024;
			            $config['max_size']     = '1000';
			        		
			            // $config['height']= 768;
			            // $config['new_image']= './assets/dokumen/kecelakaan-kerja/'.$data['file_name'];
			            $this->load->library('image_lib', $config);
			            // $this->image_lib->resize();
			            $fileName= 'assets/arsip/photo-pelamar/'.$data['file_name'];
				    }else{
				    	$fileName = $hiddenPhoto;
				    }

				    if ($fileName == '' && $hiddenPhoto == '') {
				    	$data = true;
			        	$status = 'warning';
			        	$message = 'Lengkapi Datanya Terlebih Dahulu';
			        	$sub_message = 'Anda belum memasukkan file foto wajah';
				    }else{
				    	if ($this->session->userdata("jenis") == 'Umum') {
				    		$userId = $this->session->userdata("user_id");
				    		$sql = "SELECT id FROM pelamar WHERE user_id = '$userId'";
				    		$inputId = $this->uuid->v4();
				    	}else{
				    		$inputId =$this->input->post("inputIdPelamar");
				    		$sql = "SELECT id FROM pelamar WHERE id = '$inputId'";
				    	}

				    	$cekData = $this->db->query($sql);
				    	if ($cekData->num_rows() == 0) {
				    		
				    		$parsingData = array('id' =>$inputId,'foto'=>$fileName,'nama'=>$inputNama,'email'=>$inputEmail,'no_hp'=>$inputNoHP,'tempat_lahir'=>$inputTempatLahir,'tgl_lahir'=>$inputTglLahir,'jenis_kelamin'=>$inputJenisKelamin,'status_pernikahan'=>$inputStatusMenikah,'jml_anak'=>$inputJumlahAnak,'golongan_darah'=>$inputGolonganDarah,'agama'=>$inputAgama,'no_ktp'=>$inputNoKTP,'kode_pos'=>$inputKodePOS,'alamat_ktp'=>$inputAlamatKTP,'alamat_domisili'=>$inputAlamatDomisili,'user_id'=>$this->session->userdata("user_id"),'created_at'=>$this->uuid->getDateNow());
							$data = $this->m_process_data->addData("pelamar",$parsingData);
				    	}else{
				    		if ($this->session->userdata("jenis") == 'Umum') {
				    			$userIdFoto = $this->session->userdata("user_id");
				    			$getFotoBefore = $this->db->query("SELECT foto FROM pelamar WHERE user_id = '$userIdFoto' AND foto IS NOT NULL OR foto != '' AND user_id = '$userIdFoto'");
				    			$dataId = array('user_id' => $this->session->userdata("user_id"));
				    		}else{
				    			$userIdFoto = $this->input->post("inputIdPelamar");
				    			$getFotoBefore = $this->db->query("SELECT foto FROM pelamar WHERE user_id = '$userIdFoto' AND foto IS NOT NULL OR foto != '' AND id = '$userIdFoto'");
				    			$dataId = array('id' => $userIdFoto);
				    		}
				    			
				    			if ($getFotoBefore->num_rows()>0) {
				    				$fileFotoBefore = $getFotoBefore->row();
				    				$fotoBefore = $fileFotoBefore->foto;
				    			}
				    			$parsingData = array('foto'=>$fileName,'nama'=>$inputNama,'no_hp'=>$inputNoHP,'email'=>$inputEmail,'tempat_lahir'=>$inputTempatLahir,'tgl_lahir'=>$inputTglLahir,'jenis_kelamin'=>$inputJenisKelamin,'status_pernikahan'=>$inputStatusMenikah,'jml_anak'=>$inputJumlahAnak,'golongan_darah'=>$inputGolonganDarah,'agama'=>$inputAgama,'no_ktp'=>$inputNoKTP,'kode_pos'=>$inputKodePOS,'alamat_ktp'=>$inputAlamatKTP,'alamat_domisili'=>$inputAlamatDomisili,'updated_at'=>$this->uuid->getDateNow());
								$data = $this->m_process_data->updateData('pelamar',$parsingData, $dataId);				    		
								// if ($data == true && $hiddenPhoto != '' && $fileName != '') {
								// 	unlink($fotoBefore);
								// }
							
				    	}
				    	if ($data == true) {
					    	$status = 'success';
					    	$message="Berhasil Menyimpan Data";
					    	$sub_message='Silahkan Lengkapi Attachment';
				    	}
				    	
				    }
			    }
	        }
		}else{
			$data= true;
			$status = 'warning';
			$message='Anda Tidak Memiliki Akses';
			$sub_message='Segera Login Terlebih Dahulu';
		}

		$response = array('data' =>$data ,'message'=>$message,'sub_message'=>$sub_message,'status'=>$status );
		echo json_encode($response);
	}

	public function saveAttachment($inputIdPelamar)
	{
		$setToken = $this->session->userdata("user_id").'||'.date('Y-m-d');
		if (hash_verified($setToken,$this->session->userdata("token"))) {
			$config['upload_path']="./assets/arsip/attachment-pelamar";
	        $config['allowed_types']='jpg|png|jpeg|xlsx|pdf|application/pdf|xls|docx';
	        $config['encrypt_name'] = TRUE;
	         
	        $this->load->library('upload',$config);
	    	if($this->upload->do_upload("fileAttachment")){
		    	$data = $this->upload->data();
				//Resize and Compress Image
	            // $config['image_library']='gd2';
	            $config['source_image']='./assets/arsip/attachment-pelamar/'.$data['file_name'];
	            // $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            // $config['quality']= '60%';
	            // $config['width']= 1024;
	            $config['max_size']     = '1000';
	        		
	            // $config['height']= 768;
	            // $config['new_image']= './assets/dokumen/kecelakaan-kerja/'.$data['file_name'];
	            $this->load->library('image_lib', $config);
	            // $this->image_lib->resize();
	            $fileName= 'assets/arsip/attachment-pelamar/'.$data['file_name'];
		    }else{
		    	$fileName = '';
		    }	

		    if ($fileName == '') {
		    	$data = true;
		    	$message='File Harus Kurang Dari 1 Mb!';
		    	$sub_message='';
		    	$status = "warning";
		    }else{
		    	$jenis = $this->input->post("jenis");
			    switch ($jenis) {
			    	case 'CV':
			    		$field = 'cv';
			    		break;
			    	case 'Ijazah':
			    		$field = 'ijazah_terakhir';
			    		break;
			    	case 'Lamaran':
			    		$field = 'surat_lamaran';
			    		break;
			    	case 'KTP':
			    		$field = 'ktp';
			    		break;
			    	case 'SKCK':
			    		$field = 'skck';
			    		break;
			    	case 'Surat Keterangan Sehat':
			    		$field = 'surat_keterangan_sehat';
			    		break;
			    	case 'Surat Ijin':
			    		$field = 'surat_ijin';
			    		break;
			    	case 'Kartu Keluarga':
			    		$field = 'kartu_keluarga';
			    		break;
			    	case 'Sertifikat Vaksin':
			    		$field = 'sertifikat_vaksin';
			    		break;
			    	case 'Surat Bebas Narkoba':
			    		$field = 'surat_bebas_narkoba';
			    		break;
			    	default:
			    		$field='';
			    		break;
			    }
			    if ($this->session->userdata("jenis") == 'Umum') {
		    		$userId = $this->session->userdata("user_id");
		    		$sql = "SELECT id FROM pelamar WHERE user_id = '$userId'";
		    		$id = $this->uuid->v4();
		    		$dataId = array('user_id' => $this->session->userdata("user_id"));
		    	}else{
		    		$inputId =$inputIdPelamar;
		    		$id = $inputIdPelamar;
		    		$sql = "SELECT id FROM pelamar WHERE id = '$inputId'";
		    		$dataId = array('id' => $id);
		    	}

		    	$cekData = $this->db->query($sql);
		    	if ($cekData->num_rows()==0) {
		    		$parsingData = array('id'=>$id,$field=>$fileName, 'user_id'=>$this->session->userdata("user_id"), 'created_at'=>$this->uuid->getDateNow());
		    		$data = $this->m_process_data->addData("pelamar",$parsingData);
		    	}else{
		    		if ($this->session->userdata("jenis") == 'Umum') {

		    			$parsingData = array($field=>$fileName, 'updated_at'=>$this->uuid->getDateNow());	
		    			$data = $this->m_process_data->updateData('pelamar',$parsingData, $dataId);	
		    		}else{
		    			$parsingData = array($field=>$fileName, 'updated_at'=>$this->uuid->getDateNow());	
		    			$data = $this->m_process_data->updateData('pelamar',$parsingData, $dataId);
		    		}
		    	}

		    	if ($data == true) {
		    		$message ='Berhasil Mengupload '.$jenis;
		    		$sub_message = '';
		    		$status = 'success'; 
		    	}

		    }
		}else{
			$data= true;
			$status = 'warning';
			$message='Anda Tidak Memiliki Akses';
			$sub_message='Segera Login Terlebih Dahulu';
		}
		
	    $response = array('data' =>$data ,'message'=>$message,'sub_message'=>$sub_message,'status'=>$status );
		echo json_encode($response);

	}
	public function getListAttachment()
	{
		if ($this->session->userdata("jenis") == 'Umum') {
			$id = $this->session->userdata("user_id");
			$where = " WHERE user_id = '$id'";
		}else{
			$id = $this->input->get("inputIdPelamar");
			$where = " WHERE id = '$id'";
		}
		
		$data['data'] = $this->m_profile->getListAttachment($where)->result();
		$this->load->view("profile/list-attachment", $data);
	}
}
