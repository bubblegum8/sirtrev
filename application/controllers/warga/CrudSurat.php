<?php
class CrudSurat extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('warga/CrudSurat_m');
        $this->load->helper('url');
	}
 
	function index(){
		$result['data'] = $this->CrudSurat_m->tampil_data();
		$result['role'] = $this->session->userdata('role');
		$result['menu'] = 'warga';

		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar", $result);
		$this->load->view('surat', $result);
		$this->load->view("_partials/footer");
	}

	function tambah(){
		$result['id_surat'] = '';
		$result['jenis_surat'] = '';
		$result['keterangan'] = '';
		$result['tanggal'] = '';
		$result['aksi'] = 'submit_tambah';
		$result['judul'] = 'PENGAJUAN SURAT';
		$this->load->view('warga/tambahsurat', $result);
	}

	function submit_tambah(){
		$input['jenis_surat'] 	= $this->input->post('jenis_surat');
		$input['keterangan'] 	= $this->input->post('keterangan');
		$input['tanggal'] 		= $this->input->post('tanggal');

		$this->CrudSurat_m->input_data('suratpengantar', $input);

		redirect('warga/CrudSurat', 'refresh');

	}

	function hapus(){
		$id_surat = $this->uri->segment('4');
		$this->CrudSurat_m->hapus_data($id_surat);
		redirect('warga/CrudSurat', 'refresh');
	}

	function edit(){
		$id_surat = $this->uri->segment('4');
		$result = $this->CrudSurat_m->display_row($id_surat);
		$result['aksi'] = 'submit_edit';
		$result['judul'] = 'UBAH PENGAJUAN SURAT';
		$this->load->view('warga/tambahsurat', $result);
	}

	function submit_edit(){
		$id 		 			= $this->input->post('id_surat');
		$input['nama'] 			= $this->input->post('jenis_surat');
		$input['tanggal_lahir']	= $this->input->post('keterangan');
		$input['jk'] 			= $this->input->post('tanggal');

		$this->CrudSurat_m->updateSurat($input, $id);

		redirect('warga/CrudSurat', 'refresh'); 
	}
}