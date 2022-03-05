<?php
include ('includes/config.php');
$id=$_GET["id"];
$conn = new mysqli ($DBServer, $DBUser, $DBPass,$DBName);
if($conn->connect_error)
{
  trigger_error('Database connection failed: ' .
$conn->connect_error, E_USER_ERROR);
}
else 
{
  echo "database connection successfull\n";
}
$sql='DELETE FROM cartt WHERE id =?';
$stmnt=$conn->prepare($sql);
if($stmnt==false)
{
  trigger_error('Wrong SQL Insertion: ' . $stmnt .' Error: ' . $conn->error, E_USER_ERROR);
}
else
{
  $stmnt->bind_param('i',$id);
$stmnt->execute();
//echo mysqli_affected_rows($conn);
$stmnt->close();
$conn->close();
 header("Location: VC2.php");
}

 ?>