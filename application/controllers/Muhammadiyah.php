<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muhammadiyah extends CI_Controller {

	public function index()
	{
		echo 'Hallo';
	}

    public function cahyono()
	{
		$this->load->view('welcome_message');
	}
}
