<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sarpras extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all sarpras records
    public function get_all()
    {
        return $this->db->get('tb_sarpras')->result();
    }

    // Get sarpras by ID
    public function get_by_id($id)
    {
        return $this->db->get_where('tb_sarpras', ['id_sarpras' => $id])->row();
    }

    // Insert new sarpras
    public function insert($data)
    {
        return $this->db->insert('tb_sarpras', $data);
    }

    // Update sarpras
    public function update($id, $data)
    {
        $this->db->where('id_sarpras', $id);
        return $this->db->update('tb_sarpras', $data);
    }

    // Delete sarpras
    public function delete($id)
    {
        $this->db->where('id_sarpras', $id);
        return $this->db->delete('tb_sarpras');
    }

    // Count total sarpras
    public function count_all()
    {
        return $this->db->count_all('tb_sarpras');
    }

    // Get sarpras with pagination
    public function get_paginated($limit, $offset)
    {
        return $this->db->get('tb_sarpras', $limit, $offset)->result();
    }

    // Get active sarpras only
    public function get_active()
    {
        return $this->db->get_where('tb_sarpras', ['active' => 1])->result();
    }

    // Get sarpras by category
    public function get_by_category($category)
    {
        return $this->db->get_where('tb_sarpras', ['kategori_sarpras' => $category])->result();
    }

    // Get sarpras ordered by name
    public function get_ordered_by_name($order = 'ASC')
    {
        $this->db->order_by('nama_sarpras', $order);
        return $this->db->get('tb_sarpras')->result();
    }

    // Get sarpras by category and active status
    public function get_active_by_category($category)
    {
        return $this->db->get_where('tb_sarpras', ['kategori_sarpras' => $category, 'active' => 1])->result();
    }

    // Get limited number of sarpras (for featured items)
    public function get_limited($limit)
    {
        $this->db->limit($limit);
        return $this->db->get('tb_sarpras')->result();
    }

    // Get active sarpras with limit
    public function get_active_limited($limit)
    {
        $this->db->where('active', 1);
        $this->db->limit($limit);
        return $this->db->get('tb_sarpras')->result();
    }
}