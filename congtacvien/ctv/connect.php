<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "giraffe";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Kết nối đến CSDL thất bại: " . $conn->connect_error);
}
