<?php 
 
class CrudWarga_m extends CI_Model{
	function tampil_data($data){
		$query = $this->db->query("SELECT A.*, C.rt FROM warga A 
		LEFT JOIN detail_warga B ON B.NKK = A.NKK 
		LEFT JOIN wilayah C ON B.id_wilayah = C.id_wilayah
		WHERE B.id_wilayah = ".$data."");
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

	function input3($data){
		$query = $this->db->query("INSERT INTO warga(NKK,NIK,nama,alamat,tmpt_lahir,tgl_lahir,pendidikan,agama) VALUES ('".$data['NKK']."','".$data['NIK']."','".$data['nama']."','".$data['alamat']."','".$data['tmpt_lahir']."','".$data['tgl_lahir']."','".$data['pendidikan']."','".$data['agama']."')");

        $this->db->set($query);
	}

	function input1($data){
		$query = $this->db->query("INSERT INTO wilayah(rt) VALUES ('".$data['rt']."')");

        $this->db->set($query);	
	}

	function input2($data){
		$query = $this->db->query("INSERT INTO detail_warga(NKK,id_wilayah) VALUES ('".$data['NKK']."','".$data['id_wilayah']."')");

        $this->db->set($query);	
	}


}