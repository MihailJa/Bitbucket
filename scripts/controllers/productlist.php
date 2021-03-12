<?php


class Controller_List extends Controller
{
    
    function __construct()
	{
		$this->model = new Model_ProductList();
		$this->view = new View();
	}
	
	function action_index()
	{	$dataDvd = $this->model->get_data("DVD");		
        $dataBook = $this->model->get_data("Book");		
		$dataFurniture = $this->model->get_data("Furniture");			
		$this->view->generateWithCards('list.php', 'template_view.php', $dataDvd, $dataBook, $dataFurniture);
		
		if(!$dataDvd && !$dataBook && !$dataFurniture)	
		{
			 // to print "product not found"
            
		}
		
		
	}

	
}




	
?>