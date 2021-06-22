<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    $this->load->library('session');
	    /*Model*/ 
	    $this->load->model(array('M_account','M_product','M_transaction','M_transaction_detail'));


	    $this->base_url = 'apps';
		login_app();
	}
	
	public function index()
	{ 
		if ($this->input->get('status')!=''){
			switch ($this->input->get('status')) {
				case 'reject':
					$data['list'] = $this->M_transaction->getStatusOrder(['reject']);
				break;
				case 'dipesan':
					$data['list'] = $this->M_transaction->getStatusOrder(['dipesan','diproses']);
				break;
				case 'diproses':
					$data['list'] = $this->M_transaction->getStatusOrder(['dipesan','diproses','dikirim']);
				break;
				case 'selesai':
					$data['list'] = $this->M_transaction->getStatusOrder(['selesai']);
				break; 
				
				default:
					$data['list'] = $this->M_transaction->getStatusOrder(['dipesan','diproses']);
				break;
			}
		}else{
			$data['list'] = $this->M_transaction->getStatusOrder(['dipesan','diproses']);
		} 
		$this->load->view('order/order',$data); 
	}

	 
	 
 
}
