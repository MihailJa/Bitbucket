<?php


class Route
{
	static function start()
	{
       
	   $routes = explode('/', $_SERVER['REQUEST_URI']);
	  
    switch( $routes[2])
    { 
	case "":		
		$controller = new Controller_List();
		$controller->action_index();
		break;
	case "index.php":		
		$controller = new Controller_List();
		$controller->action_index();
		break;
	case "delete.php":		
		$controller = new Controller_Delete();
		$controller->action_index();		
		break;
	case "add_form.php":		
		$controller = new Controller_AddProductPage;
		$controller->action_index();		
		break;
	case "add.php":		
		$controller = new Controller_AddProduct;
		$controller->action_index();		
		break;

	default : 
		/*require_once("page404.php"); */
	break;
}
	
}
}

?>
