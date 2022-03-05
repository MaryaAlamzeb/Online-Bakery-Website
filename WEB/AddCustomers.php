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
  <h1><i>"If you keep good food in your fridge, you will eat good food"</i></h1>
</div>
        <div class="center" >
          <div id="EditProducts">Add Customer</div><br><br>
<form method="post" action="AddCustomers_action.php">  
  <label>Name</label>
  <input type="text" name="name"><br><br>
  <label>Email</label>
  <input type="text" name="email"><br><br>
  <label>Password</label>
  <input type="text" name="pass"><br><br>
  <label>City</label>
  <input type="text" name="city"><br><br>
  <label>Type</label>
  <input type="text" name="type" value="Customer" readonly><br><br>
  <input id="editbutton" type="submit" name="submit" value="Add">  
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
