<?php
/*
-- ---------------------------------------------------------------
-- JOB CAREER 
-- CREATED BY : RIZKY MUSTHOFA
-- COPYRIGHT  : Copyright (c) 2020 
-- LICENSE    : http://opensource.org/licenses/MIT  MIT License
-- CREATED ON : 2021-06-12
-- UPDATED ON : V.1
-- APP NAME   : VILLA RESTO
-- ---------------------------------------------------------------
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class M_product extends CI_Model{
	
	 
    function getAll()
    {
    	$this->db->select('product_category.name as category, product.*');
        $this->db->from('product'); 
        $this->db->join('product_category','product_category.id = product.category_id','left');
        $query = $this->db->get();
        return $query;
    } 

    function getDetail($id='')
    {
        $this->db->select('product_category.name as category, product.*');
        $this->db->from('product'); 
        $this->db->join('product_category','product_category.id = product.category_id','left');
        $this->db->where('product.id',$id); 
        $query = $this->db->get();
        return $query;
    }

    

}
?>