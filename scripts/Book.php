<?php
include_once "product.php";
include_once "validate.php";

class Book extends Product
{
    private $weight='';   

    public function __construct()
    {
        parent::__construct();
    }
    public function setQueryParams(){
        return "(sku, title, price, weight) VALUES(?, ?, ?, ?)";
     }
     public function setQueryParamTypes(){
        return "ssdi";
     }
     private function _checkFields(array $data)
     {
         if(!CheckFields::is_filled($data['weight']))
             parent::setErrorMessage("Missing fields");
         if(!CheckFields:: check_number_field($data['weight']))        
         parent::setErrorMessage("Invalid weight<br>");
     } 
     public function setValues(array $data){
        $this->_checkFields($data);       
        parent::setValues($data);         
        $this->weight = CheckFields::check_input($data['weight']);        
     }
         
     public function getValues(){
         $arr[0] = parent::getSku();
         $arr[1] = parent::getTitle();
         $arr[2] = parent::getPrice();
         $arr[3] = $this->weight;
        return $arr;
     }

     public function printCard(){
        $result = parent::printCard() . 
          "<li>Weight: $this->weight KG</li>              
          </ul>
         </div>
        </div>
       </div>";
        return $result;
    }
   
}

?>