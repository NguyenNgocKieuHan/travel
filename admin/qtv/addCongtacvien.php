<?php
// Kiểm tra xem biểu mẫu đã được gửi đi chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'connect.php'; // Kết nối đến cơ sở dữ liệu

    // Lấy dữ liệu từ biểu mẫu
    $CTV_HOTEN = isset($_POST["CTV_HOTEN"]) ? $_POST["CTV_HOTEN"] : '';
    $CTV_SDT = isset($_POST["CTV_SDT"]) ? $_POST["CTV_SDT"] : '';
    $CTV_EMAIL = isset($_POST["CTV_EMAIL"]) ? $_POST["CTV_EMAIL"] : '';
    $CTV_USERNAME = isset($_POST["CTV_USERNAME"]) ? $_POST["CTV_USERNAME"] : '';
    $CTV_PASSWORD = isset($_POST["CTV_PASSWORD"]) ? $_POST["CTV_PASSWORD"] : '';
    $ctv_repass = isset($_POST["ctv_repass"]) ? $_POST["ctv_repass"] : '';

    if ($CTV_PASSWORD != $ctv_repass) {
        $message = "Mật khẩu nhập lại không đúng!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Location: themCongtacvien.php'); // Chuyển hướng người dùng đến trang thêm công tác viên
        exit; // Dừng việc thực thi script
    }

    // Kiểm tra tên đăng nhập đã tồn tại chưa
    $check = "SELECT CTV_USERNAME FROM congtacvien WHERE CTV_USERNAME = ?";
    $stmt = $conn->prepare($check);
    $stmt->bind_param("s", $CTV_USERNAME);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $message = "Tên đăng nhập đã được sử dụng, vui lòng chọn tên khác!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Location: themCongtacvien.php'); // Chuyển hướng người dùng đến trang thêm công tác viên
        exit; // Dừng việc thực thi script
    }
    $sql_insert = "INSERT INTO congtacvien (CTV_HOTEN, CTV_EMAIL, CTV_SDT, CTV_USERNAME, CTV_PASSWORD) VALUES (?, ?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("sssss", $CTV_HOTEN, $CTV_EMAIL, $CTV_SDT, $CTV_USERNAME, $CTV_PASSWORD);

    if ($stmt_insert->execute()) {
        $message = "Thêm cộng tác viên $CTV_HOTEN thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Location: dsCongtacvien.php'); // Chuyển hướng người dùng đến danh sách công tác viên
        exit; // Dừng việc thực thi script
    } else {
        echo "<br>Error: " . $sql_insert . "<br>" . $conn->error;
    }


    $stmt_insert->close();
    $stmt->close();
    $conn->close();
}
