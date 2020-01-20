 <?php
include "../db.php";
	if(isset($_POST['register'])){
		
		   $name = htmlentities($_POST['name']);
			$email = htmlentities($_POST['email']);
			$phone = htmlentities($_POST['telephone']);
			$address = htmlentities($_POST['address']);
			$dob = htmlentities($_POST['dob']);
			$password = htmlentities($_POST['password']);
			$usertype = "ADMIN";
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
					echo "Registered Successfully, <a href='index.php'>Login</a> here.";
				} 
				
			}	
			
	}elseif(isset($_POST['login'])){
	
	
	        $email = htmlentities($_POST['email']);
			$password = htmlentities($_POST['password']);
			
	        $res = $db->query("SELECT * FROM USERS WHERE EMAIL = '".$email."' AND PASSWORD = '".$password."' AND USERTYPE = 'ADMIN' ");
			$row = $res->fetchRow();
			if($row > 0){
				
				    $_SESSION['userId'] = $row[0];
				    $_SESSION['email'] = $row[2];
                    $_SESSION['name'] = $row[1];
					$_SESSION['usertype'] = $row[7];
				    header('Location: products.php');
				
			}else{
				echo "Invalid Email/Password combination! <a href='index.php'>Go Back</a>";
			}
	}elseif(isset($_POST['upload'])){
		
		    # code...
			$newFileName=$_POST['file'];
			
			if (empty($newFileName)) {
				# code...
				$newFileName="bike";
			}else{
				$newFileName=strtolower(str_replace("", "-", $newFileName));
			}

			$productName=$_POST['name'];
			$productDesc=$_POST['desc'];
			
			$cost=$_POST['cost'];
			
			$userId=$_POST['userId'];
			
			$created_at = date("Y-m-d");

			$file = $_FILES['file'];
			
			$fileName =$file['name'];
			$fileTmpName=$file['tmp_name'];
			$fileSize =$file['size'];
			$fileError =$file['error'];
			$fileType=$file['type'];

			$fileExt =explode('.', $fileName);

			$fileActualExt= strtolower(end($fileExt));
			$allowed= array('jpg','jpeg','png','pdf');
			
			if (in_array($fileActualExt, $allowed)) {
				
			if ($fileError===0) {
				if ($fileSize < 200000) {
					$imageFullName=$fileNameNew.".".uniqid("",true).".".$fileActualExt;
					$fileDestination='images/'.$imageFullName;

					if (empty($imageFullName) || empty($productName) || empty($productDesc) || empty($cost)) {
						header("Location:product-upload.php?error=EmptyFields");
						exit();
					}else{
						
						$sql  = "INSERT INTO WAREHOUSE (USERID, PNAME, PDESC, PCOST, PFILE, CREATED_AT) VALUES ('".$userId."', '".$productName."', '".$productDesc."', '".$cost."', '".$imageFullName."', '".$created_at."')";
						$affected = $db->exec($sql);
						if (PEAR::isError($affected)) {
							die($affected->getMessage());
						}else{
							move_uploaded_file($fileTmpName, $fileDestination);
							header("Location:products.php");
						}
					}
				}else{
					echo "Your file is too big to be uploaded";
				}
			}else{
				echo "There was an error uploading your file";
			}
		}else{
			echo "You cannot upload the file of this type";
		}        	
	}elseif(isset($_POST['update'])){
		
		$pid = $_POST['pid'];
		$productName=$_POST['name'];
		$productDesc=$_POST['desc'];
		$cost=$_POST['cost'];
		
		$sql  = "UPDATE PRODUCTS SET PNAME = '".$productName."',PDESC = '".$productDesc."',PCOST = '".$cost."' WHERE PID = '".$pid."' ";
		$affected = $db->exec($sql);
		if (PEAR::isError($affected)) {
			die($affected->getMessage());
		}else{
			move_uploaded_file($fileTmpName, $fileDestination);
			header("Location:products.php");
		}
	}elseif($_GET['idd'] == 3){
		
		$pid = $_GET['id'];
		
		$sql  = "DELETE FROM PRODUCTS WHERE PID = '".$pid."' ";
		$affected = $db->exec($sql);
		if (PEAR::isError($affected)) {
			die($affected->getMessage());
		}else{
			move_uploaded_file($fileTmpName, $fileDestination);
			header("Location:products.php");
		}
	}elseif($_GET['idd'] == 4){
		
		$pid = $_GET['id'];
		
		 $res = $db->query("SELECT * FROM WAREHOUSE WHERE PID = '".$pid."' ");
		 while($row = $res->fetchRow()){
			 
			 $sql  = "INSERT INTO PRODUCTS (PNAME, PDESC, PCOST, PFILE, CREATED_AT) VALUES ('".$row[2]."', '".$row[3]."', '".$row[4]."', '".$row[5]."', '".$row[6]."')";
			 $affected = $db->exec($sql);
			 if (PEAR::isError($affected)) {
					die($affected->getMessage());
			 }else{
				 
				$sql  = "DELETE FROM WAREHOUSE WHERE PID = '".$pid."' ";
				$affected = $db->exec($sql);
				if (PEAR::isError($affected)) {
					die($affected->getMessage());
				}else{
					header("Location:products.php");
				}
			}
			 
		 }	
	}
	
?>
