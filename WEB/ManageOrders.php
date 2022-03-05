 <!DOCTYPE html>
<html>
<head>
<title> ManageProducts</title>
<meta charset="utf-8">
<meta name="viewport" content="width-device-width">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<!-- icon libray link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body id="mng_prod">
<?php
include('includes/config.php');
if (isset($_SESSION['loggedin']))
{
	if ($_SESSION["type"]=='Admin')
	{
		?>
			<?php include('includes/admin_header.php')?>
			<div id="ManageProducts">Manage Orders</div>
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
$sql='SELECT * FROM orders';
$stmt=$conn->prepare($sql);
if($stmt==false)
{
	trigger_error('Wrong SQL Insertion: ' . $stmt .' Error: ' . $conn->error, E_USER_ERROR);
}
$stmt->execute();
$stmt->store_result();
$stmt->bind_result ($id,$PName, $Price, $Qty, $Total, $CName, $email, $address, $paymentmethod, $contact, $cnic);
echo '<table id="products" >';
echo "<tr>";
echo "<th> Id ";
echo "<th> PName ";	
echo "<th> Price ";	
echo "<th> Quantity ";
echo "<th> Total ";
echo "<th> Customer ";
echo "<th> Email ";
echo "<th> Address ";
echo "<th> Payment Method ";
echo "<th> Contact ";
echo "<th> CNIC ";
echo "<th colspan='2'> Actions ";
echo "</tr>";
while ($stmt->fetch())
{
echo "<tr>";
echo "<td> $id</td>";
echo "<td>  $PName</td>";	
echo "<td> $Price </td>";	
echo "<td> $Qty</td>";
echo "<td>  $Total </td>";
echo "<td>  $CName </td>";
echo "<td>  $email </td>";
echo "<td>  $address </td>";
echo "<td>  $paymentmethod </td>";
echo "<td>  $contact </td>";
echo "<td>  $cnic </td>";
echo "<td> <button name='edit orders' onclick=window.location.href='Edit-orders.php?id=$id'  class='btn'><i class='fa fa-edit'></i> </button> </td>";
echo "<td> <button name='delete orders' onclick=window.location.href='Delete-order.php?id=$id' class='btn'><i class='fa fa-trash'></i> </button> </td>";
echo "</tr>";
//echo "</table>";
}
echo "</th>";
echo "</table><br><br>";
echo " <button name='add ' onclick=window.location.href='AddOrders.php' class='button button2'> Add New Order </button>";
?>
<h2>
	<?php if (isset($_GET['status']))
{
	if ($_GET['status']=='PU')
	{
	
	}
	if ($_GET['status']=='PD')
	{
	
	}
}
	else
?>
</h2>
<?php
$stmt->free_result();
$stmt->close();
$conn->close();
}
}
?>
</body>
</html>