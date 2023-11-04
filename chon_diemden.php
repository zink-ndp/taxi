<?php
$activate = "index";
@include('header.php');
?>

<div class="showmap rounded">
    <div id="map"
        class="map rounded leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom"
        tabindex="0">
        <div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, 0px, 0px);"></div>
        <div class="form-group search-group">
            <div class="d-flex">
                <input type="text" style="font-size: 14px" name="search-box" id="search-box" placeholder="Nhập địa điểm muốn đến (hoặc chọn trên bản đồ)" class="form-control">
                <input type="button" value="Tìm" class="btn btn-primary px-3 ml-3">
            </div>
            <div class="result rounded mt-2 p-2 text-center" id="result">
                <span id="dfResult">Chưa có dữ liệu</span>
                <ul id="result-list" style="display: none"></ul>
            </div>
        </div>
    </div>
    <div class="leaflet-control-container">
        <div class="leaflet-top leaflet-right"></div>
        <div class="leaflet-bottom leaflet-left"></div>
        <div class="leaflet-bottom leaflet-right"></div>
    </div>
</div>

<button class="btn btn-primary" style="
        position: fixed;
        bottom: 7%;
        right: 10%;
        z-index: 999;
    " id="confirmLocationButtonDen">
    CHẤP NHẬN
</button>
<!-- <link rel="stylesheet" href="map_data/leaflet-search/src/leaflet-search.css">
<script src="map_data/leaflet-search/src/leaflet-search.js"></script>
<script src="map_data/locations.js"></script> -->
<script>

    const userMakerUrl = 'images/user-maker.png'
    const userMakerIC = L.icon({
        iconUrl: userMakerUrl,
        iconSize: [40, 50],
        iconAnchor: [15, 15]
    })

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            document.getElementById("location").innerHTML = "Trình duyệt của bạn không hỗ trợ định vị.";
        }
    }
    function showPosition(position) {
        latitude = position.coords.latitude;
        longitude = position.coords.longitude;


        let pinnedLocation2 = null;
        var lng = ""
        var lat = ""
        var location = ""

        const map = L.map('map').setView([latitude, longitude], 15);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const userMarker = L.marker([latitude, longitude], { icon: userMakerIC }).addTo(map);
        const userPopup = L.popup()
            .setLatLng([latitude, longitude])
            .setContent("Bạn đang ở đây!").openOn(map)

        var popup = null
        var marker = null
        var apiUrl = ""
        map.on('click', function (e) {

            if (marker) {
                marker.remove()
            }
            if (popup) {
                popup.remove()
            }

            pinnedLocation2 = e.latlng;
            lat = pinnedLocation2.lat
            lng = pinnedLocation2.lng

            apiUrl = `https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`;

            async function fetchData(){
                try {
                    const res = await fetch(apiUrl)
                    if (!res.ok) throw new Error("Loi")
                    const data = await res.json()

                    console.log(data)
                        location = data.display_name

                    marker = L.marker(pinnedLocation2).addTo(map);
                    popup = L.popup().setLatLng(pinnedLocation2).setContent(location).openOn(map)

                } catch(e){
                    console.error(e)
                }
            }
            fetchData()
        });


        const confirmLocationButtonDen = document.getElementById('confirmLocationButtonDen');
        confirmLocationButtonDen.addEventListener('click', function () {
            window.location.href = `index.php?locateden=${location}&latden=${lat}&lngden=${lng}`;
        });


    }

    getLocation()

</script>

<div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');"
    data-stellar-background-ratio="0.5"></div>
<style>
    .showmap {
        padding: 10px;
        width: 80%;
        height: 75%;
        z-index: 99;
        background-color: white;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .map {
        height: 100% !important;
    }

    .search-group {
        position: absolute;
        top: 0;
        right: 0;
        margin: 20px;
        width: 30%;
        z-index: 999;
    }

    .result{
        background-color: white;
    }
</style>