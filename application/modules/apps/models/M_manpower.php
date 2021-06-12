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

class M_manpower extends CI_Model{
	
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
        $this->db->select('division.name as division, jabatan.name as jabatan,hr_recruitment.*');
        $this->db->from('hr_recruitment');
        $this->db->join('division','division.division_id = hr_recruitment.division_id','left');
        $this->db->join('department','department.department_id = hr_recruitment.department_id','left');
        $this->db->join('jabatan','jabatan.jabatan_id = hr_recruitment.jabatan_id','left');
        // $this->db->where('attendance.tanggal',$date);
        $query = $this->db->get();
        return $query;
    }

    public function candidate()
    {
        $this->db->select('hr_recruitment.position as position,hr_recruitment_candidate.*');
        $this->db->from('hr_recruitment_candidate');
        $this->db->join('hr_recruitment','hr_recruitment.recruitment_id = hr_recruitment_candidate.recruitment_id','left');
        // $this->db->join('department','department.department_id = hr_recruitment.department_id','left');
        // $this->db->join('jabatan','jabatan.jabatan_id = hr_recruitment.jabatan_id','left');
        // $this->db->where('attendance.tanggal',$date);
        $this->db->order_by('candidate_id', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    

}
?>