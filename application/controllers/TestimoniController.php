<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestimoniController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('text');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Testimoni');
    }

    // Halaman utama testimoni - menampilkan daftar testimoni
    public function index()
    {
        $data['testimoni'] = $this->Testimoni->get_all();
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Data Testimoni - SMK Muhammadiyah 15 Jakarta';
        
        $this->load->view('admin/header', $data);
        $this->load->view('testimoni/index', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman detail testimoni
    public function detail($id)
    {
        $data['testimoni'] = $this->Testimoni->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Detail Testimoni - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['testimoni'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('testimoni/detail', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman tambah testimoni (untuk admin)
    public function tambah()
    {
        $data['title'] = 'Tambah Testimoni - SMK Muhammadiyah 15 Jakarta';
        $data['user'] = $this->session->userdata();
        
        $this->load->view('admin/header', $data);
        $this->load->view('testimoni/tambah', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman edit testimoni (untuk admin)
    public function edit($id)
    {
        $data['testimoni'] = $this->Testimoni->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Edit Testimoni - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['testimoni'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('testimoni/edit', $data);
        $this->load->view('admin/footer', $data);
    }

    // Proses tambah testimoni
    public function insert()
    {
        $this->form_validation->set_rules('nama_alumni', 'Nama Alumni', 'required');
        $this->form_validation->set_rules('komentar_alumni', 'Komentar Alumni', 'required');
        $this->form_validation->set_rules('profesi_alumni', 'Profesi Alumni', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data testimoni gagal ditambahkan!');
            redirect('testimoni/tambah');
        } else {
            $data = array(
                'nama_alumni' => $this->input->post('nama_alumni'),
                'komentar_alumni' => $this->input->post('komentar_alumni'),
                'profesi_alumni' => $this->input->post('profesi_alumni'),
                'foto_alumni' => $this->upload_foto(),
            );
            
            $this->Testimoni->insert($data);
            $this->session->set_flashdata('success', 'Data testimoni berhasil ditambahkan!');
            redirect('testimoni');
        }
    }

    // Proses update testimoni
    public function update()
    {
        $id = $this->input->post('id_alumni');
        
        $this->form_validation->set_rules('nama_alumni', 'Nama Alumni', 'required');
        $this->form_validation->set_rules('komentar_alumni', 'Komentar Alumni', 'required');
        $this->form_validation->set_rules('profesi_alumni', 'Profesi Alumni', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data testimoni gagal diupdate!');
            redirect('testimoni/edit/'.$id);
        } else {
            // Get current testimoni data to get existing photo
            $current_testimoni = $this->Testimoni->get_by_id($id);
            $current_foto = $current_testimoni ? $current_testimoni->foto_alumni : null;
            
            $data = array(
                'nama_alumni' => $this->input->post('nama_alumni'),
                'komentar_alumni' => $this->input->post('komentar_alumni'),
                'profesi_alumni' => $this->input->post('profesi_alumni'),
                'foto_alumni' => $this->upload_foto($current_foto),
            );
            
            $this->Testimoni->update($id, $data);
            $this->session->set_flashdata('success', 'Data testimoni berhasil diupdate!');
            redirect('testimoni');
        }
    }

    // Hapus testimoni
    public function delete($id)
    {
        $this->Testimoni->delete($id);
        $this->session->set_flashdata('success', 'Data testimoni berhasil dihapus!');
        redirect('testimoni');
    }

    // Upload foto testimoni
    private function upload_foto($current_foto = null)
    {
        // Check if file was uploaded
        if (empty($_FILES['foto_alumni']['name'])) {
            // If updating and no new file, keep existing photo
            if ($current_foto) {
                return $current_foto;
            }
            return 'default.jpg';
        }
        
        // Create upload directory if it doesn't exist
        $upload_path = './assets/img/testimoni/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0755, true);
        }
        
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 10240; // 10MB
        $config['file_name'] = 'alumni_' . time();
        $config['overwrite'] = FALSE;
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('foto_alumni')) {
            $upload_data = $this->upload->data();
            return $upload_data['file_name'];
        } else {
            // Log error for debugging
            error_log('Upload error: ' . $this->upload->display_errors());
            return 'default.jpg';
        }
    }
}
