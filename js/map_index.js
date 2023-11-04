function showMapIndex(){
    const carMakerUrl = 'images/car-maker.png'
    const userMakerUrl = 'images/user-maker.png'
    const userMaker = L.icon({
        iconUrl: userMakerUrl,
        iconSize: [40,50],
        iconAnchor: [15,15]
    })
    const carMaker = L.icon({
        iconUrl: carMakerUrl,
        iconSize: [40,50],
        iconAnchor: [15,15]
    })

    const map = L.map('map').setView([latitude, longitude], 13); //khu vực hiển thị theo vị trí hiện tại

    var marker = L.marker([latitude, longitude],{icon: userMaker}).addTo(map); //đặt vị trí hiện tại của khách hàng

    var popup = L.popup()

    var route = null;
    var popup = null;
    jsonData.forEach(function(item) {
        const marker = L.marker([item.tt_toadox, item.tt_toadoy],{icon: carMaker}).addTo(map);

        marker.on('click', function(){

            if(popup){
                popup.remove()
            }
            popup = L.popup()
            .setLatLng([item.tt_toadox, item.tt_toadoy])
            .setContent(`<b>Tài xế:</b> ${item.tx_ten}</br>
                            <b>Xe:</b> ${item.x_mota}</br>
                            <form class="mt-2 float-end" action="#datxe" method="post">
                            <input type="hidden" name="tx_ma" value="${item.tx_ma}">
                            <button type="submit" class="btn btn-success">Đặt ngay</button>
                        </form>`).openOn(map)

            if (route) {
                route.remove()
            }
            route = L.Routing.control({
                waypoints: [
                    L.latLng(latitude, longitude),
                    L.latLng(item.tt_toadox, item.tt_toadoy)
                ],
                draggableWaypoints: false,
                routeWhileDragging: false,
                fitSelectedRoutes: false,
                lineOptions: {
                    styles: [{ color: '#19d600', opacity: 0.6, weight: 6 }]
                },
                createMarker: function () {return null}
            }).addTo(map)
        })
    });


    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map)
}