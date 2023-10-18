<?php
$activate = "xulydatxe";
@include('header.php');
?>

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
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2 class="mb-3">Theo dõi chuyến xe</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 text-center">
                <div class="services services-2 w-100">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="far fa-check-circle fa-lg"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Đã đặt xe</h3>
                        <!-- Nội dung PHP của bạn -->
        <?php 
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbname = "taxi";

        // // Tạo kết nối
        // $conn = new mysqli($servername, $username, $password, $dbname);

        // // Kiểm tra kết nối
        // if ($conn->connect_error) {
        //     die("Kết nối thất bại: " . $conn->connect_error);
        // }
        $sql = "insert into chuyenxe value()";
         // ID của chuyến đi bạn muốn xem thông tin chi tiết
        $matx = $_POST['TX_MA'];
        $sql = "SELECT chuyenxe.*, taixe.*, thoidiem.* FROM chuyenxe
        JOIN taixe ON chuyenxe.TX_MA = taixe.TX_MA
        JOIN thoidiem ON thoidiem.TD_DATE = chuyenxe.TD_DATE
        WHERE taixe.TX_MA = ?";
                

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $chuyenxeID = $_POST['CX_MA'];
            // Lấy thông tin chuyến đi
            $thongTinChuyenDi = $row['CX_MA'];
              //So KM
              $soKM =$row['CX_SOKM'];
            // Lấy thông tin tài xế
            $thongTinTaiXe = $row['TX_TEN'];
            //Thoi điểm
            $thoidiem = $row['TD_DATE'];
          

            // In thông tin chuyến đi và tài xế
            echo "Thông tin chuyến đi: $thongTinChuyenDi<br>";
            echo "Số KM chuyến đi: $soKM<br>";  
            echo "Thông tin tài xế: $thongTinTaiXe<br>";
            echo "Thời điểm: $thoidiem<br>";
         
        } 
        else 
        {
            echo "Không tìm thấy chuyến đi có ID $chuyenxeID";
        }

        $conn->close();
    ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4 text-center">
                <div class="services services-2 w-100">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Đang thực hiện</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4 text-center">
                <div class="services services-2 w-100">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="fas fa-laugh-beam"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Đã hoàn thành <ion-icon name="checkmark-outline"></ion-icon></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


 



<?php
@include('footer.php');
?>