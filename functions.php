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

    function insert_danhgiacx($data)
    {
        $CX_MA      = mysqli_real_escape_string($data->db->link, $data['CX_MA']);
        $DG_SAO     = mysqli_real_escape_string($data->db->link, $data['DG_SAO']);
        $DG_NOIDUNG    = mysqli_real_escape_string($data->db->link, $data['DG_NOIDUNG']);
      
        if($CX_MA == "" || $DG_SAO == "" || $DG_NOIDUNG ){
            $alert = "<span class='error'> Các thành phần này không được trống!!!</span>";
            return $alert;
        }else{
            $query = "INSERT INTO danhgia
            VALUES ('$CX_MA','$DG_SAO','$DG_NOIDUNG')";
            $result = $data->db->insert($query);
            if($result){
                $alert = "<span class='success'> Thêm đánh giá thành công!</span>";
                return $alert; 
            }else{
                $alert = "<span class='error'> Thêm đánh giá thất bại!!!</span>";
                return $alert; 
            }
           
        }
    }
    // Vi du:   $carID = $_POST['carid'];
    //          $file = $_FILES["imgProduct"];
    //          $filename = $file['name'];
    //          $img = uploadImage($file, $filename, "../images/car/", $carID.'.png');

?>