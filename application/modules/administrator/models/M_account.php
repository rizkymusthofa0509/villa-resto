<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_account extends CI_Model{
	
	function __construct()
    {
         parent::__construct();
         $this->load->library('session');
    } 

    function getAll()
    {
    	$this->db->select('account.*');
        $this->db->from('account');  
        $query = $this->db->get();
        return $query;
    }


    public function getWhere($id='')
    {
        $this->db->select('account.*');
        $this->db->from('account');
        $this->db->where(array('id'=>$id));  
        $query = $this->db->get();
        return $query;
    }

    

}
?>