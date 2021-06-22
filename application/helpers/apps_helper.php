<?php

	
	 function rp($rupiah='')
	 {
	 	return number_format($rupiah);
	 }

	 function total_price($token=NULL)
	 { 
		$ci     =& get_instance();
		$cek_token = $ci->db->query("SELECT * FROM `transaction` WHERE TOKEN='$token' ")->row_array();
		$detail    = $ci->db->query("SELECT SUM(total_price) as total_price FROM `transaction_detail` WHERE transaction_id='$cek_token[id]' ")->row_array();
		if (isset($detail['total_price'])){
			return $detail['total_price'];
		}else{
			return 0;
		}
	 }
?>