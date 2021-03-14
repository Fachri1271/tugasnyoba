<?php if (!defined('BASEPATH')) exit('No Direct Script Allowed');
class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('array');
		$this->load->model('benih_m');
	}
	//ambil data keyword
	public function cari()
	{
		if ($this->input->post('submit')) {
			echo $this->input->post('submit');
		}
	}

	public function index()
	{
		if ($this->input->post('submit')) {
			echo $this->input->post('keyword');
		}
		$data['view'] = 'beranda';

		$this->load->view('template', $data);
	}
	public function about()
	{
		$data['view'] = 'vforntend/about';

		$this->load->view('template', $data);
	}
	public function lokasi()
	{
		$data['view'] = 'vforntend/lokasi';
		$this->load->view('template', $data);
	}
	public function hubungi()
	{
		$data['view'] = 'vforntend/hubungi';
		$this->load->view('template', $data);
	}




	/*public function layanan(){
			$data['view']='vfrontend/layanan';
			$data['kat_layanan'] = $this->layanan_model->kat_layanan()->result();
			$data['isi_layanan'] = $this->layanan_model->layanan()->result();
			$this->load->view('template', $data);	
		}
		public function grafix(){
			$data['view']='vfrontend/grafix';
			$this->load->view('template', $data);	
		}
		*/
}//end class
