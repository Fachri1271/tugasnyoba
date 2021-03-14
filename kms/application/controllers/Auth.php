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

		$data['view'] = 'dashboard/index';
		$this->load->view('template_login', $data);
	}


	public function index()
	{
		$data['view'] = 'dashboard/index';
		$this->load->view('dashboard/index', $data);
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth/login');
	}
}
