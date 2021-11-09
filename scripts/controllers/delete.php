<?php


class Controller_Delete extends Controller
{
    
    function __construct()
	{
		$this->model = new Model_ProductDelete();
		$this->view = new View();
	}
	
	function action_index()  
	{	  
    $controller = new Controller_List();
    
    if(!isset($_POST['products']))
    {    
		$controller->action_index(); 
    return;
    }
    if(count($_POST['products'])>0)
    {
        $result = $this->model->get_data($_POST['products']);		
        if($result)
        {
          $controller->action_index();
        } else 
        {
          $controller = Controller_Error();  //error
            $controller->action_index();
        }
		    
    }   
	
		
		
	}

	
}


?>
