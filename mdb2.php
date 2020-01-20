 <?php
include "db.php";
		

	        $res  = "SELECT * FROM USERS ORDER BY USERID DESC LIMIT 1";
			$row = $res->fetchRow();
			if (PEAR::isError($affected)) {
				die($affected->getMessage());
			}else{
				$row[0];
				}	
			
			

	?>