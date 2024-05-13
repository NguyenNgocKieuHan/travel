<?php
require "connect.php";

// Truy vấn số lượt đặt tour từ bảng hoadon kết hợp với thông tin từ bảng tour (chỉ tính các hóa đơn có trạng thái 'DAT')
$sql = "SELECT tour.T_MA, tour.T_TEN, COUNT(*) AS SoLuotDat
        FROM hoadon
        INNER JOIN tour ON hoadon.T_MA = tour.T_MA
        WHERE hoadon.HD_TRANGTHAI = 'DAT'
        GROUP BY tour.T_MA";

$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Đóng kết nối
$conn->close();

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
