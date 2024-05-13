<?php
include('connect.php');

if (isset($_POST['submit'])) {
    // Lấy dữ liệu từ form
    $BVID = $_POST['BVID'];
    $BV_TIEUDE = $_POST['BV_TIEUDE'];
    $BV_NOIDUNG = $_POST['BV_NOIDUNG'];
    $BV_TINHTRANG = $_POST['BV_TINHTRANG'];

    // Xử lý tệp đã tải lên
    if ($_FILES["tImg"]["error"] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["tImg"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra kích thước tệp
        if ($_FILES["tImg"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Cho phép các định dạng tệp nhất định
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["tImg"]["tmp_name"], $target_file)) {
                $sql = "UPDATE baiviet SET BV_TIEUDE=?, BV_NOIDUNG=?, BV_TINHTRANG=?, BV_HINHANH=? WHERE BV_MA=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssss", $BV_TIEUDE, $BV_NOIDUNG, $BV_TINHTRANG, $target_file, $BVID);

                if ($stmt->execute()) {
                    $message = "Sửa bài viết " . $BV_TIEUDE . " thành công";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header('Location: dsBaiviet.php');
                    exit(); // Dừng kịch bản sau khi chuyển hướng
                } else {
                    echo "Error updating record: " . $stmt->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        // Trường hợp không có file mới được tải lên
        $sql = "UPDATE baiviet SET BV_TIEUDE=?, BV_NOIDUNG=?, BV_TINHTRANG=? WHERE BV_MA=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $BV_TIEUDE, $BV_NOIDUNG, $BV_TINHTRANG, $BVID);

        if ($stmt->execute()) {
            $message = "Sửa bài viết " . $BV_TIEUDE . " thành công";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Location: dsBaiviet.php');
            exit(); // Dừng kịch bản sau khi chuyển hướng
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}