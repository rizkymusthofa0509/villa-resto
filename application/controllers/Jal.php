
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jal extends CI_Controller {

	 
	public function index()
	{
		$buka = $this->db->query("SELECT * FROM tbl_account");
		foreach ($buka->result() as $data) {
			// $update = $this->db->query("UPDATE employee SET email='$data->' ")
			$x['email'] = $data->username;
			
			$update = $this->db->where(array('badge_number' =>$data->badge_number));
			$update = $this->db->update('employee',$x);
		}
	}
 
}
