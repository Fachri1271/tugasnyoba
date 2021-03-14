<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Budidaya extends CI_Model
{
    public function get_all_data()
    {
        return $this->db->get('budidaya');
    }
}
