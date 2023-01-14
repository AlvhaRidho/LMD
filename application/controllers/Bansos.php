<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bansos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['judul'] = 'Bansos';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['bansos'] = $this->MBansos->getBansos()->result_array();
        
        $this->form_validation->set_rules('n_kk', 'No KK', 'required|min_length[16]|numeric', [
            'required' => 'Nama Nomor Kartu Keluarga Harus diisi',
            'min_length' => 'Nomor Kartu Keluarga Terlalu Pendek',
            'numeric' => 'Hanya boleh diisi angka'
        ]);
        $this->form_validation->set_rules('nik_keke', 'Nik Keke', 'required|min_length[16]|numeric', [
            'required' => 'Nik Kepala Keluarga harus diisi',
            'min_length' => 'Nomor NIK Terlalu Pendek',
            'numeric' => 'Hanya boleh diisi angka'
        ]);
        $this->form_validation->set_rules('keke', 'Keke', 'required', [
            'required' => 'Nama Kepala Keluarga harus diisi',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat harus diisi',
        ]);
        
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1500';
        $config['max_height'] = '1500';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config); 
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar1', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('bansos/index', $data);
            $this->load->view('templates/footer');
            
        } else {
            if ($this->upload->do_upload('swafoto')) {
                $swafoto = $this->upload->data();
                $gambar = $swafoto['file_name'];
            } else {
                $gambar = '';
            }
            $tglsekarang = date('Y-m-d');
            $data = [
                'id_user' => $this->session->userdata('id_user'),
                'n_kk' => $this->input->post('n_kk', true),
                'nik_keke' => $this->input->post('nik_keke', true),
                'keke' => $this->input->post('keke', true),
                'swafoto' => $gambar,
                'alamat' => $this->input->post('alamat', true),
                'tgl_bansos' => $tglsekarang,
            ];
            $this->MBansos->simpanbansos($data);
            redirect('bansos');


            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Keluhan anda akan kami proses, Mohon menunggu kabar dari kami</div>');
            redirect('bansos');
        }
    }     
    public function ubahBansos()
    {
        $data['judul'] = 'Bansos';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['bansos'] = $this->MBansos->bansosWhere(['id_bansos' => $this->uri->segment(3)])->result_array();
        
        $this->form_validation->set_rules('n_kk', 'No KK', 'required|numeric', [
            'required' => 'Nama Nomor Kartu Keluarga Harus diisi',
            'numeric' => 'Hanya boleh diisi angka'
        ]);
        $this->form_validation->set_rules('nik_keke', 'Nik Keke', 'required|numeric', [
            'required' => 'Nik Kepala Keluarga harus diisi',
            'numeric' => 'Hanya boleh diisi angka'
        ]);
        $this->form_validation->set_rules('keke', 'Keke', 'required', [
            'required' => 'Nama Kepala Keluarga harus diisi',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat harus diisi',
        ]);

        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1500';
        $config['max_height'] = '1500';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config); 

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar1', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('bansos/ubah_bansos', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('swafoto')) {
                $swafoto = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar = $swafoto['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }
            $tglsekarang = date('Y-m-d');
            $data = [
                'n_kk' => $this->input->post('n_kk', true),
                'nik_keke' => $this->input->post('nik_keke', true),
                'keke' => $this->input->post('keke', true),
                'alamat' => $this->input->post('alamat', true),
                'swafoto' => $gambar,
                'tgl_bansos' => $tglsekarang,
            ];
            $this->MBansos->updateBansos($data, ['n_kk' => $this->input->post('n_kk')]);;
            redirect('bansos');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Keluhan anda akan kami proses, Mohon menunggu kabar dari kami</div>');
            redirect('bansos');
        }
    }  
    public function hapusBansos()
    {
        $where = ['id_bansos' => $this->uri->segment(3)];
        $this->MBansos->hapusbansos($where);
        redirect('bansos');
    }

    public function data_bansos()
    {
        $data['judul'] = 'Data Pengajuan Bansos';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['bansos'] = $this->MBansos->getBansos()->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2');
        $this->load->view('templates/topbar1', $data);
        $this->load->view('bansos/data_bansos', $data);
        $this->load->view('templates/footer');
    }
    public function ubahStatus()
    {
        $id_bansos = $this->uri->segment(3);
        $n_kk = $this->uri->segment(4);
        $where = ['id_bansos' => $this->uri->segment(3),];

        $status = 'Selesai';
        //update status menjadi kembali pada saat buku dikembalikan
        $this->db->query("UPDATE bansos set bansos.status='$status'where bansos.n_kk='$n_kk'" );
       
        $this->session->set_flashdata('pesan', '<div class="laert alert-message alert-success" role="alert"></div>');
        redirect(base_url('bansos/data_bansos'));
    }
    public function cetak_print()
    {
        $data['bansos'] = $this->MBansos->getBansos()->result_array();
         
        $this->load->view('bansos/cetak_print' , $data);

        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1500';
        $config['max_height'] = '1500';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('swafoto')) {
            $swafoto = $this->upload->data();
            unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
            $gambar = $swafoto['file_name'];
        } else {
            $gambar = $this->input->post('old_pict', TRUE);
        }
            $data = [
                'swafoto' => $gambar
            ];  
    }
    public function excel_bansos()
    {
        $data = array('title' => 'Laporan Data Pengajuan Bansos', 'bansos' => $this->MBansos->getBansos()->result_array());
        $this->load->view('bansos/excel_bansos', $data);
    }
    public function cetak_pdf()
    {

        $data['bansos'] = $this->MBansos->getBansos()->result_array();
        
        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/Pustaka/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('bansos/cetak_pdf', $data);  
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1500';
        $config['max_height'] = '1500';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('swafoto')) {
            $swafoto = $this->upload->data();
            unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
            $gambar = $swafoto['file_name'];
        } else {
            $gambar = $this->input->post('old_pict', TRUE);
        }
            $data = [
                'swafoto' => $gambar
            ];  
        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $dompdf->set_paper($paper_size, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan_data_bansos.pdf", array('Attachment' => 0));
        
    }
}