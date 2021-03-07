<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">

    <title>Product list</title>
	<meta name="keywords" content="products">
    <meta name="description" content="products">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' 
	integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="styles/style1.css"/>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' 
integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'
integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' 
integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>

	<script src="scripts/script1.js"></script>

  </head>
  <body class="d-flex flex-column h-100">
    <header>    
    <nav class="navbar">      
        <a class="navbar-brand">Product list</a>
        <div class="d-flex">
        <form  action="product_add.html" method="post">
          <button class="btn btn-outline-success mr-2"  type="submit" name="add" id="submit" >Add</button>
          </form>
          <form action="scripts\delete.php" method="post">
          <button class="btn btn-outline-success" type="submit" name="delete" >Mass delete</button>      
     </div>
    </nav>
  </header>
  <main class="flex-shrink-0 mt-5">
  
    <div class="row mx-3">
      <?php
           include "scripts\conDB.php";
           include "scripts\QueryBuilder.php";
           $query = new QueryBuilder(new DBConnector());
           $query->selectAll(["DVD", "Book", "Furniture"]);
           
      ?>    
     
  
    </div>
  </main>
</form>
   <footer class="footer mt-3 py-3">
     <div class="text-center">
     <span class="">Scandiweb Test assigment</span>
    </div>
   </footer>

  </body>
</html>