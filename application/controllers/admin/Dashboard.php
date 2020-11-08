<?php 
 
class Dashboard extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("admin/loginadmin"));
		}
	}
 
	function index(){
		$this->load->view('admin/dashboard');
	}
}