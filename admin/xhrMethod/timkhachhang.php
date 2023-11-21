<?php
require "../connect.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ yêu cầu POST
    $matx = $_POST['matx'];
    $sql_cx = "SELECT
                    cx.CX_TDDIEMDI_X,
                    cx.CX_TDDIEMDI_Y
                FROM chuyenxe cx
                JOIN (
                    SELECT TX_MA, MAX(TD_DATE) AS max_date
                    FROM trangthai
                    WHERE TX_MA = ".$matx."
                ) tt ON cx.TX_MA = tt.TX_MA
                WHERE cx.CX_TRANGTHAI = 1
                ORDER BY tt.max_date DESC";

                $result = $conn->query($sql_cx);
                $row_cx = $result->fetch_assoc();
            
                // Thực hiện xử lý dựa trên dữ liệu và trả về kết quả
                $resultRes = array(
                    "x" => $row_cx["CX_TDDIEMDI_X"],
                    "y" => $row_cx["CX_TDDIEMDI_Y"]
                );
                
                echo json_encode($resultRes);
} else {
    // Xử lý nếu yêu cầu không phải là POST
    echo "Invalid request method";
}

?>