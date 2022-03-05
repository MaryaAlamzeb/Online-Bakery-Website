<?php
include('includes/config.php');
if (isset($_SESSION['loggedin']))
{
  if ($_SESSION["type"]=='Admin')
  {
    $uid=$_SESSION["id"];
    $uname="";
    $email="";
    $pass="";
    $city="";
    $type="";   
//echo $pid;
$conn = new mysqli ($DBServer, $DBUser, $DBPass,$DBName);
if($conn->connect_error)
{
trigger_error('Database connection failed: ' .
$conn->connect_error, E_USER_ERROR);
}
else 
{
}
$sql='SELECT * FROM users where id =?';
$stmnt=$conn->prepare($sql);
if($stmnt==false)
{
  trigger_error('Wrong SQL Insertion: ' . $stmnt .
' Error: ' . $conn->error, E_USER_ERROR);
}
if($stmnt==true)
{ 
$stmnt->bind_param('i',$uid);
$stmnt->execute();
$stmnt->store_result();
if ($stmnt->num_rows > 0)
{
$stmnt->bind_result($id, $name,$email,$password,$city,$type);
echo $id;
while ($stmnt->fetch())
{
    $uname=$name;
    $email=$email;
    $pass=$password;
    $city=$city;
    $type=$type;  
}
}
$stmnt->free_result();
$stmnt->close();
$conn->close();
}
}
}
?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>Profile</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width-device-width">
      <link rel="stylesheet"  href="stylesheet.css">
    </head>
    <body >
      <?php include('includes/admin_header.php')?>
      <div class="div1">
  <h1><i>"If you keep good food in your fridge, you will eat good food"<br> -Cake Corner</i></h1>
</div>
<div class="center">
          <div id="EditProducts">Edit Profile</div>
      <form action="profile_action.php" method="POST" >
        <input type="hidden" name ="pass" value = "<?php echo $pass ?>"/>
  <input type="hidden" name ="id" value = "<?php echo $uid ?>"/><br><br>
<label >Name</label>
<input type="text" name ="name" value="<?php echo $uname?>" ><br>
<label for="pctg">Email</label>
<input type="text" name ="email" id="pctg" value="<?php echo $email ?>"><br>
<label>City</label>
<input type="text" name ="city" value="<?php echo $city ?>" ><br>
<label>Type</label>
<input type="text" name ="type" value="<?php echo $type ?>" ><br><br>
<input id="editbutton" name="save" type="submit" value= "Update Button"><br><br>
      <label>Old Password</label>
      <input type="Password" name="op"><br>
      <label>New Password</label>
      <input type="Password" name="np"><br><br>
      <input id="editbutton" type="submit" name="cpass" value="Change Password">
      <input id="editbutton" type="submit" name="del" value="Delete Account">
      </form>
    </div>
    </body>
    </html>