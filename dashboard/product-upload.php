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
		<table width="50%" >
  <tr>
    <td><a href="products.php">Back to Products</a></td> 
  </tr>
</table>
<hr>

<form action="config.php" method="post" enctype="multipart/form-data">
    <p >Upload Product Form</p>
	<label>Product Name:</label> 
	<input type="hidden" name="userId" id="userId" value="<?php echo $_SESSION['userId']?>" >
 <input type="text" name="name" id="name" placeholder="product name" required="" ><br> <br>
 <label>Description:</label>&nbsp;&nbsp;&nbsp; 
 <input type="text" name="desc" id="desc" placeholder="product description" required="" ><br> <br>
 <label>Product Price:</label>&nbsp;&nbsp;&nbsp; 
 <input type="text" name="cost" id="cost" placeholder="cost" required=""><br> <br>
 <label >Upload</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="file"  name="file" id="file"><br><br>
<input type="submit" value="Upload" name="upload">

</form>
</div>

<hr>

  <?php 
 include('includes/footer.php');
 ?>
