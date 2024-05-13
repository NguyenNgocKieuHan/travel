<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION["KH_USERNAME"])) {
    header("Location: login.php");
    exit();
}

// Bao gồm tệp header.php
include("inc/header.php");

// Thông tin cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "giraffe";

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy thông tin người dùng đã đăng nhập
$loggedInUser = $_SESSION["KH_USERNAME"];

// Lấy thông tin khách hàng từ cơ sở dữ liệu
$sqlKhachHang = "SELECT KH_MA, KH_HOTEN, KH_SDT, KH_DIACHI FROM khachhang WHERE KH_USERNAME = ?";
$stmtKhachHang = $conn->prepare($sqlKhachHang);
$stmtKhachHang->bind_param("s", $loggedInUser);
$stmtKhachHang->execute();
$resultKhachHang = $stmtKhachHang->get_result();

if ($resultKhachHang->num_rows > 0) {
    $rowKhachHang = $resultKhachHang->fetch_assoc();
    $KH_MA = $rowKhachHang['KH_MA'];
    $KH_HOTEN = $rowKhachHang['KH_HOTEN'];
    $KH_SDT = $rowKhachHang['KH_SDT'];
    $KH_DIACHI = $rowKhachHang['KH_DIACHI'];
}

// Nếu có mã tour được chọn, lấy thông tin tour từ cơ sở dữ liệu
if (isset($_GET['T_MA'])) {
    $selectedTourId = $_GET['T_MA'];

    // Lấy tên tour
    $sqlTourName = "SELECT T_TEN FROM tour WHERE T_MA = ?";
    $stmtTourName = $conn->prepare($sqlTourName);
    $stmtTourName->bind_param("i", $selectedTourId);
    $stmtTourName->execute();
    $resultTourName = $stmtTourName->get_result();

    if ($resultTourName->num_rows > 0) {
        $tourName = $resultTourName->fetch_assoc()['T_TEN'];
    } else {
        die("Không tìm thấy tour tương ứng.");
    }

    // Lấy ngày khởi hành
    $sqlDepartureDates = "SELECT T_NGAYKHOIHANH FROM tour WHERE T_MA = ?";
    $stmtDepartureDates = $conn->prepare($sqlDepartureDates);
    $stmtDepartureDates->bind_param("i", $selectedTourId);
    $stmtDepartureDates->execute();
    $resultDepartureDates = $stmtDepartureDates->get_result();

    $departureDates = [];
    if ($resultDepartureDates->num_rows > 0) {
        while ($rowDepartureDate = $resultDepartureDates->fetch_assoc()) {
            $departureDates[] = $rowDepartureDate['T_NGAYKHOIHANH'];
        }
    }

    // Lấy loại tour
    $sqlTourTypes = "SELECT loaitour.LT_TEN
                     FROM tour
                     LEFT JOIN loaitour ON tour.LT_MA = loaitour.LT_MA
                     WHERE tour.T_MA = ?";
    $stmtTourTypes = $conn->prepare($sqlTourTypes);
    $stmtTourTypes->bind_param("i", $selectedTourId);
    $stmtTourTypes->execute();
    $resultTourTypes = $stmtTourTypes->get_result();

    $tourTypes = [];
    if ($resultTourTypes->num_rows > 0) {
        while ($rowTourType = $resultTourTypes->fetch_assoc()) {
            $tourTypes[] = $rowTourType['LT_TEN'];
        }
    }
}

// Lấy giá tour từ cơ sở dữ liệu
$sqlPrice = "SELECT T_GIA FROM tour WHERE T_MA = ?";
$stmtPrice = $conn->prepare($sqlPrice);
$stmtPrice->bind_param("i", $selectedTourId);
$stmtPrice->execute();
$resultPrice = $stmtPrice->get_result();

if ($resultPrice->num_rows > 0) {
    $tourPrice = $resultPrice->fetch_assoc()['T_GIA'];
} else {
    $tourPrice = 0;
}
?>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<div class="hero overlay py-0 bg-white">
    <div class="img-bg rellax">
        <img src="images/nen.jpg" alt="Image" class="img-fluid">
    </div>

    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-6 mx-auto text-center">
                <h1 class="heading" data-aos="fade-up">ĐẶT TOUR</h1>
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

<form id="dangkytour" action="hoadon.php" method="post" onsubmit="return validateForm()">
    <div class="golden-form wrapper">
        <div class="form-enclose">
            <div class="form-section">
                <input type="hidden" name="T_MA" value="<?= $selectedTourId ?>">
                <input type="hidden" name="T_TEN" value="<?= $tourName ?>">
                <input type="hidden" name="T_NGAYKHOIHANH" value="<?= implode(', ', $departureDates); ?>">
                <input type="hidden" name="LT_MA" value="<?= implode(', ', $tourTypes); ?>">
                <input type="hidden" name="KH_HOTEN" value="<?= $KH_HOTEN; ?>">
                <input type="hidden" name="KH_SDT" value="<?= $KH_SDT; ?>">
                <input type="hidden" name="KH_DIACHI" value="<?= $KH_DIACHI; ?>">
                <input type="hidden" name="soluongdangky" value="<?= $numberOfParticipants ?>">
                <input type="hidden" name="T_GIA" value="<?= $tourPrice ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="KH_HOTEN" class="icon-user" class="form-label"> Họ và tên:<span class="error">*
                            </span></label>
                        <input type="text" class="form-control" id="KH_HOTEN" value="<?= $KH_HOTEN; ?>" name="KH_HOTEN"
                            readonly>
                    </div>

                    <div class="col-lg-6">
                        <label for="T_MA" class="icon-cloud" class="form-label"> Tên tour:<span class="error">*
                            </span></label>
                        <input type="text" class="form-control" id="T_MA" value="<?= $tourName; ?>" name="T_MA"
                            readonly>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="KH_DIACHI" class="icon-envelope" class="form-label"> Địa chỉ:<span class="error">*
                            </span></label>
                        <input type="text" class="form-control" id="KH_DIACHI" value="<?= $KH_DIACHI; ?>"
                            name="KH_DIACHI" readonly>
                    </div>
                    <div class="col-lg-6">
                        <label for="T_NGAYKHOIHANH" class="icon-attachment" class="form-label"> Ngày khởi hành:<span
                                class="error">*
                            </span></label>
                        <input type="text" class="form-control" value="<?= implode(', ', $departureDates); ?>" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="KH_SDT" class="icon-phone" class="form-label"> Số điện thoại:<span class="error">*
                            </span></label>
                        <input type="text" class="form-control" id="KH_SDT" value="<?= $KH_SDT; ?>" name="KH_SDT"
                            readonly>
                    </div>
                    <div class="col-lg-6">
                        <label for="LT_MA" class="icon-menu" class="form-label"> Loại tour:<span class="error">*
                            </span></label>
                        <input type="text" class="form-control" value="<?= implode(', ', $tourTypes); ?>" readonly>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-6">
                        <label for="soluongdangky" class="icon-edit" class="form-label"> Số lượng đăng ký:<span
                                class="error">*
                            </span></label>
                        <input type="number" name="soluongdangky" class="form-control" min="1" max="15"
                            placeholder="Xin vui lòng nhập số lượng đăng ký tại đây!!" required />
                    </div>
                    <div class="col-lg-6">
                        <label for="tourPrice" class="icon-money" class="form-label"> Giá tour/ người:<span
                                class="error">*
                            </span></label>
                        <input type="text" class="form-control" id="tourPrice" value="<?= $tourPrice; ?>"
                            name="tourPrice" readonly>
                    </div>
                </div>
                <div class="col-lg-6">
                    <button type="submit" class="btn1 btn-primary py-3 px-5" name="button_tinh">Đặt tour</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
function validateForm() {
    // Validate other fields here if needed
    return confirm("Bạn có chắc chắn muốn đặt tour này?");
}
</script>

<?php include('inc/footer.php'); ?>