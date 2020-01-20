<?php
              if (isset($_POST['move'])) {
                include_once 'dbh.inc.php';

                        //$ID=4;
                         $user_uid="kyalo@gmail.com";
                           // $infoids = $_SESSION['infoid'];
                            $name="";
                            $product_desc="";
                            $cost="";
                            $file="";
                            $fileOrder="";
                            $ID= $_POST['move'];


                           // $ID= $_GET['info'];

                            $sql="SELECT * FROM warehouse_product WHERE warehouse_product_id= '$ID' ORDER BY warehouse_product_id DESC";

                            $stmt=mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt,$sql)) {
                                # code...
                                header("Location:../products.php?error=sqlErrorSELECT");
                                exit();
                            }else{
                                mysqli_stmt_execute($stmt);
                                $result=mysqli_stmt_get_result($stmt);

                                while ($row=mysqli_fetch_assoc($result)) {
                                   
                                    if ($row['warehouse_product_id'] >0) {
                                        # code...
                                    
                                $name= $row["product_name"];
                                $product_desc=$row["product_desc"];
                                $cost=$row["cost"];
                                $file=$row["file"];
                                $fileOrder=$row["file_order"];


                        $sql="INSERT INTO product(product_name,product_desc,cost,user_email,file,file_order) VALUES(?,?,?,?,?,?);";
                        if (!mysqli_stmt_prepare($stmt,$sql)) {
                        # code...
                        header("Location:../products.php?error=sqlErrorINSERT");
                        exit();
                    }else{
                        mysqli_stmt_bind_param($stmt,"ssssss",$name,$product_desc,$cost,$user_uid,$file,$fileOrder);
                        mysqli_stmt_execute($stmt);
                        $results=mysqli_stmt_get_result($stmt);
                        move_uploaded_file($fileTmpName, $fileDestination);
                        header("Location:../products.php?error='InsertIsOkay'");
                        exit();

                        $stmt->close();
                    }

                }

                    }
                    //exit();
                 }
             }


                 ?>