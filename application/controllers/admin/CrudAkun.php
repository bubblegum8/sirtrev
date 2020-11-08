<?php 
 
class CrudAkun extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('admin/CrudAkun_m');
		$this->load->model('admin/CrudRt_m');
        $this->load->helper('url');
	}
 
	function index(){
		$data['detail_warga'] = $this->CrudAkun_m->tampil_data()->result();
		$data['wilayah'] = $this->CrudRt_m->tampil_data()->result();
		$this->load->view('admin/buatakun/buatakun',$data);
	}

	function tambah(){
		$this->load->view('admin/buatakun/tambahakun');
	}
	// menghandel inputan dari form
	function tambah_aksi(){
		$NKK			= $this->input->post('NKK');
		$password 		= $this->input->post('password');
		$statuswarga	= $this->input->post('statuswarga');
 
		$data = array(
		'NKK'			=> $NKK,
		'password' 		=> $password,
		'statuswarga'	=> $statuswarga
		);
		$this->CrudAkun_m->input_data($data,'detail_warga');
		redirect('admin/CrudAkun/index');
	}

	function hapus($NKK){
		$where = array('NKK' => $NKK);
		$this->CrudAkun_m->hapus_data($where,'detail_warga');
		redirect('admin/CrudAkun/index');
	}

	function edit($NKK){
		$where = array('NKK' => $NKK);
		$data['detail_warga'] = $this->CrudAkun_m->edit_data($where,'detail_warga')->result();
		$this->load->view('admin/buatakun/edit_akun',$data);
	}

	function update(){
		$NKK			= $this->input->post('NKK');
		$password 		= $this->input->post('password');
		$statuswarga	= $this->input->post('statuswarga');
 
		$data = array(
		'NKK'			=> $NKK,
		'password' 		=> $password,
		'statuswarga'	=> $statuswarga
		);

		$where = array(
		'NKK' => $NKK
		);
 
 
	$this->CrudAkun_m->update_data($where,$data,'detail_warga');
	redirect('admin/CrudAkun/index');
	}
}