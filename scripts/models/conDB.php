<?php
include "us.php"; // constants SERVER_NAME, USER_NAME, PASS, DB_NAME for connecting to DataBase

//Class for connecting to Database



class DBConnector extends mysqli
{
	 public function __construct() {
        parent::__construct( SERVER_NAME, USER_NAME, PASS, DB_NAME);

        if (mysqli_connect_error()) {
			
            echo "Error connecting!";			
           $this->write_log('Ошибка подключения (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error()); 
                   	 exit();			
        }
		
    }
    private function _write_log($str)                    //function to write to the log
    {
	$handle=fopen("log.txt", "w");
	fwrite($handle, $str);
	fclose($handle);	
    }
	
}


?>