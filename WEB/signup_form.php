<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bakery</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body id="container">



	<div id="cover_photo">
		
</div>
<div id="signup">
	<h1>Sign Up</h1>
	<form action="signup_action.php" method="POST">
		<input type="text" name="name" placeholder="Enter Name"><br><br>
		<input type="text" name="city" placeholder="Enter City"><br><br>
		<input type="email" name="email" placeholder="Enter Email"><br><br>
		<input type="Password" name="password" placeholder="Enter Password"><br><br>
		<input type="Password" name="cpw" placeholder="Confirm Password"><br><br>
		<label>Type</label>
		<input type="radio" id="admin" name="type" value="Admin">
		<label for="admin">Admin</label>
		<input type="radio" id="customer" name="type" value="Customer">
		<label for="customer">Customer</label><br><br>
		<input class="enter" type="submit" name="submit" value="Signup">
	</form>
	<h4>Already have an account? <a href="landing.php"> Login</a></h4>
</div>
<?php

if (isset($_GET['status']))
{
	if ($_GET['status']=='PR')
	{
		 echo '<script>alert("Your Password does not match the format ")</script>';

	}
	else if ($_GET['status']=='Fill')
	{
		 echo '<script>alert("Please Fill the required fields")</script>';
		

	}
}
?>
</body>
</html>