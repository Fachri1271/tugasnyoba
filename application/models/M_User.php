<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_User extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('id_user', 'asc');
        return $this->db->get()->result();
    }
    public function add($data)
    {
        $this->db->insert('users', $data);
    }
    public function edit($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('users', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('users', $data);
    }
}
