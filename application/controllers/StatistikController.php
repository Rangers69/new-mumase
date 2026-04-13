<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatistikController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('text');
        $this->load->library('session');
        $this->load->model('Statistik');
        $this->load->library('form_validation');
    }

    // Halaman utama statistik - menampilkan daftar statistik
    public function index()
    {
        $data['statistik'] = $this->Statistik->get_all();
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Data Statistik - SMK Muhammadiyah 15 Jakarta';
        
        $this->load->view('admin/header', $data);
        $this->load->view('statistik/index', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman detail statistik
    public function detail($id)
    {
        $data['statistik'] = $this->Statistik->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Detail Statistik - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['statistik'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('statistik/detail', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman tambah statistik (untuk admin)
    public function tambah()
    {
        $data['title'] = 'Tambah Statistik - SMK Muhammadiyah 15 Jakarta';
        $data['user'] = $this->session->userdata();
        
        $this->load->view('admin/header', $data);
        $this->load->view('statistik/tambah', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman edit statistik (untuk admin)
    public function edit($id)
    {
        $data['statistik'] = $this->Statistik->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Edit Statistik - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['statistik'])) {
            show_404();
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('statistik/edit', $data);
        $this->load->view('admin/footer', $data);
    }

    // Proses tambah statistik
    public function insert()
    {
        $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required|numeric|exact_length[4]');
        $this->form_validation->set_rules('jumlah_siswa', 'Jumlah Siswa', 'required|numeric');
        $this->form_validation->set_rules('jumlah_guru', 'Jumlah Guru', 'required|numeric');
        $this->form_validation->set_rules('jumlah_kelas', 'Jumlah Kelas', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data statistik gagal ditambahkan!');
            redirect('statistik/tambah');
        } else {
            $data = array(
                'tahun_ajaran' => $this->input->post('tahun_ajaran'),
                'jumlah_siswa' => $this->input->post('jumlah_siswa'),
                'jumlah_guru' => $this->input->post('jumlah_guru'),
                'jumlah_kelas' => $this->input->post('jumlah_kelas'),
            );
            
            $this->Statistik->insert($data);
            $this->session->set_flashdata('success', 'Data statistik berhasil ditambahkan!');
            redirect('statistik');
        }
    }

    // Proses update statistik
    public function update()
    {
        $id = $this->input->post('id_statistik');
        
        $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required|numeric|exact_length[4]');
        $this->form_validation->set_rules('jumlah_siswa', 'Jumlah Siswa', 'required|numeric');
        $this->form_validation->set_rules('jumlah_guru', 'Jumlah Guru', 'required|numeric');
        $this->form_validation->set_rules('jumlah_kelas', 'Jumlah Kelas', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data statistik gagal diupdate!');
            redirect('statistik/edit/'.$id);
        } else {
            $data = array(
                'tahun_ajaran' => $this->input->post('tahun_ajaran'),
                'jumlah_siswa' => $this->input->post('jumlah_siswa'),
                'jumlah_guru' => $this->input->post('jumlah_guru'),
                'jumlah_kelas' => $this->input->post('jumlah_kelas'),
            );
            
            $this->Statistik->update($id, $data);
            $this->session->set_flashdata('success', 'Data statistik berhasil diupdate!');
            redirect('statistik');
        }
    }

    // Hapus statistik
    public function delete($id)
    {
        $this->Statistik->delete($id);
        $this->session->set_flashdata('success', 'Data statistik berhasil dihapus!');
        redirect('statistik');
    }
}
