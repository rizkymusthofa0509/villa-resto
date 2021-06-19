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
class Product extends CI_Controller {
    function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    $this->load->library('session');
	    /*Model*/
	    // $this->load->model('M_dashboard');  
	    // $this->load->helper('dompet_helper');  
		$this->modul = 'Produk';
	}
	
	public function index()
	{ 
		$data['title'] 	= $this->modul.' Panel';
		$data['pages'] 	= 'category/index';
		$this->load->view('template',$data); 
	}

    public function create()
	{ 
		$data['title'] 	= $this->modul.' Panel';
		$data['pages'] 	= 'category/form_add';
		$this->load->view('template',$data); 
	}

    public function store()
	{ 
		$data['title'] 	= $this->modul.' Panel';
		$data['pages'] 	= 'category/form_add';
		$this->load->view('template',$data); 
	}

    public function edit($id='')
	{ 
		$data['title'] 	= $this->modul.' Panel';
		$data['pages'] 	= 'category/form_edit';
		$this->load->view('template',$data); 
	}
    
    public function update()
	{ 
		$data['title'] 	= $this->modul.' Panel';
		$data['pages'] 	= 'category/form_add';
		$this->load->view('template',$data); 
	}

    public function destroy()
	{ 
		$data['title'] 	= $this->modul.' Panel';
		$data['pages'] 	= 'category/form_add';
		$this->load->view('template',$data); 
	}
 
}
