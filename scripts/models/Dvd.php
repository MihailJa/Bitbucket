<?php
include_once "product.php";
include_once "validate.php";


class DVD extends Product
{    
   
    private $size='';  
  
    public function __construct()
    {
        parent::__construct();
    }

    
    public function setQueryParams(){
        return "(sku, title, price, size) VALUES(?, ?, ?, ?)";
     }
     public function setQueryParamTypes(){
        return "ssdi";
     }    

     private function _checkFields(array $data)
     {            
         if(!CheckFields::is_filled($data['size']))
             parent::setErrorMessage("Missing fields");
         if(!CheckFields:: check_number_field($data['size']))        
         parent::setErrorMessage("Invalid size<br>");
     }    

     public function setValues(array $data){    
       $this->_checkFields($data);
       parent::setValues($data);                 
       $this->size = CheckFields::check_input($data['size']);       
     }
     public function getValues(){
         $arr[0] = parent::getSku();
         $arr[1] = parent::getTitle();
         $arr[2] = parent::getPrice();
         $arr[3] = $this->size;
        return $arr;
     }
    
     public function printCard(){
         $result = parent::printCard() . 
           "<li>Size: $this->size MB</li>              
           </ul>
          </div>
         </div>
        </div>";
         return $result;
     }
  
}

?>
