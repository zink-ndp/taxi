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
$sql = "SELECT * FROM taixe WHERE TX_SDT = '$TX_SDT'";
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
  $sql = "SELECT MAX(TX_MA) AS maxid FROM taixe";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $nextid = $row['maxid'] + 1;  
    $sql = "INSERT INTO taixe (TX_MA,TX_TEN,TX_BANGLAI,TX_SDT,TX_GIOITINH,TX_HINHANH)
    VALUES ('$nextid','".$_POST["TX_TEN"] ."', '".$_POST["TX_BANGLAI"] ."', '".$_POST["TX_SDT"] ."',
     '".$_POST["TX_GIOITINH"] ."','".$_POST["TX_HINHANH"] ."') ";

 $result = $conn->query($sql);

if ( $result) {
  echo '<script language="javascript">
  alert("Thêm thành công!");
  history.back();
    </script>';
} else {
    echo "Thêm tài xế thất bại: " . $conn->error;
}


// Đóng kết nối
$conn->close();
?>