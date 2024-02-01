<?php
	class M_lowongan extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getLowongan($alokasi, $search, $where)
		{
			$sql = "SELECT
						*
					FROM
					(
						SELECT
							recruitment.id,
							recruitment.no_recruitment,
							recruitment.jenis,
							recruitment.bulan,
							recruitment.tahun,
							setup.pria,
							setup.wanita,
							last_apply_date,
							COUNT( lamaran.id ) AS jml_lamaran_masuk 
						FROM
							recruitment
							INNER JOIN setup ON recruitment.id = setup.recruitment_id
							LEFT JOIN lamaran ON recruitment.id = lamaran.recruitment_id 
							AND setup.alokasi = lamaran.sub 
						WHERE
							recruitment.status = 'OPEN'
							AND setup.alokasi = '$alokasi' 
							AND setup.pria > 0 
							AND last_apply_date>=CURDATE()
							OR setup.wanita > 0 
							AND recruitment.status = 'OPEN'
							AND setup.alokasi = '$alokasi' 
							AND last_apply_date>=CURDATE()
						GROUP BY
							recruitment.id,	recruitment.no_recruitment, recruitment.jenis, recruitment.bulan, recruitment.tahun, setup.pria, setup.wanita
					)Q1
					WHERE
						no_recruitment LIKE '%$search%' OR 
						jenis LIKE '%$search%'
					LIMIT 10 OFFSET 0";
			return $this->db->query($sql);
		}
		public function getDataPelamarEksternalForLamaran()
		{
			return $this->db->select("pelamar.id, pelamar.foto, pelamar.nama, pelamar.no_ktp")
							->from("pelamar")
							->join("temp_lamaran","pelamar.id = temp_lamaran.pelamar_id","left")
							->where("temp_lamaran.pelamar_id IS NULL")
							->get();
		}
		public function getJmlPelamarEksternalForLamaran()
		{
			return $this->db->select("count(pelamar.id) as num")
							->from("pelamar")
							->join("temp_lamaran","pelamar.id = temp_lamaran.pelamar_id","left")
							->where("temp_lamaran.pelamar_id IS NULL")
							->get();
		}
		public function getDataPelamar($id, $search, $where)
		{
			$userId = $this->session->userdata("user_id");
			$sql = "SELECT
						*
					FROM
					(
						SELECT
							*
						FROM
						(
							SELECT 
								id as id_pelamar,
								foto,
								nama,
								no_ktp
							FROM
								pelamar
							WHERE
								user_id = '$userId' AND foto IS NOT NULL AND nama IS NOT NULL AND email IS NOT NULL AND no_ktp IS NOT NULL AND cv IS NOT NULL AND ijazah_terakhir IS NOT NULL AND surat_lamaran IS NOT NULL AND ktp IS NOT NULL 
						)Q1
						LEFT JOIN 
						(
							SELECT
								id as id_lamaran,
								pelamar_id,
								recruitment_id,
								nip,
								tgl,
								jenis,
								sub,
								type,
								status
							FROM
								lamaran
							WHERE
								recruitment_id = '$id'
						)Q2 ON Q1.id_pelamar = Q2.pelamar_id
						WHERE
							nama LIKE '%$search%' OR 
							no_ktp LIKE '%$search%' 
					)Q1
					$where";
			return $this->db->query($sql);
		}
		public function setNIP()
		{
			$sql = $this->db->select("MAX(nip) as nip")
							->from("lamaran")
							->get();
			foreach ($sql->result() as $data) {
                if ($data->nip =="") {
                    $hasil= "00001";
                }else{
                    $zero='';
                    $length= 5;
                    $index=$data->nip;

                    for ($i=0; $i <$length-strlen($index+1) ; $i++) { 
                        $zero = $zero.'0';
                    }
                    $hasil = $zero.($index+1);
                }
            }
	        return $hasil;	

		}
		public function getJmlLowongan($id)
		{
			$sql = "SELECT
						IFNULL(pria,0) as pria,
						IFNULL(wanita,0) AS wanita,
						IFNULL(jml_pria,0) AS jml_pria,
						IFNULL(jml_wanita,0) AS jml_wanita
					FROM
					(
						select 
						pria,
						wanita,
						recruitment_id
					FROM
						setup
					WHERE
						recruitment_id = '$id'
						AND alokasi = 'Eksternal'
					)Q1
					LEFT JOIN 
					(
						SELECT
							COUNT(lamaran.id) as jml_pria,
							recruitment_id
						FROM
							`lamaran` 
						INNER JOIN pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Laki-laki' AND recruitment_id = '$id'
						GROUP BY recruitment_id
					)Q2 ON Q1.recruitment_id = Q2.recruitment_id
					LEFT JOIN 
					(
						SELECT
							COUNT(lamaran.id) as jml_wanita,
							recruitment_id
						FROM
							`lamaran` 
						INNER JOIN pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Perempuan' AND recruitment_id = '$id'
						GROUP BY recruitment_id
					)Q3 ON Q1.recruitment_id = Q3.recruitment_id";
			return $this->db->query($sql);
		}
		public function getRecruitmentById($id)
		{
			$sql = $this->db->select("*")
							->from("recruitment")
							->where("id",$id)
							->get();
			return $sql;
		}
		public function cekLowonganByUserUmum($id, $userId)
		{
			$sql = $this->db->select('id, status')
							->from('lamaran')
							->where('recruitment_id',$id)
							->where('user_id',$userId)
							->where('sub','Umum')
							->get();
			return $sql;
		}
		public function cancelLamaran($id, $userId)
		{
			$sql = $this->db->query("DELETE FROM lamaran WHERE recruitment_id = '$id' AND user_id = '$userId'");
			return $sql;
		}
		public function getRequirement($id)
		{
			return $this->db->query("SELECT * FROM requirement WHERE recruitment_id = '$id' ORDER BY created_at ASC");
		}
		public function getDataSimpanLamaran($id,$search, $where)
		{
			$sql ="SELECT
						*
					FROM
					(
						SELECT
							a.* 
						FROM
						`lamaran_masuk` a 
						INNER JOIN pelamar b ON a.pelamar_id = b.id
						WHERE
							user_id = '$id'
					)Q1
					WHERE
						jabatan LIKE '%$search%' OR 
						departemen LIKE '%$search%' OR 
						plant LIKE '%$search%' OR 
						status LIKE '%$search%'
					ORDER BY created_at desc
					$where";
			return $this->db->query($sql);
		}
		public function cekKaryawanResign($id)
		{
			$sql = "SELECT
						pelamar.id,
						karyawan_resign.kategori
					FROM
						pelamar 
					INNER JOIN
						karyawan_resign ON pelamar.no_ktp = karyawan_resign.no_ktp AND pelamar.tgl_lahir = karyawan_resign.tgl_lahir
					WHERE
						pelamar.id = '$id'";
			return $this->db->query($sql);
		}
		
	}
?>