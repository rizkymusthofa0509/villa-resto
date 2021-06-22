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
class Category extends CI_Controller {
    function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    $this->load->library('session');
	    /*Model*/
	    $this->load->model('M_category');  
	    // $this->load->helper('dompet_helper');  
		$this->modul = 'Category';
        login();
	}
	
	public function index()
	{ 
		$data['title'] 	= $this->modul.'  ';
		$data['pages'] 	= 'category/index';
        $data['getAll'] = $this->M_category->getAll();
		$this->load->view('template',$data); 
	}

    public function create()
	{ 
		$data['title'] 	= $this->modul.' - Create ';
		$data['pages'] 	= 'category/form_add';
		$this->load->view('template',$data); 
	}

    public function store()
	{ 
		$data = [
            'name'=>post('name'), 
        ];

        $store = $this->db->insert('product_category',$data);
        if ($store){
            set_flashdata('info','
                        <div class="alert alert-success" role="alert">
                            Data Hasbeen Saved.
                        </div>
                    ');
            redirect('administrator/category');
        }
	}

    public function edit($id='')
	{ 
		$data['title'] 	= $this->modul.' - Edit ';
		$data['pages'] 	= 'category/form_edit';
        $data['detail'] = $this->M_category->getWhere($id)->row_array(); 
		$this->load->view('template',$data); 
	}
    
    public function update($id='')
	{ 
		$data = [
            'name'=>post('name'), 
        ];

        $store = $this->db->where(array('id'=>$id));
        $store = $this->db->update('product_category',$data);
        
        if ($store){
            set_flashdata('info','
                        <div class="alert alert-success" role="alert">
                            Data Hasbeen Updated.
                        </div>
                    ');
            redirect('administrator/category');
        }
	}

    public function destroy($id='')
	{ 
		$destroy = $this->db->delete('product_category',array('id'=>$id));
        if ($destroy){
            set_flashdata('info','
                        <div class="alert alert-success" role="alert">
                            Data Hasbeen Deleted.
                        </div>
                    ');
            redirect('administrator/category');
        }
	}
}
