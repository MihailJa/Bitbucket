<?php
include "error.php";


abstract class Product
{
    private $id='';
    private $sku='';
    private $title='';
    private $price='';
    private $className;
    private $errormessage='';

    public function __construct()
    {
        $this->className = $this->getTableName();
    }

    /**
     * Returns table name.
     * @return string Table name
     */
    public static function getTableName()
    {
        $className = get_called_class();
            if ($className !== 'Furniture') {
            return $className . 's';            
        }        
        return $className;
    }  
   
    protected function setErrorMessage($errormessage){
       $this->errormessage = $errormessage;
    }

    private function _checkFields(array $data)
    {  
        if(!CheckFields::is_filled($data['sku']) || !CheckFields::is_filled($data['title']) || 
        !CheckFields::is_filled($data['price']))
        {            
            $this->errormessage = "Missing fields";
        }
        if(!CheckFields::check_price($data['price']))        
            $this->errormessage ="Invalid price<br>";  
    }           

    protected function setValues(array $data){
        $this->_checkFields($data);    
        if($this->errormessage)
        ErrorMessage::show_error($this->errormessage); 
        if(array_key_exists('id', $data))
        $this->id = CheckFields::check_input($data['id']);

        $this->sku = CheckFields::check_input($data['sku']);
        $this->title = CheckFields::check_input($data['title']);
        $this->price = CheckFields::check_input($data['price']);
    }    
    public function setId($id){
        $this->id = $id;
    }
    public function setSku($sku){
        $this->sku = $sku;
    }
     
    public function setTitle($title){
        $this->title = $title;
    }
     
    public function setPrice($price){
        $this->price = $price;
    }      
    
    public function getId(){
        return $this->id;
    }
    public function getSku(){
        return $this->sku;
    }
     
    public function getTitle(){
        return $this->title;
    }
     
    public function getPrice(){
        return $this->price;
    }     
     
    protected function printCard(){
        $product_id = $this->className . "-" . $this->id;
        $result = "<div class='col-sm-6 col-md-4 col-lg-3 mt-3'>
            <div class='card p-2'>
              <div class='card-body'>                
               
                <input class='form-check-input' type='checkbox' name='products[]' value='$product_id'>
              
                <ul class='list-unstyled mt-3 mb-4'>
                  <li>$this->sku</li>
                  <li>$this->title</li>
                  <li class='price'>$this->price $</li>";
          return $result;
        
        }  
 
}

?>