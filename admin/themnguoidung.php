<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanmicay";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = $_POST["email"];
$sql = "SELECT * FROM nguoidung WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Nếu email đã tồn tại, thông báo lỗi và reload lại trang
    echo '<script language="javascript">
    alert("Email đã tồn tại!");
    history.back();
     </script>';
    exit();
}
// Thêm khách hàng vào cơ sở dữ liệu
    $sql = "INSERT INTO nguoidung (EMAIL,DIACHI,TEN,SDT,PHANQUYEN)
    VALUES ('".$_POST["email"] ."', '".$_POST["dia_chi"] ."', '".$_POST["ho_ten"] ."',
     '".$_POST["so_dien_thoai"] ."','".$_POST["phanquyen"] ."') ";

 $result = $conn->query($sql);

if ( $result) {
  echo '<script language="javascript">
  alert("Thêm thành công!");
  history.back();
    </script>';
} else {
    echo "Thêm nhân viên thất bại: " . $conn->error;
}


// Đóng kết nối
$conn->close();
?>