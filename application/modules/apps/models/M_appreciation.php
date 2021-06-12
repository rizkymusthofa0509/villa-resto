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

class M_appreciation extends CI_Model{
	
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
        // $this->db->select('division.name as div_name,department.name as dep_name, jabatan.name as jab_name,employee.*');
        $this->db->select('hr_appreciation_item.name as item_name, employee.full_name, hr_appreciation.*');
        $this->db->from('hr_appreciation');
        $this->db->join('employee','employee.employee_id = hr_appreciation.employee_id','left');
        $this->db->join('hr_appreciation_item','hr_appreciation.item_id = hr_appreciation_item.item_id','left');
        // $this->db->join('department','department.department_id = employee.department_id','left');
        // $this->db->join('jabatan','jabatan.jabatan_id = employee.jabatan_id','left');
        // $this->db->where('hr_sheet_item.sheet_id',$id);
        $query = $this->db->get();
        return $query;
    }
    function bentukpenghargaan()
    {
        // $this->db->select('division.name as div_name,department.name as dep_name, jabatan.name as jab_name,employee.*');
        $this->db->select('hr_appreciation_item.*');
        $this->db->from('hr_appreciation_item');
        // $this->db->join('employee','employee.employee_id = hr_appreciation.employee_id','left');
        // $this->db->join('hr_appreciation_item','hr_appreciation.item_id = hr_appreciation_item.item_id','left');
        // $this->db->join('department','department.department_id = employee.department_id','left');
        // $this->db->join('jabatan','jabatan.jabatan_id = employee.jabatan_id','left');
        // $this->db->where('hr_sheet_item.sheet_id',$id);
        $query = $this->db->get();
        return $query;
    }

    

}
?>