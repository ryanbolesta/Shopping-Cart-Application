<!--    Name:       	Ryan Bolesta
		Major:			CS/SD
        Creation Date:  November 9, 2017
		Due Date:		November 15, 2017
        Course:     	CSC242
        Professor Name: Dr. Tan
        Assignment: 	Shopping Cart (#3)
        Filename:   	catalog.php
        Purpose:    	The catalog page for the application. The page will show
						a list of products from the chosen category by querying
						the database through PHP to retrieve the specified items.
						The items will display with an image, title, price, and 
						an optional description by clicking the "View More" button-->

  <html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ShredShop - Catalog</title>
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
		<span id="cartNav">
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
				echo "<a id='cartLink' href='cart.php'><img id='cartImage' src='images/cart.png'><span id='cartNumber'>$cartNumber</span></a>";
			   
				}
			 ?>			
	</div>
	</div>
    
	<?php
		require_once 'login.php';
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		
		$category = htmlspecialchars($_GET["category"]);
		echo "<h2 align='center'>$category</h2>";
		//Query the Database for the specified category stored in $category
		$query  = sprintf("SELECT * FROM Products WHERE Category='%s'", $category);
		$result = $conn->query($query);
		if (!$result) die ("Database access failed: " . $conn->error);
		$rows = $result->num_rows;
		//create table with results from the query
		echo "<table id='productList'><tr class='tableHead'>
                <th colspan='2'>Product</th>
                <th>Price</th>
                <th colspan='2'>Action</th>
            </tr>";
		for ($j = 0 ; $j < $rows ; ++$j) //Iterate through results and populate table
		{
			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_NUM);
			echo "<tr>
					<td><img class='productImage' src='$row[4]'></td>
					<td>$row[1]
					<span class='descriptions'><br>$row[5]<span>
					
					</td>
					<td>$row[3]</td>
					<td> <button onclick=viewMore($j)>View More</td>
					<td> <form class='productForm' action='cart.php' method='post'> 
						<input type='hidden' name='pid' value='$row[0]' >
						<input type='hidden' name='name' value='$row[1]'> 
						<input type='hidden' name='price' value='$row[3]'> 
                    <button type='submit' value='Add query strings'>Add To Cart</button>
					</form> 
					</td>
				</tr>";
		}
		echo "</table>";
	?>
	<footer>All images found on the-house.com | This is a school project, not a real shopping site</footer>
</div>
      
 <script>
		//Display description when clicking on the view more button
		function viewMore(index){ 
			var x = document.getElementsByClassName("descriptions")[index];
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
	
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