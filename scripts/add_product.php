<?php

include "conDB.php";
include "product.php";
include "Dvd.php";
include "ProductBuilder.php";
include "QueryBuilder.php";
include "HeaderRedirect.php";



$switcher = $_POST['switcher'];
$arr['sku'] = $_POST['SKU'];
$arr['title'] = $_POST['Name'];
$arr['price'] = (double)$_POST['Price'];
$arr['size'] = (int)$_POST['Size'];
$arr['weight'] = (int)$_POST['Weight'];
$arr['height'] = (int)$_POST['Height'];
$arr['width'] = (int)$_POST['Width'];
$arr['length'] = (int)$_POST['Length'];


$p = new ProductBuilder();
$p->defineTypeProduct($switcher);
$product = $p->getProduct();
$product->setValues($arr);

$query = new QueryBuilder(new DBConnector());
$query->insert($product);
$query->close();  

Header::headerRedirect('..\index.php');

exit;



?>