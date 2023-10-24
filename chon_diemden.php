  <?php
$activate = "index";
@include('header.php');
unset($_SESSION['latden']);
unset($_SESSION['lngden']);
?>


  <?php 
    if ( isset($_POST['tx_ma']) ) {
      $form_action = "xulydatxe.php";
      $matx =$_POST['tx_ma'] ;
    } 
    else {
      $form_action = "chon_taixe.php";
      $matx = '';
    }
  ?>  
    <div class="showmap">
        <div id="map" class=" map leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0">
            <div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, 0px, 0px);"></div>					
        </div>
        <div class="leaflet-control-container">
            <div class="leaflet-top leaflet-right"></div>
            <div class="leaflet-bottom leaflet-left"></div>
            <div class="leaflet-bottom leaflet-right"></div>
        </div>
        <script src="js/map_index.js"></script>
    </div>
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5"></div>  

    <button
    class="btn btn-success"
    style="
        position: fixed;
        bottom: 5%;
        right: 5%;
        z-index: 999;
    "
    id="confirmLocationButtonDen">
    CHẤP NHẬN
</button>
    <script>
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
</script>


<div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5"></div>  


<style> 
    .showmap{
        padding: 10px;
        width: 80%;
        height: 40%;
        z-index: 999;
        background-color: white;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
</style>
