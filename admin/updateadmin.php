<?php
                include('connect.php');
               

                  $sql1="select*from khachhang where KH_USERNAME='".$_SESSION["username"]."'";
                  
                  $result1 = $conn->query($sql1);
                    if($result1->num_rows>0){
                        $sql=" UPDATE khachhang SET 
                        KH_TEN='".$_POST["ten"]."', KH_SDT='".$_POST["sdt"]."',KH_EMAIL='".$_POST["email"]."' WHERE KH_USERNAME='".$_SESSION["username"]."'
                        ";
                        $result2 = $conn->query($sql);
                        //echo $sql."<br>";
                        
                        if( $result2){
                            echo '<script language="javascript">
                           alert("Đã cập nhật thông tin thành công, vui lòng đăng nhập lại");
                           window.location.href = "index.php"; // Chuyển hướng về trang chủ
                             </script>';
                        }
                     
                       }
                     
                       else{
                        echo 
                        '<script language="javascript">
                            alert("Không Thể Cập Nhật!");
                            history.back();
                            exit();
                             </script>';
                        
                       }

                 
                    
                
                ?>