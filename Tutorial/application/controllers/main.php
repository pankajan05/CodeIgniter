<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{
		$this->load->model('main_model');
		$data['fetch_data'] = $this->main_model->fetch_data();
		$this->load->view('main_view', $data);
	}

	public function form_validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name','First Name', 'required|alpha');
		$this->form_validation->set_rules('last_name','Last Name', 'required|alpha');

		if($this->form_validation->run()){
			$this->load->model('main_model');
			$data = array(
				"first_name" => $this->input->post("first_name"),
				"last_name" => $this->input->post("last_name"),
			);
			echo $this->input->post('insert');
			if($this->input->post('update')){
				echo "dfd";
				$this->main_model->update_data($data, $this->input->post('hidden_id'));
				redirect(base_url()). "main/updated";
			}
			if($this->input->post('insert')) {
				$this->main_model->insert_data($data);
				redirect(base_url() . "main/inserted");
			}
		} else {
			$this->index();
		}

	}

	public function inserted(){
		$this->index();
	}

	public function delete_data(){
		$id = $this->uri->segment(3);
		$this->load->model('main_model');
		$this->main_model->delete_data($id);
		redirect(base_url(). "main/deleted");
	}

	public function deleted(){
		$this->index();
	}

	public function updated(){
		$this->index();
	}

	public function update_data(){
		$id = $this->uri->segment(3);
		$this->load->model('main_model');
		$data['user_data'] = $this->main_model->fetch_singledata($id);
		$data['fetch_data'] = $this->main_model->fetch_data();
		$this->load->view('main_view', $data);
	}

	function login() {
		$data['title'] = 'CodeIgniter Simple Login Form with Sessions';
		$this->load->view('login', $data);
	}

	public function login_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'User Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run()){
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->load->model('main_model');
			if($this->main_model->can_login($username, $password)){
				$session_data = array(
					'username' => $username,
					'password' => $password
				);
				$this->session->set_userdata($session_data);
				redirect(base_url(). 'main/enter');
			} else {
				$this->session->set_flashdata('error', 'Invalide username and password');
				redirect(base_url().'main/login');
			}
		} else {
			$this->login();
		}

	}

	function enter() {
		if($this->session->userdata('username') != ''){
			echo '<h2>Welcome - '.$this->session->userdata('username').'</h2>';
			echo '<label><a href="'.base_url().'main/logout">Logout</a></label>';
		} else {
			redirect(base_url(). 'main/login');
		}
	}

	function logout() {
		$this->session->unset_userdata('username');
		redirect(base_url().'main/login');
	}

}
