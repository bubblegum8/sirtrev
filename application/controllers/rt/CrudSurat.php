<?php 
 
class CrudSurat extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('rt/CrudSurat_m');
        $this->load->helper('url');
	}
 
	function index(){
		$result['data'] = $this->CrudSurat_m->tampil_data();
		$this->load->view('rt/surat', $result);

	}

	function tambah(){
		$result['id_surat'] = '';
		$result['jenis_surat'] = '';
		$result['keterangan'] = '';
		$result['tanggal'] = '';
		$result['aksi'] = 'submit_tambah';
		$result['judul'] = 'PENGAJUAN SURAT';
		$this->load->view('rt/tambahsurat', $result);
	}

	function submit_tambah(){
		$input['id_surat'] 		= $this->input->post('id_surat');
		$input['jenis_surat'] 	= $this->input->post('jenis_surat');
		$input['keterangan'] 	= $this->input->post('keterangan');
		$input['tanggal'] 		= $this->input->post('tanggal');

		$this->CrudWarga_m->input_data('surat', $input);

		redirect('rt/CrudSurat', 'refresh');

	}

	function hapus(){
		$id_surat = $this->uri->segment('3');
		$this->CrudSurat_m->hapus_data($id_surat);
		redirect('rt/CrudSurat', 'refresh');
	}

	function edit(){
		$id_surat = $this->uri->segment('3');
		$result = $this->CrudSurat_m->display_row($id_surat);
		$result['aksi'] = 'submit_edit';
		$result['judul'] = 'UBAH PENGAJUAN SURAT';
		$this->load->view('rt/tambahsurat', $result);
	}

	function submit_edit(){
		$input['id_surat'] 				= $this->input->post('id_surat');
		$input['jenis_surat'] 			= $this->input->post('jenis_surat');
		$input['keterangan'] 			= $this->input->post('keterangan');
		$input['tanggal']	 			= $this->input->post('tanggal');
		
		$this->CrudSurat->update_data($input);

		redirect('rt/CrudSurat', 'refresh'); 
	}
}