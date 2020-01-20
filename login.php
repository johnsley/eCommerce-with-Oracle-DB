<?php 
 include('includes/header.php');
 ?>

<div align="center">
	<form action="config.php" align="center" method="post">
	<p align="center">Log in Form</p>
	<label>User Name:</label> 
	 <input type="text" name="email" id="email" placeholder="E-mail" required="" ><br> <br>
	 <label>Password:</label> 
	 <input type="password" name="password" id="password" placeholder="Password" required=""><br> <br>
	<input type="submit" value="Submit" name="login">
	<p align="center">Don't have an account?
		<a href="signup.php"> Register Now</a>
	</p>
	</form>
</div>

  <?php 
 include('includes/footer.php');
 ?>
