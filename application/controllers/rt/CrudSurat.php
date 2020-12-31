<?php 
 
class CrudSurat extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('rt/CrudSurat_m');
        $this->load->helper('url');
	}
 
	function index(){
		$id_wilayah = $this->session->userdata('id_wilayah');
		$result['data'] = $this->CrudSurat_m->tampil_surat($id_wilayah);
		$result['role'] = $this->session->userdata('role');
		$result['menu'] = 'RT';

		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar", $result);
		$this->load->view('surat', $result);
		$this->load->view("_partials/footer");

	}

	function tambah(){
		$result['id_surat'] = '';
		$result['nik'] = '';
		$result['jenis_surat'] = '';
		$result['keterangan'] = '';
		$result['tanggal'] = '';
		$result['aksi'] = 'submit_tambah';
		$result['judul'] = 'TAMBAH SURAT';
		$result['menu'] = 'RT';
		$result['role'] = $this->session->userdata('role');
		$result['id_wilayah'] = $this->session->userdata('id_wilayah');


		$result['data'] = $this->CrudSurat_m->all($result);

		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar", $result);
		$this->load->view('tambahsurat', $result);
		$this->load->view("_partials/footer");
	}

	function submit_tambah(){
		$input['id_surat'] 		= $this->input->post('id_surat');
		$input['nik'] 			= $this->input->post('nik');
		$input['id_wilayah'] 	= $this->input->post('id_wilayah');
		$input['jenis_surat'] 	= $this->input->post('jenis_surat');
		$input['keterangan'] 	= $this->input->post('keterangan');
		$input['tanggal'] 		= $this->input->post('tanggal');


		$this->CrudSurat_m->input_data('suratpengantar', $input);

		redirect('rt/CrudSurat', 'refresh');

	}

	function hapus(){
		$id_surat = $this->uri->segment('4');
		$this->CrudSurat_m->hapus_data($id_surat);
		redirect('rt/CrudSurat', 'refresh');
	}

	function edit(){
		$id_surat = $this->uri->segment('4');
		$result = $this->CrudSurat_m->display_row($id_surat);
		$result['aksi'] = 'submit_edit';
		$result['judul'] = 'EDIT SURAT';

		//WAJIB
		$result['role'] = $this->session->userdata('role');
		$result['menu'] = 'RT';
		$result['id_wilayah'] = $this->session->userdata('id_wilayah');
		$result['data'] = $this->CrudSurat_m->all($result);

		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar", $result);
		$this->load->view('tambahsurat', $result);
		$this->load->view("_partials/footer");
	}

	function submit_edit(){
		$id 		 			= $this->input->post('id_surat');
		$input['nik'] 			= $this->input->post('nik');
		$input['jenis_surat']	= $this->input->post('jenis_surat');
		$input['keterangan']	= $this->input->post('keterangan');
		$input['tanggal'] 		= $this->input->post('tanggal');

		$this->CrudSurat_m->updateSurat($input, $id);

		redirect('rt/CrudSurat', 'refresh'); 
	}
}