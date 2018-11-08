<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

    public function index()
    {
        $this->load->view('tampilan_login');
    }
    public function getlogin(){
        if($this->ModelLogin->getlogin($this->input->post('username'),$this->input->post('password'))){
            $data = $this->ModelLogin->selectByusername($this->input->post('username'))->row_array();
            $userdata = array(
                'id_username' => $data['id_username'],
                'username' => $data['username'],
                'password' => $data['password'],
                'nama_lengkap' => $data['nama_lengkap']
            );
            $this->session->set_userdata($userdata);
            redirect('home');
        }else{
            redirect('login');
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}
