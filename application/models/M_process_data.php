<?php
	class M_process_data extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function addData($tabel, $data)
		{
			return $this->db->insert($tabel, $data);
		}
		public function updateData($tabel, $data, $id)
		{
			return $this->db->update($tabel, $data, $id);
		}
		public function deleteData($tabel, $id, $field)
		{
			$this->db->where($field, $id);
    		return $this->db->delete($tabel);
		}
	}
?>