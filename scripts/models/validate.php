<?php


class CheckFields {
//function for check if the fields are filled 
static function is_filled($data)                
{   
	if(!isset($data) || $data == "")
  {
    return false;    
  }       
    return true;	
}

 // function for validate price
static function check_price($data) {             
  
  if(preg_match('/^([0-9]+[.])?[0-9]+$/u',$data))
  return true;

return false;	
}
// function for validate number field
static function check_number_field($data) {                
  
    if(preg_match('/^[0-9]+$/u',$data))
    return true;
  
  return false;	
  }

//function to prevent injection
static function check_input($data) {                  
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

}
?>

