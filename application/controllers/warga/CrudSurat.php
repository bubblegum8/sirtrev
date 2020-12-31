<?php 
 
class Crudsurat extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('warga/CrudSurat_m');
        $this->load->helper('url');
	}
 
	function index(){

		$nkk = $this->session->userdata('nkk');
		$result['data'] = $this->CrudSurat_m->tampil_keluarga($nkk);
		$result['role'] = $this->session->userdata('role');
		$result['menu'] = 'warga';
		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar", $result);
		$this->load->view('datasurat', $result);
		$this->load->view("_partials/footer");

	}

	function tambah(){
		$result['nik'] = '';
		$result['nama'] = '';
		$result['tanggal_lahir'] = '';
		$result['jk'] = '';
		$result['alamat'] = '';
		$result['pekerjaan'] = '';
		$result['aksi'] = 'submit_tambah';
		$result['judul'] = 'TAMBAH SURAT';
		$result['id_wilayah'] = $this->session->userdata('id_wilayah');
		$result['nkk'] = $this->session->userdata('nkk');
		$this->load->view('tambahsurat', $result);
	}

	function submit_tambah(){
		$input['nik'] 			= $this->input->post('nik');
		$input['nkk'] 			= $this->input->post('nkk');
		$input['nama'] 			= $this->input->post('nama');
		$input['id_wilayah']	= $this->input->post('id_wilayah');
		$input['tanggal_lahir'] = $this->input->post('tanggal_lahir');
		$input['jk'] 			= $this->input->post('jk');
		$input['alamat'] 		= $this->input->post('alamat');
		$input['pekerjaan'] 	= $this->input->post('pekerjaan');

		$this->CrudSurat_m->input_data('suratpengantar', $input);

		redirect('CrudSurat', 'refresh');

	}

	function hapus(){
		$nik = $this->uri->segment('4');
		$this->Crudsurat_m->hapus_data($nik);
		redirect('warga/CrudSurat', 'refresh');
	}

	function edit(){
		$nik = $this->uri->segment('4');
		$result = $this->CrudSurat_m->display_row($nik);
		$result['aksi'] = 'submit_edit';
		$result['judul'] = 'EDIT surat';
		$this->load->view('tambahsurat', $result);
	}

	function submit_edit(){
		$id 		 			= $this->input->post('nik');
		$input['nama'] 			= $this->input->post('nama');
		$input['tanggal_lahir']	= $this->input->post('tanggal_lahir');
		$input['jk'] 			= $this->input->post('jk');
		$input['alamat'] 		= $this->input->post('alamat');
		$input['pekerjaan'] 	= $this->input->post('pekerjaan');

		$this->Crudsurat_m->updateSurat($input, $id);

		redirect('warga/CrudSurat', 'refresh'); 
	}
}