<?php

require 'connect.php';
session_start();

$CTV_USERNAME = mysqli_real_escape_string($conn, $_POST['CTV_USERNAME']);
$CTV_PASSWORD = mysqli_real_escape_string($conn, $_POST['CTV_PASSWORD']);

$sql = "select CTV_MA, CTV_USERNAME, CTV_PASSWORD, CTV_HOTEN, CTV_EMAIL from congtacvien where CTV_USERNAME = '" . strtolower($CTV_USERNAME) . "' and CTV_PASSWORD = '" . $CTV_PASSWORD . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {


  $row = $result->fetch_assoc();
  $_SESSION["CTV_USERNAME"] = $row['CTV_USERNAME'];
  $_SESSION["CTV_PASSWORD"] = $row['CTV_PASSWORD'];
  $_SESSION["CTVID"] = $row['CTV_MA'];
  $_SESSION["CTV_HOTEN"] = $row['CTV_HOTEN'];
  $_SESSION["CTV_EMAIL"] = $row['CTV_EMAIL'];
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
