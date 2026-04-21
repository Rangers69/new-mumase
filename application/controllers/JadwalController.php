<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalController extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('Jadwal');
        $this->load->library('form_validation');

        $user = $this->session->userdata('user');
        $jabatan = strtolower($user['jabatan_user'] ?? '');

        $allowed = ['admin', 'kurikulum'];

        if (!in_array($jabatan, $allowed)) {
            show_error('Anda tidak memiliki akses ke halaman ini.', 403);
        }

    }

    // Halaman utama jadwal - menampilkan daftar jadwal
    public function index()
    {
        // Get filter parameters
        $filter_kelas = $this->input->get('filter_kelas');
        $filter_hari = $this->input->get('filter_hari');
        $filter_guru = $this->input->get('filter_guru');

        // Load jadwal with filters
        if (!empty($filter_kelas) || !empty($filter_hari) || !empty($filter_guru)) {
            $data['jadwal'] = $this->Jadwal->get_filtered($filter_kelas, $filter_hari, $filter_guru);
        } else {
            $data['jadwal'] = $this->Jadwal->get_all();
        }

        // Load classes for filter dropdown
        $this->db->where('active', 1);
        $this->db->order_by('nama_kelas', 'ASC');
        $data['kelas_list'] = $this->db->get('tb_kelas')->result();

        // Load active guru for filter dropdown
        $this->db->where('active', 1);
        $this->db->order_by('nama_guru', 'ASC');
        $data['guru_list'] = $this->db->get('tb_guru')->result();

        $data['user'] = $this->session->userdata();
        $data['title'] = 'Data Jadwal - SMK Muhammadiyah 15 Jakarta';

        $this->load->view('admin/header', $data);
        $this->load->view('jadwal/index', $data);
        $this->load->view('admin/footer', $data);
    }

    // Halaman tambah jadwal
    public function tambah()
    {
        $data['title'] = 'Tambah Jadwal - SMK Muhammadiyah 15 Jakarta';
        $data['user'] = $this->session->userdata();

        // Load guru_mapel with guru and mapel names
        $this->db->select('tb_guru_mapel.*, tb_guru.nama_guru, tb_mapel.nama_mapel');
        $this->db->from('tb_guru_mapel');
        $this->db->join('tb_guru', 'tb_guru.id_guru = tb_guru_mapel.id_guru', 'left');
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_guru_mapel.id_mapel', 'left');
        $this->db->where('tb_guru_mapel.active', 1);
        $this->db->order_by('tb_guru.nama_guru', 'ASC');
        $data['guru_mapel'] = $this->db->get()->result();

        // Load active classes
        $this->db->where('active', 1);
        $this->db->order_by('nama_kelas', 'ASC');
        $data['kelas'] = $this->db->get('tb_kelas')->result();

        $this->load->view('admin/header', $data);
        $this->load->view('jadwal/tambah', $data);
        $this->load->view('admin/footer', $data);
    }

    // Proses tambah jadwal
    public function proses_tambah()
    {

        $this->form_validation->set_rules('id_guru', 'Guru & Mata Pelajaran', 'required|trim');
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|trim|numeric');
        $this->form_validation->set_rules('hari', 'Hari', 'required|trim');
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required|trim');
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('jadwal/tambah');
            return;
        }

        $id_kelas = $this->input->post('id_kelas', true);
        $hari = $this->input->post('hari', true);
        $jam_mulai = $this->input->post('jam_mulai', true);
        $jam_selesai = $this->input->post('jam_selesai', true);

        // Check for schedule conflict
        if ($this->Jadwal->check_conflict($id_kelas, $hari, $jam_mulai, $jam_selesai)) {
            $this->session->set_flashdata('error', 'Jadwal bentrok! Kelas ini sudah memiliki jadwal pada hari dan jam tersebut.');
            redirect('jadwal/tambah');
            return;
        }

        $id_guru = $this->input->post('id_guru', true);

        $pecah = explode('|', $id_guru);

        $id_guru  = isset($pecah[0]) ? $pecah[0] : null;
        $id_mapel = isset($pecah[1]) ? $pecah[1] : null;


        $data = array(
            'id_guru' => $id_guru,
            'id_mapel' => $id_mapel,
            'id_kelas' => $id_kelas,
            'hari' => $hari,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
            'active' => 1
        );

        $result = $this->Jadwal->insert($data);

        if ($result) {
            $this->session->set_flashdata('success', 'Data jadwal berhasil ditambahkan');
            redirect('jadwal');
        } else {
            $this->session->set_flashdata('error', 'Data jadwal gagal ditambahkan');
            redirect('jadwal/tambah');
        }
    }

    // Halaman edit jadwal
    public function edit($id)
    {
        $data['jadwal'] = $this->Jadwal->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Edit Jadwal - SMK Muhammadiyah 15 Jakarta';

        if (empty($data['jadwal'])) {
            show_404();
        }

        // Load guru_mapel with guru and mapel names
        $this->db->select('tb_guru_mapel.*, tb_guru.nama_guru, tb_mapel.nama_mapel');
        $this->db->from('tb_guru_mapel');
        $this->db->join('tb_guru', 'tb_guru.id_guru = tb_guru_mapel.id_guru', 'left');
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_guru_mapel.id_mapel', 'left');
        $this->db->where('tb_guru_mapel.active', 1);
        $this->db->order_by('tb_guru.nama_guru', 'ASC');
        $data['guru_mapel'] = $this->db->get()->result();

        // Load active classes
        $this->db->where('active', 1);
        $this->db->order_by('nama_kelas', 'ASC');
        $data['kelas'] = $this->db->get('tb_kelas')->result();

        $this->load->view('admin/header', $data);
        $this->load->view('jadwal/edit', $data);
        $this->load->view('admin/footer', $data);
    }

    // Proses edit jadwal
    public function proses_edit()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('id_guru', 'Guru & Mata Pelajaran', 'required|trim');
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|trim|numeric');
        $this->form_validation->set_rules('hari', 'Hari', 'required|trim');
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required|trim');
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required|trim');

        $id = $this->input->post('id_jadwal');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('jadwal/edit/' . $id);
            return;
        }

        $id_kelas = $this->input->post('id_kelas', true);
        $hari = $this->input->post('hari', true);
        $jam_mulai = $this->input->post('jam_mulai', true);
        $jam_selesai = $this->input->post('jam_selesai', true);

        // Check for schedule conflict (exclude current record)
        if ($this->Jadwal->check_conflict($id_kelas, $hari, $jam_mulai, $jam_selesai, $id)) {
            $this->session->set_flashdata('error', 'Jadwal bentrok! Kelas ini sudah memiliki jadwal pada hari dan jam tersebut.');
            redirect('jadwal/edit/' . $id);
            return;
        }

        $id_guru = $this->input->post('id_guru', true);

        $pecah = explode('|', $id_guru);

        $id_guru  = isset($pecah[0]) ? $pecah[0] : null;
        $id_mapel = isset($pecah[1]) ? $pecah[1] : null;

        $data = array(
            'id_guru' => $id_guru,
            'id_mapel' => $id_mapel,
            'id_kelas' => $id_kelas,
            'hari' => $hari,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai
        );

        $result = $this->Jadwal->update($id, $data);

        if ($result) {
            $this->session->set_flashdata('success', 'Data jadwal berhasil diperbarui');
            redirect('jadwal');
        } else {
            $this->session->set_flashdata('error', 'Data jadwal gagal diperbarui');
            redirect('jadwal/edit/' . $id);
        }
    }

    // Halaman detail jadwal
    public function detail($id)
    {
        $data['jadwal'] = $this->Jadwal->get_by_id($id);
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Detail Jadwal - SMK Muhammadiyah 15 Jakarta';

        if (empty($data['jadwal'])) {
            show_404();
        }

        $this->load->view('admin/header', $data);
        $this->load->view('jadwal/detail', $data);
        $this->load->view('admin/footer', $data);
    }

    // Nonaktifkan jadwal
    public function set_inactive($id)
    {
        $result = $this->Jadwal->deactivate($id);

        if ($result) {
            $this->session->set_flashdata('success', 'Data jadwal berhasil dinonaktifkan');
        } else {
            $this->session->set_flashdata('error', 'Data jadwal gagal dinonaktifkan');
        }

        redirect('jadwal');
    }

    // Aktifkan kembali jadwal
    public function activate($id)
    {
        $result = $this->Jadwal->activate($id);

        if ($result) {
            $this->session->set_flashdata('success', 'Data jadwal berhasil diaktifkan kembali');
        } else {
            $this->session->set_flashdata('error', 'Data jadwal gagal diaktifkan kembali');
        }

        redirect('jadwal/inactive');
    }

    // Halaman jadwal tidak aktif
    public function inactive()
    {
        $data['jadwal'] = $this->Jadwal->get_inactive();
        $data['user'] = $this->session->userdata();
        $data['title'] = 'Data Jadwal Tidak Aktif - SMK Muhammadiyah 15 Jakarta';

        $this->load->view('admin/header', $data);
        $this->load->view('jadwal/inactive', $data);
        $this->load->view('admin/footer', $data);
    }

    // Hapus jadwal permanen
    public function hapus($id)
    {
        $result = $this->Jadwal->delete($id);

        if ($result) {
            $this->session->set_flashdata('success', 'Data jadwal berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data jadwal gagal dihapus');
        }

        redirect('jadwal/inactive');
    }
}
