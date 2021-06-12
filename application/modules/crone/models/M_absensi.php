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

    function logs($tgl='')
    {
        $this->db->select('attendance_log.*');
        $this->db->from('attendance_log'); 
        $this->db->where('tanggal',$tgl); 
        $query = $this->db->get();
        return $query;
    }

    function Today($date='')
    {
        $this->db->select('employee.full_name,employee.photo,employee.badge_number,employee.posisi,attendance_tipe.name as tipe ,attendance.*');
        $this->db->from('attendance');
        $this->db->join('employee','employee.badge_number = attendance.badge_number','left');
        $this->db->join('attendance_tipe','attendance_tipe.attendance_type_id = attendance.attendance_type_id','left');
        // $this->db->join('jabatan','jabatan.jabatan_id = employee.jabatan_id','left');
        $this->db->where('attendance.tanggal',$date);
        $query = $this->db->get();
        return $query;
    }

    function terlambat($date='',$time='')
    {
        $this->db->select('employee.full_name,employee.photo,employee.badge_number,employee.posisi,attendance.*');
        $this->db->from('attendance');
        $this->db->join('employee','employee.badge_number = attendance.badge_number','right outer'); 
        $this->db->where('attendance.tanggal',$date);
        $this->db->where('attendance.time_in >',$time);
        $this->db->order_by('attendance.time_in', "DESC");
        $query = $this->db->get();
        return $query;
    }

    function tepatwaktu($date='',$time='')
    {
        $this->db->select('employee.full_name,employee.photo,employee.badge_number,employee.posisi,attendance.*');
        $this->db->from('attendance');
        $this->db->join('employee','employee.badge_number = attendance.badge_number','left'); 
        $this->db->where('attendance.tanggal',$date);
        $this->db->where('attendance.time_in <=',$time);
        // $this->order_by('TIME(attendance.time_in)', "desc");
        $query = $this->db->get();
        return $query;
    }

     function LastAbsen($date='',$time='')
    {
        $this->db->select('employee.full_name,employee.photo,employee.badge_number,employee.posisi,attendance.*');
        $this->db->from('attendance');
        $this->db->join('employee','employee.badge_number = attendance.badge_number','right outer'); 
        $this->db->where('attendance.tanggal',$date);
        // $this->db->where('attendance.time_in >',$time);
        $this->db->order_by('attendance.time_in', "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
    }

    

}
?>