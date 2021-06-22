<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    $this->load->library('session');
	    /*Model*/ 
	    $this->load->model(array('M_account'));


	    $this->base_url = 'apps'; 
	}
	 
	public function index()
	{ 
	
		$this->load->view('login');
	}

	public function handler()
	{
		$username = post('username');
		$password = md5(post('password'));  

		$cek = $this->db->query("SELECT * FROM account WHERE username='$username' AND password='$password' ");
		if ($cek->num_rows() > 0){
			$data = $cek->row_array();
            $session =  [
                'id'=>$data['id'],
                'fullname'=>$data['fullname'],
                'TOKEN'=>time(),
            ];
			$this->session->set_userdata($session);
			if ($data['type']=='user'){
				redirect('apps');
			}else{
				set_flashdata('info','
                        <div class="alert alert-danger" role="alert">
                            Anda tidak memiliki akses
                        </div>
                    ');
				redirect('apps/auth');
			}
			
		}else{
			set_flashdata('info','
                        <div class="alert alert-danger" role="alert">
                            Username / Password salah.
                        </div>
                    ');
			redirect('apps/auth');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('apps/auth');
	}
	 
 
}
