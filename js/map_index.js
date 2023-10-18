
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
     
        var marker = L.marker([latitude, longitude]).addTo(map); //đặt vị trí hiện tại của khách hàng
    
        var popup = L.popup()
    
        // L.circle([latitude, longitude], {radius: 6000}).addTo(map);
        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map)
        
        
    }








