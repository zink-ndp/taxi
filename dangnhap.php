    <?php

include("connect.php");

if (isset($_POST["dangnhap"])) {
    $username = $_POST["username"];
    $password = md5($_POST["psw"]);

    $sql = "SELECT * FROM khachhang WHERE KH_USERNAME = ?";

    // Sử dụng câu lệnh chuẩn bị để tránh SQL Injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = md5($password); // Mã hóa mật khẩu đầu vào

        if ($hashed_password === md5($row["KH_PASSWORD"])) {
          echo $hashed_password.' '.md5($row["KH_PASSWORD"]);
            // Đăng nhập thành công, thiết lập các biến session
            $_SESSION["kh_ma"] = $row["KH_MA"];
            $_SESSION["qh"] = $row["QH_MA"];
            $_SESSION["ten"] = $row["KH_TEN"];
            $_SESSION["sdt"] = $row["KH_SDT"];
            $_SESSION["email"] = $row["KH_EMAIL"];
            $_SESSION["username"] = $row["KH_USERNAME"];
            $_SESSION["psw"] = $row["KH_PASSWORD"];
            $_SESSION["gioitinh"] = $row["KH_GIOITINH"];

            echo '<script language="javascript">
            alert("Đăng nhập thành công!");
            window.location.href = "index.php"; // Chuyển hướng sau khi đăng ký thành công
            </script>';
            
            exit();
        } else {
          

            echo "Nhập sai mật khẩu.";
        }
    } else {
        echo "Tên đăng nhập không tồn tại.";
    }

    $stmt->close();
}
?>
