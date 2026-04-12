<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all guru records
    public function get_all()
    {
        $this->db->order_by('nama_guru', 'ASC');
        return $this->db->get('tb_guru')->result();
    }

    // Get guru by ID
    public function get_by_id($id)
    {
        return $this->db->get_where('tb_guru', ['id_guru' => $id])->row();
    }

    // Get guru by NIP
    public function get_by_nip($nip)
    {
        return $this->db->get_where('tb_guru', ['nip' => $nip])->row();
    }

    // Insert new guru
    public function insert($data)
    {
        return $this->db->insert('tb_guru', $data);
    }

    // Update guru
    public function update($id, $data)
    {
        $this->db->where('id_guru', $id);
        return $this->db->update('tb_guru', $data);
    }

    // Delete guru
    public function delete($id)
    {
        $this->db->where('id_guru', $id);
        return $this->db->delete('tb_guru');
    }

    // Count total guru
    public function count_all()
    {
        return $this->db->count_all('tb_guru');
    }

    // Get active guru only
    public function get_active()
    {
        $this->db->where('active', 1);
        $this->db->order_by('nama_guru', 'ASC');
        return $this->db->get('tb_guru')->result();
    }

    // Get guru by jurusan
    public function get_by_jurusan($jurusan)
    {
        $this->db->where('jurusan', $jurusan);
        $this->db->order_by('nama_guru', 'ASC');
        return $this->db->get('tb_guru')->result();
    }

    // Get guru with pagination
    public function get_paginated($limit, $offset)
    {
        $this->db->order_by('nama_guru', 'ASC');
        return $this->db->get('tb_guru', $limit, $offset)->result();
    }

    // Search guru by name or NIP
    public function search($keyword)
    {
        $this->db->like('nama_guru', $keyword);
        $this->db->or_like('nip', $keyword);
        $this->db->where('active', 1);
        $this->db->order_by('nama_guru', 'ASC');
        return $this->db->get('tb_guru')->result();
    }

    // Get guru by mata pelajaran
    public function get_by_mata_pelajaran($mata_pelajaran)
    {
        $this->db->where('mata_pelajaran', $mata_pelajaran);
        $this->db->where('active', 1);
        $this->db->order_by('nama_guru', 'ASC');
        return $this->db->get('tb_guru')->result();
    }

    // Get limited number of guru (for featured teachers)
    public function get_limited($limit)
    {
        $this->db->where('active', 1);
        $this->db->order_by('nama_guru', 'ASC');
        $this->db->limit($limit);
        return $this->db->get('tb_guru')->result();
    }

    // Get guru statistics
    public function get_statistics()
    {
        $stats = array();
        
        // Total guru
        $stats['total'] = $this->count_all();
        
        // Active guru
        $stats['active'] = $this->db->where('active', 1)->count_all_results('tb_guru');
        
        // Guru by jurusan
        $this->db->select('jurusan, COUNT(*) as count');
        $this->db->where('active', 1);
        $this->db->group_by('jurusan');
        $stats['by_jurusan'] = $this->db->get('tb_guru')->result();
        
        return $stats;
    }
}
