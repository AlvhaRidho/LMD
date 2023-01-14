<?php
class Matakuliah extends CI_Controller
{
    public function index()
    {
        $this->load->library('form_validation');

        $this->load->view('view-form-matakuliah');
    }

    public function cetak()
    {
        $this->form_validation->set_rules('kode','kode Matakuliah','required|min_length[3]',['required'=> 'Kode Mata Kuliah Harus diisi','min_length'=>'Kode Terlalu Pendek']);

        $this->form_validation->set_rules('nama', 'Nama Matakuliah','required|min_length[3]',['required'=> 'Nama Mata Kuliah Harus diisi','min_length'=>'Nama Terlalu Pendek']);

        if($this->form_validation->run()!= true){
            $this->load->view('view-form-matakuliah'); 
        } else {
            $data=[
                'kode'=> $this->input->post('kode'),'nama'=> $this->input->post('nama'),'sks' =>$this->input->post('sks')
            ];
        
        $this->load->view('view-data-matakuliah', $data);
    }
    }
}