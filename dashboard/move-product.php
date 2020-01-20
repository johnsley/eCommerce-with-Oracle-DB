<?php 
include "../db.php"; 
if(isset($_SESSION['email']) && $_SESSION['usertype'] == 'ADMIN') {
	
}else{
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
   
  <h2 align="center">Welcome to Chester's Cyclic Outlet Limited Dashboard</h2>

<p align="center"><img src="../images/cover.png" alt="Workplace" usemap="#workmap" width="100%" height="200" ></p>
<table width="50%" >
  <tr>
    <td align="center" ><a href="index.php">Home</a></td>
    <td><a href="products.php">Products</a></td> 
    <td><a href="product-upload.php">Add Product</a></td>
    <td><a href="products-in-warehouse.php">Products in Warehouse</a></td>
  </tr>
</table> 
<hr>
<div align="center">
  <p align="center"> <table align="center">
  <tr>
    
    <?php
              
                include_once 'includes/dbh.inc.php';

                            $sql="SELECT * FROM product ORDER BY product_id DESC";

                            $stmt=mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt,$sql)) {
                                # code...
                                header("Location:index.php?error=sqlErrorSELECT");
                                exit();
                            }else{
                                mysqli_stmt_execute($stmt);
                                $result=mysqli_stmt_get_result($stmt);

                                while ($row=mysqli_fetch_assoc($result)) {
                                   $_SESSION['infoid'] = $row['product_id'];
                                    $infoids = $_SESSION['infoid'];
                                   
                                    if ($row['product_id'] >0) {
                                        # code...
                                    

                echo '
                   <td><a href="product-info.php?info='.$row["product_id"].'"><p align="center"><img src="images/'.$row["file"].'" alt=""  width="200px;" height="100px;" ><footer>'.$row["product_name"].'</footer></p></a></td>
                 ';

                }

                    }
                    //exit();
                 }
                 ?>
   
  </tr>
</table></p>
</div>
<hr>
  <?php 
 include('includes/footer.php');
 ?>