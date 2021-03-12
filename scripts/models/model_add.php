<?php

class Model_AddProduct extends Model

{   //return array of products   
   
	public function get_data($product_data)
	{	   
      try
      {         
        $p = new ProductBuilder();
        $p->defineTypeProduct($product_data['switcher']);
        $product = $p->getProduct();
        $product->setValues($product_data);
        
        $query = new QueryBuilder(new DBConnector());
        $query->insert($product);
        $query->close(); 
        return true;

    } catch (Exception $e)
    {
        return false;
    }	           
        	
  }    
     
     
}

?>