<?php

require 'connect.php';

$KHID = $_GET['KHID'];

echo $KHID;

$sql = "delete from khachhang where KH_MA='$KHID'";
$conn->query($sql);
echo '<script>
        alert("Xóa Khách hàng thành công. ");
        location="dsKhachhang.php";</script>';