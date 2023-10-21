<?php

    require 'connect.php';

    $maxe = $_GET['xid'];

    echo $masp;

    $sql = "delete from xe where X_MA='$maxe'";
    $conn->query($sql);

    header('Location: danhsachxe.php');

?>