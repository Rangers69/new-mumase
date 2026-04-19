<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GuruController extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('Guru');
        $this->load->model('Mapel');
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
        
        // Get guru mapel assignments with names
        $this->db->select('tb_mapel.nama_mapel');
        $this->db->from('tb_guru_mapel');
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_guru_mapel.id_mapel', 'inner');
        $this->db->where('tb_guru_mapel.id_guru', $id);
        $this->db->where('tb_guru_mapel.active', 1);
        $this->db->order_by('tb_mapel.nama_mapel', 'ASC');
        $guru_mapel = $this->db->get()->result();
        $data['guru_mapel'] = $guru_mapel;
        
        $this->load->view('admin/header', $data);
        $this->load->view('guru/detail', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman tambah guru (untuk admin)
    public function tambah()
    {
        $data['title'] = 'Tambah Guru - SMK Muhammadiyah 15 Jakarta';
        $data['user'] = $this->session->userdata();
        $data['mapel'] = $this->Mapel->get_all_active();

        
        $this->load->view('admin/header', $data);
        $this->load->view('guru/tambah', $data);
        $this->load->view('admin/footer', $data);
    }

    // Proses tambah guru
    public function proses_tambah()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim|numeric');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim');

        $id_mapel = $this->input->post('id_mapel');

        if (empty($id_mapel) || !is_array($id_mapel)) {
            $this->session->set_flashdata('error', 'Mata pelajaran wajib dipilih minimal 1.');
            redirect('guru/tambah');
            return;
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('guru/tambah');
            return;
        }

        $foto_guru = $this->upload_foto();

        $data = array(
            'nama_guru' => $this->input->post('nama_guru', true),
            'nip' => $this->input->post('nip', true),
            'email' => $this->input->post('email', true),
            'no_hp' => $this->input->post('no_hp', true),
            'pendidikan' => $this->input->post('pendidikan', true),
            'foto_guru' => $foto_guru,
            'hobi' => $this->input->post('hobi', true),
            'tanggal_bergabung' => $this->input->post('tanggal_bergabung', true),
            'active' => 1
        );

        $this->db->trans_begin();

        $this->db->insert('tb_guru', $data);
        $id_guru = $this->db->insert_id();

        if (!$id_guru) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('error', 'Data guru gagal ditambahkan.');
            redirect('guru/tambah');
            return;
        }

        foreach ($id_mapel as $mapel) {
            $this->db->insert('tb_guru_mapel', array(
                'id_guru' => $id_guru,
                'id_mapel' => $mapel,
                'active' => 1
            ));
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('error', 'Data guru gagal ditambahkan.');
            redirect('guru/tambah');
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata('success', 'Data guru berhasil ditambahkan.');
            redirect('guru');
        }
    }

    // Halaman edit guru
    public function edit($id)
    {
        $data['guru'] = $this->Guru->get_by_id($id);
        $data['mapel'] = $this->Mapel->get_all_active();
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Edit Guru - SMK Muhammadiyah 15 Jakarta';
        
        if (empty($data['guru'])) {
            show_404();
        }
        
        // Get current guru mapel assignments
        $this->db->select('id_mapel');
        $this->db->where('id_guru', $id);
        $this->db->where('active', 1);
        $guru_mapel = $this->db->get('tb_guru_mapel')->result();
        $data['guru_mapel_selected'] = array_column($guru_mapel, 'id_mapel');
        
        $this->load->view('admin/header', $data);
        $this->load->view('guru/edit', $data);
        $this->load->view('admin/footer', $data);
    }

    // Proses edit guru
    public function proses_edit()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim|numeric');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim');
        
        $id = $this->input->post('id_guru');
        $id_mapel = $this->input->post('id_mapel');
        
        if (empty($id_mapel) || !is_array($id_mapel)) {
            $this->session->set_flashdata('error', 'Mata pelajaran wajib dipilih minimal 1.');
            redirect('GuruController/edit/' . $id);
            return;
        }
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('GuruController/edit/' . $id);
            return;
        }
        
        $data = array(
            'nama_guru' => $this->input->post('nama_guru', true),
            'nip' => $this->input->post('nip', true),
            'email' => $this->input->post('email', true),
            'no_hp' => $this->input->post('no_hp', true),
            'pendidikan' => $this->input->post('pendidikan', true),
            'hobi' => $this->input->post('hobi', true),
            'tanggal_bergabung' => $this->input->post('tanggal_bergabung', true),
        );
        
        // Cek apakah ada upload foto baru
        if (!empty($_FILES['foto_guru']['name'])) {
            $data['foto_guru'] = $this->upload_foto();
        }
        
        $this->db->trans_begin();
        
        // Update guru data
        $this->db->where('id_guru', $id);
        $this->db->update('tb_guru', $data);
        
        // Delete existing mapel assignments
        $this->db->where('id_guru', $id);
        $this->db->delete('tb_guru_mapel');
        
        // Insert new mapel assignments
        foreach ($id_mapel as $mapel) {
            $this->db->insert('tb_guru_mapel', array(
                'id_guru' => $id,
                'id_mapel' => $mapel,
                'active' => 1
            ));
        }
        
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('error', 'Data guru gagal diperbarui.');
            redirect('GuruController/edit/' . $id);
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata('success', 'Data guru berhasil diperbarui.');
            redirect('guruController');
        }
    }

    // Halaman guru tidak aktif
    public function inactive()
    {
        $data['guru'] = $this->Guru->get_inactive();
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Data Guru Tidak Aktif - SMK Muhammadiyah 15 Jakarta';
        
        // Load mapel data for each inactive guru
        if (!empty($data['guru'])) {
            foreach ($data['guru'] as $guru) {
                $this->db->select('tb_mapel.nama_mapel');
                $this->db->from('tb_guru_mapel');
                $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_guru_mapel.id_mapel', 'inner');
                $this->db->where('tb_guru_mapel.id_guru', $guru->id_guru);
                $this->db->where('tb_guru_mapel.active', 1);
                $this->db->order_by('tb_mapel.nama_mapel', 'ASC');
                $guru_mapel = $this->db->get()->result();
                $guru->guru_mapel = $guru_mapel;
            }
        }
        
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