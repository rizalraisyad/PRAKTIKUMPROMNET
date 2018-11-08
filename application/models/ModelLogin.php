<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLogin extends CI_Model
{
    public function getlogin($username,$pwd){
        $pwd = md5($pwd);
    $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username',$username);
        $this->db->where('password',$pwd);
    if($this->db->get()->num_rows()>0){
        return true;
    }
    else{
        return false;
    }
    }
    public function selectbyusername($username){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username',$username);
        return $this->db->get();
    }
}