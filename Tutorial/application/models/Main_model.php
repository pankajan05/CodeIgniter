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

	function can_login($username, $password) {
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$query = $this->db->get('users');

		if($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function insert_image($data) {
		$this->db->insert('image',$data);
	}

	function fetch_image() {
		$output = '';
		$this->db->select('name');
		$this->db->from('image');
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$output .= '
			<span class="col-md-3">
			<img src="'.base_url().'upload/'.$row->name.'
			" class="img-responsive img-thumbnail" />
			</span>';
		}

		return $output;
	}
}
