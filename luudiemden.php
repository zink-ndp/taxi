
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'));
    if ($data && property_exists($data, 'latlng')) {
        // Lưu tọa độ vào Session
        $_SESSION['pinned_location2'] = $data->latlng;
    }
}
?>
