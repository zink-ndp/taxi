<?php
$activate = "index";
@include('header.php');
unset($_SESSION['latden']);
unset($_SESSION['lngden']);
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

<button
    class="btn btn-success"
    style="
        position: fixed;
        bottom: 10%;
        right: 10%;
        z-index: 999;
    "
    id="confirmLocationButtonDen">
    CHẤP NHẬN
</button>
    <link rel="stylesheet" href="map_data/leaflet-search/src/leaflet-search.css">
    <!-- <script src="map_data/leaflet-search/Gruntfile.js"></script> -->
    <script src="map_data/leaflet-search/src/leaflet-search.js"></script>
    <script src="map_data/locations.js"></script>
    <script>
    console.log(locationsJSON)

    // Tạo biến lưu trữ tọa độ đã pin
    let pinnedLocation2 = null;

    const map = L.map('map').setView([10.03, 105.77], 15);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Lắng nghe sự kiện click để pin tọa độ khi người dùng click chuột
    var marker = null
    map.on('click', function (e) {

        if (marker){
            marker.remove()
        }
        // Tạo một marker tại vị trí người dùng đã click
        marker = L.marker(e.latlng).addTo(map);
        
        // Lưu tọa độ vào biến pinnedLocation
        pinnedLocation2 = e.latlng;
    });


    // Lắng nghe sự kiện click trên nút OK
    const confirmLocationButtonDen = document.getElementById('confirmLocationButtonDen');
    confirmLocationButtonDen.addEventListener('click', function () {
        // Kiểm tra xem đã có tọa độ đã pin
        if (pinnedLocation2) {
            // Chuyển hướng về trang index và truyền tọa độ làm tham số URL
            window.location.href = `index.php?latden=${pinnedLocation2.lat}&lngden=${pinnedLocation2.lng}`;
        }
    });

    const searchLayer = L.geoJSON(locationsJSON, {
        onEachFeature:function(feature, layer){
            layer.bindPopup(feature.properties.name)
        }
    }).addTo(map)
    
    const searchControl = new L.Control.Search({
        layer: searchLayer,
        propertyName: "name" 
    });

    map.addControl(searchControl)

</script>

<div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5"></div>
<style> 
    .showmap {
        padding: 10px;
        width: 80%;
        height: 55%;
        z-index: 999;
        background-color: white;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
</style>


<?php
// Kiểm tra xem có tọa độ từ URL không
$latDen = isset($_GET['lat']) ? $_GET['lat'] : 'null';
$lngDen = isset($_GET['lng']) ? $_GET['lng'] : 'null';
?>
<script>
    // Lắng nghe sự kiện click trên nút "OK" để hiển thị tọa độ
    const confirmLocationButton = document.getElementById('confirmLocationButton2');
    confirmLocationButton.addEventListener('click', function () {
        // Kiểm tra xem đã có giá trị tọa độ truyền từ trang chon_diemden hay không
        const latDi = <?php echo isset($_GET['lat']) ? $_GET['lat'] : 'null'; ?>;
        const lngDi = <?php echo isset($_GET['lng']) ? $_GET['lng'] : 'null'; ?>
        // Nếu có tọa độ, hiển thị nó trong ô input
        if (latDen !== 'null' && lngDen !== 'null') {
            document.querySelector('input[name="diemden"]').value = `Lat: ${latDen}, Lng: ${lngDen}`;
        }
    });
</script>

</php>
