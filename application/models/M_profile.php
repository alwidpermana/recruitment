<?php
	class M_profile extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function cekDataPelamarByUserId()
		{
			$userId = $this->session->userdata("user_id");
			$sql = $this->db->select("id")
							->from("pelamar")
							->where('user_id',$userId)
							->get();
			return $sql;
		}
		public function getDataPelamarByUser($id)
		{
			$sql = $this->db->select("user.id as user_id, pelamar.id, pelamar.foto, pelamar.nama, pelamar.no_hp, pelamar.email, pelamar.tempat_lahir, pelamar.tgl_lahir, pelamar.jenis_kelamin, pelamar.status_pernikahan, pelamar.jml_anak, pelamar.golongan_darah, pelamar.agama, pelamar.no_ktp, pelamar.kode_pos, pelamar.alamat_ktp, pelamar.alamat_domisili, pelamar.cv, pelamar.ijazah_terakhir, pelamar.surat_lamaran, pelamar.skck, pelamar.ktp, pelamar.surat_keterangan_sehat, pelamar.surat_ijin, pelamar.kartu_keluarga, pelamar.sertifikat_vaksin, pelamar.surat_bebas_narkoba")
							->from('user')
							->join('pelamar','user.id = pelamar.user_id','left')
							->where('user.id',$id)
							->get();
			return $sql;
		}
		public function getListAttachment($where)
		{
			$sql = "SELECT
						*
					FROM
					(
						SELECT 
							'CV' as jenis,
							cv as attachment
						FROM 
							`pelamar`
						$where
						UNION
						SELECT 
							'Ijazah' as jenis,
							ijazah_terakhir
						FROM 
							`pelamar`
						$where
						UNION 
						SELECT 
							'Surat Lamaran' as jenis,
							surat_lamaran
						FROM 
							`pelamar`
						$where
						UNION
						SELECT 
							'SKCK' as jenis,
							skck
						FROM 
							`pelamar`
						$where
						UNION
						SELECT 
							'KTP' as jenis,
							ktp
						FROM 
							`pelamar`
						$where
						UNION 
						SELECT 
							'Surat Keterangan Sehat' as jenis,
							surat_keterangan_sehat
						FROM 
							`pelamar`
						$where
						UNION
						SELECT 
							'Surat Ijin' as jenis,
							surat_ijin
						FROM 
							`pelamar`
						$where
						UNION
						SELECT 
							'Kartu Keluarga' as jenis,
							kartu_keluarga
						FROM 
							`pelamar`
						$where
						UNION
						SELECT 
							'sertifikat_vaksin' as jenis,
							sertifikat_vaksin
						FROM 
							`pelamar`
						$where
						UNION
						SELECT 
							'surat_bebas_narkoba' as jenis,
							surat_bebas_narkoba
						FROM 
							`pelamar`
						$where
					)Q1
					WHERE
						attachment IS NOT NULL";
			return $this->db->query($sql);
		}
		
	}
?>