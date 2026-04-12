<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GuruController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
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
        $data['guru'] = $this->Guru_model->get_by_id($id);
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
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('gurucontroller/tambah');
        } else {
            $data = array(
                'nama_guru' => $this->input->post('nama_guru'),
                'nip' => $this->input->post('nip'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'jurusan' => $this->input->post('jurusan'),
                'pendidikan' => $this->input->post('pendidikan'),
                'pengalaman' => $this->input->post('pengalaman'),
                'mata_pelajaran' => $this->input->post('mata_pelajaran'),
                'foto_guru' => $this->upload_foto(),
                'active' => 1
            );
            
            $result = $this->Guru_model->insert($data);
            
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
        $data['guru'] = $this->Guru_model->get_by_id($id);
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
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        
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
                'jurusan' => $this->input->post('jurusan'),
                'pendidikan' => $this->input->post('pendidikan'),
                'pengalaman' => $this->input->post('pengalaman'),
                'mata_pelajaran' => $this->input->post('mata_pelajaran')
            );
            
            // Cek apakah ada upload foto baru
            if (!empty($_FILES['foto_guru']['name'])) {
                $data['foto_guru'] = $this->upload_foto();
            }
            
            $result = $this->Guru_model->update($id, $data);
            
            if ($result) {
                $this->session->set_flashdata('success', 'Data guru berhasil diperbarui');
                redirect('gurucontroller');
            } else {
                $this->session->set_flashdata('error', 'Data guru gagal diperbarui');
                redirect('gurucontroller/edit/' . $id);
            }
        }
    }

    // Hapus guru
    public function hapus($id)
    {
        $result = $this->Guru_model->delete($id);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Data guru berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data guru gagal dihapus');
        }
        
        redirect('gurucontroller');
    }

    // Upload foto guru
    private function upload_foto()
    {
        $config['upload_path'] = './assets/img/guru/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;
        $config['file_name'] = 'guru_' . time();
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('foto_guru')) {
            return $this->upload->data('file_name');
        } else {
            return 'default.jpg'; // foto default jika upload gagal
        }
    }
}