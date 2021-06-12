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

class M_master extends CI_Model{
	
	function __construct()
    {
         parent::__construct();
         $this->load->library('session');
    }

    function getAllSubDirektorat()
    { 
        $this->db->select('*');
        $this->db->from('subdirektorat'); 
        $query = $this->db->get();
        return $query;
    } 

    function getAllDivision()
    { 
        $this->db->select('*');
        $this->db->from('division'); 
        $query = $this->db->get();
        return $query;
    }

    function getAllDepartment()
    {
        // return $this->db->query("SELECT * FROM department  ");
        $this->db->select('division.name as div_name, division.description as div_description, department.*');
        $this->db->from('department');
        $this->db->join('division','department.division_id = division.division_id','left');
        // $this->db->where('hr_sheet_item.sheet_id',$id);
        $query = $this->db->get();
        return $query;
    }

    function getAllJabatan()
    {
        $this->db->select('*');
        $this->db->from('jabatan'); 
        $query = $this->db->get();
        return $query;
    }

    

}
?>