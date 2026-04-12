<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all program records
    public function get_all()
    {
        return $this->db->get('tb_program')->result();
    }

    // Get program by ID
    public function get_by_id($id)
    {
        return $this->db->get_where('tb_program', ['id_program' => $id])->row();
    }

    // Insert new program
    public function insert($data)
    {
        return $this->db->insert('tb_program', $data);
    }

    // Update program
    public function update($id, $data)
    {
        $this->db->where('id_program', $id);
        return $this->db->update('tb_program', $data);
    }

    // Delete program
    public function delete($id)
    {
        $this->db->where('id_program', $id);
        return $this->db->delete('tb_program');
    }

    // Count total program
    public function count_all()
    {
        return $this->db->count_all('tb_program');
    }

    // Get program with pagination
    public function get_paginated($limit, $offset)
    {
        return $this->db->get('tb_program', $limit, $offset)->result();
    }

    // Get active programs only
    public function get_active()
    {
        return $this->db->get_where('tb_program', ['active' => 1])->result();
    }

    // Get programs ordered by name
    public function get_ordered_by_name($order = 'ASC')
    {
        $this->db->order_by('nama_program', $order);
        return $this->db->get('tb_program')->result();
    }

    // Get limited number of programs (for featured programs)
    public function get_limited($limit)
    {
        $this->db->limit($limit);
        return $this->db->get('tb_program')->result();
    }
}