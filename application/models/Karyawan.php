<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all karyawan records
    public function get_all()
    {
        $this->db->where('active', 1);
        $this->db->where('jabatan !=', '');
        $this->db->order_by('id_karyawan', 'ASC');
        return $this->db->get('tb_karyawan')->result();
    }
}
