<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taxi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Xử lý dữ liệu đầu vào
$maXe =$_POST["maxe"];
$loaiXe = $_POST["loai"];
$bienSoXe = $_POST["biensoxe"] ;
$moTa =$_POST["mota"];
$pdimg = $_FILES["pdimg"]["name"];

// Cập nhật thông tin xe trong cơ sở dữ liệu
$sql = "UPDATE xe SET LX_MA = '$loaiXe', X_BIENSO = '$bienSoXe', X_MOTA = '$moTa', X_HINHANH = '$pdimg' WHERE X_MA = '$maXe'";

if ($conn->query($sql) === TRUE) {
  echo '<script language="javascript">
  alert("Cập nhật thành công!");
  </script>';
  header('Location: danhsachxe.php');
} else {
  echo "Cập nhật thông tin xe thất bại: " . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
