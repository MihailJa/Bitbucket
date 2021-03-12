<?php

class View
{
	

	function generate($content_view, $template_view, $data = null)
	{	
		include 'scripts/views/'. $template_view;        
	}

	function generateWithCards($content_view, $template_view, 
	$dataDvd = null, $dataBook = null, $dataFurniture = null)

	{     
		$product_card_dvd = function () {};
	    $product_card_book = function () {};
	    $product_card_furniture = function () {};
		$content_dvd = 'productcard/dvd_card.php';
        $content_book = 'productcard/book_card.php';   
        $content_furniture = 'productcard/furniture_card.php';				 
		 
		 include 'scripts/views/'. $template_view;		 
	}


}


?>