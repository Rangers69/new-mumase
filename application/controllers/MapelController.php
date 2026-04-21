<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MapelController extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('Mapel');
    }

    // Halaman utama mapel - menampilkan daftar mata pelajaran
    public function index()
    {
        $data['mapel'] = $this->Mapel->get_all();
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Data Mata Pelajaran - SMK Muhammadiyah 15 Jakarta';
        
        $this->load->view('admin/header', $data);
        $this->load->view('mapel/index', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman detail mapel
    public function detail($id)
    {
        $data['mapel'] = $this->Mapel->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Detail Mata Pelajaran - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['mapel'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('mapel/detail', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman tambah mapel
    public function tambah()
    {
        $data['title'] = 'Tambah Mata Pelajaran - SMK Muhammadiyah 15 Jakarta';
        $data['user'] = $this->session->userdata();
        
        $this->load->view('admin/header', $data);
        $this->load->view('mapel/tambah', $data);
        $this->load->view('admin/footer', $data);
    }

    // Proses tambah mapel
    public function proses_tambah()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nama_mapel', 'Nama Mata Pelajaran', 'required|trim|is_unique[tb_mapel.nama_mapel]');
        $this->form_validation->set_rules('active', 'Status', 'required|in_list[0,1]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('MapelController/tambah');
        } else {
            $data = array(
                'nama_mapel' => $this->input->post('nama_mapel', true),
                'active' => $this->input->post('active', true)
            );
            
            $result = $this->Mapel->insert($data);
            
            if ($result) {
                $this->session->set_flashdata('success', 'Data mata pelajaran berhasil ditambahkan');
                redirect('MapelController');
            } else {
                $this->session->set_flashdata('error', 'Data mata pelajaran gagal ditambahkan');
                redirect('MapelController/tambah');
            }
        }
    }

    // Halaman edit mapel
    public function edit($id)
    {
        $data['mapel'] = $this->Mapel->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Edit Mata Pelajaran - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['mapel'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('mapel/edit', $data);
        $this->load->view('admin/footer', $data);
    }

    // Proses edit mapel
    public function proses_edit()
    {
        $this->load->library('form_validation');
        
        $id = $this->input->post('id_mapel');
        
        // Get current data for unique validation
        $current_mapel = $this->Mapel->get_by_id($id);
        
        $this->form_validation->set_rules('nama_mapel', 'Nama Mata Pelajaran', 'required|trim|callback_check_nama_mapel[' . $id . ']');
        $this->form_validation->set_rules('active', 'Status', 'required|in_list[0,1]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('MapelController/edit/' . $id);
        } else {
            $data = array(
                'nama_mapel' => $this->input->post('nama_mapel', true),
                'active' => $this->input->post('active', true)
            );
            
            $result = $this->Mapel->update($id, $data);
            
            if ($result) {
                $this->session->set_flashdata('success', 'Data mata pelajaran berhasil diperbarui');
                redirect('MapelController');
            } else {
                $this->session->set_flashdata('error', 'Data mata pelajaran gagal diperbarui');
                redirect('MapelController/edit/' . $id);
            }
        }
    }

    // Custom callback for unique validation on edit
    public function check_nama_mapel($str, $id)
    {
        $mapel = $this->Mapel->get_by_name($str);
        
        if ($mapel && $mapel->id_mapel != $id) {
            $this->form_validation->set_message('check_nama_mapel', 'The {field} field must contain a unique value.');
            return FALSE;
        }
        return TRUE;
    }

    // Nonaktifkan mapel
    public function set_inactive($id)
    {
        $result = $this->Mapel->deactivate($id);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Data mata pelajaran berhasil dinonaktifkan');
        } else {
            $this->session->set_flashdata('error', 'Data mata pelajaran gagal dinonaktifkan');
        }
        
        redirect('MapelController');
    }

    // Aktifkan kembali mapel
    public function activate($id)
    {
        $result = $this->Mapel->activate($id);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Data mata pelajaran berhasil diaktifkan kembali');
        } else {
            $this->session->set_flashdata('error', 'Data mata pelajaran gagal diaktifkan kembali');
        }
        
        redirect('MapelController');
    }

    // Hapus mapel
    public function hapus($id)
    {
        // Check if mapel is being used by any guru
        $this->db->where('id_mapel', $id);
        $this->db->where('active', 1);
        $guru_count = $this->db->count_all_results('tb_guru_mapel');
        
        if ($guru_count > 0) {
            $this->session->set_flashdata('error', 'Mata pelajaran tidak dapat dihapus karena masih digunakan oleh guru. Nonaktifkan terlebih dahulu jika tidak ingin digunakan.');
            redirect('MapelController');
            return;
        }
        
        $result = $this->Mapel->delete($id);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Data mata pelajaran berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data mata pelajaran gagal dihapus');
        }
        
        redirect('MapelController');
    }
}
