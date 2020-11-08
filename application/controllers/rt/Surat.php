<?php 
 
class Surat extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('rt/Surat_m');
        $this->load->helper('url');
	}
 
	function index(){
		$data['surat'] = $this->Surat_m->tampil_data();
		$this->load->view('rt/surat',$data);
	}

	function tambah(){
		$this->load->view('rt/tambahsurat');
	}
	// menghandel inputan dari form
	function tambah_aksi(){
		$no_surat		= $this->input->post('no_surat');
		$id_warga 		= $this->input->post('id_warga');
		$keperluan 		= $this->input->post('keperluan');
 
		$data = array(
		'no_surat' 		=> $no_surat,
		'id_warga' 		=> $id_warga,
		'keperluan'		=> $keperluan
		);
		$this->Surat_m->input_data($data,'surat');
		redirect('rt/Surat/index');
	}

	function hapus($id_surat){
		$where = array('id_surat' => $id_surat);
		$this->Surat_m->hapus_data($where,'surat');
		redirect('rt/Surat/index');
	}

	function edit($id_surat){
		$where = array('id_surat' => $id_surat);
		$data['surat'] = $this->Surat_m->edit_data($where,'surat')->result();
		$this->load->view('rt/editsurat',$data);
	}

	function update(){
		$id_surat		= $this->input->post('id_surat');
		$no_surat		= $this->input->post('no_surat');
		$id_warga 		= $this->input->post('id_warga');
		$keperluan 		= $this->input->post('keperluan');
 
		$data = array(
		'no_surat' 		=> $no_surat,
		'id_warga' 		=> $id_warga,
		'keperluan'		=> $keperluan
		);
 
	$where = array(
		'id_surat' => $id_surat
	);
 
	$this->Surat_m->update_data($where,$data,'surat');
	redirect('rt/Surat/index');
	}
}