<?php
include("connect.php");

// Lấy dữ liệu từ biểu mẫu gửi lên
if (isset($_POST["guidanhgia"])) {
    $mataixe = $_POST["mataixe"];
    $maTieuChi = $_POST["maTieuChi"];
    $diemDanhGia = $_POST["diemDanhGia"];
    $noiDungDanhGia = $_POST["noiDungDanhGia"];

    // Truy vấn SQL để kiểm tra xem đánh giá đã tồn tại chưa
    $checkSql = "SELECT COUNT(*) FROM dgtieuchi WHERE TX_MA = ? AND TC_MA = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("ii", $mataixe, $maTieuChi);
    $checkStmt->execute();
    $checkStmt->bind_result($count);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($count > 0) {
        // Đánh giá đã tồn tại, bạn có thể cập nhật nó thay vì thêm mới
        $updateSql = "UPDATE dgtieuchi SET DGTC_DIEM = ?, DGTC_NOIDUNG = ? WHERE TX_MA = ? AND TC_MA = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("issi", $diemDanhGia, $noiDungDanhGia, $mataixe, $maTieuChi);
        if ($updateStmt->execute()) {
            echo "Đánh giá đã được cập nhật.";
        } else {
            echo "Lỗi khi cập nhật đánh giá: " . $conn->error;
        }
        $updateStmt->close();
    } else {
        // Đánh giá chưa tồn tại, thêm nó vào bảng tieuchi
        $insertSql = "INSERT INTO dgtieuchi (TX_MA, TC_MA, DGTC_DIEM, DGTC_NOIDUNG) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("iiis", $mataixe, $maTieuChi, $diemDanhGia, $noiDungDanhGia);
        if ($stmt->execute()) {
            echo "Đánh giá đã được gửi đi.";
        } else {
            echo "Lỗi khi thêm đánh giá: " . $conn->error;
        }
        $stmt->close();
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
      <label for="mataixe">Mã Tài Xế</label>
      <select class="form-select form-control" id="mataixe" name="mataixe">
        <option value="" selected>Chọn Tài Xế</option>
        <?php
        // Truy vấn để lấy danh sách tài xế
        $sql = "SELECT TX_MA, TX_TEN FROM taixe";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["TX_MA"] . '">' . $row["TX_TEN"] . '</option>';
          }
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="maTieuChi">Mã Tiêu Chí</label>
      <select class="form-select form-control" id="maTieuChi" name="maTieuChi">
        <option value="" selected>Chọn Tiêu Chí</option>
        <?php
        // Truy vấn để lấy danh sách tiêu chí
        $sql = "SELECT TC_MA, TC_TEN FROM tieuchi";
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
      <label for="diemDanhGia">Điểm Đánh Giá</label>
      <input type="number" placeholder="Nhập điểm cho Tài Xế" class="form-control" name="diemDanhGia" required>
    </div>
    <div class="form-group">
      <label for="noiDungDanhGia">Nội Dung Đánh Giá</label>
      <textarea class="form-control" placeholder="Nhập nội dung đánh giá của bạn" name="noiDungDanhGia" rows="4"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="guidanhgia">Gửi Đánh Giá</button>
  </form>
</body>
</html>
<?php
mysqli_close($conn);
?>
