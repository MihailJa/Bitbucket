<?php

class Model_ProductDelete extends Model

{   //return array of products   
   
	public function get_data($products)
	{	   
      try
      {         
        $query = new QueryBuilder(new DBConnector());
        $str1="";
        $str2 ="";
        $str3 =""; 
      for($i=0; $i<count($products);$i++)
      {
         $product = $this->_splitTableNameId($products[$i]);
       if($product[0]=="DVDs")
          $str1 .= $product[1] . ", ";
      
       else if($product[0]=="Books")
       $str2 .= $product[1] . ", ";
      
       else if($product[0]=="Furniture")
       $str3 .= $product[1] . ", ";  
      }
      if($str1 = substr($str1, 0, -2))
      $query->delete("DVDs", $str1);
      
      if($str2 = substr($str2, 0, -2))
      $query->delete("Books", $str2);
       
      if($str3 = substr($str3, 0, -2))
      $query->delete("Furniture", $str3);	

       $query->close();
        return true;

    } catch (Exception $e)
    {
        return false;
    }	           
        	
  }    
     
     private function _splitTableNameId(string $element)
     {
     return explode("-", $element);
     }
}

?>