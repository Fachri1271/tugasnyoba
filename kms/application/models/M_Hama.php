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
    public function add($data)
    {
        $this->db->insert('hama_penyakit', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_hamapenyakit', $data);
        $this->db->update('hama_penyakit', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_hamapenyakit', $data);
        $this->db->where('hama_penyakit', $data);
    }
}
