<header>    
    <nav class="navbar">      
        <a class="navbar-brand">Product list</a>
        <div class="d-flex">
        <form  action="add_form.php" method="post">
          <button class="btn btn-outline-success mr-2"  type="submit" name="add" id="submit" >Add</button>
          </form>
          <form action="delete.php" method="post">
          <button class="btn btn-outline-success" type="submit" name="delete" >Mass delete</button>      
              
     </div>
    </nav>
  </header>
  <main class="flex-shrink-0 mt-5">
  
    <div class="row mx-3">
      <?php
           include 'scripts/views/'. $content_dvd;
           include 'scripts/views/'. $content_book;   
           include 'scripts/views/'. $content_furniture;          
    
      ?>    
     
  
    </div>
  </main>
</form>
