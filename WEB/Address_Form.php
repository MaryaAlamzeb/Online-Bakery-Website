<!DOCTYPE html>
<html>
<head>
  <title></title>
   <link rel="stylesheet"  href="stylesheet.css">
</head>
<body>
  <script type="text/javascript">function orderplaced() {
            alert ("Your order is confirmed.");
         }</script>
         <?php
include ('includes/config.php'); 
include('includes/customer_header.php');
?>
<div class="div1">
  <h1><i>"If you keep good food in your fridge, you will eat good food"</i></h1>
</div>
  <div class="center">
    <div id="EditProducts">Personal Detail</div><br><br>
<form action="Address_action.php" method="POST">  
	
    <label>Name</label>
   <input type="text" name="fname" ><br>
  <label for="em">Email:</label>
   <input type="email" name="email" id= "em"><br>
   <label for="ad">Address</label>
   <input type="text" name="address" id= "ad"><br>
    <label for="ln">Payment Method</label>
   <input type="text" name="cod"><br>
    <label for="mn">Contact no:</label>
   <input type="text" name="mn" id= "mn" placeholder="0300********"><br>
    <label for="nic">Cnic:</label>
   <input type="text" name="nic" id= "nic" placeholder="12**-********-*"><br><br>
  <input id="editbutton" onclick="orderplaced()" type="submit" name="submit" value="Submit">  
</form>
</div>
</body>
</html>