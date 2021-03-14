<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Index');
    }
    function index()
    {
        $data = array(
            'view' => 'dashboard/index',
            'total_user' => $this->Index->total_user(),
            'hama_penyakit' => $this->Index->hama_penyakit(),
            'tbl_varietas' => $this->Index->tbl_varietas(),
            'tbl_komoditas' => $this->Index->tbl_komoditas(),
        );

        $this->load->view('t_dashboard', $data);
    }
}
