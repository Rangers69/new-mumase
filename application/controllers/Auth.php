<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('User');
	}
	
	public function index()
	{
		$this->load->view('admin/auth/login');
	}
	
	public function login_process()
	{

		// Set form validation rules
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		
		if ($this->form_validation->run() == FALSE) {
			// Form validation failed, reload login page with errors
			$this->session->set_flashdata('error', validation_errors());
			redirect('auth');
		} else {
			// Get form input
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			// Check credentials against database
			$user = $this->User->verify_user($username, $password);

			if ($user) {
				// Check if user is active
				if ($user->active != 1) {
					$this->session->set_flashdata('error', 'Akun Anda tidak aktif. Silakan hubungi administrator.');
					redirect('auth');
				}
				
				// Set session data for successful login
				$session_data = array(
					'user_id' => $user->id_user,
					'username' => $user->username_user,
					'jabatan_user' => $user->jabatan_user,
					'logged_in' => TRUE
				);
				
				$this->session->set_userdata($session_data);
				
				// Update last login time
				$this->User->update_last_login($user->id_user);
				
				// Redirect to dashboard or home page
				if ($user->jabatan_user == 'Admin' || $user->jabatan_user == 'Kurikulum') {
					$this->session->set_flashdata('success', 'Login berhasil! Selamat datang, ' . $user->nama);
					redirect('admin');
				} elseif ($user->jabatan_user == 'Ipm15') {
					$this->session->set_flashdata('success', 'Login berhasil! Selamat datang, ' . $user->nama);
					redirect('news');
				} else {
					$this->session->set_flashdata('error', 'Anda tidak memiliki akses ke halaman ini!');
					redirect('auth');
				}
				
			} else {
				// Invalid credentials
				$this->session->set_flashdata('error', 'Username atau password salah!');
				redirect('auth');
			}
		}
	}
	
	 public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Anda telah berhasil logout!');
        redirect('auth');
    }
}
