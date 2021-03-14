<?php if (!defined('BASEPATH')) exit('No Direct Script Allowed');
class Budidaya extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('V_budidaya');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation', 'upload');
    }
    public function thp_budidaya()
    {
        $this->form_validation->set_rules('deskripsi', ' deskripsi', 'required', array(
            'required' => 'Deskripsi Harus Di Isi !!!'
        ));

        $data = array(
            'budidaya' => $this->V_budidaya->get_all_data(),
            'thp_budidaya' => $this->V_budidaya->get_all_thp(),
        );
        $data['view'] = 'vforntend/thp_budidaya';
        $this->load->view('template', $data);
    }
}
