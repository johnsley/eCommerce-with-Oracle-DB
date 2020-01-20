<?php
if (isset($_POST['login'])) {
	# code...
	require 'dbh.inc.php';
	$userName=$_POST['email'];
	$password=$_POST['password'];

	if (empty($userName) || empty($password)) {
		# code...
		header("location:../index.php?error=emptyfields");
		exit();
	}
	else{
		$sql="SELECT * FROM admin_user WHERE email=?";
		$stmt=mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			# code...
			header("location:../index.php?error=sqlerror");
			exit();
	}
	else{
		mysqli_stmt_bind_param($stmt,"s",$userName);
		mysqli_stmt_execute($stmt);
		$result=mysqli_stmt_get_result($stmt);
		if ($row=mysqli_fetch_assoc($result)) {
			# code...
			$pwdCheck=password_verify($password,$row['password']);
			if ($pwdCheck == false) {
				# code...
				header("location:../index.php?error=wrongpassword");
				exit();
			}
			elseif ($pwdCheck == true) {
				# code...
				session_start();
				$_SESSION['name'] = $row['name'];
				$_SESSION['email'] = $row['email'];
				//$_SESSION['lecName'] = $row['user_first'];
				//$userid= $_SESSION['userid'];

				header("location:../products.php?error=success");
				exit();
			}
			else{
				header("location:../index.php?error=stringwrongpassword");
				exit();
			}
		}
		else{
			header("location:../register.php?error=nouser");
			exit();
		}
	}
}
}
else{
	header("location:../index.php");
	exit();
}