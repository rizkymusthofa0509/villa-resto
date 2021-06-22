<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
class Administrator extends CI_Controller {
	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    $this->load->library('session');
	    /*Model*/
	    $this->load->model('M_transaction');  
	    // $this->load->helper('dompet_helper');  
		$this->modul = 'Dashboard';
		login();
	}
	
	public function index()
	{ 
		$data['title'] 	= 'Panel ';
		$data['pages'] 	= 'dashboard/index';
		$data['dipesan'] = $this->M_transaction->getStatus('dipesan');
		$data['diproses'] = $this->M_transaction->getStatus('diproses');
		$data['dikirim'] = $this->M_transaction->getStatus('dikirim');
		$data['selesai'] = $this->M_transaction->getStatus('selesai');
		$data['reject'] = $this->M_transaction->getStatus('reject');
		$this->load->view('template',$data); 
	}
	
	public function ajax()
	{
		# code...
	}
}
