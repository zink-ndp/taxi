<?php
                include('connect.php');
               
                if(isset($_POST["mc"])){
                  $sql1="select*from nguoidung where email='".$_SESSION["email"]."'";
                  
                  $result1 = $conn->query($sql1);
                    if($result1->num_rows>0){
                        $sql=" UPDATE nguoidung SET 
                        DIACHI='".$_POST["diachi"]."', TEN='".$_POST["hoten"]."',SDT='".$_POST["sdt"]."' WHERE email='".$_SESSION["email"]."'
                        ";
                        $result2 = $conn->query($sql);
                        //echo $sql."<br>";
                        
                        if( $result2){
                            echo '<script language="javascript">
                           alert("Đã cập nhật thông tin thành công");
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
                        
                      
                        
                  }
                 
                    
                
                ?>