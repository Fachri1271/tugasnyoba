<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class V_budidaya extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('budidaya');
        $this->db->order_by('id_budidaya', 'ASC');
        return $this->db->get()->result();
    }

    public function get_all_thp()
    {
        $this->db->select('*');
        $this->db->from('thp_subbudidaya');
        // $this->db->order_by('id_subbudidaya', 'ASC');
        return $this->db->get()->result();
    }
}
