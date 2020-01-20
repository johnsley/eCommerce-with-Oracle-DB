 <?php 
     if (isset($_POST['register'])) {
     	# code...
     	require ('dbh.inc.php');

     	$full_name =$_POST['name'];
     	$email = $_POST['email'];
          $email2 = $_POST['email1'];
          $password =$_POST['password'];
     	$confirmPassword =$_POST['password1'];
     	

     	if (empty($full_name)  || empty($email) || empty($email2) || empty($confirmPassword) || empty($password)) {
     		# code...
     		header("Location:../register.php?error=emptyFields");
     		exit();
     	}
     	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", subject)) {
     		# code...
     		header("Location:../register.php?error=invalidmail&uid");
     			exit();
     	}

     	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
     		# code...
     			header("Location:../register.php?error=invalidmailbutgood");
     			exit();
     	}
     	
     	elseif ($password !==$confirmPassword) {
     		# code...
     			header("Location:../register.php?error=passwordnot==");
     			exit();
     	}elseif ($email !==$email2) {
               # code...
                    header("Location:../register.php?error=passwordnot==");
                    exit();
          }

     	else{
     		$sql= "SELECT email FROM admin_user WHERE email=?";
     		$stmt= mysqli_stmt_init($conn);
     		if (!mysqli_stmt_prepare($stmt,$sql)) {
     			# code...
     			header("Location:../register.php?error=sqlerroremail");
     			exit();
     		}
     		else{
     			mysqli_stmt_bind_param($stmt,"s",$email);
     			mysqli_stmt_execute($stmt);
     			mysqli_stmt_store_result($stmt);
     			$resultCheck= mysqli_stmt_num_rows($stmt);
     			if ($resultCheck >0) {
     				# code...
     				header("Location:../register.php?error=userTaken");
     				exit();
     			}
     			else{
     				$sql="INSERT INTO admin_user (name,email,password) VALUES (?,?,?)";
     					$stmt= mysqli_stmt_init($conn);
     				if (!mysqli_stmt_prepare($stmt,$sql)) {
     					# code...
     					header("Location:../register.php?error=sqlerrorsss");
     					exit();
     				}
     				else{
     					$hashPassword=password_hash($password,PASSWORD_DEFAULT);
     					mysqli_stmt_bind_param($stmt,"sss",$full_name,$email,$hashPassword);
     					mysqli_stmt_execute($stmt);
     					mysqli_stmt_store_result($stmt);

                               /* Insert image here   */

      
                              /* end Insert image   */

     					header("Location:../index.php?error=logedin");
     					exit();
     					}
     			}
     		}

     	}
     	mysqli_stmt_close($stmt);
     	mysql_close($conn);
     }
     else{
     	header("Location:../register.php?error=registerfirst");
     }
     
      ?>