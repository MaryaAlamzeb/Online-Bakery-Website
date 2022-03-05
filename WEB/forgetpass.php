<!DOCTYPE html>
<html>
<head>
	<title> Forget Password</title>
	<link rel="stylesheet"  href="stylesheet.css">
	 <script type="text/javascript">
    
    function PU()
    {
      alert("Password Updated Successfully");
    }
  </script>

</head>
<body>
	<br><br><br><br>
	      <div class="div1">
  <h1>Cake Corner <i>"If you keep good food in your fridge, you will eat good food"</i></h1>
</div><br><br><br><br>
<div class="center">
 <div id="EditProducts">Forget Password</div><br><br><br>
<form method="post" action="forgetpass-action.php">
	<LABEL>Email</LABEL>
	<input type="Email" name="email"><br><br>

		<LABEL>New Password</LABEL>
	<input type="Password" name="pass"><br><br><br>

	<input id="editbutton" type="submit" name="submit" value="submit" onclick="PU()" />
</form>
</div>


</body>
</html>