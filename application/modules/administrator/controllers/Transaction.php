<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaction extends CI_Controller {
    function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    $this->load->library('session');
	    /*Model*/
	    $this->load->model(array('M_transaction','M_villa','M_transaction','M_transaction_detail'));   
		$this->modul = 'Transaction';
		login();
	}
	
	public function index()
	{ 
		$data['title'] 	= $this->modul.'  ';
		$data['pages'] 	= 'transaction/index';
		if ($this->input->get('status')){
			$data['getAll'] = $this->M_transaction->getStatus($this->input->get('status'));
		}else{
			$data['getAll'] = $this->M_transaction->getAll();
		} 
		$this->load->view('template',$data); 
	}

    public function create()
	{ 
		$data['title'] 	= $this->modul.' - Create ';
		$data['pages'] 	= 'transaction/form_add';
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
		$data['pages'] 	= 'transaction/form_edit';
        $data['detail'] = $this->M_transaction->getWhere($id)->row_array(); 
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
		$destroy = $this->db->delete('transaction',array('id'=>$id));
        if ($destroy){
            set_flashdata('info','
                        <div class="alert alert-success" role="alert">
                            Data Hasbeen Deleted.
                        </div>
                    ');
            redirect('administrator/transaction');
        }
	}





	/*AJAX */
	public function update_status()
	{
		$data = [
            'status'=>post('update'), 
        ];

        $update = $this->db->where(array('id'=>post('id')));
        $update = $this->db->update('transaction',$data);
		echo "Success for Update";
	}

	public function infoWindows()
	{
		$data['detail'] = $this->M_transaction_detail->getWhere(post('id')); 
		$this->load->view('transaction/detail',$data);
	}
}
