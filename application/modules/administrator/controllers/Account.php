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
class Account extends CI_Controller {
    function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    $this->load->library('session');
	    /*Model*/
	    $this->load->model('M_account');  
	    // $this->load->helper('dompet_helper');  
		$this->modul = 'Account';
	}
	
	public function index()
	{ 
		$data['title'] 	= $this->modul.'  ';
		$data['pages'] 	= 'account/index';
        $data['getAll'] = $this->M_account->getAll();
		$this->load->view('template',$data); 
	}

    public function create()
	{ 
		$data['title'] 	= $this->modul.' - Create ';
		$data['pages'] 	= 'account/form_add';
		$this->load->view('template',$data); 
	}

    public function store()
	{ 
		$data = [
            'fullname'=>post('fullname'), 
            'username'=>post('username'), 
            'password'=>md5(post('password')), 
            'type'=>post('type'), 
        ];

        $store = $this->db->insert('account',$data);
        if ($store){
            set_flashdata('info','
                        <div class="alert alert-success" role="alert">
                            Data Hasben Saved.
                        </div>
                    ');
            redirect('administrator/account');
        }
	}

    public function edit($id='')
	{ 
		$data['title'] 	= $this->modul.' - Edit ';
		$data['pages'] 	= 'account/form_edit';
        $data['detail'] = $this->M_account->getWhere($id)->row_array(); 
		$this->load->view('template',$data); 
	}
    
    public function update($id='')
	{ 
		

        if (post('password_new')!=''){
            $data = [
                'fullname'=>post('fullname'), 
                'username'=>post('username'), 
                'password'=>md5(post('password')), 
                'type'=>post('type'), 
            ];
        }else{
            $data = [
                'fullname'=>post('fullname'), 
                'username'=>post('username'), 
                'type'=>post('type'),  
            ];
        }

        $store = $this->db->where(array('id'=>$id));
        $store = $this->db->update('account',$data);
        
        if ($store){
            set_flashdata('info','
                        <div class="alert alert-success" role="alert">
                            Data Hasben Updated.
                        </div>
                    ');
            redirect('administrator/account');
        }
	}

    public function destroy($id='')
	{ 
		$destroy = $this->db->delete('account',array('id'=>$id));
        if ($destroy){
            set_flashdata('info','
                        <div class="alert alert-success" role="alert">
                            Data Hasben Deleted.
                        </div>
                    ');
            redirect('administrator/account');
        }
	}
}
