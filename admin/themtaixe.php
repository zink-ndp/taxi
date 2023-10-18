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

$TX_SDT = $_POST["TX_SDT"];
$sql = "SELECT * FROM nguoidung WHERE TX_SDT = '$TX_SDT'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Nếu email đã tồn tại, thông báo lỗi và reload lại trang
    echo '<script language="javascript">
    alert("Số điện thoại đã tồn tại!");
    history.back();
     </script>';
    exit();
}
// Thêm khách hàng vào cơ sở dữ liệu
    $sql = "INSERT INTO taixe (TX_TEN,TX_BANGLAI,TX_SDT,TX_USERNAME,TD_DATE,X_MA,TX_GIOITINH,TX_HINHANH)
    VALUES ('".$_POST["email"] ."', '".$_POST["dia_chi"] ."', '".$_POST["ho_ten"] ."',
     '".$_POST["so_dien_thoai"] ."','".$_POST["phanquyen"] ."') ";

 $result = $conn->query($sql);

if ( $result) {
  echo '<script language="javascript">
  alert("Thêm thành công!");
  history.back();
    </script>';
} else {
    echo "Thêm tài xê thất bại: " . $conn->error;
}


// Đóng kết nối
$conn->close();
?>