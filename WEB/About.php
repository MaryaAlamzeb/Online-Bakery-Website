<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>About us</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<?php

include('includes/config.php');?>


<body >

<header>
	<?php include ('includes/customer_header.php');?>
</header>


	

 
<section>


<img class="img" src="graphics/about.JPG" alt="an image"/>

  
 
<div class="text">
<h1 id="editbutton"> ABOUT US <h1>

<h3 class="gry">Mochi Gate Lahore Since 1925.</h3>

Cake Corner, a bakery that churns out the most magical biscuits in all of Lahore (Mochi Gate). Established in 1925 by a man who went by the name of Umer Fayyaz, Cake Coner is a family business that has lasted for four generations. Perhaps the most popular item at Cake Corner is its famous nan khatai – a thick, crumbly biscuit that is melt-in-mouth perfection. The quality and unique taste is the power of Cake Corner's nan khatai.

NanKhatai is one of the very famous cookies in Pakistan which offers fresh, shortbread and delicious biscuits.

</div>

</section>

<section>
<div class="center1">
          <div id="EditProducts">Feed Back</div><br><br>
  <form>
<label>Name</label>
 <input type="text" name="name" id= "nme"><br><br>

               <label for="em">Email:</label>
                 <input type="email" name="email" id= "em"><br><br>
<label >Phone Number:</label>
   <input type="text" name="phone" id= "pn"><br><br>
   <label for="cm">Company:</label>
   <input type="text" name="email" id= "cm"><br><br>
<label>Your Message</label>
<textarea></textarea><br><br>

  <input id="editbutton" type="submit" name ="submit" value="Send" > 
  </form>
</div>
  </section>

<footer> 

<?php 
include('includes/customer_footer.php');

?>

</footer>


	

</body>


</html>