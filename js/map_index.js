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

getLocation()

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            document.getElementById("location").innerHTML = "Trình duyệt của bạn không hỗ trợ định vị.";
        }
      }
    
      
    function showPosition(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        const map = L.map('map').setView([latitude, longitude], 13); //khu vực hiển thị theo vị trí hiện tại
     
        var marker = L.marker([latitude, longitude],{icon: userMaker}).addTo(map); //đặt vị trí hiện tại của khách hàng

        var popup = L.popup()

        console.log(jsonData)

        var route = null;
        jsonData.forEach(function(item) {
            const marker = L.marker([item.tt_toadox, item.tt_toadoy],{icon: carMaker}).addTo(map);

            marker.on('click', function(){
                if (route) {
                    route.remove()
                }
                route = L.Routing.control({
                    waypoints: [
                        L.latLng(latitude, longitude),
                        L.latLng(item.tt_toadox, item.tt_toadoy)
                    ]
                }).addTo(map)
            })
        });

    
        // L.circle([latitude, longitude], {radius: 6000}).addTo(map);
        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map)
        
        
    }








