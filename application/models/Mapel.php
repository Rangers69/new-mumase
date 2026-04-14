<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all active mapel records
    public function get_all_active()
    {
        $this->db->where('active', 1);
        $this->db->order_by('nama_mapel', 'ASC');
        return $this->db->get('tb_mapel')->result();
    }

    // Get all mapel records
    public function get_all()
    {
        $this->db->order_by('nama_mapel', 'ASC');
        return $this->db->get('tb_mapel')->result();
    }

    // Get mapel by ID
    public function get_by_id($id)
    {
        return $this->db->get_where('tb_mapel', ['id_mapel' => $id])->row();
    }

    // Insert new mapel
    public function insert($data)
    {
        return $this->db->insert('tb_mapel', $data);
    }

    // Update mapel
    public function update($id, $data)
    {
        $this->db->where('id_mapel', $id);
        return $this->db->update('tb_mapel', $data);
    }

    // Delete mapel
    public function delete($id)
    {
        $this->db->where('id_mapel', $id);
        return $this->db->delete('tb_mapel');
    }

    // Count total mapel
    public function count_all()
    {
        return $this->db->count_all('tb_mapel');
    }

    // Get mapel by name
    public function get_by_name($nama_mapel)
    {
        return $this->db->get_where('tb_mapel', ['nama_mapel' => $nama_mapel])->row();
    }

    // Search mapel by name
    public function search($keyword)
    {
        $this->db->like('nama_mapel', $keyword);
        $this->db->where('active', 1);
        $this->db->order_by('nama_mapel', 'ASC');
        return $this->db->get('tb_mapel')->result();
    }

    // Get mapel with pagination
    public function get_paginated($limit, $offset)
    {
        $this->db->order_by('nama_mapel', 'ASC');
        return $this->db->get('tb_mapel', $limit, $offset)->result();
    }

    // Activate mapel
    public function activate($id)
    {
        $data = array('active' => 1);
        $this->db->where('id_mapel', $id);
        return $this->db->update('tb_mapel', $data);
    }

    // Deactivate mapel
    public function deactivate($id)
    {
        $data = array('active' => 0);
        $this->db->where('id_mapel', $id);
        return $this->db->update('tb_mapel', $data);
    }

    // Get active mapel count
    public function count_active()
    {
        $this->db->where('active', 1);
        return $this->db->count_all_results('tb_mapel');
    }

    // Get inactive mapel count
    public function count_inactive()
    {
        $this->db->where('active', 0);
        return $this->db->count_all_results('tb_mapel');
    }
}
