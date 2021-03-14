<?php if (!defined('BASEPATH')) exit('No Direct Script Allowed');
class F_Hama extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Hama');
    }
    public function hama()
    {

        $data = array(
            'view' => 'vforntend/hama',
            'beritaberanda' => $this->Hama->beritaberanda(),

        );
        $this->load->view('template', $data);
    }

    public function detail_hama($id_hamapenyakit)
    {
        $data = array(
            'view' => 'vforntend/detail_hama',
            'detail_hama' => $this->Hama->detail_hama($id_hamapenyakit),

        );
        $this->load->view('template', $data);
    }
}
