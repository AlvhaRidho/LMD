<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ktp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['judul'] = 'E-KTP';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['ktp'] = $this->ModelKTP->getktp()->result_array();
        
        $this->form_validation->set_rules('nik', 'nik', 'required|min_length[16]|numeric', [
            'required' => 'Nik harus diisi',
            'min_length' => 'Nik terlalu pendek',
            'numeric' => 'Hanya boleh diisi angka'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('temlah', 'Tempat Lahir', 'required', [
            'required' => 'Tempat Lahir harus diisi'
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required', [
            'required' => 'Nama penerbit harus diisi',
        ]);
        $this->form_validation->set_rules('j_kelamin', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin harus diisi',
        ]);
        $this->form_validation->set_rules('g_darah', 'Golongan Darah', 'required', [
            'required' => 'Golongan Darah harus diisi',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat harus diisi',
        ]);
        $this->form_validation->set_rules('rt', 'RT', 'required|numeric', [
            'required' => 'RT harus diisi',
            'numeric' => 'Hanya boleh diisi angka'
        ]);
        $this->form_validation->set_rules('rw', 'RW', 'required|numeric', [
            'required' => 'RW harus diisi',
            'numeric' => 'Hanya boleh diisi angka'
        ]);
        $this->form_validation->set_rules('kel_desa', 'Kel/Desa', 'required', [
            'required' => 'Kel/Desa harus diisi',
        ]);
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required', [
            'required' => 'Kecamatan harus diisi',
        ]);
        $this->form_validation->set_rules('agama', 'Agama', 'required', [
            'required' => 'Agama harus diisi',
        ]);
        $this->form_validation->set_rules('skaw', 'Status Perkawinan', 'required', [
            'required' => 'Status Perkawinan harus diisi',
        ]);
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required', [
            'required' => 'Pekerjaan harus diisi',
        ]);
        $this->form_validation->set_rules('kewarg', 'Kewarganegaraan', 'required', [
            'required' => 'Kewarganegaraan harus diisi',
        ]);
        //konfigurasi sebelum gambar diupload
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
            $this->load->view('ktp/index', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('g_kk')) {
                $g_kk = $this->upload->data();
                $gambar2 = $g_kk['file_name'];
            } else {
                $gambar2 = '';
            }if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data();
                $gambar1 = $foto['file_name'];
            } else {
                $gambar1 = '';
            }
            $data = [
                'id_user' => $this->session->userdata('id_user'),
                'nik' => $this->input->post('nik', true),
                'nama' => $this->input->post('nama', true),
                'temlah' => $this->input->post('temlah', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'j_kelamin' => $this->input->post('j_kelamin', true),
                'g_darah' => $this->input->post('g_darah', true),
                'alamat' => $this->input->post('alamat', true),
                'rt' => $this->input->post('rt', true),
                'rw' => $this->input->post('rw', true),
                'kel_desa' => $this->input->post('kel_desa', true),
                'kec' => $this->input->post('kec', true),
                'agama' => $this->input->post('agama', true),
                'skaw' => $this->input->post('skaw', true),
                'pekerjaan' => $this->input->post('pekerjaan', true),
                'kewarg' => $this->input->post('kewarg', true),
                'g_kk' => $gambar2,
                'foto' => $gambar1,
            ];
            $this->ModelKTP->simpanKtp($data);
            redirect('ktp');
        }
    }     
    
    public function ubahKtp()
    {
        $data['judul'] = 'Ubah Data KTP';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['ktp'] = $this->ModelKTP->ktpWhere(['id_ktp' => $this->uri->segment(3)])->result_array();
        //$data['ktp'] = $this->ModelKTP->cekData()->result();
        
        $this->form_validation->set_rules('nik', 'nik', 'required|min_length[16]|numeric', [
            'required' => 'Nik harus diisi',
            'min_length' => 'Nik terlalu pendek',
            'numeric' => 'Hanya boleh diisi angka'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('temlah', 'Tempat Lahir', 'required', [
            'required' => 'Tempat Lahir harus diisi'
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required', [
            'required' => 'Nama penerbit harus diisi',
        ]);
        $this->form_validation->set_rules('j_kelamin', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin harus diisi',
        ]);
        $this->form_validation->set_rules('g_darah', 'Golongan Darah', 'required', [
            'required' => 'Golongan Darah harus diisi',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat harus diisi',
        ]);
        $this->form_validation->set_rules('rt', 'RT', 'required|numeric', [
            'required' => 'RT harus diisi',
            'numeric' => 'Hanya boleh diisi angka'
        ]);
        $this->form_validation->set_rules('rw', 'RW', 'required|numeric', [
            'required' => 'RW harus diisi',
            'numeric' => 'Hanya boleh diisi angka'
        ]);
        $this->form_validation->set_rules('kel_desa', 'Kel/Desa', 'required', [
            'required' => 'Kel/Desa harus diisi',
        ]);
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required', [
            'required' => 'Kecamatan harus diisi',
        ]);
        $this->form_validation->set_rules('agama', 'Agama', 'required', [
            'required' => 'Agama harus diisi',
        ]);
        $this->form_validation->set_rules('skaw', 'Status Perkawinan', 'required', [
            'required' => 'Status Perkawinan harus diisi',
        ]);
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required', [
            'required' => 'Pekerjaan harus diisi',
        ]);
        $this->form_validation->set_rules('kewarg', 'Kewarganegaraan', 'required', [
            'required' => 'Kewarganegaraan harus diisi',
        ]);
        //konfigurasi sebelum gambar diupload
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
            $this->load->view('ktp/ubah_ktp', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('g_kk')) {
                $g_kk = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar2 = $g_kk['file_name'];
            } else {
                $gambar2 = $this->input->post('old_pict', TRUE);
            }if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar1 = $foto['file_name'];
            } else {
                $gambar1 = $this->input->post('old_pict', TRUE);
            }
            
            
            $data = [
                'nik' => $this->input->post('nik', true),
                'nama' => $this->input->post('nama', true),
                'temlah' => $this->input->post('temlah', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'j_kelamin' => $this->input->post('j_kelamin', true),
                'g_darah' => $this->input->post('g_darah', true),
                'alamat' => $this->input->post('alamat', true),
                'rt' => $this->input->post('rt', true),
                'rw' => $this->input->post('rw', true),
                'kel_desa' => $this->input->post('kel_desa', true),
                'kec' => $this->input->post('kec', true),
                'agama' => $this->input->post('agama', true),
                'skaw' => $this->input->post('skaw', true),
                'pekerjaan' => $this->input->post('pekerjaan', true),
                'kewarg' => $this->input->post('kewarg', true),
                'g_kk' => $gambar2,
                'foto' => $gambar1,
            ];
            
            $this->ModelKTP->updateKtp($data, ['id_ktp' => $this->input->post('id_ktp')]);
            redirect('ktp');
        }
    }     
    
    public function hapusktp()
    {
        $where = ['id_ktp' => $this->uri->segment(3)];
        $this->ModelKTP->hapusktp($where);
        redirect('ktp');
    }
    public function data_ktp()
    {
        $data['judul'] = 'Data Pengajuan Pembuatan E-KTP';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['ktp'] = $this->ModelKTP->getKtp()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2');
        $this->load->view('templates/topbar1', $data);
        $this->load->view('ktp/data_ktp', $data);
        $this->load->view('templates/footer');
    }
    public function detailDataA()
    {
        $data['judul'] = 'Detail Data E-KTP';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['ktp'] = $this->ModelKTP->ktpWhere(['id_ktp' => $this->uri->segment(3)])->result_array();
         
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
            $this->load->view('ktp/detail_data', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('g_kk')) {
                $g_kk = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar = $g_kk['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar1 = $foto['file_name'];
            } else {
                $gambar1 = $this->input->post('old_pict', TRUE);
            }

        
            $data = [
                'nik' => $this->input->post('nik', true),
                'nama' => $this->input->post('nama', true),
                'temlah' => $this->input->post('temlah', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'j_kelamin' => $this->input->post('j_kelamin', true),
                'g_darah' => $this->input->post('g_darah', true),
                'alamat' => $this->input->post('alamat', true),
                'rt' => $this->input->post('rt', true),
                'rw' => $this->input->post('rw', true),
                'kel_desa' => $this->input->post('kel_desa', true),
                'kec' => $this->input->post('kec', true),
                'agama' => $this->input->post('agama', true),
                'skaw' => $this->input->post('skaw', true),
                'pekerjaan' => $this->input->post('pekerjaan', true),
                'kewarg' => $this->input->post('kewarg', true),
                'g_kk' => $gambar,
                'foto' => $gambar1

            ];   
        }
    }
    public function detailDataU()
    {
        $data['judul'] = 'Detail Data E-KTP';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['ktp'] = $this->ModelKTP->ktpWhere(['id_ktp' => $this->uri->segment(3)])->result_array();
         
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
            $this->load->view('ktp/detail_data', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('g_kk')) {
                $g_kk = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar = $g_kk['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar1 = $foto['file_name'];
            } else {
                $gambar1 = $this->input->post('old_pict', TRUE);
            }

        
            $data = [
                'nik' => $this->input->post('nik', true),
                'nama' => $this->input->post('nama', true),
                'temlah' => $this->input->post('temlah', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'j_kelamin' => $this->input->post('j_kelamin', true),
                'g_darah' => $this->input->post('g_darah', true),
                'alamat' => $this->input->post('alamat', true),
                'rt' => $this->input->post('rt', true),
                'rw' => $this->input->post('rw', true),
                'kel_desa' => $this->input->post('kel_desa', true),
                'kec' => $this->input->post('kec', true),
                'agama' => $this->input->post('agama', true),
                'skaw' => $this->input->post('skaw', true),
                'pekerjaan' => $this->input->post('pekerjaan', true),
                'kewarg' => $this->input->post('kewarg', true),
                'g_kk' => $gambar,
                'foto' => $gambar1

            ];   
        }
    }
    public function ubahStatus()
    {
        $id_ktp = $this->uri->segment(3);
        $nik = $this->uri->segment(4);
        $where = ['id_ktp' => $this->uri->segment(3),];

        $status = 'Selesai';
        $this->db->query("UPDATE ktp set ktp.status='$status' where ktp.nik='$nik'");
       
        $this->session->set_flashdata('pesan', '<div class="laert alert-message alert-success" role="alert"></div>');
        redirect(base_url('ktp/data_ktp'));
    }
    public function cetak_print()
    {
        $data['ktp'] = $this->ModelKTP->getKtp()->result_array();
         
        $this->load->view('ktp/cetak_print' , $data);

        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1500';
        $config['max_height'] = '1500';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('g_kk')) {
            $g_kk = $this->upload->data();
            unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
            $gambar = $g_kk['file_name'];
        } else {
            $gambar = $this->input->post('old_pict', TRUE);
        }if ($this->upload->do_upload('foto')) {
            $foto = $this->upload->data();
            unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
            $gambar1 = $foto['file_name'];
        } else {
            $gambar1 = $this->input->post('old_pict', TRUE);
        }
            $data = [
                'g_kk' => $gambar,
                'foto' => $gambar1
            ];  
    }
    public function cetak_pdf()
    {

        $data['ktp'] = $this->ModelKTP->getKtp()->result_array();
        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/Pustaka/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('ktp/cetak_pdf', $data);

        $paper_size = 'A3';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $dompdf->set_paper($paper_size, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan_data_ktp.pdf", array('Attachment' => 0));
        
    }
}