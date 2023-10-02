<?php
  @include('config/config.php');
  @include('lib/session.php');
?>
<?php
  @include_once('lib/database.php');
  @include_once('helpers/format.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>TAXI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">TAXI<span></span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
              <li class="nav-item <?php echo ($activate == "index" ? "active" : "")?>"><a href="index.php" class="nav-link">Trang chủ</a></li>
	          <li class="nav-item <?php echo ($activate == "about" ? "active" : "")?>"><a href="about.php" class="nav-link">Về chúng tôi</a></li>
	          <li class="nav-item <?php echo ($activate == "services" ? "active" : "")?>"><a href="services.php" class="nav-link">Dịch vụ</a></li>
	          <li class="nav-item <?php echo ($activate == "pricing" ? "active" : "")?>"><a href="pricing.php" class="nav-link">Đánh giá</a></li>
	          <li class="nav-item <?php echo ($activate == "car" ? "active" : "")?>"><a href="car.php" class="nav-link">Xe</a></li>
	          <li class="nav-item <?php echo ($activate == "blog" ? "active" : "")?>"><a href="blog.php" class="nav-link">Tin tức</a></li>
	          <li class="nav-item <?php echo ($activate == "contact" ? "active" : "")?>"><a href="contact.php" class="nav-link">Liên hệ</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->