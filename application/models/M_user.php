<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{
	
	function __construct()
    {
         parent::__construct();
         $this->load->library('session');
    }

	function login($user,$pass){
		//AMBIL DATA Barang Dari data Barang
		$Username = $user;
		$password = $pass;
		$data = $this->db->get_where('ms_users', array('Username'=>$user,'Password'=>$password));
		return $data;
	}

}
?>