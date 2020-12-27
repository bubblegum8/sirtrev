<?php 
 
class CrudWarga extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('rt/CrudWarga_m');
        $this->load->helper('url');
	}
 
	function index(){
		$id_wilayah = $this->session->userdata('id_wilayah');
		$result['data'] = $this->CrudWarga_m->tampil_warga($id_wilayah);
		$result['role'] = $this->session->userdata('role');
		$result['menu'] = 'RT';

		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar", $result);
		$this->load->view('datawarga', $result);
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
		$result['judul'] = 'TAMBAH WARGA';
		$result['menu'] = 'RT';
		$result['nkk'] = '';
		$result['role'] = $this->session->userdata('role');
		$result['id_wilayah'] = $this->session->userdata('id_wilayah');

		$result['data'] = $this->CrudWarga_m->all($result);

		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar", $result);
		$this->load->view('tambahwarga', $result);
		$this->load->view("_partials/footer");
	}

	function submit_tambah(){
		$input['nik'] 			= $this->input->post('nik');
		$input['nkk'] 			= $this->input->post('nkk');
		$input['id_wilayah'] 	= $this->input->post('id_wilayah');
		$input['nama'] 			= $this->input->post('nama');
		$input['tanggal_lahir'] = $this->input->post('tanggal_lahir');
		$input['jk'] 			= $this->input->post('jk');
		$input['alamat'] 		= $this->input->post('alamat');
		$input['pekerjaan'] 	= $this->input->post('pekerjaan');

		$this->CrudWarga_m->input_data('detail_keluarga', $input);

		redirect('rt/CrudWarga', 'refresh');

	}

	function hapus(){
		$nik = $this->uri->segment('4');
		$this->CrudWarga_m->hapus_data($nik);
		redirect('rt/CrudWarga', 'refresh');
	}

	function edit(){
		$nik = $this->uri->segment('4');
		$result = $this->CrudWarga_m->display_row($nik);
		$result['aksi'] = 'submit_edit';
		$result['judul'] = 'EDIT WARGA';

		//WAJIB
		$result['role'] = $this->session->userdata('role');
		$result['menu'] = 'RT';
		$result['id_wilayah'] = $this->session->userdata('id_wilayah');
		$result['data'] = $this->CrudWarga_m->all($result);

		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar", $result);
		$this->load->view('tambahwarga', $result);
		$this->load->view("_partials/footer");
	}

	function submit_edit(){
		$id 		 			= $this->input->post('nik');
		$input['nama'] 			= $this->input->post('nama');
		$input['tanggal_lahir']	= $this->input->post('tanggal_lahir');
		$input['jk'] 			= $this->input->post('jk');
		$input['alamat'] 		= $this->input->post('alamat');
		$input['pekerjaan'] 	= $this->input->post('pekerjaan');

		$this->CrudWarga_m->updateWarga($input, $id);

		redirect('rt/CrudWarga', 'refresh'); 
	}
}