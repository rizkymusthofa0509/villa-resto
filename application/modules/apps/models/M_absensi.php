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

class M_absensi extends CI_Model{
	
	function __construct()
    {
         parent::__construct();
         $this->load->library('session');
    }

    // function getAll()
    // {
    // 	return $this->db->query("SELECT * FROM employee ");
    // } 

    function Today($date='')
    {
        $this->db->select('employee.full_name,employee.badge_number,employee.posisi,attendance_tipe.name as tipe ,attendance.*');
        $this->db->from('attendance');
        $this->db->join('employee','employee.badge_number = attendance.badge_number','left');
        $this->db->join('attendance_tipe','attendance_tipe.attendance_type_id = attendance.attendance_type_id','left');
        // $this->db->join('jabatan','jabatan.jabatan_id = employee.jabatan_id','left');
        $this->db->where('attendance.tanggal',$date);
        $query = $this->db->get();
        return $query;
    }

    

}
?>