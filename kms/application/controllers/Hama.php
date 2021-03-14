<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hama extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Hama');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation', 'upload');
    }
    public function hama()
    {
        $data = array(
            'hama_penyakit' => $this->M_Hama->get_all_data(),
        );
        $data['view'] = 'dashboard/hama';
        $this->load->view('t_dashboard', $data);
    }
    public function add_hama()
    {
        $this->form_validation->set_rules('nama', 'Nama Hama', 'required', array('required' => '$s Harus Disini !!'));
        $this->form_validation->set_rules('nama_latin', 'Nama latin', 'required', array('required' => '$s Harus Disini !!'));
        $this->form_validation->set_rules('nama_daerah', 'Nama Daerah', 'required', array('required' => '$s Harus Disini !!'));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array('required' => '$s Harus Disini !!'));

        if ($this->form_validation->run() == TRUE or FALSE) {
            $config['upload_path'] = './assets/gambar/hama/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'hama_penyakit' => $this->M_Hama->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                );
                $data['view'] = 'dashboard/add_hama';
                $this->load->view('t_dashboard', $data);
            }
        } else {
            $this->load->library('upload', $config);

            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/gambar/hama/' . $this->upload->data('file_name');
            $this->upload->data('file_name');
            $upload_data = array('uploads' => $this->upload->data());

            $data = array(
                'nama' => $this->input->post('nama'),
                'nama_latin' => $this->input->post('nama_latin'),
                'nama_daerah' => $this->input->post('nama_daerah'),
                'gambar'  => $this->input->post['uploads']['file_name'],
                'deskripsi' => $this->input->post('deskripsi'),
            );
            $this->M_Hama->add('$data');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="fa fa-check-circle"></i> Success</h4> Settings <a href="javascript:void(0)" class="alert-link">updated</a>!
    </div>');
            redirect('hama/hama');
        }


        $data = array(
            'hama_penyakit' => $this->M_Hama->get_all_data(),
        );
        $data['view'] = 'dashboard/add_hama';
        $this->load->view('t_dashboard', $data);
    }
    public function add()
    {
    }
}
