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

if ($result->num_rows === 0) {
    // Nếu sdt không có tồn tại, thông báo lỗi và reload lại trang
    echo '<script language="javascript">
    alert("Số điện thoại không tồn tại!");
    history.back();
     </script>';
    exit();
}
// Cập nhật khách hàng vào cơ sở dữ liệu
    $hoTen = $_POST['TX_TEN'];
    $bangLai = $_POST['TX_BANGLAI'];
    $gioiTinh = $_POST['TX_GIOITINH'];
    $hinhAnh = $_POST['TX_HINHANH'];

    $sql = "UPDATE taixe SET TX_TEN = '$hoTen',TX_BANGLAI = '$bangLai',TX_GIOITINH = '$gioiTinh',TX_HINHANH = '$hinhAnh'
    WHERE TX_SDT = '$TX_SDT' ";

 $result = $conn->query($sql);

if ( $result) {
  echo '<script language="javascript">
  alert("Cập nhật tài xế thành công!");
  history.back();
    </script>';
} else {
    echo "Cập nhật tài xế thất bại: " . $conn->error;
}


// Đóng kết nối
$conn->close();
?>