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

class M_transaction_detail extends CI_Model{
	
	function __construct()
    {
         parent::__construct();
         $this->load->library('session');
    }  

    public function getWhere($id='')
    {
        $this->db->select('product.name as prod_name, product.price as prod_price, transaction_detail.*');
        $this->db->from('transaction_detail');
        $this->db->join('product','product.id = transaction_detail.product_id','left'); 
        $this->db->where(array('transaction_id'=>$id));  
        $query = $this->db->get();
        return $query;
    }

    

}
?>