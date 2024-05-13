<?php
session_start();

require 'connect.php'; // Đảm bảo rằng bạn đã thiết lập kết nối cơ sở dữ liệu

// Thu thập và làm sạch đầu vào biểu mẫu
$NDID = isset($_POST["NDID"]) ? intval($_POST["NDID"]) : 0;
$ND_HOTEN = isset($_POST["ND_HOTEN"]) ? mysqli_real_escape_string($conn, $_POST["ND_HOTEN"]) : '';
$ND_EMAIL = isset($_POST["ND_EMAIL"]) ? mysqli_real_escape_string($conn, $_POST["ND_EMAIL"]) : '';
$ND_SDT = isset($_POST["ND_SDT"]) ? mysqli_real_escape_string($conn, $_POST["ND_SDT"]) : '';
$ND_USERNAME = isset($_POST["ND_USERNAME"]) ? mysqli_real_escape_string($conn, $_POST["ND_USERNAME"]) : '';
$ND_PASSWORD = isset($_POST["ND_PASSWORD"]) ? mysqli_real_escape_string($conn, $_POST["ND_PASSWORD"]) : '';

if ($NDID > 0) {
    $sql = "UPDATE nguoidung SET
        ND_HOTEN = '$ND_HOTEN',
        ND_SDT = '$ND_SDT',
        ND_EMAIL = '$ND_EMAIL',
        ND_USERNAME = '$ND_USERNAME',
        ND_PASSWORD = '$ND_PASSWORD'
        WHERE ND_MA = $NDID";

    if ($conn->query($sql) === TRUE) {
        $_SESSION["ND_HOTEN"] = $ND_HOTEN;
        $message = "Cập nhật Người dùng $ND_HOTEN thành công!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Location: dsNguoidung.php');
        exit; // Đảm bảo không có mã HTML hoặc đầu ra khác sau khi chuyển hướng
    } else {
        echo "<br>Lỗi: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Thông tin Người dùng không hợp lệ.";
}

$conn->close();