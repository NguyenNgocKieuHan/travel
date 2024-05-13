<?php
session_start();
$activate = "lichsudattour";
include("inc/header.php");

if (!isset($_SESSION["KH_USERNAME"])) {
    header("Location: /travel/login.php");
    exit();
}

// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "giraffe";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy KH_MA từ KH_USERNAME của người dùng đang đăng nhập
$loggedInUsername = $_SESSION["KH_USERNAME"];
$sqlGetCustomerID = "SELECT KH_MA FROM khachhang WHERE KH_USERNAME = '$loggedInUsername'";
$resultCustomerID = $conn->query($sqlGetCustomerID);

if ($resultCustomerID->num_rows > 0) {
    $customerRow = $resultCustomerID->fetch_assoc();
    $KH_MA = $customerRow["KH_MA"];

    // Lấy HD_MA từ URL nếu được truyền qua
    if (isset($_GET['HD_MA'])) {
        $HD_MA = $_GET['HD_MA'];

        // Truy vấn thông tin chi tiết của hóa đơn dựa trên HD_MA
        $sql = "SELECT h.HD_MA, t.T_TEN, h.T_NGAYKHOIHANH, k.KH_HOTEN, h.HD_SONGUOI, h.HD_TONGTIEN 
                FROM hoadon h 
                JOIN tour t ON h.T_MA = t.T_MA 
                JOIN khachhang k ON h.KH_MA = k.KH_MA 
                WHERE h.HD_MA = '$HD_MA' AND h.KH_MA = '$KH_MA'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Hiển thị thông tin chi tiết của hóa đơn
            $row = $result->fetch_assoc();
?>
<div class="hero overlay py-0 bg-white">
    <div class="img-bg rellax">
        <img src="images/nen.jpg" alt="Image" class="img-fluid">
    </div>

    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-6 mx-auto text-center">
                <h1 class="heading" data-aos="fade-up">CHI TIẾT HÓA ĐƠN </h1>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <table class="table">
        <tr>
            <th>Mã Hóa Đơn</th>
            <td><?php echo $row["HD_MA"]; ?></td>
        </tr>
        <tr>
            <th>Tên Tour</th>
            <td><?php echo $row["T_TEN"]; ?></td>
        </tr>
        <tr>
            <th>Ngày Khởi Hành</th>
            <td><?php echo $row["T_NGAYKHOIHANH"]; ?></td>
        </tr>
        <tr>
            <th>Tên Khách Hàng</th>
            <td>
                <?php echo $row["KH_HOTEN"]; ?>
            </td>
        </tr>
        <tr>
            <th>Số Người</th>
            <td><?php echo $row["HD_SONGUOI"]; ?></td>
        </tr>
        <tr>
            <th>Tổng Tiền</th>
            <td><?php echo number_format($row["HD_TONGTIEN"]); ?> VND</td>
        </tr>
    </table>
    <button onclick="printInvoice()" class="btn btn-primary">In Hóa Đơn</button>
</div>
<script>
// Hàm để in hóa đơn
function printInvoice() {
    window.print();
}
</script>
<?php
        } else {
            // Hiển thị thông báo nếu không tìm thấy hóa đơn
            echo "Không tìm thấy hóa đơn.";
        }
    } else {
        // Hiển thị thông báo nếu không có HD_MA trên URL
        echo "Không tìm thấy mã hóa đơn trên URL.";
    }
} else {
    // Hiển thị thông báo nếu không tìm thấy mã khách hàng
    echo "Không tìm thấy thông tin khách hàng.";
}

include("inc/footer.php");
?>