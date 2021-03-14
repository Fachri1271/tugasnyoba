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
        $data = array(
            'hama_penyakit' => $this->M_Hama->get_all_data(),
        );
        $data['view'] = 'dashboard/add_hama';
        $this->load->view('t_dashboard', $data);
    }

    public function add()
    {

        $this->form_validation->set_rules('nama', 'Nama Hama', 'required', array(
            'required' => ' Nama Hama & Penyakit Harus Di Isi !!!'
        ));


        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
            'required' => ' deskripsi Harus Di Isi !!!'
        ));

        if ($this->form_validation->run() == true) {
            $config['upload_path']         = 'assets/gambar/hama/';  // folder upload 
            $config['allowed_types']        = 'gif|jpg|png'; // jenis file
            $config['max_size']             = 3000;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('photo')) //sesuai dengan name pada form 
            {
                echo 'anda gagal upload';
            }
            $file = $this->upload->data();
            $gambar = $file['file_name'];
            /*
            $config['upload_path'] = 'assets/gambar/hama/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '20000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'hama_penyakit' => $this->M_Hama->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                );
                $data['view'] = 'dashboard/add_hama';
                $this->load->view('t_dashboard', $data);
            } else {
                $upload_data = array('gambar' => $this->upload->data());
                // $config['image_library'] = 'gd2';
                $config['source_image'] = 'assets/gambar/hama/' . $upload_data['gambar']['filename'];
                $this->load->library('image_lib', $config);
            */
            $data = array(
                'nama' => $this->input->post('nama'),
                'nama_latin' => $this->input->post('nama_latin'),
                'nama_daerah' => $this->input->post('nama_daerah'),
                'gambar' => $gambar,
                'deskripsi' => $this->input->post('deskripsi'),
            );
            $this->M_Hama->add($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="fa fa-check-circle"></i> Success</h4> Data <a href="javascript:void(0)" class="alert-link">Data berhasil Ditambahkan !!!</a>!
                 </div>');
            redirect('hama/hama');
        }
    }


    public function edit_hama($id_hamapenyakit = null)
    {
        $this->form_validation->set_rules('nama', 'Nama Hama', 'required', array(
            'required' => ' Nama Hama & Penyakit Harus Di Isi !!!'
        ));


        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
            'required' => ' deskripsi Harus Di Isi !!!'
        ));

        $hamaPenyakit = $this->M_Hama->get_data($id_hamapenyakit);
        if ($this->form_validation->run()) {
            $gambar = $hamaPenyakit->gambar;
            if ($_FILES["photo"]["name"]) {
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 3000;
                $config['upload_path'] = './assets/gambar/hama/';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo')) //sesuai dengan name pada form 
                {
                    $this->session->set_flashdata("error_upload", $this->upload->display_errors('<p>', '</p>'));
                    return  redirect(base_url("hama/edit_hama/" . $hamaPenyakit->id_hamapenyakit));
                }
                is_file(FCPATH . "assets/gambar/hama/" . $hamaPenyakit->gambar) && unlink(FCPATH . "assets/gambar/hama/" . $hamaPenyakit->gambar);
                $file = $this->upload->data();
                $gambar = $file['file_name'];
            }
            $data = array(
                'id_hamapenyakit' => $id_hamapenyakit,
                'nama' => $this->input->post('nama'),
                'nama_latin' => $this->input->post('nama_latin'),
                'nama_daerah' => $this->input->post('nama_daerah'),
                'deskripsi' => $this->input->post('deskripsi'),
                "gambar" => $gambar,
            );
            $this->M_Hama->edit_hamas($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="fa fa-check-circle"></i> Success</h4> Data <a href="javascript:void(0)" class="alert-link">Data berhasil Ditambahkan !!!</a>!
                 </div>');
            redirect('hama/hama');
        }
        $data = array(
            'hama_penyakit' => $hamaPenyakit,
            'view' => 'dashboard/edit_hama'
        );
        $this->load->view('t_dashboard', $data);
    }

    public function delete($id_hamapenyakit)
    {
        //hapus gambar


        //batas
        $data = array('id_hamapenyakit' => $id_hamapenyakit);
        $this->M_Hama->delete($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="fa fa-check-circle"></i> Success</h4> Data <a href="javascript:void(0)" class="alert-link">Berhasil di Hapus !!!</a>!
    </div>');
        redirect('hama/hama');
    }
}
