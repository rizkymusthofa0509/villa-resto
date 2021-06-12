<?php
/*
-- ---------------------------------------------------------------
-- MASTER
-- CREATED BY : RIZKY MUSTHOFA
-- COPYRIGHT  : Copyright (c) 2020 
-- LICENSE    : http://opensource.org/licenses/MIT  MIT License
-- CREATED ON : Oktober 2020
-- UPDATED ON : V.1
-- APP NAME   : ACCOUNTING APPS
-- ---------------------------------------------------------------
*/
	function login()
	{
		if (empty(session())){
			redirect('auth');
		} 
	}
	function set_flashdata($name='',$value='')
	{
		$ci     =& get_instance();
		return $ci->session->set_flashdata($name,$value); 
	}
	function echo_flashdata($name='')
	{
		$ci     =& get_instance();
		return $ci->session->flashdata($name);
	}
	function post($data)
	{
		$ci     =& get_instance();
	    return htmlspecialchars($ci->input->post($data));
	}
	function session($get='')
	{
		$ci     =& get_instance();
		if ($get==''){
	        $session= $ci->session->userdata('id');
		}else{
			$session= $ci->session->userdata($get);
		}
        return $session;
	}
	function getRomawi($bln){
                switch ($bln){
                    case 1: 
                        return "I";
                        break;
                    case 2:
                        return "II";
                        break;
                    case 3:
                        return "III";
                        break;
                    case 4:
                        return "IV";
                        break;
                    case 5:
                        return "V";
                        break;
                    case 6:
                        return "VI";
                        break;
                    case 7:
                        return "VII";
                        break;
                    case 8:
                        return "VIII";
                        break;
                    case 9:
                        return "IX";
                        break;
                    case 10:
                        return "X";
                        break;
                    case 11:
                        return "XI";
                        break;
                    case 12:
                        return "XII";
                        break;
                }
		}
	function call_month($bln='')
	{
		 $bulan = array(
                      '01'=>'Januari',
                      '02'=>'Februari',
                      '03'=>'Maret',
                      '04'=>'April',
                      '05'=>'Mei',
                      '06'=>'Juni',
                      '07'=>'Juli',
                      '08'=>'Agustus',
                      '09'=>'September',
                      '10'=>'Oktober',
                      '11'=>'November',
                      '12'=>'Desember',
                    ); 
		 return $bulan[$bln];
	}

	function hari($hari='')
	{
		switch($hari){
				    case 'Sun':
				        $hari_ini = "Minggu";
				    break;

				    case 'Mon':         
				        $hari_ini = "Senin";
				    break;

				    case 'Tue':
				        $hari_ini = "Selasa";
				    break;

				    case 'Wed':
				        $hari_ini = "Rabu";
				    break;

				    case 'Thu':
				        $hari_ini = "Kamis";
				    break;

				    case 'Fri':
				        $hari_ini = "Jumat";
				    break;

				    case 'Sat':
				        $hari_ini = "Sabtu";
				    break;
				    
				    default:
				        $hari_ini = "Tidak di ketahui";     
				    break;
				}
		 return $hari_ini;
	}

	function date_now()
	{
		date_default_timezone_set("Asia/Jakarta");
		return DATE("Y-m-d");
	}

	function dateTime_now()
	{
		date_default_timezone_set("Asia/Jakarta");
		return DATE("Y-m-d H:i:s");
	}
	function TimeStamp()
	{
		date_default_timezone_set("Asia/Jakarta");
		return time();
	}
	function rupiah($get='')
 	{
 		return number_format($get);
	}
	function rupiah_act($get='')
	{
		if ($get<0){
			$number = '('.str_replace("-", "",number_format($get)).')';
		}else{
			$number = ''.number_format($get).'';
		}
		return $number;
	}
	function date_idn($get='')
	{	
		$pisah  =  explode("-",$get);
		$tgl 	= $pisah[2];
		$bln 	= $pisah[1];
		$thn 	= $pisah[0];

		return $tgl.' '.call_month($bln).' '.$thn;
	}

	function pdf()
	{
		include APPPATH . 'third_party/mpdf/vendor/autoload.php';
		$mpdf = new \Mpdf\Mpdf([
				'default_font_size' => 15,
				'default_font' => 'dejavusans'
			]);
		return $mpdf;
	}

	function excel()
	{
		$excel_file_name = dateTime_now().'.xls';
		$excel = header("Content-type: application/octet-stream");
		$excel = header("Content-Disposition: attachment; filename=$excel_file_name");
		$excel = header("Pragma: no-cache");
		$excel = header("Expires: 0");
		return $excel;
	}
?>