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
$loaiXe = isset($_POST["loai"]) ? $_POST["loai"] : "";
$bienSoXe = isset($_POST["biensoxe"]) ? $_POST["biensoxe"] : "";
$moTa = isset($_POST["mota"]) ? $_POST["mota"] : "";
$pdimg =$_FILES["pdimg"]['name'];

if (empty($loaiXe) || empty($bienSoXe)) {
  die("Loại xe và biển số xe không được để trống.");
}


$sql = "SELECT MAX(X_MA) AS maxid FROM xe";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$nextid = $row['maxid'] + 1;

// Thêm thông tin xe vào cơ sở dữ liệu
$sql = "INSERT INTO xe (X_MA, LX_MA, X_BIENSO, X_MOTA, X_HINHANH) VALUES ('$nextid', '$loaiXe', '$bienSoXe', '$moTa', '$pdimg')";

if ($conn->query($sql) === TRUE) {
  echo '<script language="javascript">
  alert("Thêm thành công!");
  </script>';
  header('Location: danhsachxe.php');
} else {
  echo "Thêm xe thất bại: " . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
