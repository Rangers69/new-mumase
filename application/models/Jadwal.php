<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all jadwal with join to guru, guru_mapel, mapel, kelas
    public function get_all()
    {
        $this->db->select('
            tb_jadwal.*,
            tb_guru.nama_guru,
            tb_guru.nip,
            tb_mapel.nama_mapel,
            tb_kelas.nama_kelas
        ');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_guru', 'tb_guru.id_guru = tb_jadwal.id_guru', 'left');
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_jadwal.id_mapel', 'left');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_jadwal.id_kelas', 'left');
        $this->db->where('tb_jadwal.active', 1);

        $this->db->order_by('FIELD(tb_jadwal.hari, "Senin","Selasa","Rabu","Kamis","Jumat","Sabtu")', '', false);
        $this->db->order_by('tb_jadwal.jam_mulai', 'ASC');

        return $this->db->get()->result();
    }

    // Get jadwal by ID with join
    public function get_by_id($id)
    {
        $this->db->select('
            tb_jadwal.*,
            tb_guru.nama_guru,
            tb_guru.nip,
            GROUP_CONCAT(DISTINCT tb_mapel.nama_mapel ORDER BY tb_mapel.nama_mapel ASC SEPARATOR ", ") AS nama_mapel,
            tb_kelas.nama_kelas
        ');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_guru', 'tb_guru.id_guru = tb_jadwal.id_guru', 'left');
        $this->db->join('tb_guru_mapel', 'tb_guru_mapel.id_guru = tb_guru.id_guru', 'left');
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_guru_mapel.id_mapel', 'left');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_jadwal.id_kelas', 'left');
        $this->db->where('tb_jadwal.id_jadwal', $id);
        $this->db->group_by('tb_jadwal.id_jadwal');
        return $this->db->get()->row();
    }

    // Get all jadwal including inactive
    public function get_all_with_inactive()
    {
        $this->db->select('
            tb_jadwal.*,
            tb_guru.nama_guru,
            tb_guru.nip,
            GROUP_CONCAT(DISTINCT tb_mapel.nama_mapel ORDER BY tb_mapel.nama_mapel ASC SEPARATOR ", ") AS nama_mapel,
            tb_kelas.nama_kelas
        ');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_guru', 'tb_guru.id_guru = tb_jadwal.id_guru', 'left');
        $this->db->join('tb_guru_mapel', 'tb_guru_mapel.id_guru = tb_guru.id_guru', 'left');
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_guru_mapel.id_mapel', 'left');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_jadwal.id_kelas', 'left');
        $this->db->group_by('tb_jadwal.id_jadwal');
        $this->db->order_by('tb_jadwal.hari', 'ASC');
        $this->db->order_by('tb_jadwal.jam_mulai', 'ASC');
        return $this->db->get()->result();
    }

    // Get inactive jadwal
    public function get_inactive()
    {
        $this->db->select('
            tb_jadwal.*,
            tb_guru.nama_guru,
            tb_guru.nip,
            GROUP_CONCAT(DISTINCT tb_mapel.nama_mapel ORDER BY tb_mapel.nama_mapel ASC SEPARATOR ", ") AS nama_mapel,
            tb_kelas.nama_kelas
        ');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_guru', 'tb_guru.id_guru = tb_jadwal.id_guru', 'left');
        $this->db->join('tb_guru_mapel', 'tb_guru_mapel.id_guru = tb_guru.id_guru', 'left');
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_guru_mapel.id_mapel', 'left');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_jadwal.id_kelas', 'left');
        $this->db->where('tb_jadwal.active', 0);
        $this->db->group_by('tb_jadwal.id_jadwal');
        $this->db->order_by('tb_jadwal.hari', 'ASC');
        $this->db->order_by('tb_jadwal.jam_mulai', 'ASC');
        return $this->db->get()->result();
    }

    // Get filtered jadwal
    public function get_filtered($filter_kelas = null, $filter_hari = null, $filter_guru = null)
    {
        $this->db->select('
            tb_jadwal.*,
            tb_guru.nama_guru,
            tb_guru.nip,
            GROUP_CONCAT(DISTINCT tb_mapel.nama_mapel ORDER BY tb_mapel.nama_mapel ASC SEPARATOR ", ") AS nama_mapel,
            tb_kelas.nama_kelas
        ');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_guru', 'tb_guru.id_guru = tb_jadwal.id_guru', 'left');
        $this->db->join('tb_guru_mapel', 'tb_guru_mapel.id_guru = tb_guru.id_guru', 'left');
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_guru_mapel.id_mapel', 'left');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_jadwal.id_kelas', 'left');
        $this->db->where('tb_jadwal.active', 1);

        if (!empty($filter_kelas)) {
            $this->db->where('tb_jadwal.id_kelas', $filter_kelas);
        }
        if (!empty($filter_hari)) {
            $this->db->where('tb_jadwal.hari', $filter_hari);
        }
        if (!empty($filter_guru)) {
            $this->db->where('tb_jadwal.id_guru', $filter_guru);
        }

        $this->db->group_by('tb_jadwal.id_jadwal');
        $this->db->order_by('tb_jadwal.hari', 'ASC');
        $this->db->order_by('tb_jadwal.jam_mulai', 'ASC');
        return $this->db->get()->result();
    }

    // Insert new jadwal
    public function insert($data)
    {
        return $this->db->insert('tb_jadwal', $data);
    }

    // Update jadwal
    public function update($id, $data)
    {
        $this->db->where('id_jadwal', $id);
        return $this->db->update('tb_jadwal', $data);
    }

    // Delete jadwal
    public function delete($id)
    {
        $this->db->where('id_jadwal', $id);
        return $this->db->delete('tb_jadwal');
    }

    // Activate jadwal
    public function activate($id)
    {
        $data = array('active' => 1);
        $this->db->where('id_jadwal', $id);
        return $this->db->update('tb_jadwal', $data);
    }

    // Deactivate jadwal
    public function deactivate($id)
    {
        $data = array('active' => 0);
        $this->db->where('id_jadwal', $id);
        return $this->db->update('tb_jadwal', $data);
    }

    // Count all jadwal
    public function count_all()
    {
        return $this->db->count_all('tb_jadwal');
    }

    // Count active jadwal
    public function count_active()
    {
        $this->db->where('active', 1);
        return $this->db->count_all_results('tb_jadwal');
    }

    // Check for schedule conflict
    public function check_conflict($id_kelas, $hari, $jam_mulai, $jam_selesai, $exclude_id = null)
    {
        $this->db->where('id_kelas', $id_kelas);
        $this->db->where('hari', $hari);
        $this->db->where('active', 1);

        if ($exclude_id) {
            $this->db->where('id_jadwal !=', $exclude_id);
        }

        $this->db->where("jam_mulai < '$jam_selesai' AND jam_selesai > '$jam_mulai'", null, false);

        return $this->db->count_all_results('tb_jadwal') > 0;
    }
}
