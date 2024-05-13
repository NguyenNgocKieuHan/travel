<?php
require 'connect.php';

$HDID = $_GET['HDID'];

echo $HDID;

$sql = "DELETE FROM hoadon WHERE HD_MA='$HDID'";
$conn->query($sql);
echo '<script>
        alert("Xóa hóa đơn thành công.");
        location="dsDattour.php";</script>';
