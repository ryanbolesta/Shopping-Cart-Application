<!--    Name:       	Ryan Bolesta
		Major:			CS/SD
        Creation Date:  October 11, 2017
		Due Date:		November 15, 2017
        Course:     	CSC242
        Professor Name: Dr. Tan
        Assignment: 	Shopping Cart (#3)
        Filename:   	cart.php
        Purpose:    	The cart page for the application. Supports
						adding to cart, removing from cart, or updating the
						quantity.-->

<html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ShredShop - Your Cart</title>
	<link rel="stylesheet" href="css/shoppingCart.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  
  <body>
  <div class="wrapper">
   <div id="storeTop">
    <div id="header">
      <div id="storeHead">
        <h1>Shred Shop</h1>
      </div> 
      <div id="information"> <!-- Contains information for the class -->
        <pre> 
            Ryan Bolesta
            CSC242
            Dr. Tan
            September 2017
        </pre>
      </div>
    </div>

    <div id="navigation">
        <a href="index.php">Back To Home Page</a>
		<span id="selectCategory">
		Category: 
		<select id="category" class="linkHigh">
          <option value="---">---</option>
          <option value="Snowboards">Snowboards</option>
          <option value="Boots">Boots</option>
		</select>
		</span>		
	</div>
	</div>   
    <h2>Your Shopping Cart</h2>


<?php  //Code used from csit.kutztown.edu/~tan/lab
session_start(); // Start the session 

require_once('item.php'); // item object 
require_once('cartSession.php'); // ShoppingCart object 
     
$shoppingCartLocal; // local variable for shoppingCart 

if (isset($_SESSION["shoppingCart"])) 
{ 
    // var_dump($_SESSION["shoppingCart"]); 
    // print_r($_SESSION["shoppingCart"]); 
     
    // a serialized session need to be unserialized back to the object 
    $shoppingCartLocal = unserialize($_SESSION["shoppingCart"]); 
} 
else  
    $shoppingCartLocal = new ShoppingCart(); 
     
// check form post method "Add to Cart" from product page 
if (isset($_POST["pid"]) && isset($_POST["name"]) && isset($_POST["price"])) 
{ 
    $pid = htmlspecialchars($_POST["pid"]);  
    $name = htmlspecialchars($_POST["name"]);  
    $price = htmlspecialchars($_POST["price"]);  

    // add new item to shoppingCart & update shoppingCart session 
    // need to serialize the object to be used in session 
    $_SESSION["shoppingCart"] = serialize($shoppingCartLocal->addItem(new Item($pid, $name, $price)));  
}     

// check form get method within cart page itself -> remove the item in shoppingCart 
if (isset($_GET["remove"]))  
    $_SESSION["shoppingCart"] = serialize($shoppingCartLocal->deleteItem(htmlspecialchars($_GET["pid"]))); 

// check form get method within cart page itself -> update the item in shoppingCart 
if (isset($_GET["update"]) && isset($_GET["qty"])) { 
    $_SESSION["shoppingCart"] = serialize($shoppingCartLocal->updateItemByPid(htmlspecialchars($_GET["pid"]), htmlspecialchars($_GET["qty"]))); 
} 
     
// Show the shoppingCart contents using print method from shoppingcart object 
echo "<span>Count: " . $shoppingCartLocal->countItemsQty() . "</span>"; 
echo '<div class="box">'; 
$shoppingCartLocal->PrintShoppingCart(); 
echo '</div>'; 
?> 
       <footer>All images found on the-house.com | This is a school project, not a real shopping site</footer>
      </div>
    </body>
	
<script>
	//Go to page specified in the select dropdown
	$(document).ready(function(){
		$('select').change(function() {
		if($('select').val() !== '---'){
			window.location = "catalog.php?category=" + $('select').val();
		}
		});
	});

</script>
</html>