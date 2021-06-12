<?php
/*
-- ---------------------------------------------------------------
-- JOB CAREER 
-- CREATED BY : RIZKY MUSTHOFA
-- COPYRIGHT  : Copyright (c) 2020 
-- LICENSE    : http://opensource.org/licenses/MIT  MIT License
-- CREATED ON : 2020-06-09
-- UPDATED ON : V.1
-- APP NAME   : JOB CAREER
-- ---------------------------------------------------------------
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Apps extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    // $this->load->library('session');
	    /*Model*/
	    $this->load->model('M_employee');  
	    // $this->load->helper('dompet_helper');  
	    // login(); 
	}
	
	public function index()
	{ 
		$data['title'] 	= 'Multifab - Application';
		$data['modul']  = 'Dashboard';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Dashboard'     => 'apps'
						  );
		$data['pages']  = 'dashboard';
		$data['getAll'] = $this->M_employee->status('Active');
		$data['spd']    = getSpdList();
		// session_flash('Info','Ini adalah alert');

		$this->load->view('main',$data); 
	}

	public function flickity()
	{ 
		$data['title'] 	= 'Multifab - Application';
		$data['modul']  = 'Dashboard';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Dashboard'     => 'apps'
						  );
		$data['pages']  = 'flickity'; 
		// session_flash('Info','Ini adalah alert');

		$this->load->view('main',$data); 
	}

	public function mobile()
	{ 
		$data['title'] 	= 'Multifab - Application';
		$data['modul']  = 'Dashboard';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Dashboard'     => 'apps'
						  );
		$data['pages']  = 'flickity'; 
		// session_flash('Info','Ini adalah alert');

		$this->load->view('mobile/panel',$data); 
	}

	public function video($value='')
	{
		$data['title'] 	= 'Multifab - Application';
		$data['modul']  = 'Dashboard';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Dashboard'     => 'apps'
						  );
		$data['pages']  = 'flickity'; 
		// session_flash('Info','Ini adalah alert');

		$this->load->view('main',$data); 
	}

	public function pdf()
	{
			$content = "
			<html> 
			<body>
				<h1>MPDF WORK !</h1> 
				Selamat datang di rachmat.ID
			</body>
			</html>
			";
			$jajal = pdf();
			$jajal->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
			$jajal->WriteHTML($content);
			$jajal->Output();
	}

	function excel()
	{
		excel();
		$this->load->view('test');
 	}

 	public function frame($value='')
 	{
 		$data['title'] 	= 'Multifab - Application';
		$data['modul']  = 'Dashboard';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Dashboard'     => 'apps'
						  );
		$data['pages']  = 'frame';
		// session_flash('Info','Ini adalah alert');

		$this->load->view('main',$data); 
 	}

 	public function btc()
 	{
 		 
		$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
		$parameters = [
		  'start' => '1',
		  'limit' => '5000',
		  'convert' => 'USD'
		];

		$headers = [
		  'Accepts: application/json',
		  'X-CMC_PRO_API_KEY: cb6b21f1-f755-4493-9110-26e0d09597d9'
		];
		$qs = http_build_query($parameters); // query string encode the parameters
		$request = "{$url}?{$qs}"; // create the request URL


		$curl = curl_init(); // Get cURL resource
		// Set cURL options
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $request,            // set the request URL
		  CURLOPT_HTTPHEADER => $headers,     // set the headers 
		  CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
		));

		$response = curl_exec($curl); // Send the request, save the response
		print_r(json_decode($response)); // print json decoded response
		curl_close($curl); // Close request
		 
 	}

 	 

}




















