<?php
include('connect.php');
session_start(); // Bắt đầu phiên

// Kiểm tra xem người dùng đã đăng nhập chưa
// if (!isset($_SESSION['CTV_MA'])) {
//     // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
//     header("Location: login.php");
//     exit();
// }

if (isset($_POST['submit']) && isset($conn)) {
    // Lấy dữ liệu từ form và tránh Injection SQL
    $tieuDe = mysqli_real_escape_string($conn, $_POST['BV_TIEUDE']);
    $noiDung = mysqli_real_escape_string($conn, $_POST['BV_NOIDUNG']);
    $tinhTrang = mysqli_real_escape_string($conn, $_POST['BV_TINHTRANG']);

    // Xử lý tải file lên
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["bvImg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Kiểm tra hình ảnh
    $check = getimagesize($_FILES["bvImg"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Kiểm tra kích thước file
    if ($_FILES["bvImg"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Loại file được phép
    $allowedFormats = array("jpg", "png", "jpeg", "gif");
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Thông báo lỗi khi không tải được file lên
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["bvImg"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["bvImg"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Thêm bài viết vào cơ sở dữ liệu sử dụng Prepared Statements
    if ($uploadOk == 1) {
        $stmt = $conn->prepare("INSERT INTO baiviet (BV_TIEUDE,  BV_NOIDUNG, BV_TINHTRANG, BV_HINHANH) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $tieuDe, $noiDung, $tinhTrang, $targetFile);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Bài viết đã được thêm thành công!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    // Đóng kết nối cơ sở dữ liệu
    mysqli_close($conn);
} else {
    echo "Error: Connection not established.";
}
