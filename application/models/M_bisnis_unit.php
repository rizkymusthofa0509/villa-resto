<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bisnis_unit extends CI_Model{
	
	function __construct()
    {
         parent::__construct();
         $this->load->library('session');
    }

	function bisnis_unit($id){
		//AMBIL DATA Barang Dari data Barang 
		$data = $this->db->get_where('bisnis_unit', array('id'=>$id));
		return $data;
	}

}
?>