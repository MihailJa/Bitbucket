<?php

include_once "Dvd.php";
include "Furniture.php";
include "Book.php";




class ProductBuilder
{
    private $product;
    private $type_product;    
   
   
    function defineTypeProduct(string $type_product)
    {
        $this->type_product = $type_product;
        return $this;
    }

    function getProduct()
    { 
              $product = new $this->type_product(); 
              return $product;                                                                                                                                                                                                                                                            
    }


}

?>
