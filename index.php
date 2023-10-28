<?php
$activate = "index";
@include('header.php');
?>



  <?php 
    if ( isset($_POST['tx_ma']) ) {
      $form_action = "xulydatxe.php";
      $matx =$_POST['tx_ma'] ;
    } 
    else {
      $form_action = "chon_taixe.php";
      $matx = '';
    }
  ?>  
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container" id="datxe">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">
	            <h1 class="mb-4">THUÊ XE NHANH VÀ DỄ DÀNG</h1>
	            <p style="font-size: 18px;">Truy cập TAXI ngay hôm nay để đặt xe một cách TIỆN LỢI và NHANH CHÓNG! Chủ động thời gian di chuyển với tính năng "Đặt trước" và ước tính chi phí chuyến đi ngay trên Web.</p>
	            <a href="https://vimeo.com/45830194" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
	            	<div class="icon d-flex align-items-center justify-content-center">
	            		<span class="ion-ios-play"></span>
	            	</div>
	            	<div class="heading-title ml-5">
		            	<span>Easy steps for renting a car</span>
	            	</div>
	            </a>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- 
    <div id="mapContainer" class="modal">
      <a class="close" id="close">x</a>
      <div style="height: 90%; width: 100%">
        <div id="mapdx" style = "height: 100%; width: 100%" class="map leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0">
          <div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, 0px, 0px);"></div>					
        </div>
        <div class="leaflet-control-container">
          <div class="leaflet-top leaflet-right"></div>
          <div class="leaflet-bottom leaflet-left"></div>
          <div class="leaflet-bottom leaflet-right"></div>
        </div>
      </div> -->
      <!-- <script src="js/mapdatxe.js"></script> -->
    <!-- </div> -->

     <section class="ftco-section ftco-no-pt bg-light" >
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-12	featured-top">
    				<div class="row no-gutters">
	  					<div class="col-md-4 d-flex align-items-center">
	  						<form id="myForm" action="<?php echo $form_action ?>" class="request-form ftco-animate bg-primary" method="post">
		          		<h2>Chuyến đi của bạn</h2>

                  <div class="form-group">
			    					<input name="TX_MA" type="hidden" class="form-control" value="$" placeholder="">
			    				</div>
                  <div class="form-group">
                  <label for="" class="label">Vị trí của bạn</label>
                  <div class="d-flex flex-row justify-content-center align-items-center">
                      <input name="diemdi" type="text" class="form-control" placeholder="City, Airport, Station, etc">
                      <a href="chon_diemdi.php" style="margin-left: 10px; font-size: 15px;"><i style="color: white;" class="fas fa-map-marker-alt"></i></a>
                  </div>
                  </div>
                  <?php
                    if (isset($_GET['lat'])) {
                      $_SESSION['latdi'] = $_GET['lat'];
                      $_SESSION['lngdi'] = $_GET['lng'];
                    }
                  ?>
              <script>
                  const lat = <?php echo $_SESSION['latdi']?>;
                  const lng = <?php echo $_SESSION['lngdi'] ?>;
                  
                  // Nếu có tọa độ, hiển thị nó trong ô input
                  if (lat !== null && lng !== null) {
                      document.querySelector('input[name="diemdi"]').value = `${lat},${lng}`;
                  }
              </script>

                                  


              <div class="form-group">
                  <label for="" class="label">Vị trí muốn đến</label>
                  <div class="d-flex flex-row justify-content-center align-items-center">
                      <input name="diemden" type="text" class="form-control" placeholder="City, Airport, Station, etc">
                      <a href="chon_diemden.php" style="margin-left: 10px; font-size: 15px;"><i style="color: white;" class="fas fa-map-marker-alt"></i></a>
                  </div>
              </div>

              <?php
                if (isset($_GET['latden'])) {
                  $_SESSION['latden'] = $_GET['latden'];
                  $_SESSION['lngden'] = $_GET['lngden'];
                }
              ?>
              <script>

                const latden = <?php echo $_SESSION['latden']?>;
                const lngden = <?php echo $_SESSION['lngden']?>;
                // Nếu có tọa độ, hiển thị nó trong ô input
                if (latden !== null && lngden !== null) {
                    document.querySelector('input[name="diemden"]').value = `${latden},${lngden}`;
                }

              </script>


			    			   <div class="form-group">
                    <label for="" class="label">Thời gian đón</label>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </label>
		                <input type="text" class="form-control" id="time_pick" placeholder="Time">
		              </div>
			            <div class="form-group">
			              <input type="submit" name ="datxe" value="Thuê xe ngay" class="btn btn-secondary py-3 px-4">
			            </div>
			    			</form>
	  					</div>
              <?php
              
                if (!isset($_POST['tx_ma'])){
              ?>
              
                <div class="col-md-8 d-flex align-items-center">
                  <div class="services-wrap rounded-right w-100">
                    <h3 class="heading-section mb-4">Cách để thuê một chiếc taxi tốt</h3>
                    <div class="row d-flex mb-4">
                      <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                        <div class="services w-100 text-center">
                          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                          <div class="text w-100">
                            <h3 class="heading mb-2">Chọn địa điểm đón của bạn</h3>
                          </div>
                        </div>      
                      </div>
                      <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                        <div class="services w-100 text-center">
                          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                          <div class="text w-100">
                            <h3 class="heading mb-2">Chọn giao dịch tốt nhất</h3>
                          </div>
                        </div>      
                      </div>
                      <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                        <div class="services w-100 text-center">
                          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
                          <div class="text w-100">
                            <h3 class="heading mb-2">Đặt thuê xe bạn chọn</h3>
                          </div>
                        </div>      
                      </div>
                    </div>
                    <button onclick="getLocation()" class="btn btn-primary py-3 px-4">Đặt một chiếc xe hoàn hảo</button>
                <script>
                  function getLocation() {
                    if (navigator.geolocation) {
                      navigator.geolocation.getCurrentPosition(showPosition);
                    } else {
                      document.getElementById("location").innerHTML = "Trình duyệt của bạn không hỗ trợ định vị.";
                    }
                  }		
                  function showPosition(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    // document.getElementById("location").innerHTML = "Vĩ độ: " + latitude + "<br> Kinh độ: " + longitude;
                    // alert("Vĩ độ: " + latitude + "<br> Kinh độ: " + longitude)
                    // Gửi vị trí đến máy chủ PHP
                    // var xhr = new XMLHttpRequest();
                    // xhr.open("POST", "chon_taixe.php", true);
                    // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    // xhr.send("latitude=" + latitude + "&longitude=" + longitude);
                  }

                </script>
                  </div>
                </div>
              
              <?php
                } else {
                  $matx = $_POST['tx_ma'];
                  $sql = "SELECT * FROM taixe tx
                          join phutrach pt on pt.TX_MA = tx.TX_MA
                          join xe x on x.X_MA = pt.X_MA
                          where tx.TX_MA = $matx and (pt.TD_DATE, tx.TX_MA) IN (
                            select max(TD_DATE), TX_MA from phutrach GROUP BY TX_MA
                          )";
                  $rs = querySqlwithResult($conn, $sql);
                  $tt = $rs->fetch_assoc();
                  if ($tt['TX_HINHANH']==NULL) $anhtx = "default.png"; else $anhtx = $tt['TX_HINHANH'];
              ?>
                <div class="col-md-8 d-flex align-items-center">
                  <div class="services-wrap rounded-right w-100">
                    <h3 class="heading-section mb-4">Thông tin tài xế đang chọn</h3>
                    <div class="row d-flex mb-4">
                      <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                        <div style="width: 8rem; height: 8rem">
                          <img src="images/taixe/<?php echo $anhtx; ?>" alt="" class="fit-image">
                        </div>
                        <span class="mt-4">
                          <?php echo $tt['TX_TEN'] ?>
                        </span>
                      </div>
                      <div class="col-3 d-flex flex-column justify-content-center align-items-center">
                          <span>
                            0 <i style="color: #f7d219;" class="fas fa-star"></i> 
                          </span>
                          <span>
                            Số chuyến: 23
                          </span>
                      </div>
                      <div class="col-5 d-flex flex-column justify-content-center align-items-center">
                        <div style="width: 8rem; height: 8rem">
                          <img src="images/xe/<?php echo $tt['X_HINHANH']; ?>" alt="" class="fit-image" style="border-radius: 100% !important;">
                        </div>
                        <span class="mt-4">
                          <?php echo $tt['X_MOTA'] ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
                }
              
              ?>
	  				</div>
				</div>
  		</div>
    </section>


    <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Những gì chúng tôi cung cấp</span>
            <h2 class="mb-2">XE GẦN BẠN</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-12">
					<div class="row">
          <div class="col-6">
              <?php
                $sql = "SELECT tx.tx_ma, tx.tx_ten, x.x_ma, x.x_mota, x.x_hinhanh, t.tt_toadox, t.tt_toadoy
                        FROM trangthai t 
                        JOIN phutrach pt on pt.TX_MA = t.TX_MA
                        JOIN xe x on x.X_MA = pt.X_MA
                        JOIN taixe tx on tx.TX_MA = pt.TX_MA
                        WHERE t.TT_TRANGTHAI = 1 
                              AND(t.TX_MA, t.TD_date) IN (
                                  SELECT t.TX_MA, MAX(t.TD_date)
                                  FROM trangthai t
                                  GROUP BY t.TX_MA
                              )
                        LIMIT 4;";
                $rs = querySqlwithResult($conn, $sql);

                $data = array();
                while ($x = mysqli_fetch_assoc($rs)) {
                  $data[] = $x;
              ?>
							<div class="container p-3 py-3 mt-2" style="border-radius: 15px; background-color:white; box-shadow: 5px 5px 5px rgba(0,0,0,0.3);">
                <div class="card-choose">
                  <div style="width: 5rem; height: 5rem;" >
                    <img src="images/xe/<?php echo $x['x_hinhanh'] ?>" class="fit-image" alt="">
                  </div>
                  <div class="card-choose-content">
                      <span>
                        Tài xế: <span style="color: green; font-size: 18px;"><?php echo $x['tx_ten'] ?></span>
                      </span>
                      <?php echo $x['x_mota'] ?>
                      <span>
                        Đánh giá: 0 <i style="color: #f7d219;" class="fas fa-star"></i> 
                      </span> 
                  </div>
                  <form action="#datxe" method="post">
                    <input type="hidden" name="tx_ma" value="<?php echo $x['tx_ma'] ?>">
                    <button type="submit" class="btn btn-success">Đặt ngay</button>
                  </form>
                </div>
							</div>
              <?php
                }
                $jsonData = json_encode($data);
              ?>
                    
              
						</div>
						<div class="col-6">
							<div id="map" class="mt-4 map leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0">
								<div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, 0px, 0px);"></div>					
							</div>
							<div class="leaflet-control-container">
								<div class="leaflet-top leaflet-right"></div>
								<div class="leaflet-bottom leaflet-left"></div>
								<div class="leaflet-bottom leaflet-right"></div>
							</div>
						</div> 
            
            <script>
              var jsonData = <?php echo $jsonData; ?>
            </script>
            <script src="js/map_index.js"></script>
					</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section ftco-about">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section heading-section-white pl-md-5">
	          	<span class="subheading">Về chúng tôi</span>
	            <h2 class="mb-4">Chào mừng đến với TAXI</h2>

	            <p>Với tiềm lực và định hướng mới của TAXI, chúng tôi đang đẩy mạnh kinh doanh, phát triển thêm nhiều phương thức phục vụ khách hàng..... và đặc biệt với sự hồi sinh của ngành du lịch lữ hành...</p>
	            <p>TAXI đã và đang đẩy mạnh voucher với giá ưu đãi.....voucher tiện dụng nhiều mệnh giá hấp dẫn.</p>
	            <p>TAXI luôn phát triển đó là nhờ được sự ủng hộ của khách hàng. Với Phương châm lấy uy tín làm kim chỉ nam, phục vụ an toàn, tiết kiệm nhanh chóng, với tổng đài taxi 24/7 gọi xe là có ngay trong 5 phút</p>
              <p><a href="#" class="btn btn-primary py-3 px-4">Tìm kiếm xe</a></p>
	          </div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">DỊCH VỤ</span>
            <h2 class="mb-3">Dịch vụ nổi bật của chúng tôi</h2>
          </div>
        </div>
				<div class="row">
					<div class="col-md-6">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Đưa đón sân bay</h3>
                <p>Bạn đang tìm kiếm thông tin về một hãng xe Taxi giá rẻ với mong muốn được sử dụng dịch vụ taxi có chất lượng vàng cho dịch vụ? Hãy để chúng tôi giới thiệu ngay đến bạn hãng TAXI uy tín, luôn được khách hàng tin tưởng sử dụng nhiều năm qua.</p>
              </div>
            </div>
					</div>
					<div class="col-md-6">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Dịch vụ Taxi</h3>
                <p>Cuộc sống hiện tại yêu cầu những lúc chúng ta phải sử dụng đến taxi để phục vụ nhu cầu đi lại, Bạn có thể lựa chọn hình thức phương tiện như xe khách, xe buyt, nhưng với những khung giờ đón trả khách cố định, phải đón trả khách tại...</p>
              </div>
            </div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-intro" style="background-image: url(images/bg_3.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-md-6 heading-section heading-section-white ftco-animate">
            <h2 class="mb-3">Bạn có muốn kiếm tiền với chúng tôi không? Vì vậy đừng đến muộn.</h2>
            <a href="#" class="btn btn-primary btn-lg">Trở thành tài xế</a>
          </div>
				</div>
			</div>
		</section>


    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Lời chứng thực</span>
            <h2 class="mb-3">Khách hàng vui vẻ</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">Marketing Manager</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_2.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">Interface Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_3.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">UI Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">Web Developer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">System Analyst</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Tin tức</span>
            <h2>Tin tức gần đây</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.php" class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text pt-4">
              	<div class="meta mb-3">
                  <div><a href="#">Oct. 29, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Tại sao Khách hàng tiềm năng là chìa khóa sinh trưởng trong kinh doanh ?</a></h3>
                <p><a href="#" class="btn btn-primary">Read more</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.php" class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text pt-4">
              	<div class="meta mb-3">
                  <div><a href="#">Oct. 29, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Tại sao Khách hàng tiềm năng là chìa khóa sinh trưởng trong kinh doanh ?</a></h3>
                <p><a href="#" class="btn btn-primary">Read more</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry">
              <a href="blog-single.php" class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text pt-4">
              	<div class="meta mb-3">
                  <div><a href="#">Oct. 29, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Tại sao Khách hàng tiềm năng là chìa khóa sinh trưởng trong kinh doanh ?</a></h3>
                <p><a href="#" class="btn btn-primary">Read more</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>	

    <section class="ftco-counter ftco-section img bg-light" id="section-counter">
			<div class="overlay"></div>
    	<div class="container">
    		<div class="row">
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="60">0</strong>
                <span>năm kinh nghiệm</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="1090">0</strong>
                <span>Tổng số xe</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="2590">0</strong>
                <span>Khách hàng hạnh phúc</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text d-flex align-items-center">
                <strong class="number" data-number="67">0</strong>
                <span>Tổng chi nhánh</span>
              </div>
            </div>
          </div>
        </div>
    	</div>
    </section>	

<?php
@include('footer.php');
?>