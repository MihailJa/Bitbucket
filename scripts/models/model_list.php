<?php

class Model_ProductList extends Model

{   //return array of products   
	public function get_data($product_type)
	{	             
        $query = new QueryBuilder(new DBConnector());
		$products = $query->selectAll($product_type);		
        return $products;    	
	}
}

?>