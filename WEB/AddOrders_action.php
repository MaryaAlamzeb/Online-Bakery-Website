<?php
include('includes/config.php');
if(isset($_POST['submit']))
{
if (isset($_SESSION['loggedin']))
{

	if ($_SESSION["type"]=='Admin')
	{
		?>


		<!DOCTYPE html>
		<html>
		<head>
			<title> AddProducts</title>
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
//echo"Please Fill the required fields";
header("Location: AddOrders.php?status=Fill");
exit();

}
else
 $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
	
}

function valid_cnic($cnic)
{


    
        $cnic_pattern = '/[0-9]{5}[-][0-9]{7}[-][0-9]{1}/';

    
   
	if(!preg_match($cnic_pattern, $cnic)) 
	{
   
   
    header("Location: AddOrders.php?status=NIC");
     exit();
}
}



$pname=validate($_POST['pname']);
$em=validate($_POST['em']);
$ad=validate($_POST['ad']);
$price=validate($_POST['price']);
$total=validate($_POST['total']);
$qty=validate($_POST['qty']);
$cust=validate($_POST['cust']);
$pm=validate($_POST['pm']);
$cont=validate($_POST['cont']);
$cnic=valid_cnic($_POST['cnic']);
$fn=validate($_POST['cust']);

$sql='INSERT INTO orders (PName, Price, Qty, Total, CName, email, address, paymentmethod, contact, cnic) VALUES (?,?,?,?,?,?,?,?,?,?)';
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
	$stmt->bind_param('ssssssssss',$pname,$price,$qty,$total,$cust,$em,$ad,$pm,$cont,$cnic);
$stmt->execute();

header("Location: ManageOrders.php?status=added");
//header("Location: ManageProducts_action.php?status=PAS");
}

     else
   {
	echo " There is ann error in your input";
	//header("Location: ManageProducts_action.php?status=PNA");
     }


$stmt->close();
$conn->close();

	}
}
else
{
	header("Location: landing.html?status=LF");
}
}
?>