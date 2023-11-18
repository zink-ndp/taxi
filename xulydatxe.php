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
            <div class="col-md-4 text-center">
                <div class="services services-2 w-100">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="far fa-check-circle fa-lg"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Đã đặt xe</h3>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "taxi";

                        // Tạo kết nối
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Kiểm tra kết nối
                        if ($conn->connect_error) {
                            die("Kết nối thất bại: " . $conn->connect_error);
                        }
                        //Cái mã tài xế lấy chưa được
                        $_POST['TX_MA']= 4;
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            if (isset($_POST['datxe'])) {
                                $khid = $_SESSION['kh_ma'];
                                $matx = $_POST['TX_MA'];
                                $kiemtra_txma = "SELECT TX_MA FROM taixe WHERE TX_MA = '$matx'";
                                $result_kiemtra = $conn->query($kiemtra_txma);
                                if ($result_kiemtra -> num_rows > 0) {
                                    $row_kiemtra = $result_kiemtra->fetch_assoc();
                                    $TX_MA = $row_kiemtra['TX_MA'];
                                    $sql = "SELECT MAX(CX_MA) AS macxid FROM chuyenxe";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    $nextid = $row['macxid'] + 1;
                                    $sql_themcx = "INSERT INTO chuyenxe (CX_MA, KH_MA, TX_MA, CX_SOKM, CX_THANHTIEN, 
                                    CX_TDDIEMDI_X, CX_TDDIEMDI_Y, CX_TDDIEMDEN_X, CX_TDDIEMDEN_Y, CX_TRANGTHAI )
                                    VALUES ('$nextid','$khid', '$TX_MA' ,'4',
                                    '40000','12.46','12.45','12.88','12.98', '0')";
                                    $result = mysqli_query($conn, $sql_themcx);
                                    if (!$result) {
                                        die('Lỗi truy vấn: ' . mysqli_error($conn));
                                    } else {
                                        echo "Đã đặt thành công!";
                                    }
                                } else {
                                    echo "Lỗi: Giá trị TX_MA không hợp lệ.";
                                }
                            } else {
                                echo "Đặt xe thất bại!";
                            }
                        }
                        // ".$_POST['TD_DATE']."
                        // ".$_SESSION['latdi']."

                        // ".$_SESSION['latden']."
                        // ".$_SESSION['lngden']."
                        $conn->close();

                        ?>
                    </div>
                </div>
            </div>
                        <?php 
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "taxi";

                        // Tạo kết nối
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Kiểm tra kết nối
                        if ($conn->connect_error) {
                            die("Kết nối thất bại: " . $conn->connect_error);
                        }
                            $sql = "SELECT chuyenxe.*, khachhang.*, taixe.*
                            FROM chuyenxe
                            INNER JOIN khachhang ON chuyenxe.KH_MA = khachhang.KH_MA
                            INNER JOIN taixe ON chuyenxe.TX_MA = taixe.TX_MA
                            WHERE (CX_TRANGTHAI = '0' OR CX_TRANGTHAI = '1' OR CX_TRANGTHAI = '4')
                            AND KH_USERNAME = '".$_SESSION["username"]."'";
                            $result = $conn->query($sql);
    
                        if ($result->num_rows > 0) {
                            $row = $result ->fetch_assoc();
                                if ($row["CX_TRANGTHAI"] == 0) {
                                    echo '<div class="col-md-4 text-center">
                                    <div class="services services-2 w-100">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Đang chờ xử lý</h3>';
                                } elseif ($row["CX_TRANGTHAI"] == 1) {
                                    echo '<div class="col-md-4 text-center">
                                    <div class="services services-2 w-100">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Tài xế đã chấp nhận chuyến xe vui lòng chờ để liên hệ!!!</h3>';
                                } elseif ($row["CX_TRANGTHAI"] == 4) {
                                    echo '<div class="col-md-4 text-center">
                                    <div class="services services-2 w-100">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Tài xế đã từ chối chuyến xe vui lòng thông cảm đặt tài xế khác!!!</h3>';
                                } 
                        }
                        ?>

                    </div>
                </div>
            </div>
            <?php 
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "taxi";

                        // Tạo kết nối
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Kiểm tra kết nối
                        if ($conn->connect_error) {
                            die("Kết nối thất bại: " . $conn->connect_error);
                        }
                            $sql = "SELECT chuyenxe.*, khachhang.*, taixe.*
                            FROM chuyenxe
                            INNER JOIN khachhang ON chuyenxe.KH_MA = khachhang.KH_MA
                            INNER JOIN taixe ON chuyenxe.TX_MA = taixe.TX_MA
                            WHERE CX_TRANGTHAI = '2'
                             AND KH_USERNAME = '".$_SESSION['username']."'";
                            $result = $conn->query($sql);
    
                        if ($result->num_rows > 0) {
                            $row = $result ->fetch_assoc();
                                if ($row["CX_TRANGTHAI"] == 2) {
                                    echo '<div class="col-md-4 text-center">
                                    <div class="services services-2 w-100">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Đã hoàn thành</h3>';
                                }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-4 text-center">
                <div class="services services-2 w-100">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="fas fa-laugh-beam"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Đã hoàn thành <ion-icon name="checkmark-outline"></ion-icon></h3>
                    </div>
                </div>
            </div> -->
        </div>

        
    </div>
</section>

<?php
@include('footer.php');
?>