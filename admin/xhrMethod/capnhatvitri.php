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
        $sql = "INSERT INTO trangthai values ($matx, '$date', 0, $lat, $lng)";
    } else {
        $sql = "INSERT INTO trangthai values ($matx, '$date', 2, $lat, $lng)";
    }
    $conn->query($sql);
    echo $sql;
} else {
    echo "Invalid request method";
}



?>