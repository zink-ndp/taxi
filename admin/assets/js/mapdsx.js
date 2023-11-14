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

  
    // Tạo một hàm callback để xử lý khi tọa độ đã sẵn sàng
  var route = null;
  function handleCoordinates(x, y) {
    // Tạo routing khi tọa độ đã sẵn sàng
    route = L.Routing.control({
      waypoints: [L.latLng(item.TT_TOADOX, item.TT_TOADOY), L.latLng(x, y)],
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
  }

  // Gắn sự kiện click cho marker
  marker.on("click", function () {
    if (route) {
      route.remove()
    }
    popup.openOn(map);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../admin/timdiemden.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        var x = response.x;
        var y = response.y;

        console.log(x, y);

        // Gọi hàm callback với tọa độ đã sẵn sàng
        handleCoordinates(x, y);
      } else {
        console.error("Lỗi yêu cầu:", xhr.status, xhr.statusText);
      }
    };

    var data = "matx=" + item.TX_MA;
    xhr.send(data);
  });
});
