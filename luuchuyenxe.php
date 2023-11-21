<?php
@include('connect.php');
if (isset($_GET['txma'])) {
    $khid = $_SESSION['kh_ma'];
    $matx = $_GET['txma'];
    $kiemtra_txma = "SELECT TX_MA FROM taixe WHERE TX_MA = '$matx'";
    $result_kiemtra = $conn->query($kiemtra_txma);
    if ($result_kiemtra->num_rows > 0) {
        $row_kiemtra = $result_kiemtra->fetch_assoc();
        $TX_MA = $row_kiemtra['TX_MA'];
        $sql = "SELECT MAX(CX_MA) AS macxid FROM chuyenxe";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $nextid = $row['macxid'] + 1;

        $layngay = "SELECT sysdate() as date FROM dual";
        $result_ngay = $conn->query($layngay);
        $sysdate = $result_ngay->fetch_assoc();
        $date = $sysdate['date'];
        $sql_themngay = "INSERT INTO thoidiem VALUE('{$date}')";
        $result_themngay = $conn->query($sql_themngay);
        if ($result_themngay) {
            $sql_themcx = "INSERT INTO chuyenxe (CX_MA, KH_MA, TX_MA, TD_DATE, CX_SOKM, CX_THANHTIEN, 
                                    CX_TDDIEMDI_X, CX_TDDIEMDI_Y, CX_TDDIEMDEN_X, CX_TDDIEMDEN_Y, CX_TRANGTHAI )
                                    VALUES ('$nextid','$khid', '$TX_MA' ,'$date' ,'4',
                                    '40000','12.46','12.45','12.88','12.98', '0')";
            $result = mysqli_query($conn, $sql_themcx);
            if (!$result) {
                die('Lỗi truy vấn: ' . mysqli_error($conn));
            } else {
                header('Location: xulydatxe.php?macx=CX_MA');
            }
        } else {
            echo "Thêm ngày thất bại";
        }
    } else {
        echo "Lỗi: Giá trị TX_MA không hợp lệ.";
    }
} else {
    echo "Đặt xe thất bại!";
}

// ".$_POST['TD_DATE']."
// ".$_SESSION['latdi']."

// ".$_SESSION['latden']."
// ".$_SESSION['lngden']."
