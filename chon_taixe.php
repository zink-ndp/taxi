<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    echo "Vị trí hiện tại của bạn là:<br>";
    echo "Vĩ độ: " . $latitude . "<br>";
    echo "Kinh độ: " . $longitude;
}
?>
 