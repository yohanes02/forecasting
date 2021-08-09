<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == "") {

			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');


			if ($this->form_validation->run() == FALSE) {


				$this->load->view('login');
			} else {
				$dt['username']     = $this->input->post('username');
				$dt['password']     = $this->input->post('password');

				$this->app_login_model->getLoginData($dt);
			}
		} else if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Stocker") {
			redirect('dashboard/home');
		} else if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {
			redirect('dashboard/home');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('');
	}
}
