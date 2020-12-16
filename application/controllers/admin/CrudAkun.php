<?php 
 
class CrudAkun extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('admin/CrudAkun_m');
		$this->load->model('admin/CrudRt_m');
        $this->load->helper('url');
	}
 
	function index(){
		$result['data'] = $this->CrudAkun_m->tampil_data();
		$this->load->view('admin/buatakun/buatakun', $result);

	}

	function tambah(){
		$result['nkk'] = '';
		$result['role'] = '';
		$result['password'] = '';
		$result['created'] = '';
		$result['aksi'] = 'submit_tambah';
		$result['judul'] = 'TAMBAH AKUN';
		$this->load->view('admin/buatakun/tambahakun', $result);
	}

	function submit_tambah(){
		$input['nkk'] 		= $this->input->post('nkk');
		$input['password'] 	= $this->input->post('password');
		$input['role'] 		= $this->input->post('role');
		$input['created'] 	= $this->input->post('created');

		$this->CrudAkun_m->input_data('keluarga', $input);

		redirect('admin/CrudAkun', 'refresh');

	}

	function hapus(){
		$nkk = $this->uri->segment('4');
		$this->CrudAkun_m->hapus_data($nkk);
		redirect('admin/CrudAkun', 'refresh');
	}

	function edit(){
		$nkk = $this->uri->segment('4');
		$result = $this->CrudAkun_m->display_row($nkk);
		$result['aksi'] = 'submit_edit';
		$result['judul'] = 'EDIT AKUN';
		$this->load->view('admin/buatakun/tambahakun', $result);
	}

	function submit_edit(){
		$id 				= $this->input->post('nkk');
		$input['nkk']		= $this->input->post('nkk');
		$input['password'] 	= $this->input->post('password');
		$input['role'] 		= $this->input->post('role');
		$input['created'] 	= $this->input->post('created');

		$this->CrudAkun_m->updateAkun($input, $id);

		redirect('admin/CrudAkun', 'refresh'); 
	}
}