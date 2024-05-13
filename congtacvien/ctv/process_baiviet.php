<?php
// Kết nối đến cơ sở dữ liệu
include('connect.php');

// Xử lý dữ liệu khi form được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tieuDe = $_POST['BV_TIEUDE'];
    $noiDung = $_POST['BV_NOIDUNG'];
    $tinhTrang = $_POST['BV_TINHTRANG'];

    // Xử lý tải lên hình ảnh
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["BV_HINHANH"]["name"]);
    move_uploaded_file($_FILES["BV_HINHANH"]["tmp_name"], $targetFile);

    // Thêm bài viết vào cơ sở dữ liệu
    $sql = "INSERT INTO baiviet (BV_TIEUDE, BV_NOIDUNG, BV_HINHANH, BV_TINHTRANG) VALUES ('$tieuDe', '$noiDung', '$targetFile', '$tinhTrang')";
    if (mysqli_query($conn, $sql)) {
        echo "Thêm bài viết thành công!";
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Đóng kết nối
    mysqli_close($conn);
}
