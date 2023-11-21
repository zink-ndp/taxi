<?php
$activate = "xulydatxe";
@include('header.php');
$macx = $_GET['macx'];
?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.hphp">Trang chủ<i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Đặt xe<i
                            class="ion-ios-arrow-forward"></i></span></p>
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
        <div class="row" id="watch">
            <?php

            $sql = "SELECT * FROM chuyenxe  WHERE CX_MA = $macx";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc()

                ?>

            <?php
            if ($row['CX_TRANGTHAI'] == 1) {
                echo '<div class="col-lg-4 col-md-4 text-center">
                        <div class="services services-2 w-100">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="far fa-check-circle fa-lg"></span></div>
                            <div class="text w-100">
                                <h3 class="heading mb-2">Đang chờ xác nhận</h3>
                            </div>
                            <span>Đang đón khách</span>
                        </div>
                    </div>';
            } else {
                echo '<div class="col-lg-4 col-md-4 text-center">
                        <div class="services services-2 w-100">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="far fa-check-circle fa-lg"></span></div>
                            <div class="text w-100">
                                <h3 class="heading mb-2">Đang chờ xác nhận</h3>
                            </div>
                        </div>
                    </div>';
            }
            ?>

            <div class="col-md-4 text-center arrow">
                <div class="services services-2 w-100 ">
                    <div class="icon d-flex align-items-center justify-content-center  <?php if ($row['CX_TRANGTHAI'] != 2 && $row['CX_TRANGTHAI'] != 3)
                        echo 'disable' ?> ">
                            <span class="flaticon-route"></span>
                        </div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Đang thực hiện</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center arrow">
                    <div class="services services-2 w-100">
                        <div class="icon d-flex align-items-center justify-content-center  <?php if ($row['CX_TRANGTHAI'] != 3)
                        echo 'disable' ?> ">
                            <span class="fas fa-laugh-beam"></span>
                        </div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Đã hoàn thành</h3>
                        </div>
                    </div>
                </div>

                <?php
                    $sql = "SELECT * FROM chuyenxe  WHERE CX_MA = $macx";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($row["CX_TRANGTHAI"] == 3) {
                                ?>
                        <div class="container-fluid mt-4 d-flex justify-content-center align-items-center">
                            <button type="button" class="btn btn-secondary p-3" onclick="redirectPage()"
                                style="color:blueviolet;">Đánh giá chuyến xe</button>
                        </div>
                        <?php
                            }
                        }
                    } else {
                        echo '';
                    }
                    ?>
        </div>
    </div>
</section>
<script>
    function redirectPage() {
        window.location.href = "danhgiataixe.php?macx=<?php echo $_GET['macx'] ?>";
    }
</script>
<style>
    .disable {
        background: #808080 !important;
    }

    .arrow {
        position: relative;
        background-color: #fff;
        border-radius: 5px;
        display: flex;
        align-items: center;
    }

    .arrow:before {
        content: '';
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 10px 0 10px 20px;
        border-color: transparent transparent transparent #8fd19e;
        margin-right: 10px;
    }

    .services {
        position: relative;
        z-index: 1;
    }
</style>




<?php
@include('footer.php');
?>