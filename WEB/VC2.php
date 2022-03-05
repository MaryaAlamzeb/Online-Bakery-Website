<?php include('includes/config.php'); 
    if ($_SESSION["type"]=='Customer')
    {
      ?>
<!DOCTYPE html>
<html>
<head>
  <title> View Cart</title>
    <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript">
    function updatecart($id)
    {
      if (isset($_SESSION['loggedin']))
{
    $pid=$_GET["id"];
    $pname="";

    $qty="";
    $price="";
    $total="";
    
//echo $pid;
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




$sql='SELECT * FROM product where id =?';


$stmnt=$conn->prepare($sql);

if($stmnt==false)
{
  trigger_error('Wrong SQL Insertion: ' . $stmnt .
' Error: ' . $conn->error, E_USER_ERROR);
}
if($stmnt==true)
{
  
  $stmnt->bind_param('i',$pid);
$stmnt->execute();

$stmnt->store_result();


if ($stmnt->num_rows > 0)
{
$stmnt->bind_result ($id, $PName,$Qty,$Price,$Total);



while ($stmnt->fetch())
{

    $qty=$Quantity;
    $price=$Price;
    $Total=$Price*$Qty;

}
}

$stmnt->free_result();
$stmnt->close();


$conn->close();

header('location: VC2.php');


}
    }
  </script>

</head>
<body>

</body>
</html>


<?php


    
//echo $pid;
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
  
  //$stmnt->bind_param('i',$pid);
$stmnt->execute();

$stmnt->store_result();



$stmnt->bind_result ($id, $PName,$Qty,$Price,$Total,$cid);
include('includes/customer_header.php')?>
      <div id="ManageProducts">Manage Cart</div>

<?php
echo '<table id="products" >';
echo "<tr>";
echo "<th> Id ";
echo "<th> Name ";  
echo "<th> Quantity ";  
echo "<th> Price ";
echo "<th> Total ";
echo "<th colspan='2'> Actions ";
echo "</tr>";


while ($stmnt->fetch())
{
  
echo "<tr>";
echo "<td> $id</td>";
echo "<td>  $PName</td>"; 
echo "<td> $Qty</td>"; 
echo "<td>  $Price </td>";
echo "<td>  $Total </td>";
echo "<td> <button onclick=window.location.href='Edit-Cartt.php?id=$id'  class='btn'><i class='fa fa-edit'></i> </button> </td>";
echo "<td> <button onclick=window.location.href='Delete-CartP.php?id=$id' class='btn'><i class='fa fa-trash'></i> </button> </td>";
echo "</tr>";
}
echo "</th>";
echo "</table><br><br>";
?>
<button onclick=window.location.href='OrderSum.php' class='button button2'>  Check Out  </button>
<button onclick= window.location.href='Refresh-Action.php' class='button button2'>  Refresh Cart  </button>
<?php 
$stmnt->free_result();
$stmnt->close();


$conn->close();

}
}
?>

    






  


