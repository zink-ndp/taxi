<?php 
include("../connect.php");
if (isset($_POST["dangnhaptx"])) {
    $username = $_POST["username"];
    $password = md5($_POST["psw"]);

    $sql = "SELECT * FROM taixe WHERE TX_USERNAME = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = md5($password); // Mã hóa mật khẩu đầu vào

        if ($hashedPassword === $row["TX_PASSWORD"]) {
            // Đăng nhập thành công
            session_start();
            $_SESSION["TX_ma"] = $row["TX_MA"];
            $_SESSION["ten"] = $row["TX_TEN"];
            $_SESSION["sdt"] = $row["TX_SDT"];
            $_SESSION["banglai"] = $row["TX_BANGLAI"];
            $_SESSION["username"] = $row["TX_USERNAME"];
            $_SESSION["psw"] = $row["TX_PASSWORD"];
            $_SESSION["gioitinh"] = $row["TX_GIOITINH"];

            echo '<script language="javascript">
            alert("Đăng nhập thành công!");
            window.location.href = "index.php"; // Chuyển hướng sau khi đăng nhập thành công
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
<head>
  <link rel="stylesheet" href="../css/style.css">
</head>
 <div class="col-6">
    <h2>Đăng nhập</h2>
      <form class="row g-3 formdangky" action="dntaixe.php" method="POST">
        <div class="col-md-12">
          <label for="inputNumberl4" class="form-label">Tên đăng nhập<span class="error"></span></label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="col-md-12">
          <label for="inputPassword4" class="form-label">Mật khẩu<span class="error">*</span></label>
          <input type="password" class="form-control" id="password" name="psw">
        </div>
        <div class="col-md-12 mt-3" >
          <button type="submit" class="mt-2 btn btn-success "  name="dangnhaptx">Đăng nhập </button>
        </div>
      </form>
 </div>