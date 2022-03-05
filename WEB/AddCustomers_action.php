<?php
include('includes/config.php');
if (isset($_POST['submit'])) {
if (isset($_SESSION['loggedin']))
{
	if ($_SESSION["type"]=='Admin')
	{
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title> AddCustomers</title>
			<meta charset="utf-8">
		<meta name="viewport" content="width-device-width">
		</head>
		<body>
			<?php include('includes/admin_header.php')?>
		</body>
		</html>
<?php
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

	function validate($data) {
	if(empty($data))
	{
echo"Please Fill the required fields";
header("Location: AddCustomers.php?status=Fill");
exit();

}
else
 $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
	
}

function valid_pass($pass)
{
	if(!preg_match('/^(?=.\d)(?=.[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $pass)) 
	{
    echo 'the password does not meet the requirements!';
   
    header("Location: AddCustomers.php?status=PR");
     exit();
}
}

$name=validate($_POST['name']);
$email=validate($_POST['email']);
$pass=valid_pass($_POST['pass']);
$type=validate($_POST['type']);
$city=validate($_POST['city']);
$hpwd=password_hash($pass, PASSWORD_DEFAULT);
$sql='INSERT INTO users (name,email,password,city,type) VALUES (?,?,?,?,?) ';


$stmt=$conn->prepare($sql);

if($stmt==false)
{
	trigger_error('Wrong SQL Insertion: ' . $stmt .
' Error: ' . $conn->error, E_USER_ERROR);
}
if($stmt==true)
{
	//$dt = '2009-04-30';
	//$date=date("d/m/y");
	//$datetime = date("Y-m-d H:i:s", mktime(10, 30, 0, 6, 10, 2015));
	$stmt->bind_param('sssss',$name,$email,$hpwd,$city,$type);
$stmt->execute();
//header("Location: ManageProducts_action.php?status=PAS");
}

     else
   {
	//echo " There is ann error in your input";
	//header("Location: ManageProducts_action.php?status=PNA");
     }


$stmt->close();
$conn->close();

	}
}
else
{
	//header("Location: landing.html?status=LF");
}
}
?>