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

// Xóa người dùng dựa trên email
$sql = "DELETE FROM nguoidung WHERE EMAIL = '$email'";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">
    alert("Xóa người dùng thành công!");
    history.back();
    </script>';
} else {
    echo "Xóa người dùng thất bại: " . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
