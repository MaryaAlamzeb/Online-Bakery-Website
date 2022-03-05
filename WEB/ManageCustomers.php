<!DOCTYPE html>
<html>
<head>
<title> ManageCustomers</title>
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
			<div id="ManageProducts">Manage Customers</div>
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
$sql="SELECT * FROM users WHERE type='Customer'";
$stmt=$conn->prepare($sql);
if($stmt==false)
{
	trigger_error('Wrong SQL Insertion: ' . $stmt .' Error: ' . $conn->error, E_USER_ERROR);
}
$stmt->execute();
$stmt->store_result();
$stmt->bind_result ($id, $name,$email,$password,$city,$type);
echo '<table id="products" >';
echo "<tr>";
echo "<th> Id ";	
echo "<th> Name ";	
echo "<th> Email ";
echo "<th> Password ";	
echo "<th> City ";
echo "<th> Type ";
echo "<th colspan='2'> Actions ";
echo "</tr>";
while ($stmt->fetch())
{
echo "<tr>";
echo "<td> $id</td>";
echo "<td>  $name</td>";	
echo "<td> $email </td>";	
echo "<td> $password </td>";
echo "<td>  $city </td>";
echo "<td>  $type </td>";
 //echo "<td><a href='AddProducts.html?id=$PId'> Add </a></td>";
//echo "<td><a href='Edit-Products.php?id=$PId'> Edit  </a></td>";
echo "<td> <button name='edit customers' onclick=window.location.href='edit-customer.php?id=$id'  class='btn'><i class='fa fa-edit'></i> </button> </td>";
echo "<td> <button name='delete customers' onclick=window.location.href='Delete-Customer.php?id=$id' class='btn'><i class='fa fa-trash'></i> </button> </td>";
echo "</tr>";
//echo "</table>";
}
echo "</th>";
echo "</table><br><br>";
echo " <button name='add' onclick=window.location.href='AddCustomers.php' class='button button2'> Add Customer </button>";
?>
<?php
$stmt->free_result();
$stmt->close();
$conn->close();
}
}
?>
</body>
</html>