<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model auth
		$this->load->model('Login_m');
	}

	public function index()
	{
		$this->load->view('warga/dashboard');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
