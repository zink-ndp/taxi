<?php
include("connect.php");
?>
<?php
if (isset($_GET['macx'])) {
  $macx = $_GET['macx'];
} else {
  echo 'Chưa có mã chuyến xe';
}
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
          <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ<i class="ion-ios-arrow-forward"></i></a></span> <span>Đánh giá tài xế<i class="ion-ios-arrow-forward"></i></span></p>

        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">

    <form method="POST" class="col-md-6" action="">
      <h1 class="mb-3 bread">Đánh giá tài xế</h1>
      <div class="form-group">
        <?php
        // Truy vấn để lấy danh sách tài xế

        $sql = "SELECT taixe.TX_TEN, taixe.TX_MA FROM taixe 
        join chuyenxe on chuyenxe.TX_MA = taixe.TX_MA
        where chuyenxe.CX_MA= '$macx' and chuyenxe.CX_TRANGTHAI='3'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<label for="mataixe">Tên Tài Xế</label>
            <input type = "hidden" name = "matx" class="form-control" value="' . $row["TX_MA"] . '"></input>
            <input type = "text" class="form-control" value="' . $row["TX_TEN"] . '"></input>';
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

<<<<<<< HEAD
    <!-- <div class="form-group">
      <label for="noiDungDanhGia">Nội Dung Đánh Giá</label>
      <textarea class="form-control" placeholder="Nhập nội dung đánh giá của bạn" name="noiDungDanhGia" rows="4"></textarea>
    </div> -->
    
    <div class="form-group">
      <label for="diemTrungBinh" name="diemTrungBinh">Điểm Trung Bình</label>
      <?php
      // echo '<label class="form-check-label">' . $row["DGTC_DIEM"] . '</label>';
      ?>
      <input type="text" class="form-control" id="diemTrungBinh" name="diemTrungBinh" disabled>
    </div>

    <button type="submit"  onclick="redirectPage()"  class="btn" name="guidanhgia">Gửi Đánh Giá</button>
 
  </form>

    <script>
                function redirectPage() {
                    window.location.href = "danhgiachuyenxe.php?macx=CX_MA";
                }
    </script>

</section>
=======
      <div class="form-group">
        <label for="diemTrungBinh">Điểm Trung Bình</label>
        <?php
        // echo '<label class="form-check-label">' . $row["DGTC_DIEM"] . '</label>';
        ?>
        <input type="text" class="form-control" id="diemTrungBinh" name="diemtb" disabled>
      </div>
      <button type="submit" onclick="redirectPage()" class="btn btn-primary py-3 px-5" name="submit">Gửi đánh giá</button>
    </form>
  </section>
>>>>>>> ecd6622169e1235c2245d0029e8dd5b2fb20a80a
</body>

</html>
