<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model auth
		$this->load->model('Login_m');
		//cek session dan level user
	}

	public function index()
	{
		$result['role'] = $this->session->userdata('role');
		$result['menu'] = 'RT';
		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar", $result);
		$this->load->view('dashboard');
		$this->load->view("_partials/footer");
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
