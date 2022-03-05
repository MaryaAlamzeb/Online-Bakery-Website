<?php
include ('includes/config.php');
$conn = new mysqli ($DBServer, $DBUser, $DBPass,$DBName);
if($conn->connect_error)
{
  trigger_error('Database connection failed: ' .
$conn->connect_error, E_USER_ERROR);
}
else 
{
 // echo "database connection successfull\n";
}
include('includes/customer_header.php');?>
<!DOCTYPE html>
<html>
<head>
  <title> Order Sum</title>
    <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>
<body>
  <div id="ManageProducts">Order Summary</div>
</body>
</html>
<?php
$id=$_SESSION['id'];
$sql="SELECT * FROM cartt WHERE cid='$id'";
$stmnt=$conn->prepare($sql);
if($stmnt==false)
{
  trigger_error('Wrong SQL Insertion: ' . $stmnt .
' Error: ' . $conn->error, E_USER_ERROR);
}
if($stmnt==true)
{
$stmnt->execute();
$stmnt->store_result();
$stmnt->bind_result ($id, $PName,$Qty,$Price,$Total,$cid);
echo '<table id="products">';
echo "<tr>";
echo "<td> PId </td>";  
echo "<td> Name </td>"; 
echo "<td> Quantity</td>";
echo "<td> Price </td>";
echo "<td> Total</td>";
echo "</tr>";
$totalbill=0;
$total=0;
while ($stmnt->fetch())
{
echo "<tr>";
echo "<td > $id</td>";
echo "<td><input type='text' name='name' value='$PName' readonly></td>"; 
echo "<td><input type='text' name='qty' value='$Qty' readonly></td>";
echo "<td><input type='text' name='price' value='$Price'></td readonly>";
$total=$Qty*$Price;
echo "<td> <input type='text' name='total' value='$total' readonly></td>";
echo "</tr>";
$totalbill+=$total;
}
echo "<tr>";
echo "<td>  </td>";  
echo "<td>  </td>"; 
echo "<td> </td>";
echo "<td> </td>";
echo "<td> Total Bill $totalbill</td>";
echo "</tr>";
echo "</table><br><br>";
?>
<button onclick= "window.location.href='Address_Form.php'";  class='button button2'>  Check Out  </button>
<?php
$stmnt->free_result();
$stmnt->close();
$conn->close();
}
?>