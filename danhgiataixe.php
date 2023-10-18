<?php
// Kết nối đến CSDL
$servername = "localhost";
$username = "root";
$password = "";
$database = "taxi";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Lỗi kết nối đến CSDL: " . mysqli_connect_error());
}

// Truy vấn CSDL để lấy thông tin đánh giá của tài xế
$query = "SELECT * FROM danhgia WHERE CX_MA = 'driver_id_here'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Lỗi truy vấn CSDL: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Đánh giá tài xế</title>
</head>
<body>

<h2>Đánh giá tài xế</h2>

<?php
// Lặp qua kết quả truy vấn và hiển thị thông tin đánh giá
while ($row = mysqli_fetch_assoc($result)) {
    echo "Người đánh giá: " . $row['reviewer_name'] . "<br>";
    
    echo "Đánh giá: " . $row['rating'] . "<br>";
    echo "Bình luận: " . $row['comment'] . "<br><br>";
}
?>

</body>
</html>

<?php
// Đóng kết nối đến CSDL
mysqli_close($conn);
?>
