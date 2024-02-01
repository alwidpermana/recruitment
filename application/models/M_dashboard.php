<?php
	class M_dashboard extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getMenunggu()
		{
			$user_id = $this->session->userdata("user_id");
			$tahun = date("Y");
			$sql = "SELECT
						COUNT(a.id) as jml
					FROM
						lamaran a 
					INNER JOIN
						pelamar b ON 
					a.pelamar_id = b.id
					WHERE
						test_id IS NULL AND 
						test_id_2 IS NULL AND 
						status_data = 'OPEN' AND 
						status = 'Aktif' AND 
						hasil_tes IS NULL AND 
						b.user_id = '$user_id' AND 
						YEAR(tgl) = $tahun";
			return $this->db->query($sql);
		}
		public function getTes()
		{
			$user_id = $this->session->userdata("user_id");
			$tahun = date("Y");
			$sql = "SELECT
						COUNT(a.id) as jml
					FROM
						lamaran a 
					INNER JOIN
						pelamar b ON 
					a.pelamar_id = b.id
					WHERE
						test_id IS NOT NULL AND  
						b.user_id = '$user_id' AND 
						hasil_tes IS NULL AND 
						YEAR(tgl) = $tahun OR 
						hasil_tes IS NULL AND 
						test_id_2 IS NOT NULL AND  
						b.user_id = '$user_id' AND 
						YEAR(tgl) = $tahun";
			return $this->db->query($sql);
		}
		public function getLulus()
		{
			$user_id = $this->session->userdata("user_id");
			$tahun = date("Y");
			$sql = "SELECT
						COUNT(a.id) as jml
					FROM
						lamaran a 
					INNER JOIN
						pelamar b ON 
					a.pelamar_id = b.id
					WHERE  
						b.user_id = '$user_id' AND 
						hasil_tes ='Lulus' AND 
						YEAR(tgl) = $tahun";
			return $this->db->query($sql);
		}
		public function getTidakLulus()
		{
			$user_id = $this->session->userdata("user_id");
			$tahun = date("Y");
			$sql = "SELECT
						COUNT(a.id) as jml
					FROM
						lamaran a 
					INNER JOIN
						pelamar b ON 
					a.pelamar_id = b.id
					WHERE  
						b.user_id = '$user_id' AND 
						hasil_tes IN ('NG','Tidak Aktif','Tidak Lulus') AND 
						YEAR(tgl) = $tahun";
			return $this->db->query($sql);
		}
		public function getGrafikBulanPerempuan()
		{
			$tahun = date("Y");
			$sql = "SELECT
						nama_bulan,
						IFNULL(jml,0) as jml
					FROM
					(
						SELECT
							* 
						FROM
							`bulan`
					)Q1
					LEFT JOIN 
					(
						SELECT
							MONTH(tgl) as bulan,
							COUNT(a.id) as jml
						FROM
							lamaran a 
						INNER JOIN
							pelamar b ON a.pelamar_id = b.id
						WHERE
							hasil_tes = 'Lulus' AND 
							YEAR(tgl) = $tahun AND 
							jenis_kelamin = 'Perempuan'
						GROUP BY MONTH(tgl)
					)Q2 ON Q1.id = Q2.bulan
					ORDER BY Q1.id ASC";
			return $this->db->query($sql);
		}
		public function getGrafikBulanLaki()
		{
			$tahun = date("Y");
			$sql = "SELECT
						nama_bulan,
						IFNULL(jml,0) as jml
					FROM
					(
						SELECT
							* 
						FROM
							`bulan`
					)Q1
					LEFT JOIN 
					(
						SELECT
							MONTH(tgl) as bulan,
							COUNT(a.id) as jml
						FROM
							lamaran a 
						INNER JOIN
							pelamar b ON a.pelamar_id = b.id
						WHERE
							hasil_tes = 'Lulus' AND 
							YEAR(tgl) = $tahun AND 
							jenis_kelamin = 'Laki-laki'
						GROUP BY MONTH(tgl)
					)Q2 ON Q1.id = Q2.bulan
					ORDER BY Q1.id ASC";
			return $this->db->query($sql);
		}
		public function getLowongan()
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
							AND setup.alokasi = 'Eksternal' 
							AND setup.pria > 0 
							AND last_apply_date>=CURDATE()
							OR setup.wanita > 0 
							AND recruitment.status = 'OPEN'
							AND setup.alokasi = 'Eksternal' 
							AND last_apply_date>=CURDATE()
						GROUP BY
							recruitment.id,	recruitment.no_recruitment, recruitment.jenis, recruitment.bulan, recruitment.tahun, setup.pria, setup.wanita
					)Q1
					LIMIT 10 OFFSET 0";
			return $this->db->query($sql);
		}
		public function getDataPelamarByUserId()
		{
			$user_id = $this->session->userdata("user_id");
			$sql = "SELECT * FROM pelamar WHERE user_id = '$user_id'";
			return $this->db->query($sql);
		}
		public function getLamaranByUserId()
		{
			$user_id = $this->session->userdata("user_id");
			$sql = "SELECT
						nip,
						lamaran.created_at,
						lamaran.tgl,
						CASE 
							WHEN test_id IS NULL AND test_id_2 IS NULL AND hasil_tes IS NULL THEN 'Proses Validitas Data Oleh HRD'
							WHEN test_id IS NOT NULL AND hasil_tes IS NULL OR hasil_tes IS NULL AND test_id IS NOT NULL THEN 'Proses Tes'
							WHEN hasil_tes = 'NG' THEN 'Tidak Lulus Administrasi'
							WHEN hasil_tes = 'Tidak Aktif' THEN 'Diskualifikasi dari proses recruitment'
							ELSE
								hasil_tes
						END as status,
						no_recruitment,
						jabatan,
						departemen,
						tempat
					FROM
						`lamaran` 
					INNER JOIN
						pelamar ON lamaran.pelamar_id = pelamar.id
					INNER JOIN
						recruitment ON lamaran.recruitment_id = recruitment.id
					WHERE
						pelamar.user_id = '$user_id'
					ORDER BY lamaran.created_at";
			return $this->db->query($sql);
		}
		public function getMaxNIP()
		{
			$user_id = $this->session->userdata("user_id");
			$sql = "SELECT
						MAX(nip) as nip
					FROM
						`lamaran` 
					INNER JOIN
						pelamar ON lamaran.pelamar_id = pelamar.id
					WHERE
						pelamar.user_id = '$user_id'";
			return $this->db->query($sql);
		}
		public function getLiniMasa($userId, $nip)
		{
			$sql="SELECT
						*
					FROM
					(
						SELECT
							1 as urut,
							'Apply Lamaran' as tahapan,
							tgl
						FROM
							lamaran
						WHERE
							user_id = '$userId' AND 
							nip = '$nip'
						UNION
						SELECT
							2 as urut,
							'Tes Tahap 1',
							tgl_tes
						FROM
							tes_detail_1 a 
						INNER JOIN
							lamaran b ON a.lamaran_id = b.id
						WHERE
							user_id = '$userId' AND 
							nip = '$nip'
						UNION
						SELECT
							3 as urut,
							'Tes Tahap 2 H-1',
							tgl_h1
						FROM
							tes_detail_2 a 
						INNER JOIN
							lamaran b ON a.lamaran_id = b.id
						WHERE
							user_id = '$userId' AND 
							nip = '$nip'
						UNION
						SELECT
							4 as urut,
							'Tes Tahap 2 H-2',
							tgl_h2
						FROM
							tes_detail_2 a 
						INNER JOIN
							lamaran b ON a.lamaran_id = b.id
						WHERE
							user_id = '$userId' AND 
							nip = '$nip'
						UNION
						SELECT
							5 as urut,
							'Tes Tahap 2 H-3',
							tgl_h3
						FROM
							tes_detail_2 a 
						INNER JOIN
							lamaran b ON a.lamaran_id = b.id
						WHERE
							user_id = '$userId' AND 
							nip = '$nip'
					)Q1
					ORDER BY urut ASC";
			return $this->db->query($sql);
		}
	}
?>