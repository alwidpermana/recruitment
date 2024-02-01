<?php
	class M_data_master extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getDataPengajuan($jenis, $status)
		{
			$sql = $this->db->select("id, no_pengajuan, jenis_pengajuan, pria, wanita, recruitment_id, status")
							->from("pengajuan")
							->like('jenis_pengajuan',$jenis)
							->like('status', $status)
							->order_by("created_at",'asc')
							->get();
			return $sql;
		}
		public function getSumPengajuanSetup($id)
		{
			$sql = $this->db->select_sum("pengajuan.wanita")
							->select_sum("pengajuan.pria")
							->from('temp_pengajuan')
							->join('pengajuan','temp_pengajuan.no_pengajuan = pengajuan.no_pengajuan')
							->where("temp_pengajuan.recruitment_id",$id)
							->get();
			return $sql;
		}
		public function cekNoPengajuan($id)
		{
			$sql = $this->db->query("SELECT
										a.no_pengajuan
									FROM
										`temp_pengajuan` a 
									INNER JOIN
										pengajuan b ON 
									a.no_pengajuan = b.no_pengajuan
									WHERE
										a.recruitment_id = '$id' AND 
										b.recruitment_id IS NOT NULL");
			return $sql;
		}
		public function getNoRecruitment()
		{
			$tahun = date('Y');
	        $bulan = date('m');
			$gabung = "KPS/REC/".$tahun."/".$bulan."/";
			$cekNoDoc=$this->db->query("SELECT
											MAX(RIGHT(no_recruitment,3)) AS SETNODOC
										FROM
											`recruitment`
										WHERE
											tahun = '$tahun'");
			if ($cekNoDoc->num_rows()==0) {
				$URUTZERO = $gabung."001";
				$hasil= $URUTZERO;
			} else {
				foreach ($cekNoDoc->result() as $data) {
		            $zero='';
	                $length= 3;
	                $index=$data->SETNODOC;

	                for ($i=0; $i <$length-strlen($index+1) ; $i++) { 
	                    $zero = $zero.'0';
	                }
	                $URUTDOCNO = $gabung.$zero.($index+1);
	                
	                $hasil=$URUTDOCNO;
		        }	
			}
			
			
	        return $hasil;
		}
		public function updatePengajuan($id)
		{
			$sql = "UPDATE pengajuan INNER JOIN temp_pengajuan ON pengajuan.no_pengajuan = temp_pengajuan.no_pengajuan SET status = 'CLOSE' WHERE temp_pengajuan.recruitment_id = '$id'";
			return $this->db->query($sql);
		}
		public function getPlant()
		{
			$sql = "SELECT * FROM `plant` ORDER BY id ASC";
			return $this->db->query($sql);
		}
		public function getDepartemen()
		{
			return $this->db->select("nama_departemen")
							->from("departemen")
							->order_by("nama_departemen","asc")
							->get();
		}
		public function getJabatan()
		{
			return $this->db->select("nama_jabatan")
							->from("jabatan")
							->order_by("nama_jabatan","asc")
							->get();
		}
	}
?>
