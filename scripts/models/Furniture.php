<?php
include_once "product.php";
include_once "validate.php";


class Furniture extends Product
    
{  
    private $height='';
    private $width='';
    private $length='';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function setQueryParams(){
        return "(sku, title, price, height, width, length) VALUES(?, ?, ?, ?, ?, ?)";
     }
     public function setQueryParamTypes(){
        return "ssdiii";
     }
     private function _checkFields(array $data)
     {
         if(!CheckFields::is_filled($data['height']) || !CheckFields::is_filled($data['width']) ||
         !CheckFields::is_filled($data['length']))
             parent::setErrorMessage("Missing fields");
         if(!CheckFields:: check_number_field($data['height']))        
         parent::setErrorMessage("Invalid height<br>");
         if(!CheckFields:: check_number_field($data['width']))        
         parent::setErrorMessage("Invalid width<br>");
         if(!CheckFields:: check_number_field($data['length']))        
         parent::setErrorMessage("Invalid length<br>");
     } 

     public function setValues(array $data){     
        $this->_checkFields($data);  
        parent::setValues($data);                    
        $this->height = CheckFields::check_input($data['height']);
        $this->width = CheckFields::check_input($data['width']);
        $this->length = CheckFields::check_input($data['length']);         
     }
         
     public function getValues(){
         $arr[0] = parent::getSku();
         $arr[1] = parent::getTitle();
         $arr[2] = parent::getPrice();
         $arr[3] = $this->height;
         $arr[4] = $this->width;
         $arr[5] = $this->length;
        return $arr;
     }
     public function printCard(){
         $str_dimensions = $this->height . "x" . $this->width . "x" . $this->length;
        $result = parent::printCard() . 
          "<li>Dimensions:  $str_dimensions </li>              
          </ul>
         </div>
        </div>
       </div>";
        return $result;
    }
  
}
?>
