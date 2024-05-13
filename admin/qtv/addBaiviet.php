<?php
// include('header.php');
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $BV_TIEUDE = $_POST["BV_TIEUDE"];
    $BV_NOIDUNG = $_POST["BV_NOIDUNG"];
    $BV_TINHTRANG = $_POST["BV_TINHTRANG"];
    $bvImg = basename($_FILES["bvImg"]["name"]);

    $check_query = "SELECT BV_TIEUDE FROM baiviet WHERE BV_TIEUDE = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("s", $BV_TIEUDE);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    $target_dir = "../images/";

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["bvImg"]["name"]);

    if (move_uploaded_file($_FILES["bvImg"]["tmp_name"], $target_file)) {
        echo "Tệp đã được tải lên thành công.";
        if ($check_result->num_rows > 0) {
            $message = "Tên bài viết đã được sử dụng, vui lòng dùng tên khác!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Location: themBaiviet.php');
        } else {
            $insert_query = "INSERT INTO baiviet (BV_TIEUDE, BV_NOIDUNG, BV_HINHANH, BV_TINHTRANG) VALUES (?, ?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_query);
            $insert_stmt->bind_param("ssss", $BV_TIEUDE, $BV_NOIDUNG, $bvImg, $BV_TINHTRANG);

            if ($insert_stmt->execute()) {
                $message = "Thêm bài viết $BV_TIEUDE thành công";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header('Location: dsBaiviet.php');
            } else {
                echo "<br>Error: " . $insert_stmt->error;
            }
        }
    } else {
        echo "Đã xảy ra lỗi khi tải lên tệp.";
    }
}
