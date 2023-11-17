<?php
require "connect.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ yêu cầu POST
    $sql_cx = "SELECT tx.TX_MA, tx.TX_TEN, tx.TX_BANGLAI, tx.TX_SDT, tx.TX_USERNAME, tx.TX_PASSWORD, 
                        tx.TX_GIOITINH, tx.TX_HINHANH, tt.TD_DATE, tt.TT_TOADOX, tt.TT_TOADOY, TT_TRANGTHAI
                FROM taixe tx
                JOIN trangthai tt ON tx.TX_MA = tt.TX_MA
                WHERE (tt.TX_MA, tt.TD_DATE) IN (
                    SELECT TX_MA, MAX(TD_DATE)
                    FROM trangthai
                    GROUP BY TX_MA
                )";

                $result = mysqli_query($conn, $sql_cx);

                // Khởi tạo một mảng PHP để chứa dữ liệu
                $data = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
                
                echo json_encode($data);
                // echo 1;
} else {
    // Xử lý nếu yêu cầu không phải là POST
    echo "Invalid request method";
}

?>