<?php
$activate = "contact";
include('header.php');
?>
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ<i class="ion-ios-arrow-forward"></i></a></span> <span>Thông tin cá nhân<i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Đăng Ký</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
      <div class="container-fluid pt-5">
    <div class="text-center mb-4">

    </div>

    <div class="row px-xl-5">
        <!-- dag ky-->
        <div class="col-lg-12 mb-5">
            <section class="dangky">
                <div class="row">
                    <div class="col-6">
                        <form class="row g-3 formdangky" action="dangky.php" method="POST">
                            
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Họ
                                    và
                                    tên<span class="error"></span> </label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="Tên" name="ten">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Email<span class="error">*</span> </label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Nhập địa chỉ email của bạn"
                                    name="email">
                            </div>
                            <div class="col-md-6">
                                <label for="inputNumberl4" class="form-label">Tên đăng nhập<span class="error"></span></label>
                                <input type="text" class="form-control" id="inputNumberl4" name="cccd">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Mật
                                    khẩu<span class="error">*</span></label>
                                <input type="password" class="form-control" id="Mật khẩu" name="psw">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Nhập
                                    lại mật khẩu<span class="error">*</span></label>
                                <input type="password" class="form-control" id="Nhập lại" name="psw1">
                            </div>
                            <div class="col-md-6">
                                <label for="inputNumberl4" class="form-label">Số
                                    điện thoại<span class="error"></span></label>
                                <input type="text" class="form-control" id="inputNumberl4" name="sdt">
                            </div>
                            <div class="col-md-6">
                                <label for="inputtext4" class="form-label">Địa
                                    chỉ<span class="error"></span></label>
                                <input type="text" class="form-control" id="Nhập lại" name="diachi">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Giới
                                    tính</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gioitinh" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Nam
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gioitinh" id="flexRadioDefault2"
                                        checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Nữ
                                    </label>
                                </div>
                            </div>
                            
                            <input type="submit" class="mt-2" name="sb" value="Đăng ký">
                        </form>

                    </div>
                </div>
            </section>
        </div>
        
    </div>

    
</div>

      </div>
    </section>
	

<?php
include('footer.php');
?>