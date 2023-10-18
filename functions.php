<?php

    function querySql($conn, $sql){
        $conn->query($sql);
    }

    function querySqlwithResult($conn, $sql){
        $result = $conn->query($sql);
        return $result;
    }
    function getMaxId($conn, $column, $table){
        $sql = "select max($column) as maxid from $table";
        $result = $conn->query($sql);
        $rs = $result->fetch_assoc();
        return $rs['maxid'];
    }
    // Vi du: $maxId = getMaxId($conn, 'NV_MA', 'nhanvien'); $nextId = $maxId + 1;

    function uploadImage($file, $filename, $tar_dir, $fname){

        move_uploaded_file($file['tmp_name'],$tar_dir.$filename);

        $new_filename = $fname;

        rename($tar_dir.$filename, $tar_dir.$new_filename);

        return $new_filename;
    }
    // Vi du:   $carID = $_POST['carid'];
    //          $file = $_FILES["imgProduct"];
    //          $filename = $file['name'];
    //          $img = uploadImage($file, $filename, "../images/car/", $carID.'.png');

?>