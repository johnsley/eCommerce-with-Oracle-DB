<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chester's Cyclic Outlet</title>

</head>
<body>
<div align="center">
	
	<h2 align="center">Welcome to Chester's Cyclic Outlet Limited Dashboard</h2>

<p align="center"><img src="../images/cover.png" alt="Workplace" usemap="#workmap" width="100%" height="200" ></p>

<form action="config.php?idd=2" method="post">
	<h2 >Admin Login Form</h2>
	<label>User Name:</label> 
 <input type="email" name="email" id="email" placeholder="user name" required="" ><br> <br>
 <label>Password:</label>&nbsp;&nbsp;&nbsp; 
 <input type="password" name="password" id="password" placeholder="Password" required=""><br> <br>
<input type="submit" value="Submit" name="login">
<p >Don't have an account?
	<a href="register.php"> Register Now</a>
</p>
</form>
</div>
<hr>
  <?php 
 include('includes/footer.php');
 ?>
