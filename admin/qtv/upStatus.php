<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hd_ma'], $_POST['new_status'])) {
    $hd_ma = $_POST['hd_ma'];
    $new_status = $_POST['new_status'];

    // Update trạng thái của đơn đặt tour trong cơ sở dữ liệu
    $sql = "UPDATE hoadon SET HD_TRANGTHAI = HUY WHERE HD_MA = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $new_status, $hd_ma);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $message = "Cập nhật người dùng " . $ND_HOTEN . " thành công!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Location: dsDattour.php');
    } else {
        echo "Cập nhật trạng thái thất bại!";
        header('Location: dsDattour.php');
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request!";
}