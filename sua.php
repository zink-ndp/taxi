<?php
session_start(); // Bắt đầu phiên

require 'connect.php'; // Bao gồm tệp kết nối CSDL

if (isset($_POST["luuthongtin"])) {
    $ten = $_POST["ten"];
    $email = $_POST["email"];
    $sdt = $_POST["sdt"];

    // Đảm bảo biến phiên ("session") đã được thiết lập và người dùng đã đăng nhập
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];

        try {
            // Thực hiện câu lệnh SQL
            $update_query = "UPDATE khachhang SET KH_TEN = ?, KH_SDT = ?, KH_EMAIL = ? WHERE KH_USERNAME = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->execute([$ten, $email, $sdt, $username]);
    
            echo "Thông tin cá nhân đã được cập nhật thành công.";
        } catch (PDOException $e) {
            echo "Lỗi khi cập nhật thông tin cá nhân: " . $e->getMessage();
        }
    }
}
?>
