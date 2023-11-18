<?php
require "../connect.php";
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
        $sql_tx = "UPDATE trangthai SET TT_TRANGTHAI = 2 WHERE TX_MA = $matx AND TD_DATE = '$date'";
        $sql_cx = "UPDATE chuyenxe SET CX_TRANGTHAI = 2 where TX_MA = $matx and CX_TRANGTHAI = 1";
    } else {
        $sql_tx = "UPDATE trangthai SET TT_TRANGTHAI = 1 WHERE TX_MA = $matx AND TD_DATE = '$date'";
        $sql_cx = "UPDATE chuyenxe SET CX_TRANGTHAI = 3 where TX_MA = $matx and CX_TRANGTHAI = 2";
    }

    $conn->query($sql_tx);
    $conn->query($sql_cx);
    echo ($sql_tx.' - '.$sql_cx);

} else {
    echo "Invalid request method";
}



?>