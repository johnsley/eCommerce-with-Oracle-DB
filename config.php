 <?php
include "db.php";
	if(isset($_POST['register'])){
		
		    $name = htmlentities($_POST['name']);
			$email = htmlentities($_POST['email']);
			$phone = htmlentities($_POST['telephone']);
			$address = htmlentities($_POST['address']);
			$dob = htmlentities($_POST['dob']);
			$password = htmlentities($_POST['password']);
			$usertype = "CUSTOMER";
			$created_at = date("Y-m-d");
			
			$sortcode = htmlentities($_POST['sortcode']);
			$accno = htmlentities($_POST['accno']);

	        $sql  = "INSERT INTO USERS (NAME, EMAIL, PHONE, ADDRESS, DOB, PASSWORD, USERTYPE, CREATED_AT) VALUES ('".$name."', '".$email."', '".$phone."', '".$address."', '".$dob."', '".$password."', '".$usertype."', '".$created_at."')";
			$affected = $db->exec($sql);
			if (PEAR::isError($affected)) {
				die($affected->getMessage());
			}else{
				
				$res = $db->query("SELECT * FROM USERS ORDER BY USERID DESC FETCH NEXT 1 ROWS ONLY");
			    $row = $res->fetchRow();
				
				$last_id = $row[0];
				$sql  = "INSERT INTO BANKDETAILS (USERID, SORTCODE, ACCNO, CREATED_AT) VALUES ('".$last_id."', '".$sortcode."', '".$accno."', '".$created_at."')";
			    $affected = $db->exec($sql);
				if (PEAR::isError($affected)) {
				die($affected->getMessage());
			    }else{
					echo "Registered Successfully, <a href='login.php'>Login</a> here.";
				}	
			}	
			
	}elseif(isset($_POST['login'])){
	
	
	        $email = htmlentities($_POST['email']);
			$password = htmlentities($_POST['password']);
			
	        $res = $db->query("SELECT * FROM USERS WHERE EMAIL = '".$email."' AND PASSWORD = '".$password."' AND USERTYPE = 'CUSTOMER' ");
			$row = $res->fetchRow();
			if($row > 0){
				
				    $_SESSION['userId'] = $row[0];
					$_SESSION['email'] = $row[2];
				    header('Location: index.php');
				
			}else{
				echo "Invalid Email/Password combination! <a href='login.php'>Go Back</a>";
			}
	
	}
	
?>
