const mysql = require('mysql');
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'taxi'
});

connection.connect();

const sqlQuery = 'SELECT CX_TDDIEMDI_X, CX_TDDIEMDI_Y, CX_TDDIEMDEN_X, CX_TDDIEMDEN_Y FROM chuyenxe';

// Đường dẫn tới hình ảnh của xe ô tô
const carIconUrl = 'assets/img/iconxe.png';

const carIcon = L.icon({
    iconUrl: carIconUrl,
    iconSize: [40, 50],
    iconAnchor: [15, 15]
});

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

function mapTrangThai(trangThai) {
    return trangThai === '1' ? 'Rảnh' : 'Bận';
}

// Lấy tọa độ đích từ cơ sở dữ liệu và sử dụng nó
jsonData.forEach(function (item) {
    const marker = L.marker([item.TT_TOADOX, item.TT_TOADOY], {
        icon: carIcon
    }).addTo(map);

    const trangThai = mapTrangThai(item.TT_TRANGTHAI);

    const popup = L.popup()
        .setLatLng([item.TT_TOADOX, item.TT_TOADOY])
        .setContent(`<b>Tên tài xế:</b> ${item.TX_TEN}<br><b>Trạng thái:</b> ${trangThai}<br><b>Tọa độ:</b> ${item.TT_TOADOX}, ${item.TT_TOADOY}`);
    
    marker.on('click', function() {
        popup.openOn(map);

        // Truy vấn SQL để lấy tọa độ đích từ cơ sở dữ liệu
        const sqlDestinationQuery = `SELECT CX_TDDIEMDEN_X, CX_TDDIEMDEN_Y FROM chuyenxe WHERE TX_MA = ${item.TX_MA} AND CX_TRANGTHAI ="1" ORDER BY TD_DATE DESC `;
        connection.query(sqlDestinationQuery, function (error, results) {
            if (error) throw error;

            if (results.length > 0) {
                const destinationLatitude = results[0].CX_TDDIEMDEN_X;
                const destinationLongitude = results[0].CX_TDDIEMDEN_Y;

                // Tạo đường dẫn sử dụng tọa độ đích từ cơ sở dữ liệu
                route = L.Routing.control({
                    waypoints: [
                        L.latLng(destinationLatitude, destinationLongitude),
                        L.latLng(item.TT_TOADOX, item.TT_TOADOY)
                    ],
                    draggableWaypoints: false,
                    routeWhileDragging: false,
                    fitSelectedRoutes: false,
                    lineOptions: {
                        styles: [{ color: '#19d600', opacity: 0.6, weight: 6 }]
                    },
                    createMarker: function () { return null; }
                }).addTo(map);
            }
        });
    });
});

connection.end();
