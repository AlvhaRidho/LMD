<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warga extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    
    public function index()
    {
        $data['judul'] = 'Data Warga';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['warga'] = $this->MWarga->getwarga()->result_array();
        
        $this->form_validation->set_rules('no_kk', 'no_kk', 'required|min_length[16]|numeric', [
            'required' => 'Nomor KK harus diisi',
            'min_length' => 'Nomor kk terlalu pendek',
            'numeric' => 'Hanya boleh diisi angka'
        ]);
        $this->form_validation->set_rules('nama_keke', 'nama_keke', 'required', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('j_anggota', 'j_anggota', 'required|numeric', [
            'required' => 'Jumlah anggota keluarga harus diisi',
            'numeric' => 'Hanya boleh diisi angka'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required', [
            'required' => 'Alamat harus diisi'
        ]);
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '1000';
        $config['max_width'] = '1500';
        $config['max_height'] = '1500';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar2', $data);
            $this->load->view('templates/topbar1', $data);
            $this->load->view('warga/index', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('gmbr_kk')) {
                $gmbr_kk = $this->upload->data();
                $gambar = $gmbr_kk['file_name'];
            } else {
                $gambar = '';
            }
            $data = [
                'no_kk' => $this->input->post('no_kk', true),
                'nama_keke' => $this->input->post('nama_keke', true),
                'j_anggota' => $this->input->post('j_anggota', true),
                'alamat' => $this->input->post('alamat', true),
                'gmbr_kk' => $gambar
            ];
            $this->MWarga->simpanWarga($data);
            redirect('warga');
        }
    }  
    public function cetak_print()
    {
        $data['warga'] = $this->MWarga->getWarga()->result_array();
         
        $this->load->view('warga/cetak_print' , $data);

        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1500';
        $config['max_height'] = '1500';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gmbr_kk')) {
            $gmbr_kk = $this->upload->data();
            unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
            $gambar = $gmbr_kk['file_name'];
        } else {
            $gambar = $this->input->post('old_pict', TRUE);
        }
            $data = [
                'gmbr_kk' => $gambar
            ];  
    }
    public function ubahWarga()
    {
        $data['judul'] = 'Ubah Data Warga';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['warga'] = $this->MWarga->wargaWhere(['id_warga' => $this->uri->segment(3)])->result_array();
        
        $this->form_validation->set_rules('no_kk', 'No KK', 'required|numeric', [
            'required' => 'Nomor Kartu Keluarga Harus diisi',
            'numeric' => 'Hanya boleh diisi angka'
        ]);
        $this->form_validation->set_rules('nama_keke', 'Nama Keke', 'required', [
            'required' => 'Nama Kepala Keluarga harus diisi',
        ]);
        $this->form_validation->set_rules('j_anggota', 'Jumlah Anggota', 'required|numeric', [
            'required' => 'Jumlah Anggota Keluarga harus diisi',
            'numeric' => 'Hanya boleh diisi angka'
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
            $this->load->view('templates/sidebar2', $data);
            $this->load->view('templates/topbar1', $data);
            $this->load->view('warga/ubah_warga', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('gmbr_kk')) {
                $gmbr_kk = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar = $gmbr_kk['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }
            $tglsekarang = date('Y-m-d');
            $data = [
                'no_kk' => $this->input->post('no_kk', true),
                'j_anggota' => $this->input->post('j_anggota', true),
                'nama_keke' => $this->input->post('nama_keke', true),
                'alamat' => $this->input->post('alamat', true),
                'gmbr_kk' => $gambar
            ];
            $this->MWarga->updateWarga($data, ['no_kk' => $this->input->post('no_kk')]);;
            redirect('warga');
        }
    }  
    public function hapusWarga()
    {
        $where = ['id_warga' => $this->uri->segment(3)];
        $this->MWarga->hapuswarga($where);
        redirect('warga');
    }
    public function cetak_pdf()
    {

        $data['warga'] = $this->MWarga->getWarga()->result_array();
        
        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/Pustaka/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('warga/cetak_pdf', $data);  

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $dompdf->set_paper($paper_size, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan_data_warga.pdf", array('Attachment' => 0));
        
    }
}   