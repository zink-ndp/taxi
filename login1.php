<?php
$activate = "contact";
include('header.php');
include('connect.php');
?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ<i class="ion-ios-arrow-forward"></i></a></span> <span>Thông tin cá nhân<i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Đăng nhập</h1>
            </div>
        </div>
    </div>
</section>

<body>
    <a href="index.php">← Nhấp để trở lại trang chủ</a>
    <a href="login.php">Đăng ký</a>
  <h2>ĐĂNG NHẬP</h2>
  <div class="container" id="container">
      <div class="form-container sign-in-container">
        <form action="hienthithongtindangnhap.php" method="post">
              <span>Sử dụng tài khoản đã có</span>
              <input type="text" placeholder="Tên tài khoản" name="tk"/>
              <input type="password" placeholder="Mật khẩu" name="pass"/>
              <button>Đăng Nhập</button>
         </form>     
      </div>
      <div class="overlay-container">
          <div class="overlay">
              <div class="overlay-panel overlay-right">
                  <h1>Chào bạn!</h1>
                  <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
              </div>
          </div>
      </div>

         <script>
            const signUpButton = document.getElementById('signUp');
            const signInButton = document.getElementById('signIn');
            const container = document.getElementById('container');

            signUpButton.addEventListener('click', () => {
                container.classList.add('right-panel-active');
            });

            signInButton.addEventListener('click', () => {
                container.classList.remove('right-panel-active');
            });
        </script>
  </div>

  
</body>    
<?php
include('footer.php');
?>
