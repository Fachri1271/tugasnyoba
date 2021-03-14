<?php
class Model_index extends CI_Model
{
    function Jum_mahasiswa_perjurusan()
    {
        $this->db->group_by('tbl_varietas');
        $this->db->select('tbl_varietas');
        $this->db->select("count(*) as total");
        return $this->db->from('tbl_varietas')
            ->get()
            ->result();
    }
}
