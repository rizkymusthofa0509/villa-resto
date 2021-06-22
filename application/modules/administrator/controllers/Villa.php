<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
class Villa extends CI_Controller {
    function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    $this->load->library('session');
	    /*Model*/
	    $this->load->model('M_villa');  
	    // $this->load->helper('dompet_helper');  
		$this->modul = 'Villa';
        login();
	}
	
	public function index()
	{ 
		$data['title'] 	= $this->modul.'  ';
		$data['pages'] 	= 'villa/index';
        $data['getAll'] = $this->M_villa->getAll();
		$this->load->view('template',$data); 
	}

    public function create()
	{ 
		$data['title'] 	= $this->modul.' - Create ';
		$data['pages'] 	= 'villa/form_add';
		$this->load->view('template',$data); 
	}

    public function store()
	{ 
		$data = [
            'name'=>post('name'),
            'penyewa'=>post('penyewa'),
        ];

        $store = $this->db->insert('villa',$data);
        if ($store){
            set_flashdata('info','
                        <div class="alert alert-success" role="alert">
                            Data Hasbeen Saved.
                        </div>
                    ');
            redirect('administrator/villa');
        }
	}

    public function edit($id='')
	{ 
		$data['title'] 	= $this->modul.' - Edit ';
		$data['pages'] 	= 'villa/form_edit';
        $data['detail'] = $this->M_villa->getWhere($id)->row_array(); 
		$this->load->view('template',$data); 
	}
    
    public function update($id='')
	{ 
		$data = [
            'name'=>post('name'),
            'penyewa'=>post('penyewa'),
        ];

        $store = $this->db->where(array('id'=>$id));
        $store = $this->db->update('villa',$data);
        
        if ($store){
            set_flashdata('info','
                        <div class="alert alert-success" role="alert">
                            Data Hasbeen Updated.
                        </div>
                    ');
            redirect('administrator/villa');
        }
	}

    public function destroy($id='')
	{ 
		$destroy = $this->db->delete('villa',array('id'=>$id));
        if ($destroy){
            set_flashdata('info','
                        <div class="alert alert-success" role="alert">
                            Data Hasbeen Deleted.
                        </div>
                    ');
            redirect('administrator/villa');
        }
	}
}
