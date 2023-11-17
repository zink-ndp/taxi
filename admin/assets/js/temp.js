var routeRunning;
function moveCar(tt, matx, startx, starty, x, y) {
  if (routeRunning) {
    routeRunning.remove();
  }
  routeRunning = L.Routing.control({
    waypoints: [L.latLng(startx, starty), L.latLng(x, y)],
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
      console.log(e);
      e.routes[0].coordinates.forEach(function (coord, index) {
        setTimeout(() => {
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "../admin/capnhatvitri.php", true);
          xhr.setRequestHeader(
            "Content-Type",
            "application/x-www-form-urlencoded"
          );
          xhr.onload = function () {
            if (xhr.status === 200) {
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
        }, 1500);
      });
    })
    .addTo(map);

  routeRunning._container.style.display = "None";
}


if (item.TT_TRANGTHAI == 0) {
    // TÀI XẾ ĐANG ĐÓN KHÁCH
    marker = L.marker([item.TT_TOADOX, item.TT_TOADOY], {
      icon: carIconBusy,
    }).addTo(map);
    markersList.push(marker);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../admin/timkhachhang.php", true);
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
  } else {
    // TÀI XẾ ĐANG CHỞ KHÁCH
    marker = L.marker([item.TT_TOADOX, item.TT_TOADOY], {
      icon: carIconBusy,
    }).addTo(map);
    markersList.push(marker);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../admin/timdiemden.php", true);
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
    var data = "matx=" + item.TX_MA;
    xhr.send(data);
  }