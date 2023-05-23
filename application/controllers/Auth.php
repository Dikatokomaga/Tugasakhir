<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$admin = $this->db->get_where('admin', ['username' => $username])->row_array();
			if ($admin) {
				if (password_verify($password, $admin['password'])) {
					$data = [
						'username' => $admin['username']
					];
					$this->session->set_userdata($data);
					redirect('dasbor');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			   password salah </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				username tidak ada </div>');
				redirect('auth');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth');
	}
}
