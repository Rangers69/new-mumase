<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JurusanController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('text');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Jurusan');
    }

    // Halaman utama jurusan - menampilkan daftar jurusan
    public function index()
    {
        $data['jurusan'] = $this->Jurusan->get_all();
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Data Jurusan - SMK Muhammadiyah 15 Jakarta';
        
        $this->load->view('admin/header', $data);
        $this->load->view('jurusan/index', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman detail jurusan
    public function detail($id)
    {
        $data['jurusan'] = $this->Jurusan->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Detail Jurusan - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['jurusan'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('jurusan/detail', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman tambah jurusan (untuk admin)
    public function tambah()
    {
        $data['title'] = 'Tambah Jurusan - SMK Muhammadiyah 15 Jakarta';
        $data['user'] = $this->session->userdata();
        
        $this->load->view('admin/header', $data);
        $this->load->view('jurusan/tambah', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman edit jurusan (untuk admin)
    public function edit($id)
    {
        $data['jurusan'] = $this->Jurusan->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Edit Jurusan - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['jurusan'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('jurusan/edit', $data);
        $this->load->view('admin/footer', $data);
    }

    // Proses tambah jurusan
    public function insert()
    {
        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required');
        $this->form_validation->set_rules('deskripsi_jurusan', 'Deskripsi Jurusan', 'required');
        $this->form_validation->set_rules('icon_jurusan', 'Icon Jurusan', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data jurusan gagal ditambahkan!');
            redirect('jurusan/tambah');
        } else {
            $data = array(
                'nama_jurusan' => $this->input->post('nama_jurusan'),
                'deskripsi_jurusan' => $this->input->post('deskripsi_jurusan'),
                'icon_jurusan' => $this->input->post('icon_jurusan')
            );
            
            $this->Jurusan->insert($data);
            $this->session->set_flashdata('success', 'Data jurusan berhasil ditambahkan!');
            redirect('jurusan');
        }
    }

    // Proses update jurusan
    public function update()
    {
        $id = $this->input->post('id_jurusan');
        
        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required');
        $this->form_validation->set_rules('deskripsi_jurusan', 'Deskripsi Jurusan', 'required');
        $this->form_validation->set_rules('icon_jurusan', 'Icon Jurusan', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data jurusan gagal diupdate!');
            redirect('jurusan/edit/'.$id);
        } else {
            
            $data = array(
                'nama_jurusan' => $this->input->post('nama_jurusan'),
                'deskripsi_jurusan' => $this->input->post('deskripsi_jurusan'),
                'icon_jurusan' => $this->input->post('icon_jurusan')
            );
            
            $this->Jurusan->update($id, $data);
            $this->session->set_flashdata('success', 'Data jurusan berhasil diupdate!');
            redirect('jurusan');
        }
    }

    // Hapus jurusan
    public function delete($id)
    {
        $this->Jurusan->delete($id);
        $this->session->set_flashdata('success', 'Data jurusan berhasil dihapus!');
        redirect('jurusan');
    }

}
