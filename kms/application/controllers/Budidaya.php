<?php if (!defined('BASEPATH')) exit('No Direct Script Allowed');
class Budidaya extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('array');
    }
    public function thp_budidaya()
    {
        $data['view'] = 'vforntend/thp_budidaya';
        $this->load->view('template', $data);
    }
}
