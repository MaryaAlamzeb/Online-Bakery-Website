<?php

include('includes/config.php');

if (isset($_SESSION['loggedin']))
{

  if ($_SESSION["type"]=='Admin')
  {
    $pid=$_GET["id"];
    $pname="";
    $ctg="";
    $qty="";
    $price="";
    $exp="";
    $img="";  
//echo $pid;
$conn = new mysqli ($DBServer, $DBUser, $DBPass,$DBName);
if($conn->connect_error)
{
  trigger_error('Database connection failed: ' .
$conn->connect_error, E_USER_ERROR);
}
else 
{

}
$sql='SELECT * FROM orders where id =?';
$stmnt=$conn->prepare($sql);
if($stmnt==false)
{
  trigger_error('Wrong SQL Insertion: ' . $stmnt .
' Error: ' . $conn->error, E_USER_ERROR);
}
if($stmnt==true)
{
  $stmnt->bind_param('i',$pid);
$stmnt->execute();
$stmnt->store_result();
if ($stmnt->num_rows > 0)
{
$stmnt->bind_result ($id,$PName, $Price, $Qty, $Total, $CName, $email, $address, $paymentmethod, $contact, $cnic);
while ($stmnt->fetch())
{
    $pname=$PName;
    $em=$email;
    $price=$Price;
    $qty=$Qty;
    $total=$Total;
    $ad=$address;
    $cust=$CName;
    $pm=$paymentmethod;
    $cont=$contact;
    $cnic=$cnic;
}
}
$stmnt->free_result();
$stmnt->close();
$conn->close();
}
}
}
?>
    <!DOCTYPE html>
    <html>
    <head>
      <title> Edit-Action</title>
      <meta charset="utf-8">
    <meta name="viewport" content="width-device-width">
    <link rel="stylesheet"  href="stylesheet.css">
    </head>
    <body >
      <?php include('includes/admin_header.php')?>
      <div class="div1">
  <h1><i>"If you keep good food in your fridge, you will eat good food"</i></h1>
</div>
        <div class="center">
          <div id="EditProducts">Edit Products</div>
      <form action="Edit-orders_action.php" method="POST" > 
  <input type="hidden" name ="pid" value = "<?php echo $pid ?>"/><br><br>
  <label >Customer Name</label>
<input type="text" name ="cust" value="<?php echo $cust?>" ><br><br>
<label >Product Name</label>
<input type="text" name ="pname" value="<?php echo $pname?>" ><br><br>
<label >Email</label>
<input type="text" name ="em" value="<?php echo $em?>" ><br><br>

<label for="ctg">Price</label>
<input type="text" name ="price" id="pctg" value="<?php echo $price ?>"><br><br>
<label for="qty">Quantity</label>
<input type="text" name ="qty" id = "pqty" value="<?php echo $qty ?>"><br><br>
<label>Total</label>
<input type="text" name ="total" value="<?php echo $total ?>" ><br><br>
<label>Address</label>
<input type="text" name ="ad" value="<?php echo $ad ?>" ><br><br>
<label>Payment Method</label>
<input type="text" name ="pm" value="<?php echo $pm ?>" ><br><br>
<label>Contact</label>
<input type="text" name ="cont" value="<?php echo $cont ?>" ><br><br>
<label>CNIC</label>
<input type="text" name ="cnic" value="<?php echo $cnic ?>" ><br><br>
<input id="editbutton" type="submit" value= "Update Button" name="save">
      </form>
  </div>
    </body>
    </html>

  

