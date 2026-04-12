<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all statistik records
    public function get_all()
    {
        return $this->db->get('tb_statistik')->result();
    }

    // Get statistik by ID
    public function get_by_id($id)
    {
        return $this->db->get_where('tb_statistik', ['id_statistik' => $id])->row();
    }

    // Get statistik by tahun ajaran
    public function get_by_tahun($tahun)
    {
        return $this->db->get_where('tb_statistik', ['tahun_ajaran' => $tahun])->row();
    }

    // Get latest statistik (current or most recent)
    public function get_latest()
    {
        $tahun_sekarang = date("Y");
        
        // Try to get current year data
        $result = $this->get_by_tahun($tahun_sekarang);
        if ($result) {
            return $result;
        }
        
        // If not found, get the most recent
        $this->db->order_by('tahun_ajaran', 'DESC');
        return $this->db->get('tb_statistik')->row();
    }

    // Insert new statistik
    public function insert($data)
    {
        return $this->db->insert('tb_statistik', $data);
    }

    // Update statistik
    public function update($id, $data)
    {
        $this->db->where('id_statistik', $id);
        return $this->db->update('tb_statistik', $data);
    }

    // Update statistik by tahun ajaran
    public function update_by_tahun($tahun, $data)
    {
        $this->db->where('tahun_ajaran', $tahun);
        return $this->db->update('tb_statistik', $data);
    }

    // Delete statistik
    public function delete($id)
    {
        $this->db->where('id_statistik', $id);
        return $this->db->delete('tb_statistik');
    }

    // Count total statistik
    public function count_all()
    {
        return $this->db->count_all('tb_statistik');
    }

    // Get statistik with pagination
    public function get_paginated($limit, $offset)
    {
        return $this->db->get('tb_statistik', $limit, $offset)->result();
    }

    // Get statistik ordered by tahun ajaran
    public function get_ordered_by_tahun($order = 'DESC')
    {
        $this->db->order_by('tahun_ajaran', $order);
        return $this->db->get('tb_statistik')->result();
    }
}