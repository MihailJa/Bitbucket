<?php



class Controller_AddProduct extends Controller
{
    private $data;

	function __construct()
	{	
        $this->model = new Model_AddProduct();	
		$this->view = new View();
        $this->data['sku'] = $_POST['SKU'];
        $this->data['title'] = $_POST['Name'];
        $this->data['price'] = (double)$_POST['Price'];
        $this->data['size'] = (int)$_POST['Size'];
        $this->data['weight'] = (int)$_POST['Weight'];
        $this->data['height'] = (int)$_POST['Height'];
        $this->data['width'] = (int)$_POST['Width'];
        $this->data['length'] = (int)$_POST['Length'];
        $this->data['switcher'] = $_POST['switcher'];
	}
	
	function action_index()
	{	               
        $result = $this->model->get_data($this->data);
        if($result)
        {
		$controller = new Controller_List();
        $controller->action_index();
        }
        else 
        {
            $controller = Controller_Error(); 
            $controller->action_index();
        }
	}
}

?>
