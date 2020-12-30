<?php 
 
class CrudRt extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('admin/CrudWilayah_m');
        $this->load->helper('url');
	}
 
	function index(){
		$result['data'] = $this->CrudWilayah_m->tampil_data();
		$result['role'] = $this->session->userdata('role');
		$result['menu'] = 'admin';
		
		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar", $result);
		$this->load->view('datart', $result);
		$this->load->view("_partials/footer");

	}

	function tambah(){
		$result['id_wilayah'] = '';
		$result['provinsi'] = '';
		$result['kota'] = '';
		$result['kecamatan'] = '';
		$result['kelurahan'] = '';
		$result['rw'] = '';
		$result['rt'] = '';
		$result['aksi'] = 'submit_tambah';
		$result['judul'] = 'TAMBAH WILAYAH';
		$result['role'] = $this->session->userdata('role');
		$result['menu'] = 'admin';

		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar", $result);
		$this->load->view('tambahrt', $result);
		$this->load->view("_partials/footer");
	}

	function submit_tambah(){
		
		$input['provinsi'] 		= $this->input->post('provinsi');
		$input['kota']			= $this->input->post('kota');
		$input['kecamatan'] 	= $this->input->post('kecamatan');
		$input['kelurahan'] 	= $this->input->post('kelurahan');
		$input['rw'] 			= $this->input->post('rw');
		$input['rt'] 			= $this->input->post('rt');

		$this->CrudWilayah_m->input_data('wilayah', $input);

		redirect('admin/CrudRt', 'refresh');

	}

	function hapus(){
		$id_wilayah = $this->uri->segment('4');
		$this->CrudWilayah_m->hapus_data($id_wilayah);
		redirect('admin/CrudRt', 'refresh');
	}

	function edit(){
		$id_wilayah = $this->uri->segment('4');
		$result = $this->CrudWilayah_m->display_row($id_wilayah);
		$result['aksi'] = 'submit_edit';
		$result['judul'] = 'EDIT WILAYAH';
		$result['role'] = $this->session->userdata('role');
		$result['menu'] = 'Admin';

		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar", $result);
		$this->load->view('tambahrt', $result);
		$this->load->view("_partials/footer");
	}

	function submit_edit(){
		$id 					= $this->input->post('id_wilayah');
		$input['provinsi'] 		= $this->input->post('provinsi');
		$input['kota']			= $this->input->post('kota');
		$input['kecamatan'] 	= $this->input->post('kecamatan');
		$input['kelurahan'] 	= $this->input->post('kelurahan');
		$input['rw'] 			= $this->input->post('rw');
		$input['rt'] 			= $this->input->post('rt');

		$this->CrudWilayah_m->updateRt($input, $id);

		redirect('admin/CrudRt', 'refresh'); 
	}
}