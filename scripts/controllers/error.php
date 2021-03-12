<?php
class Controller_Error extends Controller
{
    
    function __construct()
	{		
		$this->view = new View();
	}
	
	function action_index()
	{				
		$this->view->generateWithCards('error.php', 'template_view.php');
		
			
	}

	
}

?>