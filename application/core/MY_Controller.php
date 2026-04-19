<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');

        $current_controller = $this->router->fetch_class();
        $current_method     = $this->router->fetch_method();

        // controller yang tidak perlu login
        $allowed_controller = ['auth', 'welcome', 'GuruController'];

        // method tertentu yang boleh diakses tanpa login
        $allowed_method = [
            'auth' => ['login', 'proses_login', 'logout'],
            'welcome' => ['index'],
            'GuruController' => ['public_view']
        ];

        if (in_array($current_controller, $allowed_controller)) {
            if (
                isset($allowed_method[$current_controller]) &&
                in_array($current_method, $allowed_method[$current_controller])
            ) {
                return;
            }
        }

        // cek session login
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Session habis, silakan login kembali.');
            redirect('auth');
        }
    }
}