<?php
include('connect.php');

if (isset($_POST['submit'])) {
    // Lấy dữ liệu từ form
    $TID = $_POST['TID'];
    $T_TEN = $_POST['T_TEN'];
    $LT_MA = $_POST['LT_MA'];
    $T_NGAYKHOIHANH = $_POST['T_NGAYKHOIHANH'];
    $T_GIA = $_POST['T_GIA'];
    $T_MOTA = $_POST['T_MOTA'];

    // Xử lý tệp đã tải lên
    if ($_FILES["tImg"]["error"] == UPLOAD_ERR_OK) {
        // $target_dir = "uploads/";
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

        // Kiểm tra nếu $uploadOk = 0, có lỗi xảy ra
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Nếu mọi thứ đều ok, thử tải tệp lên
            if (move_uploaded_file($_FILES["tImg"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["tImg"]["name"])) . " has been uploaded.";

                // Thực hiện truy vấn SQL để cập nhật thông tin tour
                $sql = "UPDATE tour SET T_TEN='$T_TEN', LT_MA='$LT_MA', T_NGAYKHOIHANH='$T_NGAYKHOIHANH', T_GIA='$T_GIA', T_MOTA='$T_MOTA', T_HINHANH='$target_file' WHERE T_MA='$TID'";

                if ($conn->query($sql) === TRUE) {
                    $message = "Thêm Tour " . $T_TEN . " thành công";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header('Location: dsTour.php');
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        // Trường hợp không có file mới được tải lên
        // Thực hiện truy vấn SQL để cập nhật thông tin tour (không thay đổi hình ảnh)
        $sql = "UPDATE tour SET T_TEN='$T_TEN', LT_MA='$LT_MA', T_NGAYKHOIHANH='$T_NGAYKHOIHANH', T_GIA='$T_GIA', T_MOTA='$T_MOTA' WHERE T_MA='$TID'";

        if ($conn->query($sql) === TRUE) {
            $message = "Thêm Tour " . $T_TEN . " thành công";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Location: dsTour.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    // Đóng kết nối
    $conn->close();
}