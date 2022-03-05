s<?php
include ('includes/config.php');
if (isset($_POST['update'])) {
if (isset($_SESSION['loggedin']))
{
  if ($_SESSION["type"]=='Admin')
  {
$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$city=$_POST['city'];
$type=$_POST['type'];
$conn = new mysqli ($DBServer, $DBUser, $DBPass,$DBName);
if($conn->connect_error)
{
trigger_error('Database connection failed: ' .
$conn->connect_error, E_USER_ERROR);
}
else 
{ 
}
$sql='UPDATE users SET  name=?, email=?, city=?, type=? WHERE id =?';
$stmnt=$conn->prepare($sql);
if($stmnt==false)
{
  trigger_error('Wrong SQL Insertion: ' . $stmnt .' Error: ' . $conn->error, E_USER_ERROR);
}
else
{
$stmnt->bind_param('ssssi',$name,$email,$city,$type,$id);
$stmnt->execute();
$stmnt->close();
$conn->close();
header("Location: ManageCustomers.php?status=CU");
}
}
}
}
 ?>