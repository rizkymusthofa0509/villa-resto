<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
    function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    $this->load->library('session');
	    /*Model*/
	    $this->load->model('M_category');   
		$this->modul = 'Auth';
	}
	
	public function index()
	{ 
		$data['title'] 	= $this->modul.'  '; 
		$this->load->view('auth/login',$data); 
	}
    public function handler()
    {
        $username = post('username');
		$password = md5(post('password'));  

		if (($username=="") OR ($password=="")){
			set_flashdata('info','
                        <div class="alert alert-danger" role="alert">
                            Username / Password tidak boleh kosong
                        </div>
                    ');
			redirect('administrator/auth');
		}

		$cek = $this->db->query("SELECT * FROM account WHERE username='$username' AND password='$password' ");
		if ($cek->num_rows() > 0){
			$data = $cek->row_array();
            $session =  [
                'id'=>$data['id'],
                'fullname'=>$data['fullname'],
                'type'=>$data['type'],
            ];
			$this->session->set_userdata($session);
			if (($data['type']=='admin') or ($data['type']=='receptionis') or ($data['type']=='kasir')){
				redirect('administrator');
			}else{
				set_flashdata('info','
                        <div class="alert alert-danger" role="alert">
                            Anda tidak memiliki akses
                        </div>
                    ');
				redirect('administrator/auth');
			}
			
		}else{
			set_flashdata('info','
                        <div class="alert alert-danger" role="alert">
                            Username / Password salah.
                        </div>
                    ');
			redirect('administrator/auth');
		}
    }

    public function logout()
    {
        session_destroy();
		redirect('administrator/auth');
    }
}
