<?php
/*
-- ---------------------------------------------------------------
-- JOB CAREER 
-- CREATED BY : RIZKY MUSTHOFA
-- COPYRIGHT  : Copyright (c) 2020 
-- LICENSE    : http://opensource.org/licenses/MIT  MIT License
-- CREATED ON : 2021
-- UPDATED ON : V.1
-- APP NAME   : VILLA RESTO
-- ---------------------------------------------------------------
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
    function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    $this->load->library('session');
	    /*Model*/
	    $this->load->model('M_category');   
	}
	
	public function index()
	{ 
		$data['title'] 	= $this->modul.'  ';
		$data['pages'] 	= 'category/index';
        $data['getAll'] = $this->M_category->getAll();
		$this->load->view('template',$data); 
	}
    public function handler()
    {
        $username = post('username');
		$password = post('password'); 

		$cek = $this->db->query("SELECT * FROM account WHERE username='$username' AND password='$password' ");
		if ($cek->num_rows() > 0){
			$data = $cek->row_array();
            $session =  [
                'id'=>$data['id'],
                'fullname'=>$data['fullname'],
            ];
			$this->session->set_userdata($session);
			redirect('administrator');
		}else{
			redirect('administrator');
		}
    }

    public function logout()
    {
        session_destroy();
		redirect('administrator/auth');
    }
}
