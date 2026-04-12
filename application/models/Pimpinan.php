<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pimpinan extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all pimpinan records
    public function get_all()
    {
        return $this->db->get('tb_pimpinan')->result();
    }

    // Get pimpinan by ID
    public function get_by_id($id)
    {
        return $this->db->get_where('tb_pimpinan', ['id_pimpinan' => $id])->row();
    }

    // Insert new pimpinan
    public function insert($data)
    {
        return $this->db->insert('tb_pimpinan', $data);
    }

    // Update pimpinan
    public function update($id, $data)
    {
        $this->db->where('id_pimpinan', $id);
        return $this->db->update('tb_pimpinan', $data);
    }

    // Delete pimpinan
    public function delete($id)
    {
        $this->db->where('id_pimpinan', $id);
        return $this->db->delete('tb_pimpinan');
    }

    // Count total pimpinan
    public function count_all()
    {
        return $this->db->count_all('tb_pimpinan');
    }

    // Get pimpinan with pagination
    public function get_paginated($limit, $offset)
    {
        return $this->db->get('tb_pimpinan', $limit, $offset)->result();
    }

    // Get active pimpinan only
    public function get_active()
    {
        return $this->db->get_where('tb_pimpinan', ['active' => 1])->result();
    }

    // Get pimpinan ordered by name
    public function get_ordered_by_name($order = 'ASC')
    {
        $this->db->order_by('nama_pimpinan', $order);
        return $this->db->get('tb_pimpinan')->result();
    }

    // Get pimpinan by position
    public function get_by_position($position)
    {
        return $this->db->get_where('tb_pimpinan', ['jabatan_pimpinan' => $position])->result();
    }

    // Get limited number of pimpinan (for featured team members)
    public function get_limited($limit)
    {
        $this->db->limit($limit);
        return $this->db->get('tb_pimpinan')->result();
    }

    // Get active pimpinan ordered by position hierarchy
    public function get_active_ordered()
    {
        $this->db->where('active', 1);
        $this->db->order_by('jabatan_pimpinan', 'ASC');
        $this->db->order_by('nama_pimpinan', 'ASC');
        return $this->db->get('tb_pimpinan')->result();
    }
}