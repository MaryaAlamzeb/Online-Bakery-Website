<?php
include ('includes/config.php');
$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$city=$_POST['city'];
$type=$_POST['type'];
$pass=$_POST['pass'];
$_SESSION['name']=$name;
if (isset($_POST['update'])) {
if (isset($_SESSION['loggedin']))
{
  if ($_SESSION["type"]=='Admin')
  {

$conn = new mysqli ($DBServer, $DBUser, $DBPass,$DBName);
if($conn->connect_error)
{
trigger_error('Database connection failed: ' .
$conn->connect_error, E_USER_ERROR);
}
else 
{ 
}
$sql='UPDATE users SET  name=?, email=?, password=? ,city=?,  type=? WHERE id =?';
$stmnt=$conn->prepare($sql);
if($stmnt==false)
{
  trigger_error('Wrong SQL Insertion: ' . $stmnt .' Error: ' . $conn->error, E_USER_ERROR);
}
else
{  
$stmnt->bind_param('sssssi',$name,$email,$pass,$city,$type,$id);
$stmnt->execute();
//echo mysqli_affected_rows($conn);
$stmnt->close();
$conn->close();
header("Location: dashboared_admin.php?status=PFU");
}
}
}
else
{
  header("Location: landing.html");
}
}
if (isset($_POST['cpass'])) {
  if (isset($_SESSION['loggedin']))
{
  if ($_SESSION["type"]=='Admin')
  {
  $id=$_POST['id'];
  $op=$_POST['op'];
  $np=$_POST['np'];
$conn = new mysqli ($DBServer, $DBUser, $DBPass,$DBName);
if($conn->connect_error)
{
trigger_error('Database connection failed: ' .
$conn->connect_error, E_USER_ERROR);
}
else 
{ }
$sql='SELECT * FROM users WHERE id=?'; 
$stmnt=$conn->prepare($sql);
$stmnt->bind_param('i',$id);
$stmnt->execute();
$stmnt->store_result();
$stmnt->bind_result($id,$name,$email,$password,$city,$type);
if($stmnt->num_rows>0)
{
  echo "result found";
  
 
while ($stmnt -> fetch()) 
{
  $verified=password_verify($op, $password);
     if($verified)
   {
      $sql='UPDATE users SET  name=?, email=?, password=? ,city=?,  type=? WHERE id =?';


$stmnt=$conn->prepare($sql);
$hpwd=password_hash($np, PASSWORD_DEFAULT);
$stmnt->bind_param('sssssi',$name,$email,$hpwd,$city,$type,$id);
$stmnt->execute();
if($stmnt===false)
{
  trigger_error('Wrong SQL for Selection: ' . $stmnt .
' Error: ' . $conn->error, E_USER_ERROR);
}

   }
 }
}
header("Location: dashboared_admin.php?status='PU'");
$stmnt->close();
$conn->close();
}
else{
  header("Location: dashboared_admin.php?status='PNM'");
}
}
}
if (isset($_POST['del'])) {
if (isset($_SESSION['loggedin']))
{
  if ($_SESSION["type"]=='Admin')
  {
    $conn = new mysqli ($DBServer, $DBUser, $DBPass,$DBName);
if($conn->connect_error)
{
trigger_error('Database connection failed: ' .
$conn->connect_error, E_USER_ERROR);
}
else 
{ 
}
$sql='DELETE FROM users WHERE id =?';
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
header("Location: landing.html?status=AD");
}
  }
}
}
?>