<?php
// include('header.php');
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $T_TEN = $_POST["T_TEN"];
    $LT_MA = $_POST["LT_MA"];
    $T_GIA = $_POST["T_GIA"];
    $T_MOTA = $_POST["T_MOTA"];
    $T_NGAYKHOIHANH = $_POST["T_NGAYKHOIHANH"];
    $tImg = basename($_FILES["tImg"]["name"]);

    $check_query = "SELECT T_TEN FROM tour WHERE T_TEN = '$T_TEN'";
    $check_result = $conn->query($check_query);

    $target_dir = "../images/";

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["tImg"]["name"]);

    if (move_uploaded_file($_FILES["tImg"]["tmp_name"], $target_file)) {
        echo "Tệp đã được tải lên thành công.";
        if ($check_result->num_rows > 0) {
            $message = "Tên Tour đã được sử dụng, vui lòng dùng tên khác!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Location: themTour.php');
        } else {
            $sql = "INSERT INTO tour (LT_MA, T_TEN, T_MOTA, T_HINHANH, T_NGAYKHOIHANH, T_GIA)
                    VALUES ('$LT_MA', '$T_TEN', '$T_MOTA', '$tImg', '$T_NGAYKHOIHANH', '$T_GIA')";
            if ($conn->query($sql) === TRUE) {
                $message = "Thêm Tour $T_TEN thành công";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header('Location: dsTour.php');
            } else {
                echo "<br>Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Đã xảy ra lỗi khi tải lên tệp.";
    }
}
?>

<?php
// include('footer.php');
?>