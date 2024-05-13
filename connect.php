<?php
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "giraffe";      // Khai báo database

if (mysqli_connect_errno()) {
    echo "Connection Fail: " . mysqli_connect_errno();
    exit;
}

// Hàm để kết nối database và trả về kết nối
function connectToDatabase()
{
    $username = "root";
    $password = "";
    $server = "localhost";
    $dbname = "giraffe";

    // Kết nối database
    $conn = new mysqli($server, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Không kết nối: " . $conn->connect_error);
    }

    return $conn;
}

// Bắt đầu session
if (!isset($_SESSION)) {
    session_start();
}

// Kết nối database
$conn = connectToDatabase();


// Hàm để kiểm tra thông tin đăng nhập


// Đóng kết nối database
