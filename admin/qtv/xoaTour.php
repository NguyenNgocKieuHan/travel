<?php

require 'connect.php';

$TID = $_GET['TID'];

echo $TID;

$sql = "delete from tour where T_MA='$TID'";
$conn->query($sql);
echo '<script>
        alert("Xóa tour thành công. ");
        location="dsTour.php";</script>';
