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
<div>
	
	<h2 align="center">Welcome to Chester's Cyclic Outlet Limited Dashboard</h2>
	<hr>
	
	<table width="50%" align="center" >
  <tr>
    <td><a href="products.php">Products</a></td> 
	<td><a href="report.php">Report</a></td>
    <td><a href="product-upload.php">Add Product to Warehouse</a></td>
    <td><a href="warehouse.php">Move Product From Warehouse</a></td>
	<td>|</td>
	<td><a href="logout.php">Logout</a></td>
  </tr>
</table> 
<hr>

	<h2 align='center'>REPORT</h2>
	<?php
	echo "<h3>PRODUCTS IN WAREHOUSE</h3>";
	echo "<table width='80%' border='1'>";
	echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>NAME</th>";
	echo "<th>DESCRIPTION</th>";
	echo "<th>COST</th>";
	echo "<th>DATE ADDED</th>";
	echo "</tr>";
	
	
	$res = $db->query("SELECT * FROM WAREHOUSE ORDER BY PID ASC");
	
	while($row = $res->fetchRow()){
		echo "<tr>";
		echo "<td>".$row[0]."</td>";
		echo "<th>".$row[2]."</th>";
		echo "<th>".$row[3]."</th>";
		echo "<th>".$row[4]."</th>";
		echo "<th>".$row[6]."</th>";
		echo "</tr>";
	}	
	
	echo "</table>";
	echo "<br>";
	echo "<h3>PRODUCTS IN FRONT STORE</h3>";
	echo "<table width='80%' border='1'>";
	echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>NAME</th>";
	echo "<th>DESCRIPTION</th>";
	echo "<th>COST</th>";
	echo "<th>DATE ADDED</th>";
	echo "</tr>";
	
	
	$res = $db->query("SELECT * FROM PRODUCTS ORDER BY PID ASC");
	
	while($row = $res->fetchRow()){
		echo "<tr>";
		echo "<td>".$row[0]."</td>";
		echo "<th>".$row[1]."</th>";
		echo "<th>".$row[2]."</th>";
		echo "<th>".$row[3]."</th>";
		echo "<th>".$row[5]."</th>";
		echo "</tr>";
	}	
	
	echo "</table>";
	?>
	
	
</div>
</body>
</html>