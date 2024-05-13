<?php

require 'connect.php';

$NDID = $_GET['NDID'];

echo $NDID;

$sql = "delete from nguoidung where ND_MA='$NDID'";
$conn->query($sql);
echo '<script>
        alert("Xóa người dùng thành công. ");
        location="dsNguoidung.php";</script>';
