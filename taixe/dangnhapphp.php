<?php

include("connect.php");

$username = $_POST["username"];
$password = md5($_POST["psw"]); // Mã hóa mật khẩu người dùng

$sql = "SELECT * FROM taixe WHERE TX_USERNAME = '$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    if ($password === $row["TX_PASSWORD"]) { // So sánh mật khẩu đã mã hóa
        // Đăng nhập thành công, thiết lập các biến session
        $_SESSION["TX_ma"] = $row["TX_MA"];
        $_SESSION["ten"] = $row["TX_TEN"];
        $_SESSION["banglai"] = $row["TX_BANGLAI"];
        $_SESSION["sdt"] = $row["TX_SDT"];
        $_SESSION["username"] = $row["TX_USERNAME"];
        $_SESSION["psw"] = $row["TX_PASSWORD"];
        $_SESSION["gioitinh"] = $row["TX_GIOITINH"];
        $_SESSION["hinhanh"] = $row["TX_HINHANH"];

        echo '<script language="javascript">
        alert("Đăng nhập thành công!");
        window.location.href = "index.php"; // Chuyển hướng sau khi đăng ký thành công
        </script>';
        
        exit();
    } else {
        echo '<script language="javascript">
        alert("Nhập sai mật khẩu.");
        window.location.href = "dangnhap.php"; // Chuyển hướng lại trang đăng nhập
        </script>';
        exit();
    }
} else {
    echo '<script language="javascript">
    alert("Tên đăng nhập không tồn tại.");
    window.location.href = "dangnhap.php"; // Chuyển hướng lại trang đăng nhập
    </script>';
    exit();

}
?>