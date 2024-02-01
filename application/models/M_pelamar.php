<?php
	class M_pelamar extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getDataPelamar()
		{
			$sql = $this->db->select("pelamar.*")
							->from("pelamar")
							->get();
			return $sql;
		}
		public function getJmlPelamar()
		{
			$sql = $this->db->select("count(id) as num")
							->from("pelamar")
							->get();
			return $sql;
		}
	}
?>