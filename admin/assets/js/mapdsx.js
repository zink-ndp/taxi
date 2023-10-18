// mapdsx.js
const map = L.map('mapds').setView([10.03, 105.77], 15);

const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

function onMapClick(e) {
    const popup = L.popup()
        .setLatLng(e.latlng)
        .setContent(`You clicked the map at ${e.latlng.toString()}`)
        .openOn(map);
}

map.on('click', onMapClick);

// Truy cập dữ liệu JSON từ biến jsonData
console.log(jsonData);

// Ví dụ: Làm việc với dữ liệu JSON
jsonData.forEach(function (item) {
    const marker = L.marker([item.TT_TOADOX, item.TT_TOADOY]).addTo(map);

    // Tạo popup cho mỗi marker
    const popup = L.popup()
        .setLatLng([item.TT_TOADOX, item.TT_TOADOY])
        .setContent(`<b>Tên tài xế:</b> ${item.TX_TEN}<br><b>Trạng thái:</b> ${item.TX_TRANGTHAI === '1' ? 'Bận' : 'Rảnh'}<br><b>Tọa độ:</b> ${item.TT_TOADOX},<b></b> ${item.TT_TOADOY}`);
    
    marker.on('click', function() {
        popup.openOn(map);
    });
    
    // Tùy chỉnh marker, thêm popup, v.v. ở đây
});
