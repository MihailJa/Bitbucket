<?php

class ErrorMessage {

	static function no_found_records()
	{
            echo "
			<div class='no-found-records'>
            <div class='row'>		
            <div class='col'>		          	
            <span>No found products!</span>
			</div>
			</div>
			</div>		
			";
	}


	static function show_error($message){     // for displaying error
	
		echo "<!DOCTYPE html>
  <html lang=\"en\">
  <head>
    <meta charset=\"utf-8\">
    <title>Error</title>	
	<style type=\"text/css\">
	body {
		background-color:#cecece;
		color: red;		
	}
	h1,p{
		text-align: center;
	}
	</style>
	</head>
  <body>
  <h1>Error!<h1>
  <p>$message</p>
   </body>
   </html>";
   exit;
	}



}


?>