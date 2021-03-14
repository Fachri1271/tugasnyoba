<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = get_instance();
        $this->ci->load->model('M_Auth');
    }

    public function login($username, $password)
    {
        $cek  = $this->ci->M_Auth->login($username, $password);
        if ($cek) {
            $nama = $cek->nama;
            $username = $cek->username;
            //buat session
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('nama', $nama);
            redirect('Dashboard/index');
        } else {
            //jika salah cek
            $this->ci->session->set_flashdata('error', 'Username Atau Password Salah !');
            redirect('auth/login');
        }
    }
    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('username') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login !');
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('nama');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil  Logout !');
        redirect('auth/login');
    }
}
