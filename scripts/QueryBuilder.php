<?php


include_once "ProductBuilder.php";
include_once "error.php";


class QueryBuilder 
{
    private $connector;
    private $product;
    private $table;
    private $query;
    private $stmt;
    private $result;
    private $arr;


    public function __construct(DBConnector $connector)
    {       
        $this->connector = $connector;
        $this->connector->set_charset("utf8");         
    }  
    private function _setProduct(Product $product)
    {  
        $this->product = $product;                         
        return $this;              
    }

    private function _setTable()
    {  
        $this->table = $this->product->getTableName();                          
        return $this;       
    }
    private function _setQueryStringInsert()
    {  
        $this->query="INSERT INTO $this->table ";  // part of insert query string        
        return $this;       
    }
    private function _setQueryStringSelect()
    {  
        $this->query="SELECT * FROM $this->table ";  // part of select query string        
        return $this;       
    }
    private function _setQueryStringDelete(string $ids)
    {  
        $this->query="DELETE FROM $this->table WHERE id IN ($ids)";  // part of delete query string        
        return $this;       
    }
    private function _setFields(){
        $this->query .= $this->product->setQueryParams();
        return $this;  
    }
    private function _prepareQuery(){
        $this->stmt = $this->connector->prepare($this->query);
        return $this;  
    }
    private function _bindParams(){  
        $arr = $this->product->getValues();
        if(count($arr)==4){  
            list($a, $b, $c, $d) = $arr;              
            $this->stmt->bind_param($this->product->setQueryParamTypes(), $a, $b, $c, $d);                 
        } else 
        {   
            list($a, $b, $c, $d, $e, $f) = $arr;                       
            $this->stmt->bind_param($this->product->setQueryParamTypes(), $a, $b, $c, $d, $e, $f);                   
        }        
                
        return $this;  
    }    

    private function _storeResult(){
        $this->stmt->store_result();        
        return $this;
    }

    private function _executeQuery(){
        $this->result=$this->stmt->execute();
        return $this;
    }
    public function insert(Product $product){
        $this->_setProduct($product)->_setTable()->_setQueryStringInsert()->_setFields()->_prepareQuery()
        ->_bindParams()->_executeQuery();
        return $this->result;
     }  
      
     
    
      private function _select($product_type){   
        $builder = new ProductBuilder();
        $this->product = $builder->defineTypeProduct($product_type)->getProduct();             
        $this->_setProduct($this->product)->_setTable()->_setQueryStringSelect();      
        $result = $this->connector->query($this->query);
       
        if($result){       
               while ($rec = $result->fetch_assoc()) {                   
                  $this->product->setValues($rec);                            
                  echo $this->product->printCard();                   
               }                          
        }else 
        {              
                 return false;            
        }
        }  
           
      public function selectAll(array $products_type){ 
          foreach($products_type as $product_type)        
           $p1 = $this->_select($product_type);
           
         /*  $p2 = $this->_select("Book");
           $p3 = $this->_select("Furniture");    */               
           /* if(!$p1 && !$p2 && !$p3)
            ErrorMessage::no_found_records();      */     
      }     

      public function delete(string $table, string $ids){
        $this->table = $table;
        $this->_setQueryStringDelete($ids)->_prepareQuery()->_executeQuery();            
    // check if row deleted or not
    if ($this->stmt->affected_rows > 0) {
        return true;     
       } 
	else {        
        return false;      
     }

      } 
   
    public function close(){
        $this->stmt->close();
        $this->connector->close();
     }    

}

?>