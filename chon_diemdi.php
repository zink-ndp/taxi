<?php
$activate = "index";
@include('header.php');
unset($_SESSION['latdi']);
unset($_SESSION['lngdi']);
?>


<?php 
if (isset($_POST['tx_ma'])) {
  $form_action = "xulydatxe.php";
  $matx = $_POST['tx_ma'];
} else {
        // Sử dụng tọa độ mặc định
        $latDi = 10.031231553362591;
        $lngDi = 105.76916077529324;
    }
  $form_action = "chon_taixe.php";
  $matx = '';

?>

<div class="showmap"> 
    <div id="map" class="map leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0">
        <div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, 0px, 0px);"></div>
    </div>
    <div class="leaflet-control-container">
        <div class="leaflet-top leaflet-right"></div>
        <div class="leaflet-bottom leaflet-left"></div>
        <div class="leaflet-bottom leaflet-right"></div>
    </div>
</div>

<button
    class="btn btn-success"
    style="
        position: fixed;
        bottom: 5%;
        right: 5%;
        z-index: 999;
    "
    id="confirmLocationButtonDi">
    CHẤP NHẬN
</button>
<!-- ... (Phần HTML khác) ... -->

<script>
    // Tạo biến lưu trữ tọa độ đã pin
    let pinnedLocation = null;

    var map = L.map('map').setView([10.031231553362591, 105.76916077529324], 13);
    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var customIcon = L.icon({
        iconUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon-2x.png',
        iconSize: [25, 41],
    });
    var defaultLocationMarker = L.marker([10.031231553362591, 105.76916077529324], { icon: customIcon }).addTo(map);

// Lắng nghe sự kiện click để pin tọa độ khi người dùng click chuột
    var marker = null;
    map.on('click', function (e) {
    if (marker) {
        // Xóa marker hiện tại nếu đã có
        map.removeLayer(marker);
    }
    // Tạo một marker tại vị trí người dùng đã click
    marker = L.marker(e.latlng).addTo(map);
    pinnedLocation = e.latlng;

    // Xóa icon của vị trí mặc định nếu đã pin tọa độ mới
    if (defaultLocationMarker) {
        map.removeLayer(defaultLocationMarker);
        defaultLocationMarker = null;
    }
});

    // Lắng nghe sự kiện click trên nút OK
    const confirmLocationButtonDi = document.getElementById('confirmLocationButtonDi');
    confirmLocationButtonDi.addEventListener('click', function () {
        // Kiểm tra xem đã có tọa độ đã pin
        if (pinnedLocation) {
            const defaultLat = 10.031231553362591;
            const defaultLng = 105.76916077529324;
            // Kiểm tra xem tọa độ đã pin có phải là tọa độ mặc định không
            if (pinnedLocation.lat === defaultLat && pinnedLocation.lng === defaultLng) {
                // Nếu tọa độ hiện tại là mặc định, chuyển hướng về trang index
                window.location.href = 'index.php';
            } else {
                // Nếu tọa độ khác mặc định, chuyển hướng về trang index và truyền tọa độ làm tham số URL
                window.location.href = `index.php?lat=${pinnedLocation.lat}&lng=${pinnedLocation.lng}`;
            }
        } else {
            // Nếu không có tọa độ đã pin, chuyển hướng về trang index mà không cần pin tọa độ mới
            window.location.href = 'index.php';
        }
    });
</script>

<!-- ... (Phần HTML khác) ... -->


<div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5"></div>
<style> 
    .showmap{
        padding: 10px;
        width: 80%;
        height: 55%;
        z-index: 99;
        background-color: white;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
</style>

<<script>

    // Lắng nghe sự kiện click trên nút OK
const confirmLocationButtonDi = document.getElementById('confirmLocationButtonDi');
confirmLocationButtonDi.addEventListener('click', function () {
    // Kiểm tra xem đã có tọa độ đã pin
    if (pinnedLocation) {
        const defaultLat = 10.031231553362591;
        const defaultLng = 105.76916077529324;

        // Kiểm tra xem tọa độ đã pin có phải là tọa độ mặc định không
        if (pinnedLocation.lat === defaultLat && pinnedLocation.lng === defaultLng) {
            // Nếu tọa độ hiện tại là mặc định, chuyển hướng về trang index
            window.location.href = 'index.php';
        } else {
            // Nếu tọa độ khác mặc định, chuyển hướng về trang index và truyền tọa độ làm tham số URL
            window.location.href = `index.php?lat=${pinnedLocation.lat}&lng=${pinnedLocation.lng}`;
        } 
    }
    else{
             // Nếu không có tọa độ đã pin, chuyển hướng về trang index mà không cần pin tọa độ mới
            window.location.href = 'index.php';
        }
});

   
</script>

