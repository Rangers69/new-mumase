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
        
        // Check if user has admin role
        $user_role = $this->session->userdata('jabatan_user');


        if ($user_role != 'Admin' && $user_role != 'SuperAdmin') {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses ke halaman ini!');
            redirect('auth');
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
