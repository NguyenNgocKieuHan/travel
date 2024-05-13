<?php
$activate = "profile";
include('inc/header.php');

// Kiểm tra xem khách hàng đã đăng nhập hay chưa

if (!isset($_SESSION["KH_USERNAME"]) || empty($_SESSION["KH_USERNAME"])) {
    header("Location: login.php");
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

// Lấy thông tin khách hàng từ cơ sở dữ liệu
$KH_USERNAME = $_SESSION["KH_USERNAME"];
$sql = "SELECT * FROM khachhang WHERE KH_USERNAME= '$KH_USERNAME'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $KH_HOTEN = $row['KH_HOTEN'];
    $KH_SDT = $row['KH_SDT'];
    $KH_USERNAME = $row['KH_USERNAME']; // Thêm dòng này để lấy giá trị KH_USERNAMEname
} else {
    echo "Không tìm thấy thông tin khách hàng.";
    exit();
}


// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $KH_HOTEN = $_POST['KH_HOTEN'];
    $KH_SDT = $_POST['KH_SDT'];

    // Cập nhật thông tin khách hàng vào cơ sở dữ liệu
    $update_sql = "UPDATE khachhang SET KH_HOTEN = '$KH_HOTEN', KH_SDT = '$KH_SDT' WHERE KH_USERNAME = '$KH_USERNAME'";
    if ($conn->query($update_sql) === TRUE) {
        echo '<script>
            alert("Thông tin khách hàng đã được cập nhật thành công. ");
            location="index.php";</script>';

        // echo "Thông tin khách hàng đã được cập nhật thành công.";
    } else {
        echo "Lỗi: " . $update_sql . "<br>" . $conn->error;
    }
}

?>

<div class="hero overlay py-0 bg-white">
    <div class="img-bg rellax">
        <img src="images/nen.jpg" alt="Image" class="img-fluid">
    </div>

    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-6 mx-auto text-center">

                <h1 class="heading" data-aos="fade-up">CHỈNH SỬA THÔNG TIN CÁ NHÂN</h1>
                <p class="mb-5" data-aos="fade-up">Tại đây bạn có thể thay đổi một số thông tin nếu bạn muốn</p>

                <div data-aos="fade-up">
                    <a href="https://youtu.be/NhJrf3F1hCI?t=126"
                        class="play-button align-items-center d-flex glightbox3">
                        <span class="icon-button me-3">
                            <span class="icon-play"></span>
                        </span>
                        <span class="caption">Watch Video</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<form class="form-section" method="post" action="">
    <div class="col-lg-62">
        <label class="form-label" for="KH_USERNAME">Tên đăng nhập:</label>
        <input type="text" class="form-control" name="KH_USERNAME" value="<?php echo $KH_USERNAME; ?>" readonly><br>
    </div>


    <div class="col-lg-62">
        <label class="form-label" for="KH_HOTEN">Tên khách hàng:</label>
        <input type="text" class="form-control" name="KH_HOTEN" value="<?php echo $KH_HOTEN; ?>"><br>
    </div>

    <div class="col-lg-62">
        <label class="form-label" for="KH_SDT">Số điện thoại:</label>
        <input type="tel" class="form-control" name="KH_SDT" value="<?php echo $KH_SDT; ?>"
            pattern="[-+]?[0-9]*?[0-9]+"><br>
    </div>
    <div class="col-lg-62">
        <button class="btn btn-primary py-3 px-5" type="submit">Cập nhật thông tin</button>

    </div>
</form>

<?php
include('inc/footer.php');
?>