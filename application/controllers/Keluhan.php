<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluhan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['judul'] = 'Keluhan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['keluhan'] = $this->ModelKeluhan->getKeluhan()->result_array();
        
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama harus diisi',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat harus diisi',
        ]);
        $this->form_validation->set_rules('no_telp', 'No Headphone', 'required|min_length[11]|numeric', [
            'required' => 'No Headphone harus diisi',
            'min_length' => 'No Handphone Terlalu Pendek',
            'numeric' => 'Hanya boleh diisi angka'
        ]);
        $this->form_validation->set_rules('keluhan', 'keluhan', 'required', [
            'required' => 'keluhan harus diisi',
        ]);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar1', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keluhan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $tglsekarang = date('Y-m-d');
            $data = [
                'id_user' => $this->session->userdata('id_user'),
                'nama' => $this->input->post('nama', true),
                'tgl_keluhan' => $tglsekarang,
                'alamat' => $this->input->post('alamat', true),
                'no_telp' => $this->input->post('no_telp', true),
                'keluhan' => $this->input->post('keluhan', true),
            ];
            $this->ModelKeluhan->simpanKeluhan($data);
            redirect('keluhan');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Keluhan anda akan kami proses, Mohon menunggu kabar dari kami</div>');
            redirect('keluhan');
            
        }
    }     
    
    public function ubah()
    {
        $data['judul'] = 'Ubah Keluhan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['keluhan'] = $this->ModelKeluhan->keluhanWhere(['id_keluhan' => $this->uri->segment(3)])->result_array();
       
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama harus diisi',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat harus diisi',
        ]);
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|numeric', [
            'required' => 'No Headphone harus diisi',
            'numeric' => 'Hanya boleh diisi angka'
        ]);
        $this->form_validation->set_rules('keluhan', 'keluhan', 'required', [
            'required' => 'keluhan harus diisi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar1', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keluhan/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'alamat' => $this->input->post('alamat', true),
                'no_telp' => $this->input->post('no_telp', true),
                'keluhan' => $this->input->post('keluhan', true),
            ];
            
            $this->ModelKeluhan->updateKeluhan($data, ['id_keluhan' => $this->input->post('id_keluhan')]);
            redirect('keluhan');
        }
    }     
    
    public function hapusKeluhan()
    {
        $where = ['id_keluhan' => $this->uri->segment(3)];
        $this->ModelKeluhan->hapuskeluhan($where);
        redirect('keluhan');
    }
    public function data_keluhan()
    {
        $data['judul'] = 'Data Pengajuan Keluhan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['keluhan'] = $this->ModelKeluhan->getKeluhan()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2');
        $this->load->view('templates/topbar1', $data);
        $this->load->view('keluhan/data_keluhan', $data);
        $this->load->view('templates/footer');
    }
    public function ubahStatus()
    {
        $id_keluhan = $this->uri->segment(3);
        $alamat = $this->uri->segment(4);
        $where = ['id_keluhan' => $this->uri->segment(3),];

        $status = 'Selesai';
        $this->db->query("UPDATE keluhan set keluhan.status='$status' where keluhan.alamat='$alamat'");
       
        $this->session->set_flashdata('pesan', '<div class="laert alert-message alert-success" role="alert"></div>');
        redirect(base_url('keluhan/data_keluhan'));
    }
    public function cetak_print()
    {
        $data['keluhan'] = $this->ModelKeluhan->getKeluhan()->result_array();
    
        $this->load->view('keluhan/cetak_print' , $data);
    }
    public function excel_keluhan()
    {
        $data = array('title' => 'Laporan Data Pengajuan Keluhan', 'keluhan' => $this->ModelKeluhan->getKeluhan()->result_array());
        $this->load->view('keluhan/excel_keluhan', $data);
    }
    public function cetak_pdf()
    {

        $data['keluhan'] = $this->ModelKeluhan->getKeluhan()->result_array();
        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/Pustaka/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('keluhan/cetak_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $dompdf->set_paper($paper_size, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan_data_keluhan.pdf", array('Attachment' => 0));
        
    }
}