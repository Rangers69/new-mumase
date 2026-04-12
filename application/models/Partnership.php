<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partnership extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all partnership records
    public function get_all()
    {
        return $this->db->get('tb_partnership')->result();
    }

    // Get partnership by ID
    public function get_by_id($id)
    {
        return $this->db->get_where('tb_partnership', ['id_partnership' => $id])->row();
    }

    // Insert new partnership
    public function insert($data)
    {
        return $this->db->insert('tb_partnership', $data);
    }

    // Update partnership
    public function update($id, $data)
    {
        $this->db->where('id_partnership', $id);
        return $this->db->update('tb_partnership', $data);
    }

    // Delete partnership
    public function delete($id)
    {
        $this->db->where('id_partnership', $id);
        return $this->db->delete('tb_partnership');
    }

    // Count total partnership
    public function count_all()
    {
        return $this->db->count_all('tb_partnership');
    }

    // Get partnership with pagination
    public function get_paginated($limit, $offset)
    {
        return $this->db->get('tb_partnership', $limit, $offset)->result();
    }

    // Get active partnerships only
    public function get_active()
    {
        return $this->db->get_where('tb_partnership', ['active' => 1])->result();
    }
}