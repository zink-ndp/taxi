<?php
$activate = "danhsachchuyenxe";
@include('header.php');
// @include('config/config.php');
// @include_once('lib/database.php');
// @include_once('helpers/format.php');
?>


<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.hphp">Trang chủ<i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Xe đã đặt<i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Danh sách chuyến xe</h1>
            </div>
        </div>
    </div>
</section>

<?php






$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taxi";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Kết nối thất bại1 " . $conn->connect_error);
}



// Lấy danh sách chuyến xe đã đặt của người dùng
$user_id = $_SESSION['kh_ma'];
$sql = "SELECT * FROM khachhang
        JOIN chuyenxe ON chuyenxe.KH_MA = khachhang.KH_MA
        WHERE khachhang.KH_MA = $user_id";

$result = $conn->query($sql);

// Hiển thị danh sách chuyến xe đã đặt
if ($result->num_rows > 0) {

  echo "<h2>Danh sách chuyến xe đã đặt</h2>";
  echo "<ul>";
  while ($row = $result->fetch_assoc()) {
    echo "<li>" . $row['CX_MA'] . " - Tên khách hàng: " . $row['KH_TEN'] . " - Số km " . $row['CX_SOKM'] . " - Ngày đặt: " . $row['TD_DATE'] . " - Thành tiền " . $row['CX_THANHTIEN'] . "</li>";
  }
  echo "</ul>";
} else {
  echo "Bạn chưa đặt chuyến xe nào!";
}

// Đóng kết nối
$conn->close();
?>

<?php
@include('footer.php');
?>