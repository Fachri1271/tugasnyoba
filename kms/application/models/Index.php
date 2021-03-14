<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Model
{
    public function total_user()
    {
        return $this->db->get('users')->num_rows();
    }
    public function hama_penyakit()
    {
        return $this->db->get('hama_penyakit')->num_rows();
    }
    public function tbl_varietas()
    {
        return $this->db->get('tbl_varietas')->num_rows();
    }
    public function tbl_komoditas()
    {
        return $this->db->get('tbl_komoditas')->num_rows();
    }
}
