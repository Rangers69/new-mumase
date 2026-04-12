<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all jurusan records
    public function get_all()
    {
        return $this->db->get('tb_jurusan')->result();
    }

    // Get jurusan by ID
    public function get_by_id($id)
    {
        return $this->db->get_where('tb_jurusan', ['id_jurusan' => $id])->row();
    }

    // Insert new jurusan
    public function insert($data)
    {
        return $this->db->insert('tb_jurusan', $data);
    }

    // Update jurusan
    public function update($id, $data)
    {
        $this->db->where('id_jurusan', $id);
        return $this->db->update('tb_jurusan', $data);
    }

    // Delete jurusan
    public function delete($id)
    {
        $this->db->where('id_jurusan', $id);
        return $this->db->delete('tb_jurusan');
    }

    // Count total jurusan
    public function count_all()
    {
        return $this->db->count_all('tb_jurusan');
    }

    // Get jurusan with pagination
    public function get_paginated($limit, $offset)
    {
        return $this->db->get('tb_jurusan', $limit, $offset)->result();
    }
}