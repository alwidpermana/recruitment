<?php
	class M_tes extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getJadwal()
		{
			$sql = $this->db->select("jadwal.*, COUNT(test_id) as jml_lamaran ")
							->from("jadwal")
							->join("lamaran",'jadwal.id = lamaran.test_id',"left")
							->group_by("id, tahap, created_at, no_rek, jenis, tgl_tes, tgl_tes2, tgl_tes3, tempat")
							->order_by('id',"desc")
							->get();
			return $sql;
		}
		public function getJmlJadwal()
		{
			$sql = $this->db->select("count(*) as num")
							->from("jadwal")
							->order_by('id',"desc")
							->get();
			return $sql;
		}
		public function getNoTes($plant)
		{
			$tahun = date("Y");
			$gabung = "KPS/TES/".str_replace(' ', '', $plant)."/".$tahun."/";
			$sql = $this->db->query("SELECT
										MAX(RIGHT(no_rek,3)) AS NO_URUT
									FROM
									(
										SELECT
											no_rek
										FROM
											tes_tahap_1
										WHERE
											YEAR(tgl_tes) = $tahun
										UNION
										SELECT
											no_rek
										FROM
											tes_tahap_2
										WHERE
											YEAR(jadwal_h1_tgl) = $tahun
									)Q1");
			if ($sql->num_rows()==0) {
				$hasil = $gabung."001";
			} else {
				foreach ($sql->result() as $data) {
		            $zero='';
	                $length= 3;
	                $index=$data->NO_URUT;

	                for ($i=0; $i <$length-strlen($index+1) ; $i++) { 
	                    $zero = $zero.'0';
	                }
	                $hasil = $gabung.$zero.($index+1);
		        }	
			}
	        return $hasil;
		}
		public function getDataPelamar()
		{
			$sql = $this->db->select("lamaran.id as lamaran_id, lamaran.pelamar_id, lamaran.recruitment_id, lamaran.nip, lamaran.jenis, lamaran.sub, lamaran.type, pelamar.nama, pelamar.jenis_kelamin, lamaran.created_at")
							->from("lamaran")
							->join('pelamar','lamaran.pelamar_id = pelamar.id')
							->where("status_data",'OPEN')
							->where("test_id IS NULL")
							->get();
			return $sql;
		}
		public function getTotalPelamar()
		{
			$sql = $this->db->select("count(*) as num")
							->from("lamaran")
							->join('pelamar','lamaran.pelamar_id = pelamar.id')
							->where("status_data",'OPEN')
							->where("test_id IS NULL")
							->get();
			return $sql;
		}
		public function getDataPesertaTes($id)
		{
			$sql = $this->db->select("lamaran.id as lamaran_id, lamaran.pelamar_id, lamaran.recruitment_id, lamaran.nip, lamaran.jenis, lamaran.sub, lamaran.type, pelamar.nama, pelamar.jenis_kelamin, lamaran.created_at")
							->from("lamaran")
							->join('pelamar','lamaran.pelamar_id = pelamar.id')
							->where("status_data",'OPEN')
							->where("test_id",$id)
							->get();
			return $sql;
		}
		public function getJmlPesertaTes($id)
		{
			$sql = $this->db->select("count(*) as num")
							->from("lamaran")
							->join('pelamar','lamaran.pelamar_id = pelamar.id')
							->where("status_data",'OPEN')
							->where("test_id",$id)
							->get();
			return $sql;
		}
		public function getListPesertaByNoRekaman($id)
		{
			$sql = $this->db->select("lamaran.created_at, lamaran.id, lamaran.pelamar_id, lamaran.nip, pelamar.nama, pelamar.no_ktp, pelamar.alamat_ktp, pelamar.tgl_lahir, pelamar.jenis_kelamin, lamaran.jenis, lamaran.sub, lamaran.type")
							->from("lamaran")
							->join("pelamar","lamaran.pelamar_id = pelamar.id")
							->where("test_id",$id)
							->order_by("lamaran.created_at","ASC")
							->get();
			return $sql;
		}
		public function getJmlListPesertaByNoRekaman($id)
		{
			$sql = $this->db->select("count(*) as num")
							->from("lamaran")
							->join("pelamar","lamaran.pelamar_id = pelamar.id")
							->where("test_id",$id)
							->get();
			return $sql;
		}
	}	
?>