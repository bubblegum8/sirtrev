<?php 
 
class CrudWarga extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('rt/CrudWarga_m');
        $this->load->helper('url');
        $this->load->library('session');
	}
 
	function index(){
		$id_wilayah = $this->session->userdata('id_wilayah');
		$data['warga'] = $this->CrudWarga_m->tampil_data($id_wilayah);
		$this->load->view('rt/datawarga',$data);
	}

	function tambah(){
		$this->load->view('rt/tambahwarga');
	}
	// menghandel inputan dari form
	function tambah_aksi(){
		$input['NKK']				= $this->input->post('NKK');
		$input['NIK'] 				= $this->input->post('NIK');
		$input['nama']				= $this->input->post('nama');
		$input['alamat'] 			= $this->input->post('alamat');
		$input['tmpt_lahir']		= $this->input->post('tmpt_lahir');
		$input['tgl_lahir'] 		= $this->input->post('tgl_lahir');
		$input['pendidikan'] 		= $this->input->post('pendidikan');
		$input['agama'] 			= $this->input->post('agama');
		$input['rt'] 				= $this->input->post('rt');
 		$input['id_wilayah']		= $this->session->userdata('id_wilayah');

 		$this->CrudWarga_m->input1($input);
 		$this->CrudWarga_m->input2($input);
		$this->CrudWarga_m->input3($input);
		redirect('rt/crudwarga/index');
	}

	function hapus($id_warga){
		$where = array('id_warga' => $id_warga);
		$this->CrudWarga_m->hapus_data($where,'warga');
		redirect('rt/crudwarga/index');
	}

	function edit($id_warga){
		$where = array('id_warga' => $id_warga);
		$data['warga'] = $this->CrudWarga_m->edit_data($where,'warga')->result();
		$this->load->view('rt/editwarga',$data);
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
	redirect('rt/crudwarga/index');

}
}