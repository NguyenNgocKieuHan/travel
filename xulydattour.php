<?php
session_start();

// Include file kết nối đến cơ sở dữ liệu
require_once("connect.php");

// Kiểm tra xem các giá trị từ form đã được gửi đi chưa
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dat_tour'])) {
    // Lấy dữ liệu từ form
    if (isset($_POST['T_TEN'], $_POST['T_NGAYKHOIHANH'], $_POST['LT_MA'], $_POST['KH_HOTEN'], $_POST['KH_SDT'], $_POST['KH_DIACHI'], $_POST['soluongdangky'], $_POST['T_GIA'])) {
        $tourName = $_POST['T_TEN'];
        $departureDates = $_POST['T_NGAYKHOIHANH'];
        $tourTypes = $_POST['LT_MA'];
        $KH_HOTEN = $_POST['KH_HOTEN'];
        $KH_SDT = $_POST['KH_SDT'];
        $KH_DIACHI = $_POST['KH_DIACHI'];
        $numberOfParticipants = $_POST['soluongdangky'];
        $tourPrice = $_POST['T_GIA'];

        // Tính tổng tiền
        $totalPrice = $numberOfParticipants * $tourPrice;

        // Kiểm tra session KH_USERNAME đã được thiết lập hay chưa
        if (!isset($_SESSION['KH_USERNAME'])) {
            echo "Session KH_USERNAME chưa được thiết lập.";
            exit();
        }

        $loggedInUser = $_SESSION["KH_USERNAME"];

        // Lấy mã tour dựa trên tên tour
        $sqlTour = "SELECT T_MA FROM tour WHERE T_TEN = ?";
        $stmtTour = $conn->prepare($sqlTour);
        $stmtTour->bind_param("s", $tourName);
        $stmtTour->execute();
        $resultTour = $stmtTour->get_result();

        if ($resultTour->num_rows > 0) {
            $rowTour = $resultTour->fetch_assoc();
            $selectedTourId = $rowTour['T_MA'];

            // Lấy mã khách hàng dựa trên tên khách hàng
            $sqlKhachHang = "SELECT KH_MA FROM khachhang WHERE KH_HOTEN = ?";
            $stmtKhachHang = $conn->prepare($sqlKhachHang);
            $stmtKhachHang->bind_param("s", $KH_HOTEN);
            $stmtKhachHang->execute();
            $resultKhachHang = $stmtKhachHang->get_result();

            if ($resultKhachHang->num_rows > 0) {
                $rowKhachHang = $resultKhachHang->fetch_assoc();
                $KH_MA = $rowKhachHang['KH_MA'];

                // Kiểm tra trạng thái đặt tour từ form
                $bookingStatus = 'DAT'; // Mặc định là đã đặt

                // Tiếp tục với quá trình lưu vào bảng hóa đơn và trường trạng thái
                $sql = "INSERT INTO hoadon (T_MA, KH_MA, T_NGAYKHOIHANH, KH_SDT, HD_SONGUOI, HD_TONGTIEN, HD_TRANGTHAI) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iisssis", $selectedTourId, $KH_MA, $departureDates, $KH_SDT, $numberOfParticipants, $totalPrice, $bookingStatus);
                $stmt->execute();

                // Kiểm tra và hiển thị thông báo đặt tour thành công hoặc chuyển hướng đến trang cảm ơn
                if ($stmt->affected_rows > 0) {
                    echo "Đặt tour thành công!";
                    // Chuyển hướng đến trang cảm ơn
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Đặt tour thất bại!";
                }

                // Đóng kết nối
                $stmt->close();
            } else {
                // Xử lý khi không tìm thấy thông tin khách hàng
                echo "Không tìm thấy thông tin khách hàng.";
                exit();
            }
        } else {
            // Xử lý khi không tìm thấy thông tin tour
            echo "Không tìm thấy thông tin tour.";
            exit(); // Thoát khỏi script sau khi xuất thông báo
        }
    } else {
        echo "Dữ liệu không hợp lệ!";
        exit();
    }
} else {
    // Nếu không có dữ liệu gửi từ form, chuyển hướng về trang đặt tour
    header("Location: booking.php");
    exit();
}