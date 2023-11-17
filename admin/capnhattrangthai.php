<?php
require "connect.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matx = $_POST['matx'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $tt = $_POST['tt'];

    $sql = 'select sysdate() as date from dual';
    $result = $conn->query($sql);
    $sysdate = $result->fetch_assoc();
    $date = $sysdate['date'];

    $sql="insert into thoidiem value('{$date}')";
    $conn->query($sql);

    if ($tt==0){
        $sql_tx = "INSERT INTO trangthai values ($matx, '$date', 2, $lat, $lng)";
        $sql_cx = "UPDATE chuyenxe SET CX_TRANGTHAI = 2 where TX_MA = $matx and CX_TDDIEMDEN_X = $lat and CX_TDDIEMDEN_Y = $lng";
    } else {
        $sql_tx = "INSERT INTO trangthai values ($matx, '$date', 1, $lat, $lng)";
        $sql_cx = "UPDATE chuyenxe SET CX_TRANGTHAI = 3 where TX_MA = $matx and CX_TDDIEMDEN_X = $lat and CX_TDDIEMDEN_Y = $lng";
    }

    $conn->query($sql);
    echo $sql;
} else {
    echo "Invalid request method";
}



?>