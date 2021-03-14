<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = $get_instance();
        $this->ci->load->model('M_Auth');
    }

    public function loginn()
    {
        $cek = $this->ci->M_Auth->login($username, $password);
        if ($cek) {
            $nama = $cek->nama;
            $username = $cek->username;
            $id_level = $cek->id_level;
            //buat session
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('username', $nama);
            $this->ci->session->set_userdata('id_level', $id_level);
            redirect('dashboard/index');
        } else {
            //jika salah
            $this->ci->session->set_flashdata('pesan', 'username Atau Password');
            redirect('auth/login');
        }
    }
}
