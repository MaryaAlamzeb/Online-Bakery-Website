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
if (isset ($_POST['submit']))
{
	$id=$_SESSION['id'];
	$sql="SELECT * FROM cartt WHERE cid=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('i',$id);

if($stmt===false)
{
	trigger_error('Wrong SQL for Selection: ' . $stmt .
' Error: ' . $conn->error, E_USER_ERROR);
}

else
{
echo "Prepared statement connection successful";
}
$stmt->execute();

$stmt->store_result();

if($stmt->num_rows>0)
{
	echo "result found";
	}
$stmt->bind_result($id,$PName,$Qty,$Price,$Total,$cid);	
$fn=$_POST['fname'];
$em=$_POST['email'];
$ad=$_POST['address'];
$pm=$_POST['cod'];
$mn=$_POST['mn'];
$nic=$_POST['nic'];
while ($stmt -> fetch()) 
{
echo $PName;

$sql='INSERT INTO orders (PName, Price, Qty, Total, CName, email, address, paymentmethod, contact, cnic) VALUES (?,?,?,?,?,?,?,?,?,?)';
	$stmnt=$conn->prepare($sql);
	if($stmnt==false)
	{
		trigger_error('query failed: ' .$conn->error);
	}
	$stmnt->bind_param('ssssssssss',$PName,$Price,$Qty,$Total,$fn,$em,$ad,$pm,$mn,$nic);
	$stmnt->execute();
}
header("Location: buy.php");
$stmt->close();
$conn->close();
}
else
{
	header("Location: Address_Form.php?status=SFF");
}
