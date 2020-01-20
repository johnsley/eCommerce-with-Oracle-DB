<?php 
include "../db.php"; 
if(isset($_SESSION['email']) && $_SESSION['usertype'] == 'ADMIN') {
 if(isset($_GET['id'])){
   $pid = $_GET['id'];	 
   $res = $db->query("SELECT * FROM PRODUCTS WHERE PID = '".$pid."' ");
   $row = $res->fetchRow();
   
   $pname = $row[1];
   $pdesc = $row[2];
   $pcost = $row[3];
   
 }
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
		<table width="50%" >
  <tr>
    <td><a href="products.php">Back to Products</a></td> 
  </tr>
</table>
<hr>

<form action="config.php" method="post" enctype="multipart/form-data">
    <p >Update Product Form</p>
	<label>Product Name:</label> 
 <input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>">
 <input type="text" name="name" id="name" value="<?php echo $pname;?>"><br> <br>
 <label>Description:</label>&nbsp;&nbsp;&nbsp; 
 <input type="text" name="desc" id="desc" value="<?php echo $pdesc;?>"><br> <br>
 <label>Product Price:</label>&nbsp;&nbsp;&nbsp; 
 <input type="text" name="cost" id="cost" value="<?php echo $pcost;?>"><br> <br>
 
<input type="submit" value="Update" name="update">

</form>
</div>

<hr>

  <?php 
 include('includes/footer.php');
 ?>
