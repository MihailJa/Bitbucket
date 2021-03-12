<?php
foreach($dataDvd as $item)
{ 
  $product_id = 'DVDs-'  . $item['id'];
  $sku = $item['sku'];
  $title = $item['title'];
  $price = $item['price'];
  $size = $item['size'];
 echo
"<div class='col-sm-6 col-md-4 col-lg-3 mt-3'>
<div class='card p-2'>
  <div class='card-body'>                
   
    <input class='form-check-input' type='checkbox' name='products[]' value='$product_id'>
  
    <ul class='list-unstyled mt-3 mb-4'>
      <li>$sku</li>
      <li>$title</li>
      <li class='price'>$price $</li>
      <li>Size: $size MB</li>              
      </ul>
     </div>
    </div>
   </div>";
}

?>