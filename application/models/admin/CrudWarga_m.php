<?php 
 
class CrudWarga_m extends CI_Model{

	function tampil_data(){
		$query = $this->db->query("SELECT * from detail_warga");
        $data = $query->result();

        return $data;
	}
 
	function input_data($table,$data){
		$this->db->insert($table,$data);
	}
 
	function hapus_data($nik){
		$this->db->where('nik', $nik);
		$this->db->delete('detail_warga');
	}
 
	function display_row($nik){		
		$query = $this->db->query("select * from detail_warga WHERE nik = '".$nik."'");

        foreach ($query->result_array() as $row)
		{
	       return $row;
		}
	}
 
	function update_data($data){
		$data = array(
        'nik' 			=> $data['nik'],
        'nama'  		=> $data['nama'],
        'tanggal_lahir' => $data['tanggal_lahir'],
        'jk'	  		=> $data['jk'],
        'alamat'		=> $data['alamat'],
        'pekerjaan'	 	=> $data['pekerjaan']
		);

		$this->db->replace('detail_warga', $data);
	}	
}