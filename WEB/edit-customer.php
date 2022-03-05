<?php
include('includes/config.php');
if (isset($_SESSION['loggedin']))
{
  if ($_SESSION["type"]=='Admin')
  {
    $id=$_GET["id"];
    $name="";
    $email="";
    $city="";
    $type="";
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
$stmnt->bind_param('i',$id);
$stmnt->execute();
$stmnt->store_result();
if ($stmnt->num_rows > 0)
{
$stmnt->bind_result ($id, $name,$email,$password,$city,$type);
while ($stmnt->fetch())
{
    $name=$name;
    $email=$email;
    $city=$city;
    $type=$type;
}}
$stmnt->free_result();
$stmnt->close();
$conn->close();
}}}
?>  
    <!DOCTYPE html>
    <html>
    <head>
      <title> Edit-Action</title>
      <meta charset="utf-8">
    <meta name="viewport" content="width-device-width">
    <link rel="stylesheet"  href="stylesheet.css">
    </head>
    <body >
      <?php include('includes/admin_header.php')?>
      <div class="div1">
  <h1><i>"If you keep good food in your fridge, you will eat good food"</i></h1>
</div>
        <div class="center">
          <div id="EditProducts">Edit Customers</div>
         
      <form action="editcustomer_action.php" method="POST" > 
<input type="hidden" name ="id" value = "<?php echo $id ?>"/><br><br>
<label >Name</label>
<input type="text" name ="name" value="<?php echo $name?>" ><br><br>
<label>Email</label>
<input type="text" name ="email" value="<?php echo $email ?>"><br><br>
<label>City</label>
<input type="text" name ="city" value="<?php echo $city ?>" ><br><br>
<label>Type</label>
<input type="text" name ="type" value="<?php echo $type ?>" ><br><br>
<input id="editbutton" type="submit" value= "Update" name="save">
  </form>

  </div>
    </body>
    </html>

  


