
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

function validate($data) {
	if(empty($data))
	{
echo"Please Fill the required fields";
header("Location: landing.php?status=Fill");
exit();
}
else
 $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
	

  
}

$email=validate($_POST['email']);
$pwd= validate($_POST['pass']);
$sql='SELECT * FROM users WHERE email=?';


$stmt=$conn->prepare($sql);

if($stmt===false)
{
	trigger_error('Wrong SQL for Selection: ' . $stmt .
' Error: ' . $conn->error, E_USER_ERROR);
}

else
echo "Prepared statement connection successful";


$stmt->bind_param('s',$email);
$stmt->execute();

$stmt->store_result();

if($stmt->num_rows>0)
{
	echo "result found";
	
	$stmt->bind_result($id,$name,$email,$password,$city,$type);
while ($stmt -> fetch()) 
{
	$verified=password_verify($pwd, $password);
     if($verified)
   {

   	$_SESSION["loggedin"]=true;
   	$_SESSION["id"]=$id;
   	$_SESSION["name"]=$name;
   	$_SESSION["email"]=$email;
   	$_SESSION["city"]=$city;
    $_SESSION["type"]=$type;

    setcookie(uemail, $email,time()+60*60*24*30);
}
if($verified)
{
	if ($_SESSION['type']=='Admin') {
		header("Location: dashboared_admin.php?status=SL");
	}
	else
	{
		header("Location: buy.php");
	}
	
    }
     else
   {
	header("Location: landing.html?status=IP");
     }
   }
}
  else
{
	header("Location: landing.html?status=RNF");
}


$stmnt->free_result();
$stmnt->close();


$conn->close();
}

else
  echo "Submit not clicked";




?>