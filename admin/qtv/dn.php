<?php

require 'connect.php';
session_start();

$ND_USERNAME = mysqli_real_escape_string($conn, $_POST['ND_USERNAME']);
$ND_PASSWORD = mysqli_real_escape_string($conn, $_POST['ND_PASSWORD']);

$sql = "select ND_MA, ND_USERNAME, ND_PASSWORD, ND_HOTEN, ND_EMAIL from nguoidung where ND_USERNAME = '" . strtolower($ND_USERNAME) . "' and ND_PASSWORD = '" . $ND_PASSWORD . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {


  $row = $result->fetch_assoc();
  $_SESSION["ND_USERNAME"] = $row['ND_USERNAME'];
  $_SESSION["ND_PASSWORD"] = $row['ND_PASSWORD'];
  $_SESSION["NDID"] = $row['ND_MA'];
  $_SESSION["ND_HOTEN"] = $row['ND_HOTEN'];
  $_SESSION["ND_EMAIL"] = $row['ND_EMAIL'];
  // $pwss = $_SESSION["pw"];
  echo '<script>
        alert("Đăng nhập thành công ! ");
        location="index.php";</script>';
} else {
  $message = "Tài khoản hoặc mật khẩu không đúng. Vui lòng thử lại!.";
  echo "<script type='text/javascript'>alert('$message');</script>";
  header('Refresh: 0;url=login.php');
}

$conn->close();
