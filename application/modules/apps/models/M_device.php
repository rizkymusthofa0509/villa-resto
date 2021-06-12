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

class M_device extends CI_Model{
	
	function __construct()
    {
         parent::__construct();
         $this->load->library('session');
    }

    // function getAll()
    // {
    // 	return $this->db->query("SELECT * FROM employee ");
    // } 

    function getAll()
    {
        $this->db->select('attendance_device.*');
        $this->db->from('attendance_device');  
        $query = $this->db->get();
        return $query;
    }

    

}
?>