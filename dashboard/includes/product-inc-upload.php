<?php
session_start();
$user_uid=$_SESSION['email'];

if (isset($_POST['upload'])) {
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
		# code...
		if ($fileError===0) {
			# code...
			if ($fileSize < 200000) {
				# code...
				$imageFullName=$fileNameNew.".".uniqid("",true).".".$fileActualExt;
				//$fileNameNew= "profile".".".$userid.".".$fileActualExt;
				$fileDestination='../images/'.$imageFullName;
				//move_uploaded_file($fileTmpName, $fileDestination);

				include_once "dbh.inc.php";
				if (empty($imageFullName) || empty($productName) || empty($productDesc) || empty($cost)) {
					# code...
					header("Location:../product-upload.php?error=EmptyFields");
					exit();
				}else{
					$sql="SELECT * FROM product";
					$stmt=mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt,$sql)) {
						# code...
						header("Location:../product-upload.php?error=sqlError");
						exit();
					}else{
						mysqli_stmt_execute($stmt);
						$result=mysqli_stmt_get_result($stmt);
						$rowCount=mysqli_stmt_num_rows($stmt);
						$fileOrder= $rowCount +1;

						$sql="INSERT INTO product(product_name,product_desc,cost,user_email,file,file_order) VALUES(?,?,?,?,?,?);";
						if (!mysqli_stmt_prepare($stmt,$sql)) {
						# code...
						header("Location:../product-upload.php?error=sqlErrorINSERT");
						exit();
					}else{
						mysqli_stmt_bind_param($stmt,"ssssss",$productName,$productDesc,$cost,$user_uid,$imageFullName,$fileOrder);
						mysqli_stmt_execute($stmt);
						$results=mysqli_stmt_get_result($stmt);
						move_uploaded_file($fileTmpName, $fileDestination);
						header("Location:../products.php?error='InsertIsOkay'");
						exit();
					}
					}
				}

				// $_SESSION['file'] = $fileActualExt;

				// $sql="INSERT INTO assignments(user_id,status) VALUES('$userid,0')";
				// $result= mysqli_query($conn,$sql);

				header("Location:../products.php?error='InsertIsOkay'");

			}else{
				echo "Your file is too big to be uploaded";
			}
		}else{
			echo "There was an error uploading your file";
		}
	}else{
		echo "You cannot upload the file of this type";
	}

}