<?php

include('connect.php');

if(isset($_POST["dntaixe"])){
    $sql=" UPDATE taixe SET TX_PASSWORD='".$_POST["psw"]."' WHERE TX_USERNAME = '".$_SESSION["username"]."'
    ";
    $result = $conn->query($sql);
    if($result){
        echo '<script language="javascript">
        alert("Đã lưu thông tin!");
        window.location.href = "index.php"; // Chuyển hướng về trang chủ
        </script>';
    } else {
        echo '<script language="javascript">
        alert("Không thể cập nhật!");
        history.back();
        </script>';
    }
}

if(isset($_POST["rsmk"])){
    $sql1 = "select * from taixe
    where TX_USERNAME = '".$_SESSION["username"]."' 
    and TX_PASSWORD= '".md5($_POST["psw"])."'";
    $result = $conn->query($sql1);
    if($result->num_rows > 0){
        if($_POST["psw1"]== $_POST["psw"]){
            echo '<script language="javascript">
            alert("Mật khẩu cũ không được giống mật khẩu mới!");
            history.back();
            </script>';
        } elseif($_POST["psw1"] != $_POST["psw2"]){
            echo '<script language="javascript">
            alert("Mật khẩu nhập lại không khớp!");
            history.back();
            </script>';
        } else {
            $sql=" UPDATE taixe set TX_PASSWORD ='".md5($_POST["psw1"])." ' 
            where TX_USERNAME = '".$_SESSION["username"]." '";
            $result1 = $conn->query($sql);
            echo '<script language="javascript">
            alert("Đổi mật khẩu thành công!");
            window.location.href = "admin/index.php"; // Chuyển hướng về trang chủ
            </script>';
        }
    } else {
        echo '<script language="javascript">
        alert("Mật khẩu cũ không đúng!");
        history.back();
        </script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">


<!-- auth-reset-password.html  21 Nov 2019 04:05:02 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>TAXI - ĐỔI MẬT KHẨU</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>
    <style>
       form {
    background-color: honeydew;;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 50px 50px;
    height: 100%;
    text-align: -webkit-right;
}
    </style>
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ<i class="ion-ios-arrow-forward"></i></a></span> <span>Đổi mật khẩu<i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Đổi mật khẩu</h1>
          </div>
        </div>
      </div>
    </section>
<form method="POST" action="doimk.php" >
        <div class="text-again: center;">
                  <div class="col-md-12" >
                    <label for="inputAddress">Tên đăng nhập:<?php echo $_SESSION["TX_USERNAME"]?>
                  </div></label>
                    
                  <div class="col-md-12">
                    <label for="password">Mật khẩu cũ</label>
                    <input id="password" type="password" class="form" data-indicator="pwindicator"
                      name="psw2" tabindex="2" required>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="password">Mật khẩu mới</label>
                    <input id="password" type="password" class="form" data-indicator="pwindicator"
                      name="psw" tabindex="2" required>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label for="password-confirm">Xác nhận mật khẩu mới</label>
                    <input id="password-confirm" type="password" class="form" name="psw1"
                      tabindex="2" required>
                  </div>
                  <br>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" name="rsmk">
                      Đổi mật khẩu
                    </button>
                  </div>
            </div>
                </form>
