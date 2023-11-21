<?php
@include('connect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_GET['macx'])) {
    $cx_ma = $_GET['macx'];
    $tc_ma = $_POST['maTieuChi']; 
    $dgtc_diem = $_POST['diemtb'];

    $kiemtra_cxma = "SELECT CX_MA FROM chuyenxe WHERE CX_MA = '$cx_ma'";
    $result_kiemtra = $conn->query($kiemtra_cxma);
    if ($result_kiemtra->num_rows > 0) {
        $row_kiemtra = $result_kiemtra->fetch_assoc();
        $tx_ma = $row_kiemtra['TX_MA'];
        $sql = "SELECT MAX(CX_MA) AS macxid FROM dgtieuchi";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $nextid = $row['macxid'] + 1;

        $sql_themdg = "INSERT INTO dgtieuchi 
        VALUES ('$nextid', '$tc_ma', '$tx_ma', '$dgtc_diem')";

        // Sửa đổi ở đây để gán giá trị trả về của truy vấn thêm mới
        $result_themdg = $conn->query($sql_themdg);

        // if ($result_themdg) {
        //     // Xử lý khi truy vấn thành công
        //     header('Location: danhgiachuyenxe.php?macx='.$nextid);
        // } else {
        //     // Xử lý khi truy vấn thất bại
        //     echo "Thêm đánh giá thất bại";
        // }
    } else {
        echo "Lỗi: Giá trị TX_MA không hợp lệ.";
    }
}else{
    echo "Thêm lỗi!!";
}
?>
