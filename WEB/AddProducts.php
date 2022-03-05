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
      <script >
     
function alert()
{
alert(" Products added successfully");
}
   </script>
</head>
<body>
   <?php include('includes/admin_header.php')?>
   <div class="div1">
  <h1><i>"If you keep good food in your fridge, you will eat good food"</i></h1>
</div>
        <div class="center">
          <div id="EditProducts">Add Products</div><br><br>
<form method="post" action="AddProducts_action.php" enctype="multipart/form-data">  
  <label for="pn">Product Name</label>
  <input type="text" name="pname" id= "pn"><br><br>
  <label for="ctg">Category</label>
  <input type="text" name="ctg" id= "ln"><br><br>
  <label for="qty">Quantity</label>
  <input type="text" name="qty" id= "qty"><br><br>
  <label for="price">Price</label>
  <input type="text" name="price" id= "price"><br><br>
  <label for="exp">Expiry Date</label>
  <input type="Date" name="exp" id= "exp"><br><br>
  <label for="img">Product Image</label>
  <!--<Button  type="submit" formaction="UploadFile.php"> Upload Image </Button><br><br>-->
   <input type="file" name="file">
   <br><br>
  <input id="editbutton" type="submit" name="submit" value="Add" onclick="alert()">  
</form>
</div>
</body>
</html>
<?php
}
}
else
{
  header("Location: landing.php?status=LF");
}

if (isset($_GET['status']))
{
  if ($_GET['status']=='PR')
  {
     echo '<script>alert("Your Password does not match the format ")</script>';

  }
  else if ($_GET['status']=='Fill')
  {
     echo '<script>alert("Please Fill the required fields")</script>';
    

  }
}
?>