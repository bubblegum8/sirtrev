<?php 
 
class CrudRt extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('admin/CrudRt_m');
        $this->load->helper('url');
	}
 
	function index(){
		$data['wilayah'] = $this->CrudRt_m->tampil_data()->result();
		$this->load->view('admin/datart',$data);
	}

	function tambah(){
		$this->load->view('admin/tambahrt');
	}
	// menghandel inputan dari form
	function tambah_aksi(){
		$provinsi 	= $this->input->post('provinsi');
		$kota 		= $this->input->post('kota');
		$kecamatan 	= $this->input->post('kecamatan');
		$kelurahan 	= $this->input->post('kelurahan');
		$rw 		= $this->input->post('rw');
		$rt 		= $this->input->post('rt');
 
		$data = array(
			'provinsi' 	=> $provinsi,
			'kota'		=> $kota,
			'kecamatan' => $kecamatan,
			'kelurahan' => $kelurahan,
			'rw' 		=> $rw,
			'rt' 		=> $rt
			);
		$this->CrudRt_m->input_data($data,'wilayah');
		redirect('admin/crudrt/index');
	}

	function hapus($id_wilayah){
		$where = array('id_wilayah' => $id_wilayah);
		$this->CrudRt_m->hapus_data($where,'wilayah');
		redirect('admin/crudrt/index');
	}

	function edit($id_wilayah){
		$where = array('id_wilayah' => $id_wilayah);
		$data['wilayah'] = $this->CrudRt_m->edit_data($where,'wilayah')->result();
		$this->load->view('admin/editrt',$data);
	}

	function update(){
	$id_wilayah 		= $this->input->post('id_wilayah');
	$provinsi 	= $this->input->post('provinsi');
	$kota 		= $this->input->post('kota');
	$kecamatan 	= $this->input->post('kecamatan');
	$kelurahan 	= $this->input->post('kelurahan');
	$rw 		= $this->input->post('rw');
	$rt 		= $this->input->post('rt');
 
	$data = array(
		'provinsi' 	=> $provinsi,
		'kota'		=> $kota,
		'kecamatan' => $kecamatan,
		'kelurahan' => $kelurahan,
		'rw' 		=> $rw,
		'rt' 		=> $rt
	);
 
	$where = array(
		'id_wilayah' => $id_wilayah
	);
 
	$this->CrudRt_m->update_data($where,$data,'wilayah');
	redirect('admin/crudrt/index');

}
}