<?php

include("connect.php");
                if(isset($_POST["taxi"])){
                    
                    $sql="SELECT * FROM khachhang where user='".$_POST["user"]."' AND matkhau='".md5($_POST["password"])."'";
                    $result1 = $conn->query($sql);
                  // print_r($result1);
                    if($result1->num_rows>0){
                        
                        $row = $result1->fetch_assoc();
                        
                        $_SESSION["kh_ma"] = $row["KH_MA"];
                        $_SESSION["qh"] = $row["QH_MA"];
                        $_SESSION["ten"]=$row["KH_TEN"];
                        $_SESSION["sdt"]=$row["KH_SDT"];
                        $_SESSION["email"]=$row["KH_EMAIL"];
                        $_SESSION["usesname"] = $row["KH_USESNAME"];
                        $_SESSION["psw"]=$row["KH_PASSWORD"];
                        $_SESSION["gioitinh"] = $row["KH_GIOITINH"];
                   
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