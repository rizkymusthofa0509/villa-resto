<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_category extends CI_Model{
	
	function __construct()
    {
         parent::__construct();
         $this->load->library('session');
    }

    // function getAll()
    // {
    // 	$this->db->select('product_category.name as category, product.*');
    //     $this->db->from('product_category'); 
    //     $this->db->join('product_category','product_category.id = product.category_id','left');
    //     $query = $this->db->get();
    //     return $query;
    // }

    function getAll()
    {
    	$this->db->select('product_category.*');
        $this->db->from('product_category');  
        $query = $this->db->get();
        return $query;
    }


    public function getWhere($id='')
    {
        $this->db->select('product_category.*');
        $this->db->from('product_category');
        $this->db->where(array('id'=>$id));  
        $query = $this->db->get();
        return $query;
    }

    

}
?>