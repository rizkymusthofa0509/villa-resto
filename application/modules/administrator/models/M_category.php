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

    

}
?>