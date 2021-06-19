<?php
/*
-- ---------------------------------------------------------------
-- MASTER
-- CREATED BY : RIZKY MUSTHOFA
-- COPYRIGHT  : Copyright (c) 2020 
-- LICENSE    : http://opensource.org/licenses/MIT  MIT License
-- CREATED ON : 2020-06-09
-- UPDATED ON : V.1
-- APP NAME   : MASTER
-- ---------------------------------------------------------------
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class M_product extends CI_Model{
	
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
    	$this->db->select('product_category.name as cat_name, product.*');
        $this->db->from('product');  
        $this->db->join('product_category','product_category.id = product.category_id','left');
        $query = $this->db->get();
        return $query;
    }

    public function getWhere($id='')
    {
        $this->db->select('product_category.name as cat_name, product.*');
        $this->db->from('product');
        $this->db->join('product_category','product_category.id = product.category_id','left');
        $this->db->where(array('product.id'=>$id));  
        $query = $this->db->get();
        return $query;
    }

    

}
?>