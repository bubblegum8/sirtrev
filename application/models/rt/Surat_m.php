<?php 
 
class Surat_m extends CI_Model{
	function tampil_data(){
		$query = $this->db->query("SELECT A.*, C.*, B.nama,B.tmpt_lahir,B.tgl_lahir,B.agama,B.alamat FROM surat A LEFT JOIN warga B ON B.id_warga = A.id_warga LEFT JOIN wilayah C ON C.id_wilayah = A.id_wilayah");
       	$hasil = $query->result();

        return $hasil;

	}
 
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
 
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
 
	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}
 
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}