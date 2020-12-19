<?php 
 
class CrudWarga extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('rt/CrudWarga_m');
        $this->load->helper('url');
	}
 
	function index(){
		$result['data'] = $this->CrudWarga_m->tampil_data();
		$this->load->view('rt/datawarga', $result);

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
		$this->load->view('rt/tambahwarga', $result);
	}

	function submit_tambah(){
		$input['nik'] 			= $this->input->post('nik');
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
		$this->load->view('rt/tambahwarga', $result);
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