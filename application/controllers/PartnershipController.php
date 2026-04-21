<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PartnershipController extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('text');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Partnership');

        $user = $this->session->userdata('user');
        $jabatan = strtolower($user['jabatan_user'] ?? '');

        $allowed = ['admin', 'kurikulum'];

        if (!in_array($jabatan, $allowed)) {
            show_error('Anda tidak memiliki akses ke halaman ini.', 403);
        }
    }

    // Halaman utama partnership - menampilkan daftar partnership
    public function index()
    {
        $data['partnership'] = $this->Partnership->get_all();
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Data Partnership - SMK Muhammadiyah 15 Jakarta';
        
        $this->load->view('admin/header', $data);
        $this->load->view('partnership/index', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman detail partnership
    public function detail($id)
    {
        $data['partnership'] = $this->Partnership->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Detail Partnership - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['partnership'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('partnership/detail', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman tambah partnership (untuk admin)
    public function tambah()
    {
        $data['title'] = 'Tambah Partnership - SMK Muhammadiyah 15 Jakarta';
        $data['user'] = $this->session->userdata();
        
        $this->load->view('admin/header', $data);
        $this->load->view('partnership/tambah', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman edit partnership (untuk admin)
    public function edit($id)
    {
        $data['partnership'] = $this->Partnership->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Edit Partnership - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['partnership'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('partnership/edit', $data);
        $this->load->view('admin/footer', $data);
    }

    // Proses tambah partnership
    public function insert()
    {
        $this->form_validation->set_rules('nama_partnership', 'Nama Partnership', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data partnership gagal ditambahkan!');
            redirect('partnership/tambah');
        } else {
            $data = array(
                'nama_partnership' => $this->input->post('nama_partnership'),
                'logo_partnership' => $this->upload_logo(),
            );
            
            $this->Partnership->insert($data);
            $this->session->set_flashdata('success', 'Data partnership berhasil ditambahkan!');
            redirect('partnership');
        }
    }

    // Proses update partnership
    public function update()
    {
        $id = $this->input->post('id_partnership');
        
        $this->form_validation->set_rules('nama_partnership', 'Nama Partnership', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data partnership gagal diupdate!');
            redirect('partnership/edit/'.$id);
        } else {
            // Get current partnership data to get existing logo
            $current_partnership = $this->Partnership->get_by_id($id);
            $current_logo = $current_partnership ? $current_partnership->logo_partnership : null;
            
            $data = array(
                'nama_partnership' => $this->input->post('nama_partnership'),
                'logo_partnership' => $this->upload_logo($current_logo),
            );
            
            $this->Partnership->update($id, $data);
            $this->session->set_flashdata('success', 'Data partnership berhasil diupdate!');
            redirect('partnership');
        }
    }

    // Hapus partnership
    public function delete($id)
    {
        $this->Partnership->delete($id);
        $this->session->set_flashdata('success', 'Data partnership berhasil dihapus!');
        redirect('partnership');
    }

    // Upload logo partnership
    private function upload_logo($current_logo = null)
    {
        // Check if file was uploaded
        if (empty($_FILES['logo_partnership']['name'])) {
            // If updating and no new file, keep existing logo
            if ($current_logo) {
                return $current_logo;
            }
            return 'default.jpg';
        }
        
        // Create upload directory if it doesn't exist
        $upload_path = './assets/img/partnership/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0755, true);
        }
        
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 10240; // 10MB
        $config['file_name'] = 'partnership_' . time();
        $config['overwrite'] = FALSE;
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('logo_partnership')) {
            $upload_data = $this->upload->data();
            return $upload_data['file_name'];
        } else {
            // Log error for debugging
            error_log('Upload error: ' . $this->upload->display_errors());
            return 'default.jpg';
        }
    }
}
