
<?php
require 'connect.php'; // Bao gồm tệp kết nối CSDL

if (isset($_POST["luuthongtin"])) {
    $ten = $_POST["ten"];
    $email = $_POST["email"];
    $sdt = $_POST["sdt"];

    // Đảm bảo biến phiên ("session") đã được thiết lập
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];

    //     // Sử dụng câu lệnh chuẩn bị ("prepared statements") để cập nhật thông tin người dùng
    //     $update_query = "UPDATE khachhang SET KH_TEN = ?, KH_SDT = ?, KH_EMAIL = ? WHERE KH_USERNAME = ?";
    //     $stmt = $conn->prepare($update_query);
    //     $stmt->bind_param("ssss", $ten, $sdt, $email, $username);

    //     if ($stmt->execute()) {
    //         echo '<script language="javascript">';
    //         echo 'alert("Thông tin cá nhân đã được cập nhật thành công.")';
    //         echo '</script>';
    //     } else {
    //         echo "Lỗi khi cập nhật thông tin cá nhân: " . $stmt->error;
    //     }
    // } else {
    //     echo "Biến phiên 'username' chưa được thiết lập.";
    // }

    try {
        // Thực hiện câu lệnh SQL
        $update_query = "UPDATE khachhang SET KH_TEN = ?, KH_SDT = ?, KH_EMAIL = ? WHERE KH_USERNAME = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ssss", $ten, $sdt, $email, $username);
    
        if ($stmt->execute()) {
            echo '<script language="javascript">';
            echo 'alert("Thông tin cá nhân đã được cập nhật thành công.")';
            echo '</script>';
        } else {
            echo "Lỗi khi cập nhật thông tin cá nhân: " . $stmt->error;
        }
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }
    
}
}
?>