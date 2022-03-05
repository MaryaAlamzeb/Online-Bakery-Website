<?php 
include('includes/config.php');
if(isset($_SESSION["loggedin"]))
{
if($_SESSION["type"]=='Admin')
{
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<?php include('includes/admin_header.php'); 
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
$sql='SELECT * FROM product';
$stmt=$conn->prepare($sql);
if($stmt==false)
{
	trigger_error('Wrong SQL Insertion: ' . $stmt .' Error: ' . $conn->error, E_USER_ERROR);
}
$stmt->execute();
$stmt->store_result();

$sql="SELECT * FROM users WHERE type='Customer'";
$stmnt=$conn->prepare($sql); 
if($stmnt==false)
{
	trigger_error('Wrong SQL Insertion: ' . $stmnt .' Error: ' . $conn->error, E_USER_ERROR);
}
$stmnt->execute();
$stmnt->store_result();

$sql='SELECT * FROM orders';
$statment=$conn->prepare($sql);
$statment->execute();
$statment->store_result();
?>

	<title></title>
</head>
<body>

<div class="div1">
	<h2>Customers</h2><?php
$stmnt->bind_result ($id,$name,$email,$password,$city,$type);
	while ($stmnt->fetch())
{
	$uname=$name;
	echo $uname;
	echo "<br>";
}
?>
<h2>Products</h2>
<?php
$stmt->bind_result ($id,$PName,$Pcategory,$Quantity,$Price,$ExpiryDate,$image);
while ($stmt->fetch())
{
    $pname=$PName;
    echo $pname;
	echo "<br>";
}?>
</div>
<div id="div2">
	<h3>Manage Products</h3>
	<label>Total Product: <?php echo $stmt->num_rows ?></label>
	<button name="display products" onclick=window.location.href="ManageProducts.php">Products</button>
</div>

<div id="div3">
	<h3>Manage Orders</h3>
	<label>Total Orders: <?php echo $statment->num_rows ?></label>
	<button name="display orders" onclick=window.location.href="ManageOrders.php">Orders</button>
</div>
<div id="div4">
	<h3>Manage Customers</h3>
	<label>Total Customer: <?php echo $stmnt->num_rows ?></label>
	<button name="display customers" onclick=window.location.href="ManageCustomers.php">Customers</button>
</div>
<div id="div5">
	<h3>Edit Profile</h3>
	<label>Your Own Profile</label>
	<button name="display profile" onclick=window.location.href="profile.php">Profile</button>
</div>
</body>
</html>
<?php 
}
}

else
{
	header("Location: landing.html?status=LF");
}

 ?>



