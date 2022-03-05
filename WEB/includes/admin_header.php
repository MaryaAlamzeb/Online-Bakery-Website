<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<title></title>
</head>
<body>
<div id="header">

	<div id="logo">

		<a href="dashboared_admin.php"><img src="graphics/logo.png"></a>
	</div>
	<div id="nav">
	<ul>
		<li><?php echo "Hi " . $_SESSION["name"]; ?></li>
		<li><a href="loggoff.php">Logout</a></li>
	</ul>
	</div>
	<div id="back"></div>
	</div>

</body>
</html>