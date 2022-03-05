<!DOCTYPE html>
<html>
<head>
  <title>forget Pass-action</title>
 </head>
<body>
</body>
</html>
<?php
include('includes/config.php');
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
//echo "Control Check 1";
if (isset ($_POST['submit']))
{
		//$_SESSION["loggedin"]=true;
//echo "Control Check 2";
$email=$_POST['email'];
$pass=$_POST['pass'];
}
else
  echo "Submit not clicked";
$sql='SELECT * FROM users WHERE Email=?';
$stmnt=$conn->prepare($sql);
if($stmnt===false)
{
	trigger_error('Wrong SQL for Selection: ' . $stmnt .
' Error: ' . $conn->error, E_USER_ERROR);
}
else
echo "Prepared statement connection successful";
$stmnt->bind_param('s',$email);
$stmnt->execute();
$stmnt->store_result();
if($stmnt->num_rows>0)
{
	$hpwd=password_hash($pass, PASSWORD_DEFAULT);
$sql="UPDATE users set Password='$hpwd' where Email='$email'";
$qry=$conn->query($sql);
if($qry===false)
{
  echo" Error , the password could not be changed";
}
}
header("Location: landing.html?status=PU");
$stmnt->close();
$conn->close();
?>