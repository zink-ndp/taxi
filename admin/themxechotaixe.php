<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "taxi";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// $maTaixe = $_POST["TX_MA"];
// $maXe = $_POST["X_MA"];
// $sql_taixe = "SELECT * FROM phutrach WHERE TX_MA = '$maTaixe'";
// $result_taixe = $conn->query($sql_taixe);
// if ($result_taixe->num_rows > 0) {
//     // Nếu sdt không có tồn tại, thông báo lỗi và reload lại trang
//     echo '<script language="javascript">
//     alert("Mã tài xế đã tồn tại!");
//     history.back();
//      </script>';
//     exit();
// }
// $sql_maxe = "SELECT * FROM phutrach WHERE X_MA = '$maXe'";
// $result_xe = $conn->query($sql_maxe);
// if ($result_xe->num_rows > 0) {
//     // Nếu sdt không có tồn tại, thông báo lỗi và reload lại trang
//     echo '<script language="javascript">
//     alert("Mã xe đã tồn tại!");
//     history.back();
//      </script>';
//     exit();
// }
// // Cập nhật khách hàng vào cơ sở dữ liệu
//     $thoiDiem = $_POST["TD_DATE"];
//     $check_query = "SELECT * FROM thoidiem WHERE TD_DATE = '$thoiDiem'";   
//     $result_check = $conn->query($check_query);
// if ($result_check) {
//     $sql = "INSERT INTO phutrach (TX_MA, TD_DATE, X_MA) VALUES ('$maTaixe', '$thoiDiem', '$maXe');";
//     if($conn->query($sql) === TRUE){
//         echo '<script language="javascript">
//         alert("Cập nhật xe thành công!");
//         history.back();
//           </script>';
//     }else{
//         echo "Cập nhật xe thất bại: " . $conn->error;
//     }  
// } else {
//     echo "Cập nhật thời điểm thất bại: " . $conn->error;
// }


// // Đóng kết nối
// $conn->close();

?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taxi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

$maTaixe = $_POST["TX_MA"];
$maXe = $_POST["X_MA"];
$thoiDiem = $_POST["TD_DATE"];

if ($maTaixe && $maXe && $thoiDiem) {
    // Kiểm tra sự tồn tại của mã tài xế và mã xe
    $sql_taixe = "SELECT * FROM phutrach WHERE TX_MA = '$maTaixe'";
    $result_taixe = $conn->query($sql_taixe);
    if ($result_taixe->num_rows > 0) {
        echo '<script language="javascript">
        alert("Mã tài xế đã tồn tại!");
        history.back();
        </script>';
        exit();
    }

    $sql_maxe = "SELECT * FROM phutrach WHERE X_MA = '$maXe'";
    $result_xe = $conn->query($sql_maxe);
    if ($result_xe->num_rows > 0) {
        echo '<script language="javascript">
        alert("Mã xe đã tồn tại!");
        history.back();
        </script>';
        exit();
    }

    // Kiểm tra sự tồn tại của thời điểm
    $check_query = "SELECT * FROM thoidiem WHERE TD_DATE = '$thoiDiem'";
    $result_check = $conn->query($check_query);

    if ($result_check) {
        $sql = "INSERT INTO phutrach (TX_MA, TD_DATE, X_MA) VALUES ('$maTaixe', '$thoiDiem', '$maXe')";
        if ($conn->query($sql) === TRUE) {
            echo '<script language="javascript">
            alert("Cập nhật xe thành công!");
            history.back();
            </script>';
        } else {
            echo "Cập nhật xe thất bại: " . mysqli_error($conn);
        }
    } else {
        echo "Cập nhật thời điểm thất bại: " . mysqli_error($conn);
    }
} else {
    echo "Dữ liệu đầu vào không hợp lệ.";
}

$conn->close();
?>
