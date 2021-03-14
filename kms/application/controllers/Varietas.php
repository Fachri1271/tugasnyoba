<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Varietas extends CI_Controller
{
	function __Construct()
	{
		parent::__Construct();
		$this->load->library('pagination');
		$this->load->model('benih_m');
		$this->load->model('produksi_m');
	}
	function list_varietas($offset = 0)
	{
		$idkomoditas = '3014';

		$data['view'] = 'varietass';
		$data['kode_komoditas'] = $this->benih_m->tampil_kode()->result();
		$data['daftar_varietas'] = $this->benih_m->varietass($idkomoditas, $offset, 50)->result();
		//$data['daftar_varietas'] = $this->benih_m->daftar_varietas($jen_tan, $offset, 50)->result();
		//$data['daftar_varietas'] = $this->benih_m->daftar_varietas($offset,16)->result(); 
		$data['idkomoditas'] = '3014';
		$data['awal'] = $offset + 1;
		$data['total'] = $this->benih_m->total_varietas($idkomoditas);
		$total = $this->benih_m->total_varietas($idkomoditas);
		$config['base_url'] = base_url() . "varietas/list_varietas/" . $idkomoditas . "/";
		$config['total_rows'] = $total;
		$config['uri_segment'] = 5;
		$config['per_page'] = 50;
		$config['full_tag_open'] = "<div class=pagination place-right><ul>";
		$config['full_tag_close'] = "</ul></div>";
		$config['cur_tag_open'] = "<li class=active><a>";
		$config['cur_tag_close'] = "</a></li>";
		$config['num_tag_open'] = "<li>";
		$config['num_tag_close'] = "</li>";
		$config['first_link'] = "<i class=\"icon-first-2\"></i>";
		$config['first_tag_open'] = "<li>";
		$config['first_tag_close'] = "</li>";
		$config['last_link'] = "<i class=\"icon-last-2\"></i>";
		$config['last_tag_open'] = "<li>";
		$config['last_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";
		$this->pagination->initialize($config);
		$data['halaman'] = $this->pagination->create_links();
		$data['perhal'] = $config['per_page'];

		$this->load->view('template', $data);
	}

	function detail_varietas($IDvarietas)
	{

		$data['view'] = 'detail_varietas';
		$data['varietas'] = $this->benih_m->detail_varietas($IDvarietas)->row_array();
		$this->load->view('template', $data);
	}
}
//end class