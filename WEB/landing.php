<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bakery</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">

	<script>
		display()
		{
			alert("Your password must have digits and characters and the length should be between 8 to 12");
		}
	</script>
</head>
<body id="container">


	<div id="cover_photo">
		
</div>

<div id="login">
	<h1>CAKE CORNER</h1>
	<h2>LOGIN</h2>
	<form action="login_action.php" method="POST">
		<input type="email" name="email" placeholder="Enter Email"><br><br>
		<input type="Password" name="pass" placeholder="Enter Password"><br><br>
		<input class="enter" type="submit" name="submit" value="Login">
	</form>
	<h4><a href="forgetpass.php"> Forget Password</a></h4>
	<h4>Don't have an account? <a href="signup_form.php"> Signup</a></h4>
</div>

<?php

if(isset($_GET['status']))
{
	if ($_GET['status']=='LF')
	{
		 echo '<script>alert("Please login to access any page")</script>';

	}
	else if ($_GET['status']=='Fill')
	{
		 echo '<script>alert("Please Fill the required fields")</script>';
		

	}

else if ($_GET['status']=='RNF')
	{
		 echo '<script>alert("Invalid login. Please Sign up to create new account or try using a registered email")</script>';

	}

		else if ($_GET['status']=='loggoff')
	{
		 echo '<script>alert("You logged out!")</script>';

	}
		else if ($_GET['status']=='PAS')
	{
		echo " Products Added Successfully ";

	}
		else if ($_GET['status']=='PNA')
	{
		echo " Sorry, Insert actions are unsuccessful";

	}
}
?>
</body>
</html>