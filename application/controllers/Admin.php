<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
        
        $user = $this->session->userdata('user');
        $jabatan = strtolower($user['jabatan_user'] ?? '');

        $allowed = ['admin', 'kurikulum'];

        if (!in_array($jabatan, $allowed)) {
            show_error('Anda tidak memiliki akses ke halaman ini.', 403);
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard - SMK Muhammadiyah 15 Jakarta';
        $data['user'] = $this->session->userdata();
        
        // Load dashboard model
        $this->load->model('Dashboard');
        
        // Get dashboard statistics
        $data['stats'] = $this->Dashboard->get_dashboard_stats();
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer', $data);
    }
}
