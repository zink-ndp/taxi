<?php
@include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]) && isset($_GET["macx"])) {
    // Lấy dữ liệu từ form
    $macx = $_GET["macx"];
    $saodanhgia = $_POST["saoDanhGia"];
    $noidungdg = $_POST["noiDungDanhGia"];

    // Kiểm tra xem mã chuyến xe có tồn tại trong bảng chuyenxe không
    $kiemtra_cxma = "SELECT CX_MA FROM chuyenxe WHERE CX_MA = '$macx'";
    $result_kiemtra = $conn->query($kiemtra_cxma);

    if ($result_kiemtra->num_rows > 0) {
        $row_kiemtra = $result_kiemtra->fetch_assoc();
        $cx_ma = $row_kiemtra['CX_MA'];

        // Lấy danh sách các tiêu chí từ bảng tieuchi
        $laytaixe = "SELECT TX_MA FROM chuyenxe WHERE CX_MA = '$cx_ma'";
        $result_tx = $conn->query($laytaixe);

        if ($result_tx->num_rows > 0) {
            $row_tx = $result_tx->fetch_assoc();
            $tx_ma = $row_tx['TX_MA'];

            // Lấy ID lớn nhất từ bảng danhgia để tạo ID mới
            $sql_maxid = "SELECT MAX(DGX_MA) AS maxid FROM danhgiacx";
            $result_maxid = $conn->query($sql_maxid);
            $row_maxid = $result_maxid->fetch_assoc();
            $nextid = $row_maxid['maxid'] + 1;

            // Truy vấn thêm mới đánh giá
            $sql_themdg = "INSERT INTO danhgiacx (DGX_MA, CX_MA, TX_MA, DGX_SAO, DGX_ND) 
                           VALUES ('$nextid', '$cx_ma', '$tx_ma', '$saodanhgia', '$noidungdg')";

            $result_themdg = $conn->query($sql_themdg);

            if ($result_themdg) {
                // Xử lý khi truy vấn thành công
                header('Location: danhgiataixe.php?macx=' . $cx_ma);
                exit();  // Đảm bảo dừng thực thi sau khi chuyển hướng
            } else {
                // Xử lý khi truy vấn thất bại
                die('Lỗi truy vấn: ' . mysqli_error($conn));
            }
        } else {
            echo "Lấy tiêu chí thất bại!";
        }
    } else {
        echo "Mã chuyến xe không hợp lệ!";
    }
}
