<?php

    require 'connect.php';
    // require 'functions.php';

// Kiểm tra nếu biểu mẫu đã được gửi
if (isset($_POST["dangky"])) {
    // Lấy dữ liệu từ biểu mẫu
    $ten = $_POST["ten"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["psw"];
    $sdt = $_POST["sdt"];
    $gioitinh = $_POST["gioitinh"];
    $qh_ma = $_POST["qh"]; // Lấy giá trị mã quận/huyện từ select

     
    // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
    $hashed_password = md5($password);
    
    $nextId = getMaxId($conn,'KH_MA','khachhang')+1;

    // Tạo câu lệnh SQL để chèn dữ liệu vào bảng khachhang (loại bỏ KH_MA)
    $sql = "INSERT INTO khachhang VALUES ($nextId, $qh_ma, '$ten', '$sdt', '$email', '$username', '$hashed_password', $gioitinh)";

    // Thực hiện câu lệnh SQL và kiểm tra kết quả
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">
            alert("Đăng ký thành công! Vui lòng đăng nhập lại!");
            window.location.href = "login.php"; // Chuyển hướng sau khi đăng ký thành công
            </script>';
    } else {
        echo "Lỗi khi thực hiện đăng ký: " . $conn->error;
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
}
?>
