<?php 
 
class CrudAkun extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('rt/CrudAkun_m');
        $this->load->helper('url');
	}
 
	function index(){
		$id = $this->session->userdata('id_wilayah');
		$result['data'] = $this->CrudAkun_m->all($id);
		$result['role'] = $this->session->userdata('role');
		$result['menu'] = 'rt';

		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar", $result);
		$this->load->view('buatakun', $result);
		$this->load->view("_partials/footer");

	}

	function tambah(){
		$result['nkk'] = '';
		$result['role'] = '';
		$result['password'] = '';
		$result['created'] = '';
		$result['aksi'] = 'submit_tambah';
		$result['judul'] = 'TAMBAH AKUN';
		$result['role'] = $this->session->userdata('role');
		$result['id_wilayah'] = $this->session->userdata('id_wilayah');	
		$result['menu'] = 'rt';
		
		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar", $result);
		$this->load->view('tambahakun', $result);
		$this->load->view("_partials/footer");
	}

	function submit_tambah(){
		$input['nkk'] 		= $this->input->post('nkk');
		$input['id_wilayah'] 		= $this->input->post('id_wilayah');
		$input['password'] 	= $this->input->post('password');
		$input['role'] 		= $this->input->post('role');
		$input['created'] 	= $this->input->post('created');

		$this->CrudAkun_m->input_data('keluarga', $input);

		redirect('rt/CrudAkun', 'refresh');

	}

	function hapus(){
		$nkk = $this->uri->segment('4');
		$this->CrudAkun_m->hapus_data($nkk);
		redirect('rt/CrudAkun', 'refresh');
	}

	function edit(){
		$nkk = $this->uri->segment('4');
		$result = $this->CrudAkun_m->display_row($nkk);
		$result['aksi'] = 'submit_edit';
		$result['judul'] = 'EDIT AKUN';
		$result['role'] = $this->session->userdata('role');
		$result['id_wilayah'] = $this->session->userdata('id_wilayah');	
		$result['menu'] = 'rt';

		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar", $result);
		$this->load->view('tambahakun', $result);
		$this->load->view("_partials/footer");
	}

	function submit_edit(){
		$id 	= $this->input->post('nkkLama');
		$input['nkk']		= $this->input->post('nkk');	
		$input['password'] 	= $this->input->post('password');
		$input['role'] 		= $this->input->post('role');
		$input['created'] 	= $this->input->post('created');

		$this->CrudAkun_m->updateAkun($input, $id);
		redirect('rt/CrudAkun', 'refresh'); 
	}
}