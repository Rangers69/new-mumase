<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GuruController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('Guru');
    }

    // Halaman utama guru - menampilkan daftar guru
    public function index()
    {

        $data['guru'] = $this->Guru->get_all();
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Data Guru - SMK Muhammadiyah 15 Jakarta';
        
        $this->load->view('admin/header', $data);
        $this->load->view('guru/index', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman detail guru
    public function detail($id)
    {
        $data['guru'] = $this->Guru->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Detail Guru - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['guru'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('guru/detail', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman tambah guru (untuk admin)
    public function tambah()
    {
        $data['title'] = 'Tambah Guru - SMK Muhammadiyah 15 Jakarta';
        $data['user'] = $this->session->userdata();
        
        $this->load->view('admin/header', $data);
        $this->load->view('guru/tambah', $data);
        $this->load->view('admin/footer', $data);
    }

    // Proses tambah guru
    public function proses_tambah()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('gurucontroller/tambah');
        } else {
            $data = array(
                'nama_guru' => $this->input->post('nama_guru'),
                'nip' => $this->input->post('nip'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'pendidikan' => $this->input->post('pendidikan'),
                'mapel_guru' => $this->input->post('mata_pelajaran'),
                'foto_guru' => $this->upload_foto(),
                'hobi' => $this->input->post('hobi'),
                'tanggal_bergabung' => $this->input->post('tanggal_bergabung'),
                'active' => 1
            );
            
            $result = $this->Guru->insert($data);
            
            if ($result) {
                $this->session->set_flashdata('success', 'Data guru berhasil ditambahkan');
                redirect('gurucontroller');
            } else {
                $this->session->set_flashdata('error', 'Data guru gagal ditambahkan');
                redirect('gurucontroller/tambah');
            }
        }
    }

    // Halaman edit guru
    public function edit($id)
    {
        $data['guru'] = $this->Guru->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Edit Guru - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['guru'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('guru/edit', $data);
        $this->load->view('admin/footer', $data);
    }

    // Proses edit guru
    public function proses_edit()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric');
        
        $id = $this->input->post('id_guru');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('gurucontroller/edit/' . $id);
        } else {
            $data = array(
                'nama_guru' => $this->input->post('nama_guru'),
                'nip' => $this->input->post('nip'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'mapel_guru' => $this->input->post('mapel_guru'),
                'pendidikan' => $this->input->post('pendidikan'),
                'tanggal_bergabung' => $this->input->post('tanggal_bergabung'),
                'hobi' => $this->input->post('hobi'),
            );
            
            // Cek apakah ada upload foto baru
            if (!empty($_FILES['foto_guru']['name'])) {
                $data['foto_guru'] = $this->upload_foto();
            }
            
            $result = $this->Guru->update($id, $data);
            
            if ($result) {
                $this->session->set_flashdata('success', 'Data guru berhasil diperbarui');
                redirect('gurucontroller');
            } else {
                $this->session->set_flashdata('error', 'Data guru gagal diperbarui');
                redirect('gurucontroller/edit/' . $id);
            }
        }
    }

    // Halaman guru tidak aktif
    public function inactive()
    {
        $data['guru'] = $this->Guru->get_inactive();
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Data Guru Tidak Aktif - SMK Muhammadiyah 15 Jakarta';
        
        $this->load->view('admin/header', $data);
        $this->load->view('guru/inactive', $data);
        $this->load->view('admin/footer', $data);
    }

    // Nonaktifkan guru
    public function set_inactive($id)
    {
        $data = array('active' => 0);
        $result = $this->Guru->update($id, $data);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Data guru berhasil dinonaktifkan');
        } else {
            $this->session->set_flashdata('error', 'Data guru gagal dinonaktifkan');
        }
        
        redirect('guru');
    }

    // Aktifkan kembali guru
    public function activate($id)
    {
        $data = array('active' => 1);
        $result = $this->Guru->update($id, $data);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Data guru berhasil diaktifkan kembali');
        } else {
            $this->session->set_flashdata('error', 'Data guru gagal diaktifkan kembali');
        }
        
        redirect('guru/inactive');
    }

    // Halaman publik guru - dapat diakses oleh umum
    public function public_view()
    {
        $data['guru'] = $this->Guru->get_all();
        $data['title'] = 'Data Guru - SMK Muhammadiyah 15 Jakarta';
        
        $this->load->view('public/header', $data);
        $this->load->view('public/guru', $data);
        $this->load->view('public/footer', $data);
    }

    // Upload foto guru
    private function upload_foto()
    {
        $upload_path = './assets/img/guru/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0755, true);
        }
        
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 10240; // 10MB
        $config['file_name'] = 'guru_' . time();
        $config['overwrite'] = FALSE;
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('foto_guru')) {
            $upload_data = $this->upload->data();
            return $upload_data['file_name'];
        } else {
            error_log('Upload error: ' . $this->upload->display_errors());
            return 'default.jpg';
        }
    }
}