<?php
	class M_monitoring extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getDataMonitoringRecruitment($tahun, $status,$search, $where)
		{
			$alokasi = $this->session->userdata("jenis");
			$sql = "SELECT
						Q1.*,
						kebutuhan_pria,
						kebutuhan_wanita,
						kebutuhan_total
					FROM
					(
						SELECT
							id,
							no_recruitment,
							jenis,
							bulan,
							tahun,
							IFNULL(updated_at,created_at) AS tgl
						FROM
							recruitment
						WHERE
							tahun = $tahun AND 
							status LIKE '%$status'
					)Q1
					INNER JOIN
					(
						SELECT
							recruitment_id,
							SUM(pria) as kebutuhan_pria,
							SUM(wanita) as kebutuhan_wanita,
							SUM(pria) + SUM(wanita) as kebutuhan_total
						FROM
							setup
						WHERE
							alokasi = '$alokasi'
						GROUP BY recruitment_id
					)Q2 ON Q1.id = Q2.recruitment_id
					WHERE
						no_recruitment LIKE '%$search%'
					ORDER BY tgl ASC
					$where";
			return $this->db->query($sql);
		}
		public function getDataLamaranMasuk($jenis, $sub, $type, $noRecruitment,$search, $where)
		{
			$userId = $this->session->userdata("user_id");
			$sql = "SELECT
						*
					FROM
					(
						SELECT
							pelamar.id AS pelamar_id,
							lamaran.id AS lamaran_id,
							recruitment.id AS recruitment_id,
							tgl,
							nip,
							nama,
							no_ktp,
							alamat_ktp,
							alamat_domisili,
							no_hp,
							email,
							tempat_lahir,
							tgl_lahir,
							jenis_kelamin,
							status_pernikahan,
							jml_anak,
							golongan_darah,
							agama,
							no_recruitment,
							lamaran.jenis,
							lamaran.sub,
							lamaran.type,
							lamaran.`status`,
							status_data,
							lamaran.created_at	
						FROM
							pelamar 
						INNER JOIN lamaran ON pelamar.id = lamaran.pelamar_id
						INNER JOIN recruitment ON lamaran.recruitment_id = recruitment.id
						WHERE
							lamaran.jenis LIKE '$jenis%' AND 
							lamaran.sub LIKE '$sub%' AND
							lamaran.type LIKE '$type%' AND 
							lamaran.recruitment_id = '$noRecruitment' AND 
							pelamar.user_id = '$userId'
					)Q1
					WHERE
						nip LIKE '%$search%' OR 
						nama LIKE '%$search%' OR 
						no_ktp LIKE '%$search%' OR 
						alamat_ktp LIKE '%$search%' OR 
						alamat_domisili LIKE '%$search%'
					ORDER BY lamaran_id ASC
					$where";
			return $this->db->query($sql);
		}

		public function getNoRecruitment($bulan, $tahun)
		{
			$whereBulan = '';
			if ($bulan != '' && $bulan != 'ALL') {
				$whereBulan = " AND bulan = $bulan";
			}
			$sql = $this->db->query("SELECT id, no_recruitment FROM recruitment WHERE tahun = '$tahun' $whereBulan");
			return $sql;
		}
		public function getNoRekaman($tgl, $tahap)
		{
			$sql = "SELECT DISTINCT
						id,
						no_rek
					FROM
					(
						SELECT
							id,
							no_rek,
							tgl_tes,
							1 as tahap
						FROM
							tes_tahap_1
						WHERE
							jenis = 'Operator'
						UNION
						SELECT
							id,
							no_rek,
							jadwal_h1_tgl,
							2
						FROM
							tes_tahap_2
						WHERE
							jenis = 'Operator'
						UNION
						SELECT
							id,
							no_rek,
							jadwal_h2_tgl,
							2
						FROM
							tes_tahap_2
						WHERE
							jenis = 'Operator'
						UNION
						SELECT
							id,
							no_rek,
							jadwal_h3_tgl,
							2
						FROM
							tes_tahap_2
						WHERE
							jenis = 'Operator'
					)Q1
					WHERE
						tgl_tes = '$tgl' AND tahap = '$tahap'
					ORDER BY no_rek ASC";
			return $this->db->query($sql);
		}
		public function getTotalMonitoringRecruitment($id, $bulan, $tahun)
		{
			$whereBulan = $bulan =='ALL'?'':" AND bulan = $bulan";
			$alokasi = $this->session->userdata("jenis");
			$sql = "SELECT
						'Kebutuhan' AS kategori,
						SUM(pria) AS pria,
						SUM(wanita) AS wanita,
						SUM(pria)+SUM(wanita) as total
					FROM
						recruitment 
					JOIN setup ON recruitment.id = setup.recruitment_id
					WHERE
						recruitment.id = '$id'
						AND tahun = '$tahun' AND alokasi = '$alokasi'
						";
			return $this->db->query($sql);
		}
		public function getDataLamaranById($id)
		{
			$sql = "SELECT
						lamaran.*,
						no_recruitment,
						foto,
						nama,
						no_hp,
						email,
						tempat_lahir,
						tgl_lahir,
						jenis_kelamin, 
						status_pernikahan,
						jml_anak,
						golongan_darah,
						agama,
						no_ktp,
						kode_pos,
						alamat_ktp,
						alamat_domisili,
						cv,
						ijazah_terakhir,
						surat_lamaran,
						skck,
						ktp,
						surat_keterangan_sehat,
						surat_ijin,
						kartu_keluarga,
						sertifikat_vaksin,
						surat_bebas_narkoba
					FROM
						lamaran 
					INNER JOIN recruitment ON lamaran.recruitment_id = recruitment.id
					INNER JOIN pelamar ON lamaran.pelamar_id = pelamar.id
					WHERE
						lamaran.id = '$id'";
			return $this->db->query($sql);
		}
		public function getJadwalPesertaTes($tahun, $status,$search, $where)
		{
			$userId = $this->session->userdata("user_id");
			$sql = "SELECT
						Q1.*,
						jml_laki_eksternal,
						jml_perempuan_eksternal,
						IFNULL(jml_laki_eksternal,0) + IFNULL(jml_perempuan_eksternal,0) AS jml_total_eksternal,
						jml_laki_lulus,
						jml_perempuan_lulus,
						IFNULL(jml_laki_lulus,0) + IFNULL(jml_perempuan_lulus,0) AS jml_total_lulus,
						jml_laki_tidak,
						jml_perempuan_tidak,
						IFNULL(jml_laki_tidak,0) + IFNULL(jml_perempuan_tidak,0) AS jml_total_tidak
					FROM
					(
						SELECT
							*
						FROM
						(
							SELECT
								id,
								tahap,
								created_at,
								no_rek,
								jenis,
								tempat,
								tgl_tes,
								tgl_tes2,
								tgl_tes3,
								CASE 
									WHEN tahap = 1 AND tgl_tes>=CURDATE() THEN 'OPEN'
									WHEN tahap = 2 AND tgl_tes>=CURDATE() OR tgl_tes2>= CURDATE() AND tahap = 2 OR tahap=2 AND tgl_tes3>=CURDATE() THEN 'OPEN'
									ELSE
										'CLOSE'
								END as status
							FROM
								jadwal
							WHERE
								YEAR(created_at) = 2023 AND 
								jenis = 'Operator'
						)Q1
						WHERE
							status LIKE '%$status'
					)Q1
					LEFT JOIN 
					(
						SELECT
							COUNT(lamaran.id) as jml_laki_eksternal,
							test_id
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Laki-laki' AND 
							sub = 'Eksternal' AND
							pelamar.user_id = '$userId'
						GROUP BY test_id
						UNION
						SELECT
							COUNT(lamaran.id) as jml_laki,
							test_id_2
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Laki-laki' AND 
							sub = 'Eksternal' AND
							pelamar.user_id = '$userId'
						GROUP BY test_id_2
					)Q4 ON Q1.id = Q4.test_id
					LEFT JOIN 
					(
						SELECT
							COUNT(lamaran.id) as jml_perempuan_eksternal,
							test_id
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Perempuan' AND 
							sub = 'Eksternal' AND
							pelamar.user_id = '$userId'
						GROUP BY test_id
						UNION
						SELECT
							COUNT(lamaran.id) as jml_laki,
							test_id_2
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Perempuan' AND 
							sub = 'Eksternal' AND
							pelamar.user_id = '$userId'
						GROUP BY test_id_2
					)Q5 ON Q1.id = Q5.test_id
					LEFT JOIN 
					(
						SELECT
							COUNT(lamaran.id) as jml_laki_lulus,
							test_id
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Laki-laki' AND 
							hasil_tes = 'Lulus' AND
							pelamar.user_id = '$userId'
						GROUP BY test_id
						UNION
						SELECT
							COUNT(lamaran.id) as jml_laki,
							test_id_2
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Laki-laki' AND 
							hasil_tes = 'Lulus' AND
							pelamar.user_id = '$userId'
						GROUP BY test_id_2
					)Q8 ON Q1.id = Q8.test_id
					LEFT JOIN 
					(
						SELECT
							COUNT(lamaran.id) as jml_perempuan_lulus,
							test_id
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Perempuan' AND 
							hasil_tes = 'Lulus' AND
							pelamar.user_id = '$userId'
						GROUP BY test_id
						UNION
						SELECT
							COUNT(lamaran.id) as jml_laki,
							test_id_2
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Perempuan' AND 
							hasil_tes = 'Lulus' AND
							pelamar.user_id = '$userId'
						GROUP BY test_id_2
					)Q9 ON Q1.id = Q9.test_id
					LEFT JOIN 
					(
						SELECT
							COUNT(lamaran.id) as jml_laki_tidak,
							test_id
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Laki-laki' AND 
							hasil_tes = 'Tidak Lulus' AND
							pelamar.user_id = '$userId'
						GROUP BY test_id
						UNION
						SELECT
							COUNT(lamaran.id) as jml_laki,
							test_id_2
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Laki-laki' AND 
							hasil_tes = 'Tidak Lulus' AND
							pelamar.user_id = '$userId'
						GROUP BY test_id_2
					)Q10 ON Q1.id = Q10.test_id
					LEFT JOIN 
					(
						SELECT
							COUNT(lamaran.id) as jml_perempuan_tidak,
							test_id
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Perempuan' AND 
							hasil_tes = 'Tidak Lulus' AND
							pelamar.user_id = '$userId'
						GROUP BY test_id
						UNION
						SELECT
							COUNT(lamaran.id) as jml_laki,
							test_id_2
						FROM
							lamaran 
						INNER JOIN
							pelamar ON lamaran.pelamar_id = pelamar.id
						WHERE
							jenis_kelamin = 'Perempuan' AND 
							hasil_tes = 'Tidak Lulus' AND
							pelamar.user_id = '$userId'
						GROUP BY test_id_2
					)Q11 ON Q1.id = Q11.test_id
					WHERE no_rek LIKE '%$search%'
					ORDER BY created_at desc
					$where";
			return $this->db->query($sql);
		}
		public function getListPesertaByNoRecruitment($search, $noRekaman, $type)
		{
			$user_id = $this->session->userdata("user_id");
			$sql = "SELECT
						*
					FROM
					(
						SELECT
							*
						FROM
						(
							SELECT
								a.id,
								nip,
								test_id,
								test_id_2,
								CASE 
									WHEN test_id IS NULL AND test_id_2 IS NULL AND hasil_tes IS NULL THEN 'Menunggu Jadwal Tes'
									WHEN test_id IS NOT NULL AND hasil_tes IS NULL OR hasil_tes IS NULL AND test_id_2 IS NOT NULL THEN 'Tes'
									ELSE hasil_tes
								END AS hasil_tes,
								a.type,
								nama,
								no_ktp,
								alamat_ktp,
								tgl_lahir,
								jenis_kelamin,
								b.user_id
							FROM
								lamaran a 
							INNER JOIN
								pelamar b ON 
							a.pelamar_id = b.id
							WHERE
								test_id LIKE '%$noRekaman%' OR 
								test_id_2 LIKE '%$noRekaman%'
						)Q1
						WHERE
							type LIKE '%$type%' AND 
							user_id = '$user_id'
					)Q1
					WHERE
						nip LIKE '%$search%' OR 
						nama LIKE '%$search%' OR 
						no_ktp LIKE '%$search%' OR 
						alamat_ktp LIKE '%$search%'
					ORDER BY nip ASC";
			return $this->db->query($sql);
		}
		public function getTotalListPesertaByNoRecruitment($search, $noRekaman, $type)
		{
			$user_id = $this->session->userdata("user_id");
			$sql = "SELECT
						COUNT(id) as jml,
						hasil_tes
					FROM
					(
						SELECT
							*
						FROM
						(
							SELECT
								a.id,
								nip,
								test_id,
								test_id_2,
								CASE 
									WHEN test_id IS NULL AND test_id_2 IS NULL AND hasil_tes IS NULL THEN 'Menunggu Jadwal Tes'
									WHEN test_id IS NOT NULL AND hasil_tes IS NULL OR hasil_tes IS NULL AND test_id_2 IS NOT NULL THEN 'Tes'
									ELSE hasil_tes
								END AS hasil_tes,
								a.type,
								nama,
								no_ktp,
								alamat_ktp,
								tgl_lahir,
								jenis_kelamin,
								b.user_id
							FROM
								lamaran a 
							INNER JOIN
								pelamar b ON 
							a.pelamar_id = b.id
							WHERE
								test_id LIKE '%$noRekaman%' OR 
								test_id_2 LIKE '%$noRekaman%'
						)Q1
						WHERE
							type LIKE '%$type%' AND 
							user_id = '$user_id' AND 
							hasil_tes IN ('Lulus', 'Tidak Lulus')
					)Q1
					WHERE
						nip LIKE '%$search%' OR 
						nama LIKE '%$search%' OR 
						no_ktp LIKE '%$search%' OR 
						alamat_ktp LIKE '%$search%'
					ORDER BY nip ASC";
			return $this->db->query($sql);
		}
		public function get_standar_tes($id, $tahap)
		{
			$sql = "SELECT
						a.*
					FROM
						standar_tes a
					INNER JOIN
						lamaran b ON a.jenis = b.jenis
					WHERE
						b.id = '$id' AND 
						tahap = $tahap
					ORDER BY id ASC";
			return $this->db->query($sql);
		}
		public function penilaian_tes_tahap_1($id)
		{
			$sql = "SELECT
						a.id as id_lamaran,
						a.pelamar_id,
						a.recruitment_id,
						a.test_id,
						b.no_rek,
						b.tgl_tes as rencana_tes,
						c.*
					FROM
						`lamaran` a 
					LEFT JOIN
						tes_tahap_1 b ON 
					a.test_id = b.id
					LEFT JOIN
						tes_detail_1 c ON 
					a.test_id = c.tes_tahap_1_id AND a.id = c.lamaran_id
					WHERE
						a.id = '$id'";
			return $this->db->query($sql);
		}
		public function penilaian_tes_tahap_2($id)
		{
			$sql = "SELECT
						a.id as id_lamaran,
						a.pelamar_id,
						a.recruitment_id,
						a.test_id,
						b.no_rek,
						b.jadwal_h1_tgl as rencana_tes_1,
						b.jadwal_h2_tgl as rencana_tes_2,
						b.jadwal_h3_tgl as rencana_tes_3,
						c.*
					FROM
						`lamaran` a 
					LEFT JOIN
						tes_tahap_2 b ON 
					a.test_id_2 = b.id
					LEFT JOIN
						tes_detail_2 c ON 
					a.test_id_2 = c.tes_tahap_2_id AND a.id = c.lamaran_id
					WHERE
						a.id = '$id'";
			return $this->db->query($sql);
		}
		public function getDataDetailSchedule($tahun, $bulan, $search, $noRecruitment, $sub, $type, $where, $status)
		{
			$whereBulan = $bulan == ''?'':" AND MONTH(tgl) = '$bulan'";
			$userId = $this->session->userdata("user_id");
			$sql = "SELECT
						*
					FROM
					(
						SELECT
							* 
						FROM
							monitoring_detail_schedule
						WHERE
							YEAR(tgl) = '$tahun' AND
							recruitment_id LIKE '%$noRecruitment' AND 
							sub LIKE '%$sub' AND 
							type LIKE '%$type' AND 
							hasil_tes LIKE '%$status' AND 
							MONTH(tgl) LIKE '%$bulan' AND 
							user_id = '$userId'
					)Q1
					WHERE
						nip LIKE '%$search%' OR 
						nama LIKE '%$search%' 
					ORDER BY
						tgl ASC
					$where";
			return $this->db->query($sql);
		}
		
	}
?>