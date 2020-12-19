<?php 
 
class Dashboard extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	}
 
	function index(){
		
		$result['role'] = $this->session->userdata('role');
		$result['menu'] = 'Admin';
		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar", $result);
		$this->load->view('dashboard');
		$this->load->view("_partials/footer");
	}
}