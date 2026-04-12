<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jurusan');
		$this->load->model('Partnership');
		$this->load->model('Statistik');
		$this->load->model('Program');
		$this->load->model('Testimoni');
		$this->load->model('Sarpras');
		$this->load->model('Pimpinan');
	}
	
	public function index()
	{
		// Get all jurusan data
		$data['jurusan'] = $this->Jurusan->get_all();
		
		// Get all partnership data
		$data['partnership'] = $this->Partnership->get_all();
		
		// Get latest statistik data
		$statistik = $this->Statistik->get_latest();
		if ($statistik) {
			$data['jumlah_siswa'] = $statistik->jumlah_siswa;
			$data['jumlah_guru'] = $statistik->jumlah_guru;
			$data['jumlah_kelas'] = $statistik->jumlah_kelas;
		} else {
			$data['jumlah_siswa'] = 0;
			$data['jumlah_guru'] = 0;
			$data['jumlah_kelas'] = 0;
		}
		
		// Get all program data
		$data['program'] = $this->Program->get_all();
		
		// Get all testimoni data
		$data['testimoni'] = $this->Testimoni->get_all();
		
		// Get active sarpras data
		$data['sarpras'] = $this->Sarpras->get_active();
		
		// Get all pimpinan data
		$data['pimpinan'] = $this->Pimpinan->get_all();


		$this->load->view('admin/index', $data);
	}
}
