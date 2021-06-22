<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaction extends CI_Model{
	
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
    	$this->db->select('villa.name as villa_name, transaction.*');
        $this->db->from('transaction'); 
        $this->db->join('villa','villa.id = transaction.villa_id','left'); 
        $this->db->order_by('transaction.id','DESC');
        $query = $this->db->get();
        return $query;
    }

    public function getStatus($status='')
    {
        $this->db->select('villa.name as villa_name, transaction.*');
        $this->db->from('transaction'); 
        $this->db->join('villa','villa.id = transaction.villa_id','left'); 
        $this->db->where_in('status',$status);  
        $this->db->order_by('transaction.id','DESC');
        $query = $this->db->get();
        return $query;
    }

    public function getStatusOrder($status='')
    {
        $this->db->select('villa.name as villa_name, transaction.*');
        $this->db->from('transaction'); 
        $this->db->join('villa','villa.id = transaction.villa_id','left'); 
        $this->db->where('transaction.TOKEN',session('TOKEN'));
        $this->db->where_in('status',$status);  
        $this->db->order_by('transaction.id','DESC');
        $query = $this->db->get();
        return $query;
    }


    public function getWhere($id='')
    {
        $this->db->select('transaction.*');
        $this->db->from('transaction');
        $this->db->join('villa','villa.id = transaction.villa_id','left'); 
        $this->db->where(array('id'=>$id));  
        $query = $this->db->get();
        return $query;
    }

    

}
?>