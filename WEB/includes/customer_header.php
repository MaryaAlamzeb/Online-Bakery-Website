<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title></title>
</head>
<body>
	<div id="cname">
<?php echo "Hi " . $_SESSION["name"]; ?>
</div>

	<div id="logo">

	<a href="buy.php"><img src="graphics/logo.png"></a>	
		</div>

	<div class="cnav">

		<nav>

<ul>
		<li> <a class="link" href="buy.php">Home</a></li>
		
		<li> <a class="link" href="About.php">About us</a></li>
		<li><a href="loggoff.php">Logout</a></li>
		<div>


</div>
</ul>


<div>

	<button onclick=window.location.href='cust_profile.php' class="btn"> <i class='fa fa-user'></i> </button>	

</div>
<button  onclick=window.location.href='VC2.php?id=$id' class="btn" id="btn2" > <i class='fa fa-shopping-cart'></i> </button>	

		
</div>
</nav>

<br><br>
	<br>

</body>
</html>