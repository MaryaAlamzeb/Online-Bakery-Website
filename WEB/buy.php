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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Customer Panel</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
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
$sql='SELECT * FROM product ORDER BY id ASC';
 $result = mysqli_query($conn, $sql);  
?>
<body>
<header id="head">
	<?php include ('includes/customer_header.php');?>
</header>
<br>
<div class="cover"></div>
<div>
</div>
<br><br><br>
	<div > <h1>Best Selling Products</h1>  </div>
<section>
<?php
  while($row = mysqli_fetch_array($result))  
                     { 
                ?>  
<div class="row">
  <div class="column">
  	<div class="polaroid">
    <img src="<?php echo $row["image"]; ?>" alt="pic5"  >
    <div class="container">
      <form method="post" action="extra2.php?id=$id"> 
    	<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star "></span>
     <p><?php echo $row["PName"]; ?></p>
       <p class="clr">Rs.<?php echo $row["Price"]; ?></p>
       <input type="text" name="qty" class="" value="1" /> 
     <p>   <button type="submit" name="submit" > Add to Cart</button> </p>
       <input type="hidden" name="pname" value="<?php echo $row["PName"]; ?>" />  
      <input type="hidden" name="price" value="<?php echo $row["Price"]; ?>" />  
    </form>
  </div>
</div></div>
<?php 
} 
?>
</section>
<footer> 
<?php 
include('includes/customer_footer.php');
}

}
else
{
  header("Location: landing.php?status=LF");
}

if(isset($_GET['status']))
{
  if ($_GET['status']=='PA')
  {
     echo '<script>alert("Product added to cart")</script>';

  }
  }
?>
</footer>
</body>
</html>