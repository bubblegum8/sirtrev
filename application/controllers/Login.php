<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        $this->load->model('Login_m');
    }

    public function index()
    {
        $session = $this->session->all_userdata();
        if(isset($session["NKK"])){
            redirect("warga/Dashboard", "refresh");
        }
        $this->load->view('Login');

    }

    public function submit()
    {
       $input['nkk']= $this->input->post('NKK');
       $input['password'] = $this->input->post('password');
       $login = $this->Login_m->get_user_data($input);

       if($login =='ok'){
        $role = $this->session->userdata('role');
        if($role == 'admin'){
            redirect('admin/Dashboard', 'refresh');
        }
        if($role == 'warga'){
            redirect('warga/Dashboard', 'refresh');
        }
        if($role == 'rt'){
            redirect('rt/Dashboard', 'refresh');
        }
       }
       else{
        echo $login;
       }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('Login', 'refresh');
    }
}