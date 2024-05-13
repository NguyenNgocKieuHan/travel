<?php

require 'connect.php';

$BVID = $_GET['BVID'];

echo $BVID;

$sql = "delete from baiviet where BV_MA='$BVID'";
$conn->query($sql);
echo '<script>
        alert("Xóa bài viết thành công. ");
        location="dsBaiviet.php";</script>';