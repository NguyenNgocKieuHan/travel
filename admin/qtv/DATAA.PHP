<?php
require "connect.php";

// Tính toán tổng doanh thu theo tháng (chỉ tính các hóa đơn có trạng thái 'DAT')
$revenueByMonth = array_fill(1, 12, 0); // Mảng để lưu tổng doanh thu theo tháng (tháng 1 đến tháng 12)

$sql = "SELECT MONTH(T_NGAYKHOIHANH) AS month, SUM(HD_TONGTIEN) AS total 
        FROM hoadon 
        WHERE HD_TRANGTHAI = 'DAT'
        GROUP BY month";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $month = $row['month'];
        $total = (int) $row['total'];
        $revenueByMonth[$month] = $total;
    }
}

// Tính toán tổng doanh thu theo năm (chỉ tính các hóa đơn có trạng thái 'DAT')
$revenueByYear = array();

$sql = "SELECT YEAR(T_NGAYKHOIHANH) AS year, SUM(HD_TONGTIEN) AS total 
        FROM hoadon 
        WHERE HD_TRANGTHAI = 'DAT'
        GROUP BY year";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $year = $row['year'];
        $total = (int) $row['total'];
        $revenueByYear[$year] = $total;
    }
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();

// Gửi dữ liệu dưới dạng JSON về cho client
$data = array(
    'revenueByMonth' => $revenueByMonth,
    'revenueByYear' => $revenueByYear
);

header('Content-Type: application/json');
echo json_encode($data);
