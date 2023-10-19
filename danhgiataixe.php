
<?php
include("connect.php");
// include("header.php");
// Lấy dữ liệu từ biểu mẫu gửi lên
if (isset($_POST["guidanhgia"])) {
    $maChuyenXe = $_POST["maChuyenXe"];
    $maTieuChi = $_POST["maTieuChi"];
    $saoDanhGia = $_POST["saoDanhGia"];
    $noiDungDanhGia = $_POST["noiDungDanhGia"];

    $checkChuyenXeSql = "SELECT COUNT(*) FROM chuyenxe WHERE CX_MA = ?";
    $checkChuyenXeStmt = $conn->prepare($checkChuyenXeSql);
    $checkChuyenXeStmt->bind_param("i", $maChuyenXe);
    $checkChuyenXeStmt->execute();
    $checkChuyenXeStmt->bind_result($count);
    $checkChuyenXeStmt->fetch();
    $checkChuyenXeStmt->close();

    // Truy vấn SQL để kiểm tra xem đánh giá đã tồn tại chưa
    $checkSql = "SELECT COUNT(*) FROM danhgia WHERE CX_MA = ? AND TC_MA = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("ii", $maChuyenXe, $maTieuChi);
    $checkStmt->execute();
    $checkStmt->bind_result($count);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($count > 0) {
        // Đánh giá đã tồn tại, bạn có thể cập nhật nó thay vì thêm mới
         $updateSql = "UPDATE danhgia SET DG_SAO = ?, DG_NOIDUNG = ? WHERE CX_MA = ? AND TC_MA = ?";
        // Tiếp theo, thực hiện cập nhật đánh giá theo truy vấn $updateSql
    } else {
        // Đánh giá chưa tồn tại, thêm nó vào bảng danhgia
        $insertSql = "INSERT INTO danhgia (CX_MA, TC_MA, DG_SAO, DG_NOIDUNG) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("iiis", $maChuyenXe, $maTieuChi, $saoDanhGia, $noiDungDanhGia);
        if ($stmt->execute()) {
            echo "Đánh giá đã được gửi đi.";
        } else {
            echo "Lỗi khi thêm đánh giá: " . $conn->error;
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title> ĐÁNH GIÁ TÀI XẾ</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<style>
  .col-md-6 {
    -webkit-box-flex: inherit;
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
    text-align: initial;
}
</style>
<body>
  <form method="POST" class="col-md-6" action="">
  <h2>Đánh Giá Tài Xế</h2>
    <div class="form-group">
    <label for="maChuyenXe">Mã Chuyến Xe</label>
    <select class="form-select form-control" id="maChuyenXe" name="maChuyenXe">
                                            <option value="" selected>Chọn chuyến xe</option>
                                         
                                            <?php
                                            // Truy vấn để lấy danh sách quận/huyện
                                            $sql = "SELECT CX_MA , TD_DATE FROM chuyenxe";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option value="' . $row["CX_MA"] . '">' . $row["TD_DATE"] . '</option>';
                                                }
                                            }

                                          ?>
                                        </select>
     
    </div>
    <div class="form-group">
      <label for="maTieuChi">Mã Tiêu Chí</label>
      <select class="form-select form-control" id="maTieuChi" name="maTieuChi">
                                            <option value="" selected>Chọn tiêu chí</option>
                                         
                                         <?php   
                                            // Truy vấn để lấy danh sách quận/huyện
                                            $sql = "SELECT TC_MA,TC_TEN FROM tieuchi";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option value="' . $row["TC_MA"] . '">' . $row["TC_TEN"] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
         </div>
    <div class="form-group">
      <label for="saoDanhGia">Sao Đánh Giá</label>
      <input type="number" placeholder="Nhập số sao cho Tài Xế" class="form-control" name="saoDanhGia" required>
    </div>
    <div class="form-group">
      <label for="noiDungDanhGia">Nội Dung Đánh Giá</label>
      <textarea class="form-control" placeholder="Nhập nội dung đánh giá của bạn" name="noiDungDanhGia" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="guidanhgia">Gửi Đánh Giá</button>
    <!-- <div id="success-message" style="display: none;">
    Đánh giá đã được thêm thành công.
</div> -->
  </form>

</body>
</html>
<!-- <script>
    // Thêm đánh giá thành công, hiển thị thông báo
    document.getElementById('success-message').style.display = 'block';

    // Sau 3 giây, chuyển hướng về trang chính (hoặc trang bạn muốn)
    setTimeout(function () {
        window.location.href = 'index.php'; // Thay đổi URL theo trang bạn muốn chuyển hướng
    }, 3000); // 3000 milliseconds = 3 giây
</script> -->





<?php 
mysqli_close($conn);
include("footer.php");
?>