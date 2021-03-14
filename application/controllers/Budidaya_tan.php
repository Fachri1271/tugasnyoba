<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Budidaya_tan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_budidaya');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation', 'upload');
    }
    public function tampil_budidaya()
    {
        $this->form_validation->set_rules('deskripsi', ' deskripsi', 'required', array(
            'required' => 'Deskripsi Harus Di Isi !!!'
        ));

        $data = array(
            'budidaya' => $this->M_budidaya->get_all_data(),
            'thp_budidaya' => $this->M_budidaya->get_all_thp(),
        );
        $data['view'] = 'dashboard/budidaya';
        $this->load->view('t_dashboard', $data);
    }
    public function add_budidaya()
    {
        $data = array(
            'id_subbudidaya' => $this->input->post('id_subbudidaya'),
            'id_thpbudidaya' => $this->input->post('id_thpbudidaya'),
            'sub_budidaya' => $this->input->post('sub_budidaya'),
            'keterangan' => $this->input->post('keterangan'),


        );
        $data = $this->M_budidaya->add_budidaya($data);


        $data['view'] = 'dashboard/add_budidaya';

		$list10 = array();
		foreach ($this->M_budidaya->get_all_thp_budidaya() as $item) {
			$list10[''] = '-- Pilih THP Budidaya --';
			$list10[$item->id_thpbudidaya] = $item->budidaya;
		}
		$data['thp_budidaya'] = $list10;
 
        $this->load->view('t_dashboard', $data);
    }

	public function get_sub()
	{
		if($this->input->post('val'))
        {
            $prov_id = $this->input->post('val');
            $data = $this->dbm->get_data_where($this->tbl_kabupaten, array('prov_id' => $prov_id))->result();
            echo json_encode($data);
        }
	}

    
    public function edit_budidaya($id_subbudidaya = null)
    {
		
        //$data = array(
         //   'id_subbudidaya' => $id_subbudidaya,
       //    'sub_budidaya' => $this->input->post('sub_budidaya'),
         //  'keterangan' => $this->input->post('keterangan'),
       // );
       // $this->M_budidaya->edit_budidaya($data);
       // $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
       //         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         ///       <h4><i class="fa fa-check-circle"></i> Success</h4> Data <a href="javascript:void(0)" class="alert-link">Data berhasil Ditambahkan !!!</a>!
        //         </div>');
      //  redirect('Budidaya_tan/edit_budidaya');
    }
    public function delete_budidaya($id_subbudidaya = NULL)
    {
        $data = array('id_user' => $id_subbudidaya);
        $this->M_budidaya->delete($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="fa fa-check-circle"></i> Success</h4> Data <a href="javascript:void(0)" class="alert-link">Berhasil di Hapus !!!</a>!
    </div>');
        redirect('user/user');
    }

   
}
