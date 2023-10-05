<?php

include("connect.php");
                if(isset($_POST["dangnhap"])){

                    echo $_POST["username"].' '.md5($_POST["psw"]);
                    
                    $sql="SELECT * FROM khachhang where KH_USERNAME='".$_POST["username"]."' AND KH_PASSWORD='".md5($_POST["psw"])."'";
                    $result1 = $conn->query($sql);
                  // print_r($result1);
                    if($result1->num_rows>0){
                        
                        $row = $result1->fetch_assoc();
                        
                        $_SESSION["kh_ma"] = $row["KH_MA"];
                        $_SESSION["qh"] = $row["QH_MA"];
                        $_SESSION["ten"]=$row["KH_TEN"];
                        $_SESSION["sdt"]=$row["KH_SDT"];
                        $_SESSION["email"]=$row["KH_EMAIL"];
                        $_SESSION["username"] = $row["KH_USERNAME"];
                        $_SESSION["psw"]=$row["KH_PASSWORD"];
                        $_SESSION["gioitinh"] = $row["KH_GIOITINH"];
                   
                        header('Location: index.php');
                    }
                    else{
                 
                    //     echo '<script language="javascript">
                    // alert("Nhập sai email hoặc mật khẩu.");
                    // history.back();
                    // </script>';
                      
                    }
                   
                    }
                
                ?>