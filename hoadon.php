<?php
// Start session
session_start();

// Include file kết nối đến cơ sở dữ liệu
include('inc/header.php');
require_once("connect.php");

// Lấy dữ liệu từ form
$tourName = $_POST['T_TEN'];
$sqlTour = "SELECT T_MA FROM tour WHERE T_TEN = ?";
$stmtTour = $conn->prepare($sqlTour);
$stmtTour->bind_param("s", $tourName);
$stmtTour->execute();
$resultTour = $stmtTour->get_result();

if ($resultTour->num_rows > 0) {
    $rowTour = $resultTour->fetch_assoc();
    $selectedTourId = $rowTour['T_MA'];
} else {
    // Xử lý khi không tìm thấy thông tin tour
    echo "Không tìm thấy thông tin tour.";
}

$departureDates = $_POST['T_NGAYKHOIHANH'];
$tourTypes = $_POST['LT_MA'];
$KH_HOTEN = $_POST['KH_HOTEN'];
$KH_SDT = $_POST['KH_SDT'];
$KH_DIACHI = $_POST['KH_DIACHI'];
$numberOfParticipants = $_POST['soluongdangky'];
$tourPrice = $_POST['T_GIA'];

// Tính tổng tiền
$totalPrice = $numberOfParticipants * $tourPrice;

// Kiểm tra session KH_USERNAME đã được thiết lập hay chưa
if (!isset($_SESSION['KH_USERNAME'])) {
    echo "Session KH_USERNAME chưa được thiết lập.";
    exit();
}

$loggedInUser = $_SESSION["KH_USERNAME"];

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

?>

<body>
    <div class="hero overlay py-0 bg-white">
        <div class="img-bg rellax">
            <img src="images/nen.jpg" alt="Image" class="img-fluid">
        </div>

        <div class="container">
            <div class="row align-items-center justify-content-start">
                <div class="col-lg-6 mx-auto text-center">
                    <h1 class="heading" data-aos="fade-up">ĐẶT TOUR</h1>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="xulydattour.php">
        <div class="container">
            <h2>ĐẶT TOUR</h2>
            <div class="row">
                <div class="col-lg-6">
                    <label for="T_MA" class="icon-cloud" class="form-label"> Mã tour:<span class="error">*
                        </span></label>
                    <input class="form-control" type="text" name="T_MA" value="<?php echo $selectedTourId; ?> "
                        readonly>
                </div>
                <div class="col-lg-6">
                    <label for="T_NGAYKHOIHANH" class="icon-attachment" class="form-label"> Ngày khởi hành:<span
                            class="error">*
                        </span></label> <input class="form-control" type="text" name="T_NGAYKHOIHANH"
                        value="<?php echo $departureDates; ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label for="T_TEN" class="icon-cloud" class="form-label"> Tên tour:<span class="error">*
                        </span></label>
                    <input class="form-control" type="text" name="T_TEN" value="<?php echo $tourName; ?>" readonly>
                </div>
                <div class="col-lg-6">
                    <label for="LT_MA" class="icon-menu" class="form-label"> Loại tour:<span class="error">*
                        </span></label> <input class="form-control" type="text" name="LT_MA"
                        value="<?php echo $tourTypes; ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label for="KH_HOTEN" class="icon-user" class="form-label"> Họ và tên:<span class="error">*
                        </span></label> <input class="form-control" type="text" name="KH_HOTEN"
                        value="<?php echo $KH_HOTEN; ?>" readonly>
                </div>
                <div class="col-lg-6">
                    <label for="KH_SDT" class="icon-phone" class="form-label"> Số điện thoại:<span class="error">*
                        </span></label> <input class="form-control" type="text" name="KH_SDT"
                        value="<?php echo $KH_SDT; ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label for="KH_DIACHI" class="icon-envelope" class="form-label"> Địa chỉ:<span class="error">*
                        </span></label> <input class="form-control" type="text" name="KH_DIACHI"
                        value="<?php echo $KH_DIACHI; ?>" readonly>
                </div>
                <div class="col-lg-6">
                    <label for="soluongdangky" class="icon-edit" class="form-label"> Số lượng đăng ký:<span
                            class="error">*
                        </span></label> <input class="form-control" type="number" name="soluongdangky"
                        value="<?php echo $numberOfParticipants; ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label for="tourPrice" class="icon-money" class="form-label"> Giá tour/ 1 Người:<span
                            class="error">*
                        </span></label>
                    <input class="form-control" type="number" name="T_GIA" value="<?php echo $tourPrice; ?>" readonly>
                </div>
                <div class="col-lg-6">
                    <label for="tourPrice" class="icon-money" class="form-label"> Tổng tiền tour /
                        <?php echo $numberOfParticipants; ?> người<span class="error">*
                        </span></label>
                    <input class="form-control" type="text" name="HD_TONGTIEN" value="<?php echo $totalPrice; ?>"
                        readonly>
                </div>
            </div>

            <div class="col-lg-6">
                <button class="btn1 btn-primary py-3 px-5" type=" submit" name="dat_tour">Đặt tour</button>
            </div>
    </form>
</body>

</html>

<?php
// Đóng kết nối đến cơ sở dữ liệu
include('inc/footer.php');
?>