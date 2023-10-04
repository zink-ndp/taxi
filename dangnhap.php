<?php

include("connect.php");
                if(isset($_POST["taxi"])){
                    
                    $sql="SELECT * FROM khachhang where user='".$_POST["user"]."' AND matkhau='".md5($_POST["password"])."'";
                    $result1 = $conn->query($sql);
                  // print_r($result1);
                    if($result1->num_rows>0){
                        
                        $row = $result1->fetch_assoc();
                        
                        $_SESSION["ma"] = $row["MA"];
                        $_SESSION["QH_ma"] = $row["QH_MA"];
                        $_SESSION["ten"]=$row["TEN"];
                        $_SESSION["sdt"]=$row["SDT"];
                        $_SESSION["email"]=$row["EMAIL"];
                        $_SESSION["usesname"] = $row["USESNAME"];
                        $_SESSION["password"]=$row["PASSWORD"];
                        $_SESSION["gioitinh"] = $row["GIOITINH"];
                   
                        header('Location: index.php');
                    }
                    else{
                 
                        echo '<script language="javascript">
                    alert("Nhập sai email hoặc mật khẩu.");
                    history.back();
                    </script>';
                      
                    }
                   
                    }
                
                ?>