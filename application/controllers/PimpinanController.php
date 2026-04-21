<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PimpinanController extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('text');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Pimpinan');

        $user = $this->session->userdata('user');
        $jabatan = strtolower($user['jabatan_user'] ?? '');

        $allowed = ['admin'];

        if (!in_array($jabatan, $allowed)) {
            show_error('Anda tidak memiliki akses ke halaman ini.', 403);
        }
    }

    // Halaman utama pimpinan - menampilkan daftar pimpinan
    public function index()
    {
        $data['pimpinan'] = $this->Pimpinan->get_all();
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Data Pimpinan - SMK Muhammadiyah 15 Jakarta';
        
        $this->load->view('admin/header', $data);
        $this->load->view('pimpinan/index', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman detail pimpinan
    public function detail($id)
    {
        $data['pimpinan'] = $this->Pimpinan->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Detail Pimpinan - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['pimpinan'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('pimpinan/detail', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman tambah pimpinan (untuk admin)
    public function tambah()
    {
        $data['title'] = 'Tambah Pimpinan - SMK Muhammadiyah 15 Jakarta';
        $data['user'] = $this->session->userdata();
        
        $this->load->view('admin/header', $data);
        $this->load->view('pimpinan/tambah', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman edit pimpinan (untuk admin)
    public function edit($id)
    {
        $data['pimpinan'] = $this->Pimpinan->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Edit Pimpinan - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['pimpinan'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('pimpinan/edit', $data);
        $this->load->view('admin/footer', $data);

        

    }

    // Proses tambah pimpinan
    public function insert()
    {
        $this->form_validation->set_rules('nama_pimpinan', 'Nama Pimpinan', 'required');
        $this->form_validation->set_rules('jabatan_pimpinan', 'Jabatan Pimpinan', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data pimpinan gagal ditambahkan!');
            redirect('pimpinan/tambah');
        } else {
            $data = array(
                'nama_pimpinan' => $this->input->post('nama_pimpinan'),
                'jabatan_pimpinan' => $this->input->post('jabatan_pimpinan'),
                'foto_pimpinan' => $this->upload_foto(),
            );
            
            $this->Pimpinan->insert($data);
            $this->session->set_flashdata('success', 'Data pimpinan berhasil ditambahkan!');
            redirect('pimpinan');
        }
    }

    // Proses update pimpinan
    public function update()
    {
        $id = $this->input->post('id_pimpinan');
        
        $this->form_validation->set_rules('nama_pimpinan', 'Nama Pimpinan', 'required');
        $this->form_validation->set_rules('jabatan_pimpinan', 'Jabatan Pimpinan', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data pimpinan gagal diupdate!');
            redirect('pimpinan/edit/'.$id);
        } else {
            // Get current pimpinan data to get existing foto
            $current_pimpinan = $this->Pimpinan->get_by_id($id);
            $current_foto = $current_pimpinan ? $current_pimpinan->foto_pimpinan : null;
            
            $data = array(
                'nama_pimpinan' => $this->input->post('nama_pimpinan'),
                'jabatan_pimpinan' => $this->input->post('jabatan_pimpinan'),
                'foto_pimpinan' => $this->upload_foto($current_foto),
            );
            
            $this->Pimpinan->update($id, $data);
            $this->session->set_flashdata('success', 'Data pimpinan berhasil diupdate!');
            redirect('pimpinan');
        }
    }

    // Hapus pimpinan
    public function delete($id)
    {
        $this->Pimpinan->delete($id);
        $this->session->set_flashdata('success', 'Data pimpinan berhasil dihapus!');
        redirect('pimpinan');
    }

    // Upload foto pimpinan
    private function upload_foto($current_foto = null)
    {
        // Check if file was uploaded
        if (empty($_FILES['foto_pimpinan']['name'])) {
            // If updating and no new file, keep existing foto
            if ($current_foto) {
                return $current_foto;
            }
            return 'default.jpg';
        }
        
        // Create upload directory if it doesn't exist
        $upload_path = './assets/img/pimpinan/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0755, true);
        }
        
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 10240; // 10MB
        $config['file_name'] = 'pimpinan_' . time();
        $config['overwrite'] = FALSE;
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('foto_pimpinan')) {
            $upload_data = $this->upload->data();
            return $upload_data['file_name'];
        } else {
            // Log error for debugging
            error_log('Upload error: ' . $this->upload->display_errors());
            return 'default.jpg';
        }
    }
}
