<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model
{
    //fungsi check login
   public function get_user_data($data)
    {
       $result = "no";
        $query = $this->db->query("select * from keluarga WHERE nkk = '".$this->db->escape_like_str($data['nkk'])."' AND password = '".$this->db->escape_like_str($data['password'])."'");

        $row = $query->row();
        
        if ($query->num_rows() > 0){
            $result = "ok";
            $user['nkk']       = $row->nkk;
            $user['id_wilayah']   = $row->id_wilayah; 
            $user['password']  = $row->password;
            $user['role']      = $row->role;
            $user['created']   = $row->created;
            $this->session->set_userdata($user);
        }   
        
        return $result;
    }
}