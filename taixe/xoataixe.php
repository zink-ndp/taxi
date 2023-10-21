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

$maTaixe = $_POST["TX_MA"];
$sql = "SELECT * FROM taixe WHERE TX_MA = '$maTaixe'";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    // Nếu sdt không tồn tại, thông báo lỗi và reload lại trang
    echo '<script language="javascript">
    alert("Mã tài xế không tồn tại!");
    history.back();
     </script>';
    exit();
}

// Xóa người dùng dựa trên email
$sql_xoatrangthai = "DELETE FROM trangthai WHERE TX_MA = '$maTaixe'";
if ($conn->query($sql_xoatrangthai) === TRUE) {
    $sql_xoaphutrach = "DELETE FROM phutrach WHERE TX_MA = '$maTaixe'";
    if($conn->query($sql_xoaphutrach) === TRUE){
        $sql_xoataixe = "DELETE FROM taixe WHERE TX_MA = '$maTaixe'";
        if ($conn->query($sql_xoataixe) === TRUE) {
            echo '<script language="javascript">
            alert("Xóa tài xế thành công!");
            history.back();
            </script>';
            } else {
                echo "Xóa tài xế thất bại: " . $conn->error;
            }
        }else{
            echo "Xóa phục trách tài xế thất bại: ". $conn->error;
        }     
    } else {
        echo "Xóa trạng thái tài xế thất bại: " . $conn->error;
    }

// Đóng kết nối
$conn->close();
?>
