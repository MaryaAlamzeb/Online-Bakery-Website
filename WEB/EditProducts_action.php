<?php
include ('includes/config.php');
if(isset($_POST['update']))
{
if (isset($_SESSION['loggedin']))
{
  if ($_SESSION["type"]=='Admin')
  {
$pid=$_POST['pid'];
$pname=$_POST['pname'];
$ctg=$_POST['pctg'];
$qty=$_POST['pqty'];
$price=$_POST['price'];
$exp=$_POST['exp'];
$img=$_POST['img'];
$conn = new mysqli ($DBServer, $DBUser, $DBPass,$DBName);
if($conn->connect_error)
{
  trigger_error('Database connection failed: ' .
$conn->connect_error, E_USER_ERROR);
}
else 
{
  
}
$sql='UPDATE product SET  PName=?, Pcategory=?, Quantity=?, Price=?,  ExpiryDate=?, image=? WHERE id =?';
$stmnt=$conn->prepare($sql);
if($stmnt==false)
{
  trigger_error('Wrong SQL Insertion: ' . $stmnt .' Error: ' . $conn->error, E_USER_ERROR);
}
else
{
  $stmnt->bind_param('ssiissi',$pname,$ctg,$qty,$price,$exp,$img,$pid);
$stmnt->execute();
//echo mysqli_affected_rows($conn);
$stmnt->close();
$conn->close();
 header("Location: ManageProducts.php?status=PU");
}
}
}
}
 ?>