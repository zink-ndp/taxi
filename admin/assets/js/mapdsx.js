
const map = L.map('mapds').setView([10.03, 105.77], 15); //khu vực hiển thị theo vị trí hiện tại

var marker = L.marker([10.03, 105.77]).addTo(map); //đặt vị trí hiện tại của khách hàng

const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent(`You clicked the map at ${e.latlng.toString()}`)
        .openOn(map);
}

map.on('click', onMapClick);