<?php

include("connect.php");

    $username = $_POST["username"];
    $password = $_POST["psw"];

    $sql = "SELECT * FROM nhanvien WHERE NV_USERNAME = '$username'";
    $result = $conn->query($sql);
    // Sử dụng câu lệnh chuẩn bị để tránh SQL Injection
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("s", $username);
    // $stmt->execute();
    // $result = $stmt->get_result();

    // echo $sql ;
    // echo $username ;
    // echo $password ;

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = md5($password); // Mã hóa mật khẩu đầu vào

        // echo $hashed_password.' '.$row["NV_PASSWORD"];
        if ($hashed_password === $row["NV_PASSWORD"]) {
            // Đăng nhập thành công, thiết lập các biến session
            $_SESSION["NV_ma"] = $row["NV_MA"];
            $_SESSION["qh"] = $row["QH_MA"];
            $_SESSION["ten"] = $row["NV_TEN"];
            $_SESSION["sdt"] = $row["NV_SDT"];
            $_SESSION["email"] = $row["NV_EMAIL"];
            $_SESSION["username"] = $row["NV_USERNAME"];
            $_SESSION["psw"] = $row["NV_PASSWORD"];
            $_SESSION["gioitinh"] = $row["NV_GIOITINH"];
            $_SESSION["vaitro"] = $row["VT_MA"];
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
