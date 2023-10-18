<?php
$activate = "contact";
// @include ('connect.php');
@include('header.php');
?>
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ<i class="ion-ios-arrow-forward"></i></a></span> <span>Thông tin cá nhân<i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Thông tin cá nhân</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">

          <div class="col-md-8 block-9 mb-md-5">
          <form class="row g-3 formdangky" action="suathongtin.php" method="POST">
          <h1 class="text-again: center;">Thông tin cá nhân</h1>

          <div class="col-md-12" >
          <label for="inputAddress" class=" font-weight: bold"></label>Tên đăng nhập:<?php echo $_SESSION["username"]?>
          </label></div>

          <div class="col-md-12">
              <label for="inputAddress" class="form-label">Email<span class="error">*</span> </label>
              <input type="email" class="form-control" id="email"  value="<?php echo $_SESSION["email"]?>" placeholder="Nhập địa chỉ email của bạn" name="email">
          </div>
          <div class="col-md-6">
              <label for="inputAddress" class="form-label">Họ và tên<span class="error">*</span> </label>
              <input type="text" class="form-control"  value="<?php echo  $_SESSION["ten"] ?>" id="inputAddress" placeholder="Tên" name="ten">
          </div>

          <div class="col-md-6">
            <label for="inputNumberl4" class="form-label">Số điện thoại<span class="error">*</span></label>
            <input type="text" class="form-control" id="sdt" value="<?php echo $_SESSION["sdt"]?>" placeholder="Nhập địa chỉ số điện thoại của bạn" name="sdt">
          </div>

        </div>
        <div class="col-md-12">      
            <button type="submit" class="mt-2 btn btn-success"  name="luuthongtin">Lưu thông tin </button>
          </div>
      </div>

    </div>
</section>
	

<div class="row d-flex mb-5 contact-info">
  <div class="col-md-8 block-9 mb-md-5">
    <h2>&emsp;</h2>
      <form action="suathongtin.php" name="frm-login" method="post">
      </form>




<?php
@include('footer.php');
?>