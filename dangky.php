<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taxi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

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
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Tạo câu lệnh SQL để chèn dữ liệu vào bảng khachhang (loại bỏ KH_MA)
    $sql = "INSERT INTO khachhang (QH_MA, KH_TEN, KH_SDT, KH_EMAIL, KH_USERNAME, KH_PASSWORD, KH_GIOITINH)
            VALUES ('$qh_ma', '$ten', '$sdt', '$email', '$username', '$hashed_password', '$gioitinh')";

    // Thực hiện câu lệnh SQL và kiểm tra kết quả
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">
            alert("Đăng ký thành công!");
            window.location.href = "index.php"; // Chuyển hướng sau khi đăng ký thành công
            </script>';
    } else {
        echo "Lỗi khi thực hiện đăng ký: " . $conn->error;
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
}
?>
