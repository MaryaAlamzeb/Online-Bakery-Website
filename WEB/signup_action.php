
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


	function validate($data) {
	if(empty($data))
	{
echo"Please Fill the required fields";
header("Location: signup_form.php?status=Fill");
exit();

}
else
 $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
	
}

function valid_pass($pass)
{
	if(!preg_match('/^(?=.\d)(?=.[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $pass)) 
	{
    echo 'the password does not meet the requirements!';
   
    header("Location: signup_form.php?status=PR");
     exit();
}
}
if (isset($_POST['submit'])) {
	
	$name=validate($_POST['name']);
	$email=validate($_POST['email']);
	$password=valid_pass($_POST['password']);
	$city=validate($_POST['city']);
	$type=validate($_POST['type']);
	$cpw=valid_pass($_POST['cpw']);	
	if($cpw==$password)
	{
		$hpwd=password_hash($password, PASSWORD_DEFAULT);
	$sql='INSERT INTO users (name, email, password, city, type) VALUES (?,?,?,?,?)';
	$stmt=$conn->prepare($sql);
	if($stmt==false)
	{
		trigger_error('query failed: ' .$conn->error);
	}
	$stmt->bind_param('sssss',$name,$email,$hpwd,$city,$type);
	$stmt->execute();
	$stmt->close();
	$conn->close();
	header("Location: landing.php?status=SS");
}
else
{
	header("Location: landing.php?status=PNM");
}
}
else
{
	header("Location: landing.php?status=FSF");
}
?>