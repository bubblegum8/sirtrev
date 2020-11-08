<?php 
 
class CrudWarga extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('warga/CrudWarga_m');
        $this->load->helper('url');
	}
 
	function index(){
		$data['warga'] = $this->CrudWarga_m->tampil_data()->result();
		$this->load->view('warga/datawarga',$data);
	}

	function tambah(){
		$this->load->view('warga/tambahwarga');
	}
	// menghandel inputan dari form
	function tambah_aksi(){
		$NIK 			= $this->input->post('NIK');
		$nama 			= $this->input->post('nama');
		$alamat 		= $this->input->post('alamat');
		$tmpt_lahir		= $this->input->post('tmpt_lahir');
		$tgl_lahir 		= $this->input->post('tgl_lahir');
		$pendidikan 	= $this->input->post('pendidikan');
		$agama 			= $this->input->post('agama');
 
		$data = array(
			'NIK'				=> $NIK,
			'nama' 				=> $nama,
			'alamat' 			=> $alamat,
			'tmpt_lahir' 		=> $tmpt_lahir,
			'tgl_lahir' 		=> $tgl_lahir,
			'pendidikan' 		=> $pendidikan,
			'agama'		 		=> $agama
			);
		$this->CrudWarga_m->input_data($data,'warga');
		redirect('warga/crudwarga/index');
	}

	function hapus($id_warga){
		$where = array('id_warga' => $id_warga);
		$this->CrudWarga_m->hapus_data($where,'warga');
		redirect('warga/crudwarga/index');
	}

	function edit($id_warga){
		$where = array('id_warga' => $id_warga);
		$data['warga'] = $this->CrudWarga_m->edit_data($where,'warga')->result();
		$this->load->view('warga/editwarga',$data);
	}

	function update(){
		$id_warga 		= $this->input->post('id_warga');
		$NIK 			= $this->input->post('NIK');
		$nama 			= $this->input->post('nama');
		$alamat 		= $this->input->post('alamat');
		$tmpt_lahir		= $this->input->post('tmpt_lahir');
		$tgl_lahir 		= $this->input->post('tgl_lahir');
		$pendidikan 	= $this->input->post('pendidikan');
		$agama 			= $this->input->post('agama');
 
	$data = array(
		'NIK'				=> $NIK,
		'nama' 				=> $nama,
		'alamat' 			=> $alamat,
		'tmpt_lahir' 		=> $tmpt_lahir,
		'tgl_lahir' 		=> $tgl_lahir,
		'pendidikan' 		=> $pendidikan,
		'agama'		 		=> $agama
	);
 
	$where = array(
		'id_warga' => $id_warga
	);
 
	$this->CrudWarga_m->update_data($where,$data,'warga');
	redirect('warga/crudwarga/index');

}
}