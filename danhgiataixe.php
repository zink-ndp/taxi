
<?php
include("connect.php");


// if (isset($_POST["guidanhgia"])) {
//     $mataixe = $_POST["mataixe"];
//     $maTieuChi = $_POST["maTieuChi"];
//     $diemDanhGia = $_POST["diemDanhGia"];
//     $noiDungDanhGia = $_POST["noiDungDanhGia"];

//     // Lưu điểm và nội dung đánh giá vào cơ sở dữ liệu (sử dụng câu lệnh SQL thích hợp)

//     // Cập nhật trường điểm trung bình trong cơ sở dữ liệu (sử dụng câu lệnh SQL thích hợp)


//     // Truy vấn SQL để kiểm tra xem đánh giá đã tồn tại chưa
//     $checkSql = "SELECT COUNT(*) FROM dgtieuchi WHERE TX_MA = ? AND TC_MA = ?";
//     $checkStmt = $conn->prepare($checkSql);
//     $checkStmt->bind_param("ii", $mataixe, $maTieuChi);
//     $checkStmt->execute();
//     $checkStmt->bind_result($count);
//     $checkStmt->fetch();
//     $checkStmt->close();

//     // Truy vấn SQL để lấy điểm trung bình
//     $selectDiemTrungBinhSql = "SELECT DGTC_DIEM FROM dgtieuchi WHERE TX_MA = ? AND TC_MA = ?";
//     $selectDiemTrungBinhStmt = $conn->prepare($selectDiemTrungBinhSql);
//     $selectDiemTrungBinhStmt->bind_param("ii", $mataixe, $maTieuChi);
//     $selectDiemTrungBinhStmt->execute();
//     $selectDiemTrungBinhStmt->bind_result($diemTrungBinh);
//     $selectDiemTrungBinhStmt->fetch();
//     $selectDiemTrungBinhStmt->close();

    // Tính tổng điểm
    // $totalPoints = 0;
    // $totalCriteria = count($maTieuChi);

    // for ($i = 0; $i < $totalCriteria; $i++) {
    //     $totalPoints += $diemDanhGia[$i];
    // }

    // // Tính điểm trung bình
    // $diemTrungBinh = $totalPoints / $totalCriteria;

//     // Cập nhật trường nhập điểm trung bình trong giao diện người dùng
//     echo '<script>document.getElementById("diemTrungBinh").value = "' . $diemTrungBinh . '";</script>';

//     if ($count > 0) {
//         // Đánh giá đã tồn tại, bạn có thể cập nhật nó thay vì thêm mới
//         $updateSql = "UPDATE dgtieuchi SET DGTC_DIEM = ?, DGTC_NOIDUNG = ? WHERE TX_MA = ? AND TC_MA = ?";
//         $updateStmt = $conn->prepare($updateSql);
//         $updateStmt->bind_param("issi", $diemTrungBinh, $noiDungDanhGia, $mataixe, $maTieuChi);
//         if ($updateStmt->execute()) {
//             echo "Đánh giá đã được cập nhật.";
//         } else {
//             echo "Lỗi khi cập nhật đánh giá: " . $conn->error;
//         }
//         $updateStmt->close();
//     } else {
//         // Đánh giá chưa tồn tại, thêm nó vào bảng tieuchi
//         $insertSql = "INSERT INTO dgtieuchi (TX_MA, TC_MA, DGTC_DIEM, DGTC_NOIDUNG) VALUES (?, ?, ?, ?)";
//         $stmt = $conn->prepare($insertSql);
//         $stmt->bind_param("iiis", $mataixe, $maTieuChi, $diemTrungBinh, $noiDungDanhGia);
//         if ($stmt->execute()) {
//             echo "Đánh giá đã được gửi đi.";
//         } else {
//             echo "Lỗi khi thêm đánh giá: " . $conn->error;
//         }
//         $stmt->close();
//     }
//   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ĐÁNH GIÁ TÀI XẾ</title>
  <link rel="stylesheet" href="css/style.css">


</head>

<style>
  .col-md-6 {
    margin-left: 500px;
    -webkit-box-flex: inherit;
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
    text-align: initial;
  }
</style>

<script>
   // Hàm JavaScript để hiển thị và ẩn trường nhập điểm khi checkbox được chọn hoặc bỏ chọn
    function togglePointsInput(checkbox, index) {
    const pointsInput = document.querySelectorAll('.points-input');
    pointsInput[index].style.display = checkbox.checked ? 'block' : 'none';
    calculateAverage(); // Gọi hàm tính điểm trung bình khi checkbox thay đổi
  }
  // Hàm JavaScript để tính điểm trung bình
  function calculateAverage() {
    const checkboxes = document.querySelectorAll('input[name="maTieuChi[]"]');
    const pointsInput = document.querySelectorAll('.points-input');
    const totalPointsInput = document.getElementById("diemTrungBinh");
    let totalPoints = 0;
    let totalCriteria = 0;

    for (let i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
        totalPoints += parseFloat(pointsInput[i].value);
        totalCriteria++;
      }
    }

    if (totalCriteria > 0) {
      const average = totalPoints / totalCriteria;
      totalPointsInput.value = average.toFixed(2);
    }
  }
</script>
<body>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.hphp">Trang chủ<i class="ion-ios-arrow-forward"></i></a></span> <span>Đánh giá tài xế<i class="ion-ios-arrow-forward"></i></span></p>
                
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">

  <form method="POST" class="col-md-6" action="">
  
  <h1 class="mb-3 bread">Đánh giá tài xế</h1>
    <div class="form-group">
      <label for="mataixe">Mã Tài Xế</label>
      
        <?php
        // Truy vấn để lấy danh sách tài xế
        
        $sql = "SELECT taixe.TX_TEN FROM taixe 
        join chuyenxe on chuyenxe.TX_MA = taixe.TX_MA
        where chuyenxe.TX_MA= '$matx' and chuyenxe.CX_TRANGTHAI='3'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["TX_MA"] . '">' . $row["TX_TEN"] . '</option>';
          }
        }
        ?>
   
    </div>
    <div class="form-group">
  <label for="maTieuChi">Chọn Tiêu Chí Đánh Giá</label>
  <?php
  // Truy vấn để lấy danh sách tiêu chí
  $sql = "SELECT TC_MA, TC_TEN FROM tieuchi";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $index = 0;
    while ($row = $result->fetch_assoc()) {
      echo '<div class="form-check">';
      echo '<input type="checkbox" class="form-check-input" name="maTieuChi[]" value="' . $row["TC_MA"] . '" onclick="togglePointsInput(this, ' . $index . ');">';
      echo '<label class="form-check-label">' . $row["TC_TEN"] . '</label>';
      echo '<input type="number" class="form-control points-input" style="display: none;" placeholder="Nhập điểm cho Tài Xế" min="0" max="10" name="diemDanhGia[]">';
      echo '</div>';
      $index++;
    }
  }
  ?>
</div>

    <div class="form-group">
      <label for="noiDungDanhGia">Nội Dung Đánh Giá</label>
      <textarea class="form-control" placeholder="Nhập nội dung đánh giá của bạn" name="noiDungDanhGia" rows="4"></textarea>
    </div>
    
    <div class="form-group">
      <label for="diemTrungBinh" name="diemTrungBinh">Điểm Trung Bình</label>
      <?php
      // echo '<label class="form-check-label">' . $row["DGTC_DIEM"] . '</label>';
      ?>
      <input type="text" class="form-control" id="diemTrungBinh" name="diemTrungBinh" disabled>
    </div>

    <button type="submit" class="btn btn-primary py-3 px-5" name="guidanhgia">Gửi Đánh Giá</button>
 
  </form>

</section>
</body>
</html>

<?php
  mysqli_close($conn);

  ?>