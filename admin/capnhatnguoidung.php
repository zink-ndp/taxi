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

if ($result->num_rows === 0) {
    // Nếu email không tồn tại, thông báo lỗi và reload lại trang
    echo '<script language="javascript">
    alert("Email không tồn tại!");
    history.back();
     </script>';
    exit();
}

// Cập nhật thông tin người dùng
$hoTen = $_POST["ho_ten"];
$diaChi = $_POST["dia_chi"];
$soDienThoai = $_POST["so_dien_thoai"];
$phanQuyen = $_POST["phanquyen"];

$sql = "UPDATE nguoidung SET TEN = '$hoTen', DIACHI = '$diaChi', SDT = '$soDienThoai', PHANQUYEN = '$phanQuyen' WHERE EMAIL = '$email'";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">
    alert("Cập nhật thành công!");
    history.back();
    </script>';
} else {
    echo "Cập nhật người dùng thất bại: " . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
