<?php
$activate = "inforcar";
@include('header.php');
?>
<body>
    <?php
    // Mảng lưu trữ thông tin về các chuyến xe
    $chuyenXe = array(
        "CX001" => array(
            "TenXe" => "Xe A",
            "BienSo" => "123-ABC",
            "LoaiXe" => "Taxi 4 chổ",
            "GiaVe" => 200000
        ),
        "CX002" => array(
            "TenXe" => "Xe B",
            "BienSo" => "456-DEF",
            "LoaiXe" => "Taxi 4 chổ",
            "GiaVe" => 250000
        ),
        "CX003" => array(
            "TenXe" => "Xe C",
            "BienSo" => "789-GHI",
            "LoaiXe" => "Taxi 7 chổ ",
            "GiaVe" => 50000
        )
    );

    // Xử lý khi người dùng chọn một chuyến xe
    if (isset($_GET["chuyenxe"])) {
        $chuyenXeID = $_GET["chuyenxe"];
        if (array_key_exists($chuyenXeID, $chuyenXe)) {
            $thongTinXe = $chuyenXe[$chuyenXeID];
            echo "<h2>Thông tin chi tiết về chuyến xe $chuyenXeID</h2>";
            echo "<p><strong>Tên xe:</strong> " . $thongTinXe["TenXe"] . "</p>";
            echo "<p><strong>Biển số xe:</strong> " . $thongTinXe["BienSo"] . "</p>";
            echo "<p><strong>Loại xe:</strong> " . $thongTinXe["LoaiXe"] . "</p>";
            echo "<p><strong>Giá vé:</strong> " . number_format($thongTinXe["GiaVe"]) . " VND</p>";
        } else {
            echo "<p>Không tìm thấy thông tin về chuyến xe này.</p>";
        }
    }
    ?>

    <h2>Danh sách chuyến xe</h2>
    <ul>
        <?php
        // Hiển thị danh sách các chuyến xe và tạo liên kết đến trang chi tiết
        foreach ($chuyenXe as $chuyenXeID => $thongTinXe) {
            echo "<li><a href=\"?chuyenxe=$chuyenXeID\">" . $thongTinXe["TenXe"] . "</a></li>";
        }
        ?>
    </ul>

<?php
@include('footer.php');
?>

