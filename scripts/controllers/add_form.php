<?php


class Controller_AddProductPage extends Controller
{

	function __construct()
	{		
		$this->view = new View();
	}
	
	function action_index()
	{	
		$this->view->generate('add_form.php', 'template_view.php');
	}


}

?>
