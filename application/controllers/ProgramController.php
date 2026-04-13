<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProgramController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('text');
        $this->load->library('session');
        $this->load->model('Program');
    }

    // Halaman utama program - menampilkan daftar program
    public function index()
    {
        $data['program'] = $this->Program->get_all();
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Data Program - SMK Muhammadiyah 15 Jakarta';
        
        $this->load->view('admin/header', $data);
        $this->load->view('program/index', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman detail program
    public function detail($id)
    {
        $data['program'] = $this->Program->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Detail Program - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['program'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('program/detail', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman tambah program (untuk admin)
    public function tambah()
    {
        $data['title'] = 'Tambah Program - SMK Muhammadiyah 15 Jakarta';
        $data['user'] = $this->session->userdata();
        
        $this->load->view('admin/header', $data);
        $this->load->view('program/tambah', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman edit program (untuk admin)
    public function edit($id)
    {
        $data['program'] = $this->Program->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Edit Program - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['program'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('program/edit', $data);
        $this->load->view('admin/footer', $data);
    }

    // Proses tambah program
    public function insert()
    {
        $this->form_validation->set_rules('nama_program', 'Nama Program', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data program gagal ditambahkan!');
            redirect('program/tambah');
        } else {
            $data = array(
                'nama_program' => $this->input->post('nama_program'),
                'deskripsi' => $this->input->post('deskripsi'),
                'created_at' => date('Y-m-d H:i:s')
            );
            
            $this->Program->insert($data);
            $this->session->set_flashdata('success', 'Data program berhasil ditambahkan!');
            redirect('program');
        }
    }

    // Proses update program
    public function update()
    {
        $id = $this->input->post('id_program');
        
        $this->form_validation->set_rules('nama_program', 'Nama Program', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data program gagal diupdate!');
            redirect('program/edit/'.$id);
        } else {
            $data = array(
                'nama_program' => $this->input->post('nama_program'),
                'deskripsi' => $this->input->post('deskripsi'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            
            $this->Program->update($id, $data);
            $this->session->set_flashdata('success', 'Data program berhasil diupdate!');
            redirect('program');
        }
    }

    // Hapus program
    public function delete($id)
    {
        $this->Program->delete($id);
        $this->session->set_flashdata('success', 'Data program berhasil dihapus!');
        redirect('program');
    }
}
