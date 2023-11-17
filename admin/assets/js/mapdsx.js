// Tạo biểu tượng xe ô tô bằng hình ảnh
const carIconFree = L.icon({
  iconUrl: "assets/img/iconxe.png",
  iconSize: [40, 50],
  iconAnchor: [20, 50],
});
const carIconBusy = L.icon({
  iconUrl: "assets/img/iconxebusy.png",
  iconSize: [40, 50],
  iconAnchor: [20, 50],
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
  var tt;
  switch (trangThai) {
    case "1":
      tt = "Đang rảnh";
      break;
    case "2":
      tt = "Đang chở khách";
      break;
    case "0":
      tt = "Đang rước khách";
      break;
    default:
      break;
  }
  return tt;
}

// CHO NAY KIEM TRA DS CAC XE


function findPath(response){
  response.forEach(function (item) {
    if (item.TT_TRANGTHAI == 0) {
      // TÀI XẾ ĐANG ĐÓN KHÁCH
      txDonKhach(item);
    } else if (item.TT_TRANGTHAI == 2) {
      // TÀI XẾ ĐANG CHỞ KHÁCH
      txChoKhach(item);
    }
  })
}

var routeRunning;
function moveCar(tt, matx, fromx, fromy, tox, toy) {
  if (routeRunning) {
    routeRunning.remove();
  }
  routeRunning = L.Routing.control({
    waypoints: [L.latLng(fromx, fromy), L.latLng(tox, toy)],
    routeWhileDragging: true,
    draggableWaypoints: false,
    fitSelectedRoutes: false,
    lineOptions: {
      styles: [{ color: "#000000", opacity: 0, weight: 0 }],
    },
    createMarker: function () {
      return null;
    },
  });
  routeRunning
    .on("routesfound", function (e) {
      e.routes[0].coordinates.forEach(function (coord, index) {
        setTimeout(() => {
          console.log(index)
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "../admin/xhrMethod/capnhatvitri.php", true);
          xhr.setRequestHeader(
            "Content-Type",
            "application/x-www-form-urlencoded"
          );
          xhr.onload = function () {
            if (xhr.status === 200) {
              console.log(xhr.response);
            } else {
              console.error("Lỗi yêu cầu:", xhr.status, xhr.statusText);
            }
          };
          var data = [
            "matx=" + matx,
            "lat=" + coord.lat,
            "lng=" + coord.lng,
            "tt=" + tt,
          ];
          xhr.send(data.join("&"));
        }, 2500*index);
      });
      // console.log(e.routes[0])
      // console.log(e.routes[0].waypoints)
    })
    .addTo(map);

  routeRunning._container.style.display = "None";
}

function txDonKhach(item) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../admin/xhrMethod/timkhachhang.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);
      var x = response.x;
      var y = response.y;
      moveCar(0, item.TX_MA, item.TT_TOADOX, item.TT_TOADOY, x, y);
    } else {
      console.error("Lỗi yêu cầu:", xhr.status, xhr.statusText);
    }
  };
  var data = "matx=" + item.TX_MA;
  xhr.send(data);
}

function txChoKhach(item) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../admin/xhrMethod/timdiemden.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);
      var x = response.x;
      var y = response.y;
      moveCar(2, item.TX_MA, item.TT_TOADOX, item.TT_TOADOY, x, y);
    } else {
      console.error("Lỗi yêu cầu:", xhr.status, xhr.statusText);
    }
  };
  var data = "matx=" + matx;
  xhr.send(data);
}

function loadtrangthai(){
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../admin/loadtrangthaixe.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);
      findPath(response);
    } else {
      console.error("Lỗi yêu cầu:", xhr.status, xhr.statusText);
    }
  };
  xhr.send();
}

loadtrangthai()
setInterval(loadtrangthai, 30000)


// ... CHO NAY CHI LOAD LAI MAP
var markersList = [];
var marker = null;

function reloadMap() {
  for (var i = 0; i < markersList.length; i++) {
    map.removeLayer(markersList[i]);
  }
  markersList = [];
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../admin/loadtrangthaixe.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);
      showMap(response);
    } else {
      console.error("Lỗi yêu cầu:", xhr.status, xhr.statusText);
    }
  };
  xhr.send();
}
setInterval(reloadMap, 1000);

var marker = null;
function showMap(response) {
  response.forEach(function (item) {
    if (item.TT_TRANGTHAI == 1) {
      // TÀI XẾ RẢNH
      marker = L.marker([item.TT_TOADOX, item.TT_TOADOY], {
        icon: carIconFree,
      }).addTo(map);
    } else if (item.TT_TRANGTHAI == 0) {
      // TÀI XẾ ĐANG ĐÓN KHÁCH
      marker = L.marker([item.TT_TOADOX, item.TT_TOADOY], {
        icon: carIconBusy,
      }).addTo(map);
      markersList.push(marker);
      // txDonKhach(item);
    } else {
      // TÀI XẾ ĐANG CHỞ KHÁCH
      marker = L.marker([item.TT_TOADOX, item.TT_TOADOY], {
        icon: carIconBusy,
      }).addTo(map);
      markersList.push(marker);
      // txChoKhach(item);
    }

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
        route.remove();
      }
      popup.openOn(map);
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "../admin/xhrMethod/timdiemden.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onload = function () {
        if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          var x = response.x;
          var y = response.y;

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
}
// Ví dụ: Làm việc với dữ liệu JSON
