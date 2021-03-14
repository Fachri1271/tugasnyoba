<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Komoditass extends CI_Model
{
    public function listvarietas()
    {
        $this->db->select('*');
        $this->db->from('tbl_varietas');
        $this->db->limit('20');
        $this->db->order_by('tbl_varietas.IDvarietas', 'desc');
        return $this->db->get()->result();
    }
    public function detail_varietas($IDvarietas)
    {
        $this->db->select('*');
        $this->db->from('tbl_varietas');
        $this->db->where('IDvarietas', $IDvarietas);
        return $this->db->get()->result();
    }
}
