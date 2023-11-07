// Đường dẫn tới hình ảnh của xe ô tô
const carIconUrl = "assets/img/iconxe.png";

// Tạo biểu tượng xe ô tô bằng hình ảnh
const carIcon = L.icon({
  iconUrl: carIconUrl,
  iconSize: [40, 50], // Kích thước của biểu tượng
  iconAnchor: [15, 15], // Điểm neo
});

// mapdsx.js
const map = L.map("mapds").setView([10.03, 105.77], 15);

const tiles = L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  attribution:
    '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

function onMapClick(e) {
  const popup = L.popup()
    .setLatLng(e.latlng)
    .setContent(`You clicked the map at ${e.latlng.toString()}`)
    .openOn(map);
}

map.on("click", onMapClick);

// Truy cập dữ liệu JSON từ biến jsonData

// Hàm ánh xạ giá trị trạng thái
function mapTrangThai(trangThai) {
  return trangThai === "1" ? "Rảnh" : "Bận";
}

// ...
// Ví dụ: Làm việc với dữ liệu JSON
jsonData.forEach(function (item) {
  const marker = L.marker([item.TT_TOADOX, item.TT_TOADOY], {
    icon: carIcon, // Sử dụng biểu tượng xe ô tô
  }).addTo(map);

  // Ánh xạ giá trị trạng thái
  const trangThai = mapTrangThai(item.TT_TRANGTHAI);
  // Tạo popup cho mỗi marker
  const popup = L.popup()
    .setLatLng([item.TT_TOADOX, item.TT_TOADOY])
    .setContent(
      `<b>Tên tài xế:</b> ${item.TX_TEN}<br><b>Trạng thái:</b> ${trangThai}<br><b>Tọa độ:</b> ${item.TT_TOADOX},<b></b> ${item.TT_TOADOY}`
    );
    var x = ""
    var y = ""
  marker.on("click", function () {
      popup.openOn(map);
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "../admin/timdiemden.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText)
            var response = JSON.parse(xhr.responseText);
            console.log("Value 1: " + response.x);
            console.log("Value 2: " + response.y);
            x=response.x
            y=response.y
        } else {
            console.error('Lỗi yêu cầu:', xhr.status, xhr.statusText);
        }
    };

      var data = "matx="+ item.TX_MA; // Thay thế bằng dữ liệu bạn muốn gửi
      xhr.send(data);
      route = L.Routing.control({
        waypoints: [
          L.latLng(item.TT_TOADOX, item.TT_TOADOY),
          L.latLng(item.x, item.y), // Sử dụng tọa độ điểm đến từ dữ liệu
        ],
        draggableWaypoints: false,
        routeWhileDragging: false,
        fitSelectedRoutes: false,
        lineOptions: {
          styles: [{ color: "#19d600", opacity: 0.6, weight: 6 }],
        },
        createMarker: function () {
          return null;
        },
      }).addTo(map);
    })
    .addTo(map);
});
