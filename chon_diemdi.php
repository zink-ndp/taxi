<?php
$activate = "index";
@include('header.php');
?>

<?php 
if (isset($_POST['tx_ma'])) {
  $form_action = "xulydatxe.php";
  $matx = $_POST['tx_ma'];
} else {
  $form_action = "chon_taixe.php";
  $matx = '';
}
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

<button id="confirmLocationButton">CHẤP NHẬN</button>
<script>
    // Tạo biến lưu trữ tọa độ đã pin
    let pinnedLocation = null;

    const map = L.map('map').setView([10.03, 105.77], 15);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Lắng nghe sự kiện click để pin tọa độ khi người dùng click chuột
    map.on('click', function (e) {
        // Tạo một marker tại vị trí người dùng đã click
        const marker = L.marker(e.latlng).addTo(map);
        
        // Lưu tọa độ vào biến pinnedLocation
        pinnedLocation = e.latlng;
    });

    // Lắng nghe sự kiện click trên nút OK
    const confirmLocationButton = document.getElementById('confirmLocationButton');
    confirmLocationButton.addEventListener('click', function () {
        // Kiểm tra xem đã có tọa độ đã pin
        if (pinnedLocation) {
            // Chuyển hướng về trang index và truyền tọa độ làm tham số URL
            window.location.href = `index.php?lat=${pinnedLocation.lat}&lng=${pinnedLocation.lng}`;
        }
    });
</script>

<div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5"></div>
<style> 
    .showmap{
        padding: 10px;
        width: 80%;
        height: 80%;
        z-index: 999;
        background-color: white;
        position: fixed;
        left: 50%;
        top: 60%;
        transform: translate(-50%, -50%);
    }
</style>

<<script>
    // Lắng nghe sự kiện click trên nút "OK" để hiển thị tọa độ cho điểm đi
    const confirmLocationButton = document.getElementById('confirmLocationButton');
    confirmLocationButton.addEventListener('click', function () {
        // Kiểm tra xem đã có giá trị tọa độ truyền từ trang chon_diemdi hay không
        const latDi = <?php echo isset($_GET['lat']) ? $_GET['lat'] : 'null'; ?>;
        const lngDi = <?php echo isset($_GET['lng']) ? $_GET['lng'] : 'null'; ?>
        
        // Nếu có tọa độ, hiển thị nó trong ô input cho điểm đi
        if (latDi !== 'null' && lngDi !== 'null') {
            document.querySelector('input[name="diemdi"]').value = `Lat: ${latDi}, Lng: ${lngDi}`;
        }
    });
    
   
</script>

