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
$sql='SELECT * FROM product where id =?';
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
$stmnt->bind_result ($id,$PName,$Pcategory,$Quantity,$Price,$ExpiryDate,$image);
while ($stmnt->fetch())
{
    $pname=$PName;
    $ctg=$Pcategory;
    $qty=$Quantity;
    $price=$Price;
    $exp=$ExpiryDate;
    $img=$image;
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
      <form action="EditProducts_action.php" method="POST" > 
  <input type="hidden" name ="pid" value = "<?php echo $pid ?>"/><br><br>
<label >Product Name</label>
<input type="text" name ="pname" value="<?php echo $pname?>" ><br><br>
<label for="pctg">Product Category</label>
<input type="text" name ="pctg" id="pctg" value="<?php echo $ctg ?>"><br><br>
<label for="pqty">Product Quantity</label>
<input type="text" name ="pqty" id = "pqty" value="<?php echo $qty ?>"><br><br>
<label>Product Price</label>
<input type="text" name ="price" value="<?php echo $price ?>" ><br><br>
<label>Expiry Date</label>
<input type="Date" name ="exp" value="<?php echo $exp ?>" ><br><br>
<label>Product Image</label>
<input type="img" name ="img" value="<?php echo $image ?>" ><br><br>
<input id="editbutton" type="submit" value= "Update Button" name="save">
      </form>
  </div>
    </body>
    </html>

  


