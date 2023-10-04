<?php
$activate = "contact";
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
            <form action="#" class="bg-light p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Họ tên">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Địa chỉ">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Nội dung"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Lưu thông tin" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>
        </div>

      </div>
    </section>
	

<?php
@include('footer.php');
?>