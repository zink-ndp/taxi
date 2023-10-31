<?php
$activate = "car";
@include('header.php');
?>
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ<i class="ion-ios-arrow-forward"></i></a></span> <span>Xe<i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Chọn tài xế ở gần bạn</h1>
          </div>
        </div>
      </div> 
    </section>
		

		<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
				<?php
					$sql="SELECT tx.tx_ma, tx.tx_ten, tx.tx_hinhanh, x.x_ma, x.x_mota, x.x_hinhanh, t.tt_toadox, t.tt_toadoy
							FROM trangthai t 
							JOIN phutrach pt on pt.TX_MA = t.TX_MA
							JOIN xe x on x.X_MA = pt.X_MA
							JOIN taixe tx on tx.TX_MA = pt.TX_MA
							WHERE t.TT_TRANGTHAI = 1 
								AND(t.TX_MA, t.TD_date) IN (
									SELECT t.TX_MA, MAX(t.TD_date)
									FROM trangthai t
									GROUP BY t.TX_MA
								) LIMIT 6;";
					$rs = querySqlwithResult($conn, $sql);

					$data = array();
					while ($x = mysqli_fetch_assoc($rs)) {
						if ($x['tx_hinhanh']==NULL) $anhtx = "default.png"; else $anhtx = $x['tx_hinhanh'];
				?>
					<div class="col-4">
						<div class="car-wrap rounded ftco-animate">
							<div class="img rounded d-flex align-items-end" style="background-image: url(images/xe/<?php echo $x['x_hinhanh'] ?>);">
								<img src="images/taixe/<?php echo $anhtx ?>" style="height: 6rem; margin-left: 10px; margin-bottom: -1.3rem;" alt="">
							</div>
							<div class="text">
								<h2 class="mb-0"><?php echo $x['tx_ten'] ?></h2>
								<div class="d-flex mb-3">
									<span class="cat"><?php echo $x['x_mota'] ?></span>
									<p class="price ml-auto">5<i style="color: #f7d219;" class="fas fa-star"></i> </p>
								</div>
								<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Đặt ngay</a>
							</div>
						</div>
					</div>
				<?php } ?>
				
    		</div>
    		<div class="row mt-5">
          <!-- <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div> -->
        </div>
    </div>
    </section>
    

<?php
@include('footer.php');
?>