<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_budidaya extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('budidaya');
        $this->db->order_by('id_budidaya', 'ASC');
        return $this->db->get()->result();
    }

	public function get_all_thp_budidaya()
    {
        $this->db->select('*');
        $this->db->from('thp_budidaya');
        // $this->db->order_by('id_subbudidaya', 'ASC');
        return $this->db->get()->result();
    }

    public function get_all_thp()
    {
        $this->db->select('*');
        $this->db->from('thp_subbudidaya');
        // $this->db->order_by('id_subbudidaya', 'ASC');
        return $this->db->get()->result();
    }

    public function add_budidaya($data)
    {
        $this->db->insert('thp_subbudidaya', $data);
    }


    public function edit_budidaya($data)
    {
        $this->db->where('id_subbudidaya', $data['id_subbudidaya']);
        $this->db->update(' thp_subbudidaya', $data);
    }
    public function delete_budidaya($data)
    {
        $this->db->where('id_subbudidaya', $data['id_subbudidaya']);
        $this->db->delete('thp_subbudidaya', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_budidaya', $data['id_budidaya']);
        $this->db->delete('budidaya', $data);
    }
}
