<?php
	 header('Content-Type: application/json'); 
	  $response = array();
      $response['status'] = 404;
      $response['message']= $message;

      

          //Result
          echo json_encode($response);

?>