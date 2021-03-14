<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller
{
	function __Construct()
	{
		parent::__construct();
		$this->load->helper('array');

		$this->load->model('Users_db');
	}
	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', array(
			'required' => ' Username Harus Di Isi !!!'
		));
		$this->form_validation->set_rules('password', 'password', 'required', array(
			'required' => ' Password Harus Di Isi !!'
		));
		if ($this->form_validation->run() ==  TRUE) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->user_login->login($username, $password);
		}
		$data = array(
			'title' => 'Login User'
		);
		$this->load->view('dashboard/login', $data, FALSE);
	}
	public function logout_user()
	{
		$this->user_login->logout();
	}
}
