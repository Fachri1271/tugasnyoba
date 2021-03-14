<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Auth extends CI_Model
{

	public function __construct()
	{

		parent::__construct();
		$this->load->database();
	}

	function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array(
			'username' => $username,
			'password' => $password
		));
		return $this->db->get()->row();
	}
}
