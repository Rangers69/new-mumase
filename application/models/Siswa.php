<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_siswa';
    }

    // Get all students
    public function get_all()
    {
        $this->db->select('tb_siswa.*, tb_kelas.nama_kelas');
        $this->db->from('tb_siswa');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas', 'left');
        $this->db->where('tb_siswa.active', 1);
        $this->db->order_by('tb_siswa.nama_siswa', 'ASC');
        return $this->db->get()->result();
    }

    // Get filtered students
    public function get_filtered($filter_kelas = null, $filter_jurusan = null, $search = null)
    {
        $this->db->select('tb_siswa.*, tb_kelas.nama_kelas');
        $this->db->from('tb_siswa');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas', 'left');
        $this->db->where('tb_siswa.active', 1);
        
        // Filter by class
        if (!empty($filter_kelas)) {
            $this->db->where('tb_siswa.id_kelas', $filter_kelas);
        }
        
        // Filter by major
        if (!empty($filter_jurusan)) {
            $this->db->where('tb_siswa.jurusan', $filter_jurusan);
        }
        
        // Search functionality
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('tb_siswa.nama_siswa', $search);
            $this->db->or_like('tb_siswa.nis', $search);
            $this->db->or_like('tb_siswa.nisn', $search);
            $this->db->or_like('tb_siswa.email', $search);
            $this->db->or_like('tb_kelas.nama_kelas', $search);
            $this->db->group_end();
        }
        
        $this->db->order_by('tb_siswa.nama_siswa', 'ASC');
        return $this->db->get()->result();
    }

    // Get all students including inactive
    public function get_all_with_inactive()
    {
        $this->db->order_by('nama_siswa', 'ASC');
        return $this->db->get($this->table)->result();
    }

    // Get student by ID
    public function get_by_id($id)
    {
        $this->db->select('tb_siswa.*, tb_kelas.nama_kelas');
        $this->db->from('tb_siswa');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas', 'left');
        $this->db->where('tb_siswa.id_siswa', $id);
        return $this->db->get()->row();
    }

    // Get student by NIS (Nomor Induk Siswa)
    public function get_by_nis($nis)
    {
        $this->db->where('nis', $nis);
        return $this->db->get($this->table)->row();
    }

    // Get inactive students
    public function get_inactive()
    {
        $this->db->where('active', 0);
        $this->db->order_by('nama_siswa', 'ASC');
        return $this->db->get($this->table)->result();
    }

    // Get active students
    public function get_active()
    {
        $this->db->where('active', 1);
        $this->db->order_by('nama_siswa', 'ASC');
        return $this->db->get($this->table)->result();
    }

    // Insert new student
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // Update student
    public function update($id, $data)
    {
        $this->db->where('id_siswa', $id);
        return $this->db->update($this->table, $data);
    }

    // Delete student (soft delete by setting active to 0)
    public function delete($id)
    {
        $this->db->where('id_siswa', $id);
        return $this->db->delete($this->table);
    }

    // Soft delete student (set active to 0)
    public function deactivate($id)
    {
        $this->db->where('id_siswa', $id);
        return $this->db->update($this->table, array('active' => 0));
    }

    // Activate student (set active to 1)
    public function activate($id)
    {
        $this->db->where('id_siswa', $id);
        return $this->db->update($this->table, array('active' => 1));
    }

    // Count all students
    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    // Count active students
    public function count_active()
    {
        $this->db->where('active', 1);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Count inactive students
    public function count_inactive()
    {
        $this->db->where('active', 0);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Search students
    public function search($keyword)
    {
        $this->db->like('nama_siswa', $keyword);
        $this->db->or_like('nis', $keyword);
        $this->db->or_like('nisn', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->where('active', 1);
        $this->db->order_by('nama_siswa', 'ASC');
        return $this->db->get($this->table)->result();
    }

    // Get students by class/grade
    public function get_by_kelas($kelas)
    {
        $this->db->where('kelas', $kelas);
        $this->db->where('active', 1);
        $this->db->order_by('nama_siswa', 'ASC');
        return $this->db->get($this->table)->result();
    }

    // Get students with pagination
    public function get_paginated($limit, $offset)
    {
        $this->db->where('active', 1);
        $this->db->order_by('nama_siswa', 'ASC');
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table)->result();
    }

    // Get student statistics
    public function get_statistics()
    {
        $stats = array();
        
        // Total students
        $stats['total'] = $this->count_all();
        
        // Active students
        $stats['active'] = $this->count_active();
        
        // Inactive students
        $stats['inactive'] = $this->count_inactive();
        
        // Students by class
        $this->db->select('kelas, COUNT(*) as count');
        $this->db->where('active', 1);
        $this->db->group_by('kelas');
        $this->db->order_by('kelas', 'ASC');
        $kelas_stats = $this->db->get($this->table)->result();
        $stats['by_kelas'] = $kelas_stats;
        
        return $stats;
    }
}
