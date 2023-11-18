<?php
$activate = "car";
@include('header.php');
?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ<i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Xe<i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Chọn tài xế ở gần bạn</h1>
            </div>
        </div>
    </div>
</section>

<div id="map"
style="display: none;"
class="map mt-4 leaflet-container"></div>

<section class="ftco-section bg-light">
    <div class="container">

        <div class="row">
            <?php
            if (isset($_POST['diemdix']) && isset($_POST['diemdiy'])) {
                $diemdix = $_POST['diemdix'];
                $diemdiy = $_POST['diemdiy'];

                echo '<script>';
                echo 'var map = L.map("map").setView([' . $diemdix . ', ' . $diemdiy . '], 13);';
                echo 'var tiles = L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {';
                echo 'maxZoom: 19,';
                echo 'attribution: "&copy; <a href=\"http://www.openstreetmap.org/copyright\">OpenStreetMap</a>",';
                echo '}).addTo(map);';
                echo 'var route;'; // Added route variable
                echo '</script>';

                $sql = "SELECT tx.tx_ma, tx.tx_ten, tx.tx_hinhanh, x.x_ma, x.x_mota, x.x_hinhanh, t.tt_toadox, t.tt_toadoy
            FROM trangthai t 
            JOIN phutrach pt on pt.TX_MA = t.TX_MA
            JOIN xe x on x.X_MA = pt.X_MA
            JOIN taixe tx on tx.TX_MA = pt.TX_MA
            WHERE t.TT_TRANGTHAI = 1 
                AND (t.TX_MA, t.TD_date) IN (
                    SELECT t.TX_MA, MAX(t.TD_date)
                    FROM trangthai t
                    GROUP BY t.TX_MA
                )
                ORDER BY SQRT(POW(tt_toadox - $diemdix, 2) + POW(tt_toadoy - $diemdiy, 2)) ASC
            LIMIT 6;";
                $rs = querySqlwithResult($conn, $sql);

                if ($rs) {
                    while ($x = mysqli_fetch_assoc($rs)) {
                        if ($x['tx_hinhanh'] == NULL)
                            $anhtx = "default.png";
                        else
                            $anhtx = $x['tx_hinhanh'];
                        ?>
                        <script>
                            if (route) route.remove(); // Remove existing route before adding a new one
                            route = L.Routing.control({
                                waypoints: [
                                    L.latLng(<?php echo $diemdix ?>, <?php echo $diemdiy ?>),
                                    L.latLng(<?php echo $x['tt_toadox']; ?>, <?php echo $x['tt_toadoy']; ?>),
                                ],
                                draggableWaypoints: false,
                                routeWhileDragging: false,
                                fitSelectedRoutes: false,
                                lineOptions: {
                                    styles: [{
                                        color: "#19d600",
                                        opacity: 0.6,
                                        weight: 6
                                    }],
                                },
                                createMarker: function () {
                                    return null;
                                },
                            }).addTo(map);

                            route.on('routesfound', function (event) {
                                var routes = event.routes;
                                var summary = routes[0].summary;
                                console.log(routes[0])
                                var distance = (summary.totalDistance / 1000).toFixed(2);
                                document.getElementById('distance-<?php echo $x['tx_ma']; ?>').innerHTML = "Khoảng cách: " + distance + " km";
                            });
                        </script>

                        <div class="col-4">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end"
                                    style="background-image: url(images/xe/<?php echo $x['x_hinhanh'] ?>);">
                                    <img src="images/taixe/<?php echo $anhtx ?>"
                                        style="height: 6rem; margin-left: 10px; margin-bottom: -1.3rem;" alt="">
                                </div>

                                <div class="text">
                                    <h2 class="mb-0">
                                        <?php echo $x['tx_ten'] ?>
                                    </h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat">
                                            <?php echo $x['x_mota'] ?>
                                        </span>
                                        <p class="price ml-auto">5<i style="color: #f7d219;" class="fas fa-star"></i>
                                        </p>
                                    </div>
                                    <p id="distance-<?php echo $x['tx_ma']; ?>">Khoảng cách : <span></span></p>
                                </div>

                                <a href="#" class="btn btn-primary py-2 mr-1">Đặt ngay</a>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "Không có dữ liệu phù hợp.";
                }
            }
            ?>
        </div>
    </div>
</section>

<?php
@include('footer.php');
?>
