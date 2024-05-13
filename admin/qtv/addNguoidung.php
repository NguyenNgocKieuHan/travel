<?php
// Kiểm tra xem biểu mẫu đã được gửi đi chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'connect.php'; // Kết nối đến cơ sở dữ liệu

    // Lấy dữ liệu từ biểu mẫu
    $ND_HOTEN = isset($_POST["ND_HOTEN"]) ? $_POST["ND_HOTEN"] : '';
    $ND_SDT = isset($_POST["ND_SDT"]) ? $_POST["ND_SDT"] : '';
    $ND_EMAIL = isset($_POST["ND_EMAIL"]) ? $_POST["ND_EMAIL"] : '';
    $ND_USERNAME = isset($_POST["ND_USERNAME"]) ? $_POST["ND_USERNAME"] : '';
    $ND_PASSWORD = isset($_POST["ND_PASSWORD"]) ? $_POST["ND_PASSWORD"] : '';
    $ND_repass = isset($_POST["ND_repass"]) ? $_POST["ND_repass"] : '';

    if ($ND_PASSWORD != $ND_repass) {
        $message = "Mật khẩu nhập lại không đúng!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Location: themNguoidung.php'); // Chuyển hướng người dùng đến trang thêm công tác viên
        exit; // Dừng việc thực thi script
    }

    // Kiểm tra tên đăng nhập đã tồn tại chưa
    $check = "SELECT ND_USERNAME FROM nguoidung WHERE ND_USERNAME = ?";
    $stmt = $conn->prepare($check);
    $stmt->bind_param("s", $ND_USERNAME);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $message = "Tên đăng nhập đã được sử dụng, vui lòng chọn tên khác!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Location: themNguoidung.php'); // Chuyển hướng người dùng đến trang thêm công tác viên
        exit; // Dừng việc thực thi script
    }

    // Thêm nhân viên vào cơ sở dữ liệu
    $sql_insert = "INSERT INTO nguoidung (ND_HOTEN, ND_EMAIL, ND_SDT, ND_USERNAME, ND_PASSWORD) VALUES (?, ?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("sssss", $ND_HOTEN, $ND_EMAIL, $ND_SDT, $ND_USERNAME, $ND_PASSWORD);

    if ($stmt_insert->execute()) {
        $message = "Thêm cộng tác viên $ND_HOTEN thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Location: dsNguoidung.php'); // Chuyển hướng người dùng đến danh sách công tác viên
        exit; // Dừng việc thực thi script
    } else {
        echo "<br>Error: " . $sql_insert . "<br>" . $conn->error;
    }

    $stmt_insert->close();
    $stmt->close();
    $conn->close();
}
