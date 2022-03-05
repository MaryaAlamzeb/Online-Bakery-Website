<?php

include('includes/config.php');

if (isset($_SESSION['loggedin']))
{

  if ($_SESSION["type"]=='Admin')
  {
    ?>
<!DOCTYPE html>
<html>
<head>
<title></title>
   <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
   <?php include('includes/admin_header.php')?>
   <div class="div1">
  <h1><i>"If you keep good food in your fridge, you will eat good food"<br> -Cake Corner</i></h1>
</div>
        <div class="center">
          <div id="EditProducts">Add Order</div><br><br>
<form method="post" action="AddOrders_action.php">  
 <label >Customer Name</label>
<input type="text" name ="cust" ><br><br>
<label >Product Name</label>
<input type="text" name ="pname"><br><br>
<label >Email</label>
<input type="text" name ="em"><br><br>

<label for="ctg">Price</label>
<input type="text" name ="price"><br><br>
<label for="qty">Quantity</label>
<input type="text" name ="qty"><br><br>
<label>Total</label>
<input type="text" name ="total"><br><br>
<label>Address</label>
<input type="text" name ="ad"><br><br>
<label>Payment Method</label>
<input type="text" name ="pm"><br><br>
<label>Contact</label>
<input type="text" name ="cont"><br><br>
<label>CNIC</label>
<input type="text" name ="cnic"><br><br>



  <input id="editbutton" type="submit" name="submit" value="Add">  
</form>
</div>

<?php

if (isset($_GET['status']))
{
  if ($_GET['status']=='NIC')
  {
     echo '<script>alert("Incorrect NIC Format. Please follow the 14 digit format 12345-678890-1")</script>';

  }
  else if ($_GET['status']=='Fill')
  {
     echo '<script>alert("Please Fill the required fields")</script>';
    

  }
}
?>
</body>
</html>
<?php
}
}
else
{
  header("Location: landing.html?status=LF");
}
?>