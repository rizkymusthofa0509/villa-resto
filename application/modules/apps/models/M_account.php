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

class M_account extends CI_Model{
	
	 
    function login($username='',$password='')
    {
    	   $this->db->select('account.*');
        $this->db->from('account');
        // $this->db->join('employee','employee.employee_id = hr_appreciation.employee_id','left');
        // $this->db->join('hr_appreciation_item','hr_appreciation.item_id = hr_appreciation_item.item_id','left');
        // $this->db->join('department','department.department_id = employee.department_id','left');
        // $this->db->join('jabatan','jabatan.jabatan_id = employee.jabatan_id','left');
        $this->db->where('account.username',$username);
        $this->db->where('account.password',$password);
        $query = $this->db->get();
        return $query;
    } 

    

}
?>