<?php

class Main_model extends CI_Model{
	function insert_data($data) {
		$this->db->insert("user", $data);
	}

	function fetch_data(){
		$query = $this->db->get('user');
		return $query;
	}

	function delete_data($id){
		$this->db->where("id", $id);
		$this->db->delete('user');
	}
}
