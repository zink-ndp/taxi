<?php
$activate = "xulydatxe";
@include('header.php');
?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.hphp">Trang chủ<i class="ion-ios-arrow-forward"></i></a></span> <span>Đặt xe<i class="ion-ios-arrow-forward"></i></span></p>
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
            <?php
            $sql = "SELECT chuyenxe.*, khachhang.*, taixe.*
                            FROM chuyenxe
                            INNER JOIN khachhang ON chuyenxe.KH_MA = khachhang.KH_MA
                            INNER JOIN taixe ON chuyenxe.TX_MA = taixe.TX_MA
                            WHERE (CX_TRANGTHAI = '0' OR  CX_TRANGTHAI = '1' OR CX_TRANGTHAI = '4')
                            AND KH_USERNAME = '" . $_SESSION['username'] . "'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($row["CX_TRANGTHAI"] == 0) {
                        echo '<div class="col-md-4 text-center">
                            <div class="services services-2 w-100">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="far fa-check-circle fa-lg"></span></div>
                                <div class="text w-100">
                                    <h3 class="heading mb-2">Đang chờ xác nhận</h3>
                                    </div>
                                </div>
                            </div>';
                    } elseif ($row["CX_TRANGTHAI"] == 1) {
                        echo '<div class="col-md-4 text-center">
                            <div class="services services-2 w-100">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="far fa-check-circle fa-lg"></span></div>
                                <div class="text w-100">
                                    <h3 class="heading mb-2">Đang chờ xác nhận</h3>
                                    <span> Đang đón khách </span>
                                    </div>
                                </div>
                            </div>';
                    } elseif ($row["CX_TRANGTHAI"] == 4) {
                        echo '<div class="col-md-4 text-center">
                    <div class="services services-2 w-100">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="fa-regular fa-circle-xmark"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Đã hủy chuyến xe</h3>
                            </div>
                        </div>
                    </div>';
                    }
                }
            }
            ?>

            <?php
            $sql = "SELECT chuyenxe.*, khachhang.*, taixe.*
                            FROM chuyenxe
                            INNER JOIN khachhang ON chuyenxe.KH_MA = khachhang.KH_MA
                            INNER JOIN taixe ON chuyenxe.TX_MA = taixe.TX_MA
                            WHERE CX_TRANGTHAI = '2'
                            AND KH_USERNAME = '" . $_SESSION["username"] . "'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($row["CX_TRANGTHAI"] == 2) {
                    echo '<div class="col-md-4 text-center">
                        <div class="services services-2 w-100">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="far fa-check-circle fa-lg"></span></div>
                            <div class="text w-100">
                                <h3 class="heading mb-2">Đang chờ xác nhận</h3>
                                <span> Đang đón khách </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center arrow">
                                <div class="services services-2 w-100">
                                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Đang thực hiện</h3>
                                            </div>
                                            </div>
                                        </div>  ';
                }
            }
            ?>

            <?php
            $sql = "SELECT chuyenxe.*, khachhang.*, taixe.*
                            FROM chuyenxe
                            INNER JOIN khachhang ON chuyenxe.KH_MA = khachhang.KH_MA
                            INNER JOIN taixe ON chuyenxe.TX_MA = taixe.TX_MA
                            WHERE CX_TRANGTHAI = '3'
                            AND KH_USERNAME = '" . $_SESSION['username'] . "'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($row["CX_TRANGTHAI"] == 3) {
                    echo '<div class="col-md-4 text-center">
                <div class="services services-2 w-100">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="far fa-check-circle fa-lg"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Đang chờ xác nhận</h3>
                        <span> Đang đón khách </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center arrow">
                        <div class="services services-2 w-100">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                                <div class="text w-100">
                                    <h3 class="heading mb-2">Đang thực hiện</h3>
                                    </div>
                                    </div>
                                </div>  
                <div class="col-md-4 text-center arrow">
                        <div class="services services-2 w-100">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fas fa-laugh-beam"></span></div>
                                <div class="text w-100">
                                    <h3 class="heading mb-2">Đã hoàn thành</h3>
                                    </div>
                                    </div> 
                                </div>';
                }
            }
            ?>
            <button type="button" class="btn" onclick="redirectPage()" style="color:blueviolet;">Đánh giá chuyến xe</button>

            <!-- Đoạn script để chuyển hướng trang -->
            <script>
                function redirectPage() {
                    window.location.href = "danhgiataixe.php?macx=CX_MA";
                }
            </script>
        </div>
    </div>
</section>

<style>
    .arrow {
        position: relative;
        padding: 20px;
        background-color: #fff; /* Màu nền của phần text */
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
    }

    .arrow:before {
        content: '';
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 10px 0 10px 20px; /* Điều chỉnh kích thước mũi tên */
        border-color: transparent transparent transparent #8fd19e; /* Màu của mũi tên */
        margin-right: 10px; /* Khoảng cách giữa mũi tên và nội dung text */
    }

    .services {
        position: relative;
        z-index: 1;
    }
</style>




<?php
@include('footer.php');
?>