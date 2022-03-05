<?php

include('includes/config.php');
  if ($_SESSION["type"]=='Customer')
  {
if (isset($_SESSION['loggedin']))
{


    $pid=$_GET["id"];
    $pname="";
    $ctg="";
    $qty="";
    $price="";
    $exp="";
    
//echo $pid;
$conn = new mysqli ($DBServer, $DBUser, $DBPass,$DBName);

if($conn->connect_error)
{
  trigger_error('Database connection failed: ' .
$conn->connect_error, E_USER_ERROR);

}

else 
{
  //echo "database connection successfull\n";
}




$sql='SELECT * FROM cartt where id =?';


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
$stmnt->bind_result ($id, $PName,$Qty,$Price,$Total,$cid);



while ($stmnt->fetch())
{



    $pname=$PName;
    
    $qty=$Qty;
    $price=$Price;
    $total=$Total;

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
    
      <?php include('includes/customer_header.php')?>
      <div class="div1">
  <h1><i>"If you keep good food in your fridge, you will eat good food"</i></h1>
</div>
      <div class="center">
      <div id="EditProducts">Edit Products</div>
      <form action="Edit-Cart-Action.php" method="POST" > 



  <input type="hidden" name ="pid" value = "<?php echo $pid ?>"/ readonly><br><br>

<label >Product Name</label>
<input type="text" name ="pname" value="<?php echo $pname?>" readonly><br><br>



<label for="pqty">Product Quantity</label>
<input type="text" name ="pqty" id = "pqty" value="<?php echo $qty ?>"><br><br>

<label>Product Price</label>
<input type="text" name ="price" value="<?php echo $price ?>" readonly><br><br>

<label>Total</label>
<input type="text" name ="exp" value="<?php echo $total ?>" readonly ><br><br>

<input id="editbutton" type="submit" value= "Update Button">




      </form>
  </div>
    </body>
    </html>

  


