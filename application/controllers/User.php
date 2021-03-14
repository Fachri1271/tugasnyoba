<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
    }
    public function User($offset = 0)
    {
        $data = array(
            'user' => $this->M_User->get_all_data(),
        );
        $data['view'] = 'dashboard/user';
        $this->load->view('t_dashboard', $data);
    }
    public function add()
    {
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'gmail_acc' => $this->input->post('gmail_acc'),
            'id_level' => $this->input->post('id_level'),
        );
        $this->M_User->add($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="fa fa-check-circle"></i> Success</h4> Settings <a href="javascript:void(0)" class="alert-link">updated</a>!
    </div>');
        redirect('user/user');
    }
    public function edit($id_user = NULL)
    {
        $data = array(
            'id_user' => $id_user,
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'gmail_acc' => $this->input->post('gmail_acc'),
            'id_level' => $this->input->post('id_level'),
        );
        $this->M_User->edit($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="fa fa-check-circle"></i> Success</h4> Data <a href="javascript:void(0)" class="alert-link">Berhasil di Edit</a>!
    </div>');
        redirect('user/user');
    }
    public function delete($id_user = NULL)
    {
        $data = array('id_user' => $id_user);
        $this->M_User->delete($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="fa fa-check-circle"></i> Success</h4> Data <a href="javascript:void(0)" class="alert-link">Berhasil di Hapus !!!</a>!
    </div>');
        redirect('user/user');
    }
}
