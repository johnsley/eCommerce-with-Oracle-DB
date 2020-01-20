<?php 
include "db.php"; 
 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chester's Cyclic Outlet</title>
</head>

<body>
<h2 align="center">Welcome to Chester's Cyclic Outlet Limited</h2>
<hr>
<div align="center">	
<?php	
 echo "THANK YOU FOR BUYING ".$_SESSION['PNAME']. ", <a href='index.php'>Buy More Products.</a>";		
?>
</div>
<hr>
     <?php 
 include('includes/footer.php');
 ?>
 </body>
 </html>
 