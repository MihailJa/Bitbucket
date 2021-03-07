<?php

include "conDB.php";
include "HeaderRedirect.php";
include_once "QueryBuilder.php";


function deleteSelectProducts(){
   $query = new QueryBuilder(new DBConnector());    
  $str1="";
  $str2 ="";
  $str3 =""; 
for($i=0; $i<count($_POST['products']);$i++)
{
   $product = splitTableNameId($_POST['products'][$i]);
 if($product[0]=="DVDs")
    $str1 .= $product[1] . ", ";

 else if($product[0]=="Books")
 $str2 .= $product[1] . ", ";

 else if($product[0]=="Furniture")
 $str3 .= $product[1] . ", ";  
}
if($str1 = substr($str1, 0, -2))
$query->delete( "DVDs", $str1);

if($str2 = substr($str2, 0, -2))
$query->delete("Books", $str2);
 
if($str3 = substr($str3, 0, -2))
$query->delete("Furniture", $str3);

$query->close();
}

function splitTableNameId(string $element)
{
return explode("-", $element);
}

  if(count($_POST['products']==0))
  Header::headerRedirect('..\index.php'); 

  $arr = deleteSelectProducts();	 
	 
  Header::headerRedirect('..\index.php');   


?>