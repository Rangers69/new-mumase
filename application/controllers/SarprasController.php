<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SarprasController extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('text');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Sarpras');
    }

    // Halaman utama sarpras - menampilkan daftar sarpras
    public function index()
    {
        $data['sarpras'] = $this->Sarpras->get_all();
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Data Sarana Prasarana - SMK Muhammadiyah 15 Jakarta';
        
        $this->load->view('admin/header', $data);
        $this->load->view('sarpras/index', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman detail sarpras
    public function detail($id)
    {
        $data['sarpras'] = $this->Sarpras->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Detail Sarana Prasarana - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['sarpras'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('sarpras/detail', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman tambah sarpras (untuk admin)
    public function tambah()
    {
        $data['title'] = 'Tambah Sarana Prasarana - SMK Muhammadiyah 15 Jakarta';
        $data['user'] = $this->session->userdata();
        
        $this->load->view('admin/header', $data);
        $this->load->view('sarpras/tambah', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman edit sarpras (untuk admin)
    public function edit($id)
    {
        $data['sarpras'] = $this->Sarpras->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Edit Sarana Prasarana - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['sarpras'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('sarpras/edit', $data);
        $this->load->view('admin/footer', $data);
    }

    // Proses tambah sarpras
    public function insert()
    {
        $this->form_validation->set_rules('nama_sarpras', 'Nama Sarana Prasarana', 'required');
        $this->form_validation->set_rules('kategori_sarpras', 'Kategori', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data sarana prasarana gagal ditambahkan!');
            redirect('sarpras/tambah');
        } else {
            $data = array(
                'nama_sarpras' => $this->input->post('nama_sarpras'),
                'kategori_sarpras' => $this->input->post('kategori_sarpras'),
                'foto_sarpras' => $this->upload_foto(),
                'kondisi' => $this->input->post('kondisi'),
            );
            
            $this->Sarpras->insert($data);
            $this->session->set_flashdata('success', 'Data sarana prasarana berhasil ditambahkan!');
            redirect('sarpras');
        }
    }

    // Proses update sarpras
    public function update()
    {
        $id = $this->input->post('id_sarpras');
        
        $this->form_validation->set_rules('nama_sarpras', 'Nama Sarana Prasarana', 'required');
        $this->form_validation->set_rules('kategori_sarpras', 'Kategori', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data sarana prasarana gagal diupdate!');
            redirect('sarpras/edit/'.$id);
        } else {
            // Get current sarpras data to get existing photo
            $current_sarpras = $this->Sarpras->get_by_id($id);
            $current_foto = $current_sarpras ? $current_sarpras->foto_sarpras : null;
            
            $data = array(
                'nama_sarpras' => $this->input->post('nama_sarpras'),
                'kategori_sarpras' => $this->input->post('kategori_sarpras'),
                'foto_sarpras' => $this->upload_foto($current_foto),
                'kondisi' => $this->input->post('kondisi'),
            );
            
            $this->Sarpras->update($id, $data);
            $this->session->set_flashdata('success', 'Data sarana prasarana berhasil diupdate!');
            redirect('sarpras');
        }
    }

    // Hapus sarpras
    public function delete($id)
    {
        $this->Sarpras->delete($id);
        $this->session->set_flashdata('success', 'Data sarana prasarana berhasil dihapus!');
        redirect('sarpras');
    }

    // Upload foto sarpras
    private function upload_foto()
    {
        $upload_path = './assets/img/sarpras/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0755, true);
        }
        
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 10240; // 10MB
        $config['file_name'] = 'sarpras_' . time();
        $config['overwrite'] = FALSE;
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('foto_sarpras')) {
            $upload_data = $this->upload->data();
            return $upload_data['file_name'];
        } else {
            error_log('Upload error: ' . $this->upload->display_errors());
            return 'default.jpg';
        }
    }
}
