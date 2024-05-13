<?php
session_start();

// Hủy session hiện tại
unset($_SESSION['current_user']);

// Chuyển hướng người dùng đến trang đăng nhập
header("Location: login.php");
exit(); // Kết thúc kịch bản