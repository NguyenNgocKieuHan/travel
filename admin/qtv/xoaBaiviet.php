<?php
require 'connect.php';

// Kiểm tra xem biến BVID được truyền đúng từ URL không
if (isset($_GET['BVID'])) {
        // Sử dụng hàm htmlspecialchars để tránh tấn công XSS
        $BVID = htmlspecialchars($_GET['BVID']);

        // Sử dụng MySQLi với Prepared Statements để xóa bài viết
        $sql = "DELETE FROM baiviet WHERE BV_MA = ?";
        $stmt = $conn->prepare($sql);

        // Kiểm tra và thực thi truy vấn
        if ($stmt) {
                // Gắn tham số vào truy vấn
                $stmt->bind_param("s", $BVID);

                // Thực thi truy vấn
                if ($stmt->execute()) {
                        // Xóa thành công, chuyển hướng trang về dsBaiviet.php
                        echo '<script>alert("Xóa bài viết thành công."); location="dsBaiviet.php";</script>';
                        exit; // Dừng script sau khi chuyển hướng
                } else {
                        // Xảy ra lỗi khi thực thi truy vấn
                        echo "Lỗi khi xóa bài viết: " . $stmt->error;
                }

                // Đóng câu lệnh prepared statement
                $stmt->close();
        } else {
                // Xảy ra lỗi khi chuẩn bị câu lệnh
                echo "Lỗi khi chuẩn bị câu lệnh: " . $conn->error;
        }
} else {
        // Không có tham số BVID được truyền từ URL
        echo "Không có mã bài viết được cung cấp.";
}
