<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all testimoni records
    public function get_all()
    {
        return $this->db->get('tb_testimoni')->result();
    }

    // Get testimoni by ID
    public function get_by_id($id)
    {
        return $this->db->get_where('tb_testimoni', ['id_alumni' => $id])->row();
    }

    // Insert new testimoni
    public function insert($data)
    {
        return $this->db->insert('tb_testimoni', $data);
    }

    // Update testimoni
    public function update($id, $data)
    {
        $this->db->where('id_alumni', $id);
        return $this->db->update('tb_testimoni', $data);
    }

    // Delete testimoni
    public function delete($id)
    {
        $this->db->where('id_alumni', $id);
        return $this->db->delete('tb_testimoni');
    }

    // Count total testimoni
    public function count_all()
    {
        return $this->db->count_all('tb_testimoni');
    }

    // Get testimoni with pagination
    public function get_paginated($limit, $offset)
    {
        return $this->db->get('tb_testimoni', $limit, $offset)->result();
    }


    // Get testimoni ordered by name
    public function get_ordered_by_name($order = 'ASC')
    {
        $this->db->order_by('nama_alumni', $order);
        return $this->db->get('tb_testimoni')->result();
    }

    // Get limited number of testimoni (for featured testimonials)
    public function get_limited($limit)
    {
        $this->db->limit($limit);
        return $this->db->get('tb_testimoni')->result();
    }

    // Get testimoni by profession
    public function get_by_profession($profession)
    {
        return $this->db->get_where('tb_testimoni', ['profesi_alumni' => $profession])->result();
    }
}