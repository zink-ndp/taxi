<?php
include("connect.php");
?>
<?php
if (isset($_GET['macx'])) {
  $macx = $_GET['macx'];
} else {
  echo 'Chưa có mã chuyến xe';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title> ĐÁNH GIÁ CHUYẾN XE</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<style>
  .col-md-6 {
  margin-left: 500px;

    -webkit-box-flex: inherit;
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
    text-align: initial;
  }
</style>

<body>



  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ<i class="ion-ios-arrow-forward"></i></a></span> <span>Đặt xe<i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">Thông tin chuyến xe</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
  <form method="POST" class="col-md-6" action="">
    <h2>Đánh Giá Chuyến Xe</h2>
    <div class="form-group">
      <label for="maChuyenXe">Mã Chuyến Xe</label>
      
        <!-- <option value="" selected>Chọn chuyến xe</option> -->

        <?php
        $sql = "SELECT chuyenxe.CX_MA , chuyenxe.TD_DATE FROM chuyenxe 
        where chuyenxe.CX_TRANGTHAI = '3' AND chuyenxe.CX_MA = '$macx'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<input type="text" class="form-control" id="maChuyenXe" name="maChuyenXe" value = "Mã chuyến xe: '.$row["CX_MA"] .' - '. 'Có thời điểm: '.''.$row["TD_DATE"].'">';
          }
        }

        ?>
      <!-- </select> -->

    </div>
   
    <div class="form-group">
      <label for="saoDanhGia">Sao Đánh Giá</label>
      <input type="number" placeholder="Nhập số sao cho chuyến xe" class="form-control" name="saoDanhGia" min="0" max="5z" required>
    </div>
    <div class="form-group">
      <label for="noiDungDanhGia">Nội Dung Đánh Giá</label>
      <textarea class="form-control" placeholder="Nhập nội dung đánh giá của bạn" name="noiDungDanhGia" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn" name="guidanhgia">Gửi Đánh Giá</button>
    <!-- <div id="success-message" style="display: none;">
    Đánh giá đã được thêm thành công.
</div> -->
  </form>
  </section>
</body>

</html>
<!-- <script>
    // Thêm đánh giá thành công, hiển thị thông báo
    document.getElementById('success-message').style.display = 'block';

    // Sau 3 giây, chuyển hướng về trang chính (hoặc trang bạn muốn)
    setTimeout(function () {
        window.location.href = 'index.php'; // Thay đổi URL theo trang bạn muốn chuyển hướng
    }, 3000); // 3000 milliseconds = 3 giây
</script> -->





<?php
mysqli_close($conn);
include("footer.php");
?>