<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {
    function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    $this->load->library('session');
	    /*Model*/
	    $this->load->model(array('M_product','M_category'));  
	    // $this->load->helper('dompet_helper');  
		$this->modul = 'Menu';
        login();
	}
	
	public function index()
	{ 
		$data['title'] 	= $this->modul.'  ';
		$data['pages'] 	= 'product/index';
        $data['getAll'] = $this->M_product->getAll();
        
		$this->load->view('template',$data); 
	}

    public function create()
	{ 
		$data['title'] 	= $this->modul.' - Create ';
		$data['pages'] 	= 'product/form_add';
        $data['category'] = $this->M_category->getAll();
		$this->load->view('template',$data); 
	}

    public function store()
	{ 
        $config['upload_path']          = './assets/product/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|';
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config); 
        $nama_file = 'default.png';
        if ($this->upload->do_upload('image'))
        {
            $data = array('upload_data' => $this->upload->data()); 
            $nama_file = $data['upload_data']['file_name'];
        }

		$data = [
            'category_id'=>post('category_id'), 
            'name'=>post('name'), 
            'price'=>post('price'), 
            'description'=>post('description'), 
            'image'=>$nama_file, 
        ];

        $store = $this->db->insert('product',$data);
        if ($store){
            set_flashdata('info','
                        <div class="alert alert-success" role="alert">
                            Data Hasbeen Saved.
                        </div>
                    ');
            redirect('administrator/product');
        }
	}

    public function edit($id='')
	{ 
		$data['title'] 	= $this->modul.' - Edit ';
		$data['pages'] 	= 'product/form_edit';
        $data['detail'] = $this->M_product->getWhere($id)->row_array(); 
        $data['category'] = $this->M_category->getAll();
		$this->load->view('template',$data); 
	}
    
    public function update($id='')
	{ 
        $config['upload_path']          = './assets/product/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|';
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config); 
        $nama_file = post('image_old');
        if ($this->upload->do_upload('image'))
        {
                $data = array('upload_data' => $this->upload->data()); 
                $nama_file = $data['upload_data']['file_name'];
        } 	

		$data = [
            'category_id'=>post('category_id'), 
            'name'=>post('name'), 
            'price'=>post('price'), 
            'description'=>post('description'), 
            'image'=>$nama_file, 
        ];
		

        $store = $this->db->where(array('id'=>$id));
        $store = $this->db->update('product',$data);
        
        if ($store){
            set_flashdata('info','
                        <div class="alert alert-success" role="alert">
                            Data Hasbeen Updated.
                        </div>
                    ');
            redirect('administrator/product');
        }
	}

    public function destroy($id='')
	{ 
		$destroy = $this->db->delete('product',array('id'=>$id));
        if ($destroy){
            set_flashdata('info','
                        <div class="alert alert-success" role="alert">
                            Data Hasbeen Deleted.
                        </div>
                    ');
            redirect('administrator/product');
        }
	}
}
