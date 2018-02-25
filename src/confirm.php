<!--    Name:       	Ryan Bolesta
		Major:			CS/SD
        Creation Date:  December 4, 2017
		Due Date:		December 8, 2017
        Course:     	CSC242
        Professor Name: Dr. Tan
        Assignment: 	Shopping Cart (#4)
        Filename:   	confirm.php
        Purpose:    Order confirmation page. Retrieved user entered information
					from customer.html and displays it to the user. If the 
					user says the information is correct, they can proceed to 
					payment. -->
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
        <div id="confirmDialogue">
            <h2>Confirm Information</h2>
            <h3>If the information below is correct, click "Proceed to Payment"</h3>
        </div>
        <form method='POST' action='http://csit.kutztown.edu/~tan/projects/display.php'>
          
        <?php   
					//Retrieve form inputs
                    $FName = $_POST['FName'];
                    $LName = $_POST['LName'];
                    $Phone = $_POST['Phone'];
                    $Addr1 = $_POST['Addr1'];
                    $Addr2 = $_POST['Addr2'];
                    $City = $_POST['City'];
                    $State = $_POST['State'];
                    $Zip = $_POST['Zip'];
                    $EMail = $_POST['EMail'];
          
					//Create readonly inputs to display previous inputs to user
                    echo"<label for='FName'>First Name:  </label>
                    <input type='text' name='FName' value=\"$FName\" readonly>
                    <br>
                    <label for='LName'>Last Name:   </label>
                    <input type='text' name='LName' value=\"$LName\" readonly>
                    <br>
                    <label for='Phone'>Telephone Number</label>
                    <input type='text' name='Phone' value=\"$Phone\" readonly>
                    <br>
                    <label for='Addr1'>Address 1:   </label>
                    <input type='text' name='Addr1' value=\"$Addr1\" readonly>
                    <br>
                    <label for='Addr2'>Address 2:   </label>
                    <input type='text' name='Addr2' value=\"$Addr2\" readonly>
                    <br>
                    <label for='City'>City:     </label>
                    <input type='text' name='City' value=\"$City\" readonly>
                    <br>
                <label for='State'>State:   </label>
                    <input type='text' name='State' value=\"$State\" readonly>
                    <br>
                    <label for='Zip'>Zip Code:      </label>
                    <input type='text' name='Zip' value=\"$Zip\" readonly>
                    <br>
                    <label for='EMail'>E-Mail Address:  </label>
                    <input type='text' name='EMail' value=\"$EMail\" readonly>
                    <br>
		
            <button type='submit'>Proceed to Payment</button>"
            ?>
      </form>
	  
	</div>
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