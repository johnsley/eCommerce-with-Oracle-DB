
<?php 
session_start(); 
$user=$_SESSION['email'];

require 'includes/dbh.inc.php';
//require 'upload.inc.php';
//require_once '../includes/login.inc.php';
//$userName=$_POST['name'];
//$fileActualExt=$_SESSION['file'];
$lecid= $_SESSION['email'];

    if (isset($_SESSION['email'])) {
                                # code...
    //header("Location: home.php");
    }
     else{
        header("Location: index.php");
        }

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chester's Cyclic Outlet</title>

</head>
<body>
<div align="center">
		<table width="50%" >
  <tr>
    <td align="center" ><a href="index.php">Home</a></td>
    <td><a href="move-product.php">Move Product From Store1/Warehouse</a></td>
    <td><a href="products-in-warehouse.php">Products in Warehouse</a></td>
  </tr>
</table>

	<h2 align="center">Welcome to Chester's Cyclic Outlet Limited Dashboard</h2>

<p align="center"><img src="images/bike.jpg" alt="Workplace" usemap="#workmap" width="1300" height="479" ></p>



<div align="center">
	<p align="center"> <table align="center">
  <tr>
  	
    <?php
              
                include_once 'includes/dbh.inc.php';

                            $infoids = $_SESSION['infoid'];
                            $ID= $_GET['info'];

                            $sql="SELECT * FROM product WHERE product_id= '$ID' ORDER BY product_id DESC";

                            $stmt=mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt,$sql)) {
                                # code...
                                header("Location:index.php?error=sqlErrorSELECT");
                                exit();
                            }else{
                                mysqli_stmt_execute($stmt);
                                $result=mysqli_stmt_get_result($stmt);

                                while ($row=mysqli_fetch_assoc($result)) {
                                  $_SESSION['product_id'] = $row['product_id'];
                                  $_SESSION['user_email'] = $row['user_email'];
                                   
                                    if ($row['product_id'] >0) {
                                        # code...
                                    

                echo '
                   <td><p align="center"><img src="images/'.$row["file"].'" alt=""  width="200px;" height="100px;" ><footer>'.$row["product_name"].'</footer><br>
                   <footer>'.$row["product_desc"].'</footer> <br
                   <footer>'.$row["cost"].'</footer>

                   </p></td>
                   <a href="includes/product-move.php?info='.$row["product_id"].'"><p>Move</P></a>
                 ';

                 echo '

                 <form action="includes/product-move.php" method="post" enctype="multipart/form-data">
                 <button name="move" value="'.$row["product_id"].'">Move</button>
                 </form>
                 '

                 ;

                }

                    }
                    //exit();
                 }
                 ?>
   
  </tr>
</table></p>
<form action="includes/product-move.php" method="post" enctype="multipart/form-data">
  

</form>
</div>

  <?php 
 include('includes/footer.php');
 ?>