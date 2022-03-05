<?php

include('includes/config.php');
if (isset($_SESSION['loggedin']))
{
    if ($_SESSION["type"]=='Customer')
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
			<?php include('includes/customer_header.php')?>
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

if (isset ($_POST['submit']))
{
$pname=$_POST['pname'];
$qty=$_POST['qty'];
$price=$_POST['price'];
$total=$price*$qty;
$_SESSION['upd']=true;
    $_SESSION['total']=$total;




$id=$_SESSION['id'];

$sql='INSERT INTO cartt (PName,Qty,Price,Total,cid) VALUES (?,?,?,?,?) ';


$stmnt=$conn->prepare($sql);

if($stmnt==false)
{
	trigger_error('Wrong SQL Insertion: ' . $stmnt .
' Error: ' . $conn->error, E_USER_ERROR);
}
if($stmnt==true)
{
	
	$stmnt->bind_param('siiii',$pname,$qty,$price, $total,$id);
$stmnt->execute();

echo " Products Added to Cart";
//header("Location: ManageProducts_action.php?status=PAS");
}

     else
   {
	echo " There is ann error in your input";
	//header("Location: ManageProducts_action.php?status=PNA");
     }


$stmnt->close();
$conn->close();
}
	header("location: buy.php?status=PA");
}
}
?>