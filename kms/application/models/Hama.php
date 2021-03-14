<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hama extends CI_Model
{

    public function beritaberanda()
    {
        $this->db->select('*');
        $this->db->from('hama_penyakit');
        $this->db->limit('5');
        $this->db->order_by('hama_penyakit.id_hamapenyakit', 'desc');
        return $this->db->get()->result();
    }
    public function detail_hama($id_hamapenyakit)
    {
        $this->db->select('*');
        $this->db->from('hama_penyakit');
        $this->db->where('id_hamapenyakit', $id_hamapenyakit);
        return $this->db->get()->result();
    }
}
