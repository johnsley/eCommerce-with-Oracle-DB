<?php 
include "db.php"; 
if(isset($_GET['id'])){
	
	if(isset($_SESSION['email'])){
		
		$userId = $_SESSION['userId'];
		$pid = $_GET['id'];
		
		 $res = $db->query("SELECT * FROM PRODUCTS WHERE PID = '".$pid."' ");
		 while($row = $res->fetchRow()){
			 
			 $_SESSION['PNAME'] = $row[1];
			 
			 $sql  = "INSERT INTO SALES (CUSTOMERID, PNAME, PDESC, PCOST, PFILE, CREATED_AT) VALUES ('".$userId."', '".$row[1]."', '".$row[2]."', '".$row[3]."', '".$row[4]."', '')";
			 $affected = $db->exec($sql);
			 if (PEAR::isError($affected)) {
					die($affected->getMessage());
			 }else{
				 
				header("Location:checkout.php");
			}
			 
		 }
	}else{
		echo "<p align='center'><b><font color='red' size='5em'>Please Login First!</font><b></p>";
	}
	
}
include('includes/header.php');
 ?>
<hr>
<div align="center">
<p align="center"><b>OUR PRODUCTS</b>
</p>
	<p align="center"> <table align="center">
  <tr>
  	
<?php		
	$res = $db->query("SELECT * FROM PRODUCTS ORDER BY PID DESC");
	
	while($row = $res->fetchRow()){
		
		if(isset($_SESSION['email'])){
			echo '<td width="25%"><p align="center"><img src="dashboard/images/'.$row[4].'" alt=""  width="200px;" height="100px;" ><footer>'.$row[1].'<br>'.$row[3].'<br>'.$row[2].'<br><br>'.'<a href="?id='.$row[0].'"><button>Buy Now</button></a></footer></p></td>';
		}else{
			echo '<td width="25%"><p align="center"><img src="dashboard/images/'.$row[4].'" alt=""  width="200px;" height="100px;" ><footer>'.$row[1].'<br>'.$row[3].'<br><br>'.'<a href="?id='.$row[0].'"><button>Buy Now</button></a></footer></p></td>';
		}
		  
	}		
?>
   
  </tr>
</table></p>
</div>
<hr>
     <?php 
 include('includes/footer.php');
 ?>
 