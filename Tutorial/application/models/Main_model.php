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

	function fetch_singledata($id){
		$this->db->where("Id", $id);
		return $this->db->get('user');
	}

	function update_data($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}
}
