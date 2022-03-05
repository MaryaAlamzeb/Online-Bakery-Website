<?php
include ('includes/config.php');
if(isset($_POST['update']))
{
if (isset($_SESSION['loggedin']))
{
  if ($_SESSION["type"]=='Admin')
  {
    $id=$_POST['pid'];
$pname=$_POST['pname'];
$em=$_POST['em'];
$ad=$_POST['ad'];
$price=$_POST['price'];
$total=$_POST['total'];
$qty=$_POST['qty'];
$cust=$_POST['cust'];
$pm=$_POST['pm'];
$cont=$_POST['cont'];
$cnic=$_POST['cnic'];
$fn=$_POST['cust'];
$conn = new mysqli ($DBServer, $DBUser, $DBPass,$DBName);
if($conn->connect_error)
{
  trigger_error('Database connection failed: ' .
$conn->connect_error, E_USER_ERROR);
}
else 
{
  echo "connected";
}
$sql='UPDATE orders SET  PName=?, Price=?, Qty=?, Total=?, CName=?, email=?, address=?, paymentmethod=?, contact=?, cnic=? WHERE id =?';
$stmnt=$conn->prepare($sql);
if($stmnt==false)
{
  trigger_error('Wrong SQL Insertion: ' . $stmnt .' Error: ' . $conn->error, E_USER_ERROR);
}
else
{
  $stmnt->bind_param('ssssssssssi',$pname,$price,$qty,$total,$fn,$em,$ad,$pm,$cont,$cnic,$id);
$stmnt->execute();
//echo mysqli_affected_rows($conn);
$stmnt->close();
$conn->close();
 header("Location: ManageOrders.php?status=PU");
}
}
}
}
 ?>