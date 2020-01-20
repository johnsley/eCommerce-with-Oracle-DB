
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chester's Cycling Outlet</title>
</head>

<body>
	<h2 align="center">Welcome to Chester's Cycling Outlet Limited</h2>
	<hr>
	<marquee width="100%" direction="left" height="">
We import Bikes direct from the manufactures. We're the best Bikes store in town. 
</marquee> 


<p align="center"><img src="images/cover.png" alt="Workplace" usemap="#workmap" width="100%" height="200" ></p>
<table width="50%" align="center">
  <tr>
    <td><a href="index.php">Home</a></td>
	 <td><a href="about.php">About Us</a></td>
    <td align="right">
	<?php 
	if(isset($_SESSION['email']))
	{
		echo "Hello, ".$_SESSION['email']." | <a href='logout.php'>Logout</a>";
	}else{
		echo "<a href='login.php'>Log In</a>";
	}
    ?>
	
	</td> 
    
  </tr>
</table>


