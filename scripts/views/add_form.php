
    <header>    
    <nav class="navbar">
      
        <a class="navbar-brand">Product Add</a>
        <form class="d-flex" action="add.php" method="POST" name="add_form">
          <button class="btn btn-outline-success mr-2" type="submit" onclick="return validateForm()">Save</button>
          <button class="btn btn-outline-success" type="reset" onclick="document.location='index.php'"  >Cancel</button>
            
        
      
    </nav>
  </header>
  <div class="container-fluid">
  <main class="flex-shrink-0 mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
     
      <div class="row mb-3">
        <label for="SKU" class="col-sm-2 col-form-label">SKU</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="SKU" id="SKU" placeholder="" 
        oninput="validateSKU()" onclick="cancelErrorMessage(sku_desc)" required>
      </div>
      <div class="description" id="sku_desc">
      </div>
      </div>
      <div class="row mb-3">
        <label for="Name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="Name" id="Name" placeholder="" 
        oninput="validateName()" onclick="cancelErrorMessage(name_desc)" required>
      </div>
      <div class="description" id="name_desc">
      </div>
      </div>  
          <div class="row mb-3">
        <label for="Price" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="Price" id="Price" placeholder="" 
        oninput="validatePrice()" onclick="cancelErrorMessage(price_desc)" required>
      </div>
      <div class="description" id="price_desc">
      </div>
      </div>  

      <div class="row mb-3">
        <label for="Price" class="col-sm-4 col-form-label">Type Switcher</label>
        <div class="col-sm-8">
          
          <select class="form-select"  name="switcher" id="switcher" >
            <option selected>Type Switcher</option>
            <option value="DVD">DVD</option>
            <option value="Book">Book</option>
            <option value="Furniture">Furniture</option>
          </select>
          <p id="switcher_validation_message"></p>
      </div>      
      </div>  
       
      <div class="row mb-3" id="DVD" hidden>
        <label for="Size" class="col-sm-2 col-form-label">Size</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="Size" id="Size" placeholder="" 
        oninput="validateNumberField(size)" onclick="cancelErrorMessage(size_desc)">
        <div class="description" id="size_desc">          
        </div>
      </div>
      </div>   

      <div class="row mb-3" id="Book" hidden>
        <label for="Weight" class="col-sm-2 col-form-label">Weight (kg)</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="Weight" id="Weight" placeholder="" 
        oninput="validateNumberField(weight)" onclick="cancelErrorMessage(weight_desc)";>
        <div class="description" id="weight_desc">
          
        </div>
      </div>
      </div> 

      <div id="Furniture" hidden>
      <div class="row mb-3" >
        <label for="Height" class="col-sm-2 col-form-label">Height (cm)</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="Height" id="Height" placeholder="" 
        oninput="validateNumberField(height)" onclick="cancelErrorMessage(dimensions_desc)";>
      </div>
      </div> 
      <div class="row mb-3" >
        <label for="Width" class="col-sm-2 col-form-label">Width (cm)</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="Width" id="Width" placeholder="" 
        oninput="validateNumberField(width)" onclick="cancelErrorMessage(dimensions_desc)";>
      </div>
      </div> 
      <div class="row mb-3" >
        <label for="Length" class="col-sm-2 col-form-label">Length (cm)</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="Length" id="Length" placeholder="" 
        oninput="validateNumberField(length)" onclick="cancelErrorMessage(dimensions_desc);">
      </div>
      </div>
      <div class="description" id="dimensions_desc">
        
      </div> 
    </div>

      </div>
    </div>
  </main>
</div>
</form>
  
   <script>
     let price = document.getElementById("Price");
     let name = document.getElementById("Name");
     let sku = document.getElementById("SKU"); 
     let switcher = document.getElementById("switcher"); 
     let dvd = document.getElementById("DVD");
     let book = document.getElementById("Book");
     let furniture = document.getElementById("Furniture"); 
     let sku_desc = document.getElementById('sku_desc');
     let name_desc = document.getElementById('name_desc');
     let price_desc = document.getElementById('price_desc');
     let size_desc = document.getElementById('size_desc');
     let weight_desc = document.getElementById("weight_desc");
     let switcher_validation_message = document.getElementById("switcher_validation_message");
     let size = document.getElementById('Size');
     let weight = document.getElementById('Weight');
     let height = document.getElementById('Height');
     let width = document.getElementById('Width');
     let length = document.getElementById('Length');
     let dimensions_desc = document.getElementById("dimensions_desc")
     function cancelErrorMessage(element){
    if(element.innerHTML) element.innerHTML ="";
     } 
     switcher.addEventListener('change', (event) => {
    let el = event.target.options.selectedIndex;
    
    let svm = document.getElementById("switcher_validation_message");
    
    cancelErrorMessage(svm);

   switch (el){
     case 1: 
     dvd.hidden = false;
     book.hidden = true;
     furniture.hidden = true;
     break;
     case 2: 
     dvd.hidden = true;
     book.hidden = false;
     furniture.hidden = true;
     break;
     case 3: 
     dvd.hidden = true;
     book.hidden = true;
     furniture.hidden = false;
     break;
     default: 
     dvd.hidden = true;
     book.hidden = true;
     furniture.hidden = true;
 }
 


});

 
  function validatePrice(){               
      price.value = price.value.replace(/^\.|[^\d\.]|\.(?=.*\.)|^0+(?=\d)/g, '');
  };
  function validateName(){         
    name.value = name.value.replace(/^\.|[\d\s\W]/g, '');
  };

  function validateSKU(){
    sku.value = sku.value.replace(/^\.|[\s\W]/g, '');
  }
  function validateNumberField(element){      
      element.value = element.value.replace(/^\.|[\D]|^0+(?=\d)/g, '');
  };
  function validateForm(){  
    if(!sku.value){
      sku_desc.innerHTML='Please provide unique SKU of product';
      return false;
    }  
    if(!name.value){
      name_desc.innerHTML='Please provide name of product';
      return false;
    }  
    if(!price.value){
      price_desc.innerHTML='Please provide price of product';
      return false;
    }  
switch(switcher.value){
  case "Type Switcher":
  switcher_validation_message.innerHTML="Please select type product";
return false;
  case "DVD":  
  if(!size.value){
    size_desc.innerHTML="Please provide disk size (mb)";
  return false;
  } else return true;
  case "Book":  
  if(!weight.value){
    weight_desc.innerHTML="Please provide book weight (kg)";
  return false;
  } else return true;
  case "Furniture":  
  if(!height.value || !width.value || !length.value){
    dimensions_desc.innerHTML="Please provide dimensions in HxWxL format";
  return false;
  } else return true;
}

  }

   </script>
   
 
