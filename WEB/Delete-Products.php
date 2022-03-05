<?php
include ('includes/config.php');
if (isset($_SESSION['loggedin']))
{
  if ($_SESSION["type"]=='Admin')
  {
$id=$_GET["id"];
$conn = new mysqli ($DBServer, $DBUser, $DBPass,$DBName);
if($conn->connect_error)
{
trigger_error('Database connection failed: ' .
$conn->connect_error, E_USER_ERROR);
}
else 
{ 
}
$sql='DELETE FROM product WHERE id =?';
$stmt=$conn->prepare($sql);
if($stmt==false)
{
  trigger_error('Wrong SQL Insertion: ' . $stmt .' Error: ' . $conn->error, E_USER_ERROR);
}
else
{
$stmt->bind_param('i',$id);
$stmt->execute();
//echo mysqli_affected_rows($conn);
$stmt->close();
$conn->close();
header("Location: ManageProducts.php?status=PD");
}
}
}
?>