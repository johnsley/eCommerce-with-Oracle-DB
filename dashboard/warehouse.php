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

<table width="70%" >
  <tr>
    <td><a href="products.php">Products</a></td> 
	<td><a href="report.php">Report</a></td>
    <td><a href="product-upload.php">Add Product to Warehouse</a></td>
    <td><a href="warehouse.php">Move Product From Warehouse</a></td>
	<td><?php echo "Hello, ".$_SESSION['name'];?></td>
	<td>|</td>
	<td><a href="logout.php">Logout</a></td>
  </tr>
</table> 
<hr>

<div align="center">
<p align="center"><b>WAREHOUSE PRODUCTS</b>
</p>
	<p align="center"> <table align="center">
  <tr>
  	
<?php		
	$res = $db->query("SELECT * FROM WAREHOUSE ORDER BY PID DESC");
	
	while($row = $res->fetchRow()){
		  echo '<td width="25%"><p align="center"><img src="images/'.$row[5].'" alt=""  width="200px;" height="100px;" ><footer>'.$row[2].'<br>'.$row[4].'<br>'.$row[3].'<br><br>'.'<a href="config.php?id='.$row[0].'&idd=4"><button><b>Move to Front Store</b></button></a></footer></p></td>';
	}		
?>
   
  </tr>
</table></p>
</div>
<hr>
  <?php 
 include('includes/footer.php');
 ?>