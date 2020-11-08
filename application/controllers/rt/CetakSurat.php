<?php 
 
class CetakSurat extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('rt/Surat_m');
        $this->load->library('pdf');
	}
 
	function index(){
		$data['surat'] = $this->Surat_m->tampil_data();
		$this->load->view('rt/cetaksurat',$data);
	}
}