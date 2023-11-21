<?php
@include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]) && isset($_GET["macx"])) {
    // Lấy dữ liệu từ form
    $macx = $_GET["macx"];
    echo $macx;
    $saodanhgia = $_POST["saoDanhGia"];
    $noidungdg = $_POST["noiDungDanhGia"];

    // Kiểm tra xem mã chuyến xe có tồn tại trong bảng chuyenxe không
    $kiemtra_cxma = "SELECT CX_MA FROM chuyenxe WHERE CX_MA = '$macx'";
    $result_kiemtra = $conn->query($kiemtra_cxma);

    if ($result_kiemtra->num_rows > 0) {
        $row_kiemtra = $result_kiemtra->fetch_assoc();
        $cx_ma = $row_kiemtra['CX_MA'];

        // Lấy danh sách các tiêu chí từ bảng tieuchi
        $laytieuchi = "SELECT TC_MA FROM tieuchi";
        $result_tc = $conn->query($laytieuchi);

        if ($result_tc->num_rows > 0) {
            $row_tc = $result_tc->fetch_assoc();
            $tc_ma = $row_tc['TC_MA'];

            // Lấy ID lớn nhất từ bảng danhgia để tạo ID mới
            $sql_maxid = "SELECT MAX(DG_MA) AS maxid FROM danhgia";
            $result_maxid = $conn->query($sql_maxid);
            $row_maxid = $result_maxid->fetch_assoc();
            $nextid = $row_maxid['maxid'] + 1;

            // Truy vấn thêm mới đánh giá
            $sql_themdg = "INSERT INTO danhgia (DG_MA, CX_MA, TC_MA, DG_SAO, DG_NOIDUNG) 
                           VALUES ('$nextid', '$cx_ma', '1', '$saodanhgia', '$noidungdg')";

            $result_themdg = $conn->query($sql_themdg);

            if ($result_themdg) {
                // Xử lý khi truy vấn thành công
                header('Location: danhgiataixe.php?macx=' . $nextid);
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
?>
