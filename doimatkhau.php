<?php
$activate = "contact";
// @include ('connect.php');
@include('header.php');
?>
    <head>
        <table>ĐỔI MẬT KHẨU</table>
      
    </head>
    <style>
       form {
    background-color: #424040;
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
                    <label for="inputAddress">Tên đăng nhập:<?php echo $_SESSION["username"]?>
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

                <?php
@include('footer.php');
?>