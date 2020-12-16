<?php 
 
class CrudSurat_m extends CI_Model{

	function tampil_data(){
		$query = $this->db->query("SELECT * from suratpengantar");
        $data = $query->result();

        return $data;
	}
 
	function input_data($table,$data){
		$this->db->insert($table,$data);
	}
 
	function hapus_data($id_surat){
		$this->db->where('id_surat', $nik);
		$this->db->delete('suratpengantar');
	}
 
	function display_row($id_surat){		
		$query = $this->db->query("select * from suratpengantar WHERE id_surat = '".$id_surat."'");

        foreach ($query->result_array() as $row)
		{
	       return $row;
		}
	}
 
	function update_data($data){
		$data = array(
        'id_surat' 			=> $data['id_surat'],
        'jenis_surat' 		=> $data['jenis_surat'],
        'keterangan'		=> $data['keterangan'],
        'tanggal'  			=> $data['tanggal']
		);

		$this->db->replace('suratpengantar', $data);
	}	
}