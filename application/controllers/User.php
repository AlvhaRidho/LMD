<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar1', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    public function myprofil()
    {

        $data['judul'] = 'Myprofil';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar1', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/myprofil', $data);
        $this->load->view('templates/footer');
    }
    public function anggota()
    {
        $data['judul'] = 'Data Anggota';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('role_id', 1);
        $data['anggota'] = $this->db->get('user')->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/anggota', $data);
        $this->load->view('templates/footer');
    }
    
    public function ubahProfil()
    {
        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', ['required' => 'Nama tidak Boleh Kosong']);
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required|trim', ['required' => 'Nomor Handphone tidak Boleh Kosong']);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar1', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubah-profile', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);
            $no_hp = $this->input->post('no_hp', true);
            
            //jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];
            
            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '3000';
                $config['max_width'] = '1024';
                $config['max_height'] = '1000';
                $config['file_name'] = 'pro' . time();
               
                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('image')) {$gambar_lama = $data['user']['image'];
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);

                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('image', $gambar_baru);
                } else { }
            }
            
        $this->db->set('nama', $nama);
        $this->db->where('email', $email);
        $this->db->update('user');
                
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>'); 
        redirect('user');
        }
    }
    public function help()
    {
        $data['judul'] = 'Bantuan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar1', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/help', $data);
        $this->load->view('templates/footer');
    }
    public function data_user()
    {
        $data['judul'] = 'Data User';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('role_id', 2);
        $data['anggota'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2');
        $this->load->view('templates/topbar1', $data);
        $this->load->view('user/data_user', $data);
        $this->load->view('templates/footer');
    }
    public function cetak_print()
    {
        $data['user'] = $this->ModelUser->getUser()->result_array();
        $this->db->where('role_id', 2);
        $data['anggota'] = $this->db->get('user')->result_array();
        
        $this->load->view('user/cetak_print' , $data);
    }
    public function cetak_pdf()
    {

        $data['user'] = $this->ModelUser->getUser()->result_array();
        $this->db->where('role_id', 2);
        $data['anggota'] = $this->db->get('user')->result_array();

        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/Pustaka/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('user/cetak_pdf', $data);  

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $dompdf->set_paper($paper_size, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan_data_user.pdf", array('Attachment' => 0));
        
    }
}