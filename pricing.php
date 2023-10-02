<?php
$activate = "pricing";
@include('header.php');
?>
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ<i class="ion-ios-arrow-forward"></i></a></span> <span>Đánh giá <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Đánh giá</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="car-list">
	    				<table class="table">
						    <!-- <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th class="bg-primary heading">Tỉ lệ mỗi giờ</th>
						        <th class="bg-dark heading">Tỉ lệ mỗi ngày</th>
						        <th class="bg-black heading">Cho thuê</th>
						      </tr>
						    </thead> -->
							<h2>Đánh giá chuyến xe</h2>
    						<form method="post" action="">
        					<label for="rating">Đánh giá:</label>
        					<select id="rating" name="rating" required>
            					<option value="1">1 sao</option>
            					<option value="2">2 sao</option>
            					<option value="3">3 sao</option>
            					<option value="4">4 sao</option>
            					<option value="5">5 sao</option>
       						</select><br><br>
       				 		<label for="comments">Bình luận:</label>
       					 	<textarea id="comments" name="comments" rows="4" cols="50"></textarea><br><br>
							<input type="submit" value="Gửi đánh giá">
   						 </form>
						    
						  </table>
					  </div>
    			</div>
    		</div>
			</div>
		

		</section>


<?php
@include('footer.php');
?>