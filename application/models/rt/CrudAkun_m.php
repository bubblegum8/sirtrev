<?php 
 
class CrudAkun_m extends CI_Model{

	function tampil_data(){
		$query = $this->db->query("SELECT * from keluarga");
        $data = $query->result();

        return $data;
	}
 
	function input_data($table,$data){
		$this->db->insert($table,$data);
	}
 
	function hapus_data($nkk){
		$this->db->where('nkk', $nkk);
		$this->db->delete('keluarga');
	}
 
	function display_row($nkk){		
		$query = $this->db->query("select * from keluarga WHERE nkk = '".$nkk."'");

        foreach ($query->result_array() as $row)
		{
	       return $row;
		}
	}
 
	 public function updateAkun($data, $id){
        $this->db->where("nkk", $id);
        $this->db->update("keluarga", $data);
    }

    public function all($data){
    	$query = $this->db->query("SELECT * from keluarga where id_wilayah = ".$data."");
        $data = $query->result();

        return $data;
    }
}