<?php
session_start();
$activate = "lichsudattour";
include("inc/header.php");

if (!isset($_SESSION["KH_USERNAME"])) {
    header("Location: /travel/login.php");
    exit();
}

$loggedInUser = $_SESSION["KH_USERNAME"];

// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "giraffe";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT h.HD_MA, h.HD_SONGUOI, h.HD_TONGTIEN
        FROM hoadon h
        JOIN khachhang k ON h.KH_MA = k.KH_MA
        WHERE k.KH_USERNAME = '$loggedInUser' AND h.HD_TRANGTHAI = 'DAT'";
$result = $conn->query($sql);
?>

<div class="hero overlay py-0 bg-white">
    <div class="img-bg rellax">
        <img src="images/nen.jpg" alt="Image" class="img-fluid">
    </div>

    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-6 mx-auto text-center">
                <h1 class="heading" data-aos="fade-up">LỊCH SỬ GIAO DỊCH</h1>
            </div>
            <div data-aos="fade-up">
                <a href="https://youtu.be/NhJrf3F1hCI?t=126" class="play-button align-items-center d-flex glightbox3">
                    <span class="icon-button me-3">
                        <span class="icon-play"></span>
                    </span>
                    <span class="caption">Watch Video</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Mã Hóa Đơn</th>
                <th scope="col">Số Người</th>
                <th scope="col">Tổng Tiền</th>
                <th scope="col">Chi Tiết</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . (isset($row["HD_MA"]) ? $row["HD_MA"] : "") . "</td>";
                    echo "<td>" . (isset($row["HD_SONGUOI"]) ? $row["HD_SONGUOI"] : "") . "</td>";
                    echo "<td>" . (isset($row["HD_TONGTIEN"]) ? number_format($row["HD_TONGTIEN"]) . " VND" : "") . "</td>";
                    echo ' <td><a href="hdon.php?HD_MA=' . $row["HD_MA"] . '">Xem chi tiết hóa đơn</a></td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include("inc/footer.php");
?>