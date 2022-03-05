<?php
include ('includes/config.php');
$pid=$_POST['pid'];
$pname=$_POST['pname'];
$qty=$_POST['pqty'];
$price=$_POST['price'];
$total=$qty*$price;
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

$sql='UPDATE cartt SET  PName=?, Qty=?, Price=?,  Total=? WHERE id =?';

$stmnt=$conn->prepare($sql);

if($stmnt==false)
{
  trigger_error('Wrong SQL Insertion: ' . $stmnt .' Error: ' . $conn->error, E_USER_ERROR);
}
else
{
  
  $stmnt->bind_param('siisi',$pname,$qty,$price,$total,$pid);
$stmnt->execute();
//echo mysqli_affected_rows($conn);


$stmnt->close();
$conn->close();


 header("Location: VC2.php?status=PU");
}


 ?>
  


