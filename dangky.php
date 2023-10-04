<?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "taxi";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                if(isset($_POST["taxi"])){
                    //echo $_POST["sdt"]."<br>";
                    $sql1="SELECT * FROM khachhang where email='".$_POST["email"]."' ";
                    $result1= $conn->query($sql1);
                    if(mysqli_num_rows($result1)>0){
                        echo '<script language="javascript">
                    alert("Email đã được đăng ký!");
                    history.back();
                     </script>';
                    
                    }
                    else{
                   
                    $date = date_create($_POST["ngaysinh"]);
                    $sql2="INSERT INTO khachhang(kh_ma,qh_ma,kh_ten,kh_sdt,kh_email,kh_username,kh_pasword,kh_gioitinh) 
                    values('".$_POST["kh_ma"]."','".$_POST["qh"]."',  '".$_POST["ten"]."','".$_POST["sdt"]."','".$_POST["email"]."',
                    '".$_POST["username"]."','".md5($_POST["psw"])."','".$_POST["gioitinh"]."') ";
                    //echo $result2."<br>";
                    $result2 = $conn->query($sql2);

                    $sql="SELECT * FROM khachhang where email='".$_POST["email"]."' ";
                    $result1 = $conn->query($sql);
                    //echo $sql."<br>";
                    if($result1->num_rows>0){
                       
                        
                        $row = $result1->fetch_assoc();
                        
                        session_start();
                        $_SESSION["kh_ma"] = $row["KH_MA"];
                        $_SESSION["qh"]=$row["QH_MA"];
                        $_SESSION["ten"]=$row["KH_TEN"];
                        $_SESSION["sdt"]=$row["KH_SDT"];
                        $_SESSION["email"]=$row["KH_USERNAME"];
                        $_SESSION["psw"]=$row["KH_PASSWORD"];
                        $_SESSION["gioitinh"]=$row["KH_GIOITINH"];
                        header('Location: index.php');
                   
                      //  header('Location: index.php');
                   }
                   else{
                       echo"Lỗi không thể đăng ký";
                     
                   }
                    }
                }
                ?>