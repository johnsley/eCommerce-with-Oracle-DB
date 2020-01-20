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

<div align="center">
	
<form action="config.php" align="center" method="post">
	<h3 align="center">Registration Form</h3>
	<label>Full Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="text" name="name" id="name" placeholder="full name" required=""><br> <br>
 <label>Email : </label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="text" name="email" id="email" placeholder="email" required=""><br> <br>
 <label>Telephone:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="text" name="telephone" id="telephone" placeholder="Enter Telephone" required=""><br> <br>
  <label>Address:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="text" name="address" id="address" placeholder="Enter Address" required=""><br> <br>
  <label>Date of Birth:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="date" name="dob" id="dob" placeholder="Enter Date of Birth" required=""><br> <br>
 <label>Bank Sort Code:</label> &nbsp;&nbsp;
 <input type="number" name="sortcode" id="sortcode" placeholder="Enter Sort Code" required=""><br> <br>
 <label>Bank A/C Number:</label>
 <input type="number" name="accno" id="accno" placeholder="Enter Bank Account Number" required=""><br> <br>
 <label>Password:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
 <input type="password" name="password" id="password" placeholder="Password" required=""><br> <br>
 <label>Confirm Password:</label> 
 <input type="password" name="password1" id="password1" placeholder="Confirm Password" required=""><br> <br>
 
 <input type="submit" value="Submit" name="register">
</form>

<br />
Have an Account? <a href="index.php">Log In</a>
</div>



  <?php 
 include('includes/footer.php');
 ?>
