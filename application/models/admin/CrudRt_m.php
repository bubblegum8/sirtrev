<?php 
 
class CrudRt_m extends CI_Model{

	function tampil_data(){
		$query = $this->db->query("SELECT * from wilayah");
        $data = $query->result();

        return $data;
	}
 
	function input_data($table,$data){
		$this->db->insert($table,$data);
	}
 
	function hapus_data($id_wilayah){
		$this->db->where('id_wilayah', $id_wilayah);
		$this->db->delete('wilayah');
	}
 
	function display_row($id_wilayah){		
		$query = $this->db->query("select * from wilayah WHERE id_wilayah = '".$id_wilayah."'");

        foreach ($query->result_array() as $row)
		{
	       return $row;
		}
	}
 
	 public function updateRt($data, $id){
        $this->db->where("id_wilayah", $id);
        $this->db->update("wilayah", $data);
    }
}