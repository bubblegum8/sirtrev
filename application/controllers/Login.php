<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model Login_m
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
        $login = $this->Login_m->login_warga($this->input->post('NKK'),$this->input->post('password'));
        if($login == "ok"){
            $user = $this->session->userdata('statuswarga');
            $message = "Login Berhasil !!";
            echo "<script type= 'text/javascript'>alert('$message');</script>";
            if($user == "Ketua RT"){
                redirect("rt/Dashboard","refresh");
            }
            else{
                redirect("warga/Dashboard", "refresh");
            }
        }
        else{
            $message = "password salah !!";
            echo "<script type= 'text/javascript'>alert('$message');</script>";
            redirect("Login/index", "refresh");

        }
    }
}