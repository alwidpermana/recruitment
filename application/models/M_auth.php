<?php
	class M_auth extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function getDataUser($email)
		{
			$sql = $this->db->select("id, password, email, jenis, nama, url_verification, status")
							->from("user")
							->where('email',$email)
							->get();
			return $sql;
		}
	}
?>