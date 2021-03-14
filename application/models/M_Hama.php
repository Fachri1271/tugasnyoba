<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Hama extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('hama_penyakit');
        $this->db->order_by('id_hamapenyakit', 'desc');
        return $this->db->get()->result();
    }
    public function get_data($id_hamapenyakit)
    {
        $this->db->select('*');
        $this->db->from('hama_penyakit');
        $this->db->where('id_hamapenyakit', $id_hamapenyakit);
        return $this->db->get()->row();
    }
    public function add($data)
    {
        $this->db->insert('hama_penyakit', $data);
    }

    public function edit_hamas($data)
    {
        $this->db->where('id_hamapenyakit', $data['id_hamapenyakit']);
        $this->db->update('hama_penyakit', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_hamapenyakit', $data['id_hamapenyakit']);
        $this->db->delete('hama_penyakit', $data);
    }
}
