<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Varietas extends CI_Controller
{
	function __Construct()
	{
		parent::__Construct();
		$this->load->model('Komoditass');
	}

	public function listvarietas()
	{

		$data = array(
			'view' => 'vforntend/komoditas',
			'beritaberanda' => $this->Komoditass->listvarietas(),
		);

		$this->load->view('template', $data);
	}
	public function detail_varietas($IDvarietas)
	{
		$data = array(
			'view' => 'vforntend/detail_varietas',
			'detail_varietas' => $this->Komoditass->detail_varietas($IDvarietas),

		);
		$this->load->view('template', $data);
	}
}
//end class