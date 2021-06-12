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

class M_employee extends CI_Model{
	
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
        $this->db->select('department.name as dept_name, employee.*');
        $this->db->from('employee'); 
        $this->db->join('department','department.department_id = employee.department_id','left'); 
        $this->db->where('employee.pegawai !=','Outsource');    
        $query = $this->db->get();
        return $query;
    }

    function filter($status)
    {
        // $this->db->select('division.name as div_name,department.name as dep_name, jabatan.name as jab_name,employee.*');
        $this->db->select('department.name as dept_name, employee.*');
        $this->db->from('employee');
        // $this->db->join('division','employee.division_id = employee.division_id','left');
        $this->db->join('department','department.department_id = employee.department_id','left');
        // $this->db->join('jabatan','jabatan.jabatan_id = employee.jabatan_id','left');
        // $this->db->where('employee.status',$status);
          
        $this->db->or_like('employee.status',$status,'both');
        $this->db->or_like('employee.full_name',$status,'both');
        $this->db->or_like('employee.badge_number',$status,'both'); 
        $query = $this->db->get();
        return $query;
    }

    function filterBadge($status)
    { 
        $this->db->select('department.name as dept_name, employee.*');
        $this->db->from('employee'); 
        $this->db->join('department','department.department_id = employee.department_id','left'); 
        $this->db->where('employee.badge_number',$status); 
        $query = $this->db->get();
        return $query;
    }

    function filterOutsource()
    { 
        $this->db->select('department.name as dept_name, employee.*'); 
         $this->db->from('employee');
        $this->db->join('department','department.department_id = employee.department_id','left'); 
        $this->db->where(array('employee.pegawai'=>'Outsource'));    
        $query = $this->db->get();
        return $query;
    }

    function status($status)
    {
         
        $this->db->select('department.name as dept_name, jabatan.name as jabatan, employee.*');
        $this->db->from('employee'); 
        $this->db->join('department','department.department_id = employee.department_id','left'); 
        $this->db->join('jabatan','jabatan.jabatan_id = employee.jabatan_id','left'); 
        $this->db->where('employee.status',$status);  
        $query = $this->db->get();
        return $query;

    }

    function attendance_report($where='')
    {
        return $this->db->query("
                        SELECT dep.name as dept_name, emp.* 
                        FROM employee as emp
                        LEFT JOIN department as dep on dep.department_id=emp.department_id
                        WHERE emp.employee_id>0 AND emp.status='Active' $where ORDER by emp.badge_number DESC
                        "); 
    }

}
?>