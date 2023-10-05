<?php

    require 'connect.php';
    require 'functions.php';

// Kiểm tra nếu biểu mẫu đã được gửi
if (isset($_POST["suathongtin"])) {
    // Lấy dữ liệu từ biểu mẫu
    $ten = $_POST["ten"];
    $email = $_POST["email"];
    $password = $_POST["psw"];

    
    // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
    $hashed_password = md5($password);
    
    $nextId = getMaxId($conn,'KH_MA','khachhang')+1;

    // Tạo câu lệnh SQL để chèn dữ liệu vào bảng khachhang (loại bỏ KH_MA)
    $sql = "INSERT INTO khachhang VALUES ($nextId, '$ten','$email','$hashed_password')";

    // Thực hiện câu lệnh SQL và kiểm tra kết quả
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">
            alert("lưu thành công!");
            window.location.href = "index.php"; // Chuyển hướng sau khi đăng ký thành công
            </script>';
    } else {
        echo "Lỗi khi thực hiện đăng ký: " . $conn->error;
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
}
?>
