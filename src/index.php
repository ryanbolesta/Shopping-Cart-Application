<!--    Name:       	Ryan Bolesta
		Major:			CS/SD
        Creation Date:  September 11, 2017
		Due Date:		November 15, 2017
        Course:     	CSC242
        Professor Name: Dr. Tan
        Assignment: 	Shopping Cart (#3)
        Filename:   	index.php
        Purpose:    Home page for snowboard shop that now features a shopping 
					cart. The cart can be viewed by clicking the "View Cart" 
					link. Items can be added to the cart from the product pages
					which can be accessed from the links or by the dropdown-->
<html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ShredShop</title>
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
        <span id="selectCategory">
			Category: 
			<select>
			  <option value="---">---</option>
			  <option value="Snowboards">Snowboards</option>
			  <option value="Boots">Boots</option>
			</select>
		</span> 
        <?php //get the number of items in the cart
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
			$cartNumber = $shoppingCartLocal->countItemsQty();
			echo "<a href='cart.php'><img id='cartImage' src='images/cart.png'><span id='cartNumber'>$cartNumber</span></a>";
            }
            ?>           	
	</div>
</div>
		<div id="mainContent">
		<div id="imgHeader">
		<img id="snowboarderImg" src="images/alpine-snowboard.jpg" alt="snowboarder">
		<div id="storeDescription">Shred Shop is committed to bringing you quality snowboarding products to help you shred the mountain. To get started, click one of the links below to view our products.</div>
        </div>
		<table id="productLinks"> <!-- Contains links for the product categories -->
            <tr>
                <td><a id="snowboards" href="catalog.php?category=Snowboards">Snowboards</a></td>
                <td><img class="productImage" src="images/snowboarder.png" alt="snowboards"> </td>
                <td><a id="boots" href="catalog.php?category=Boots">Boots</a></td>
                <td><img class="productImage" src="images/boot.png" alt="boots"></td>
            </tr>
         </table>
		 </div>
     
	  <footer>NOTE: This is a school project and not a real shopping website, all images are from the-house.com</footer>
	  
</div>

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

</body>
</html>