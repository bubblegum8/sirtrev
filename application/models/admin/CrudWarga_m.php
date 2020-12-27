<?php 
 
class CrudWarga_m extends CI_Model{

	function tampil_data(){
		$query = $this->db->query("SELECT * from detail_keluarga");
        $data = $query->result();

        return $data;
	}
 
	function input_data($table,$data){
		$this->db->insert($table,$data);
	}
 
	function hapus_data($nik){
		$this->db->where('nik', $nik);
		$this->db->delete('detail_keluarga');
	}
 
	function display_row($nik){		
		$query = $this->db->query("select * from detail_keluarga WHERE nik = '".$nik."'");

        foreach ($query->result_array() as $row)
		{
	       return $row;
		}
	}
 
	public function updateWarga($data, $id){
        $this->db->where("nik", $id);
        $this->db->update("detail_keluarga", $data);
    }

    function all(){
		$query = $this->db->query("SELECT * from keluarga");
        $data = $query->result();

        return $data;
	}	
}