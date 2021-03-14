<?php defined('BASEPATH') or exit('No direct script access allowed');

class Users_db extends CI_Model
{

	public function __construct()
	{
		$this->load->helper('array');
		parent::__construct();
		$this->load->database();
	}

	public function getlogin($username, $password)
	{
		return $this->db->get_where('users', array('username' => $username, 'password' => $password));
	}
}
