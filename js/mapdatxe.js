
    const map = L.map('map').setView([10.03, 105.77], 13); //khu vực hiển thị theo vị trí hiện tại

    // var marker = L.marker([latitude, longitude]).addTo(map); //đặt vị trí hiện tại của khách hàng

    var popup = L.popup()

    L.circle([latitude, longitude], {radius: 6000}).addTo(map);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    
    // // Lắng nghe sự kiện click trên nút "Ghim Địa Điểm"
    // const pinLocationButton = document.getElementById('pinLocationButton');
    // pinLocationButton.addEventListener('click', function () {
    //     // Hiển thị bản đồ bằng cách thiết lập style của phần tử chứa bản đồ thành "block"
    //     const mapContainer = document.getElementById('mapContainer');
    //     mapContainer.style.display = 'block';
    // });
    
    // let pinnedMarkers = []; // Mảng chứa các marker đã ghim
    
    // function onMapClick(e) {
    //     const popup = L.popup()
    //         .setLatLng(e.latlng)
    //         .setContent(`You clicked the map at ${e.latlng.toString()}`)
    //         .openOn(map);
    
    //     // Tạo một marker tại vị trí người dùng đã nhấp vào
    //     const marker = L.marker(e.latlng);
        
    //     // Thêm marker này vào bản đồ
    //     marker.addTo(map);
        
    //     // Thêm marker vào mảng pinnedMarkers để có thể quản lý sau này
    //     pinnedMarkers.push(marker);
    // }
    
    // map.on('click', onMapClick);
