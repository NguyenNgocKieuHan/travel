<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["KH_USERNAME"]) || empty($_SESSION["KH_USERNAME"])) {
    header("Location: login.php");
    exit();
}
$activate = "contact";
include('inc/header.php');

// Kiểm tra xem khách hàng đã đăng nhập hay chưa

// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "giraffe";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy thông tin khách hàng từ cơ sở dữ liệu
$KH_USERNAME = $_SESSION["KH_USERNAME"];
$sql = "SELECT KH_MA, KH_HOTEN FROM khachhang WHERE KH_USERNAME = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $KH_USERNAME);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc(); // Lấy dòng dữ liệu duy nhất

$KH_HOTEN = ""; // Khởi tạo biến $KH_HOTEN trước khi sử dụng
if ($row) {
    $KH_HOTEN = $row["KH_HOTEN"]; // Gán giá trị cho $KH_HOTEN nếu dữ liệu được trả về từ cơ sở dữ liệu
}

if (isset($_POST['gui'])) {
    // Lấy dữ liệu từ biểu mẫu
    $LH_NOIDUNG = $_POST['LH_NOIDUNG'];

    // Tìm KH_MA dựa trên KH_HOTEN từ biểu mẫu
    $sql_find_kh_ma = "SELECT KH_MA FROM khachhang WHERE KH_HOTEN = ?";
    $stmt_find_kh_ma = $conn->prepare($sql_find_kh_ma);
    $stmt_find_kh_ma->bind_param("s", $KH_HOTEN);
    $stmt_find_kh_ma->execute();
    $result_find_kh_ma = $stmt_find_kh_ma->get_result();
    $row_find_kh_ma = $result_find_kh_ma->fetch_assoc(); // Lấy dòng dữ liệu duy nhất

    if ($row_find_kh_ma) {
        $KH_MA = $row_find_kh_ma['KH_MA'];

        // Chỉ định câu lệnh SQL với hai cột
        $insert_sql = "INSERT INTO lienhe (KH_MA, LH_NOIDUNG) VALUES (?, ?)";
        $stmt_insert = $conn->prepare($insert_sql);
        $stmt_insert->bind_param("ss", $KH_MA, $LH_NOIDUNG);

        if ($stmt_insert->execute()) {
            echo '<script>
                alert("Thông tin đã được gửi thành công.");
                location="index.php";</script>';
            exit();
        } else {
            echo "Lỗi SQL: " . $stmt_insert->errno . " - " . $stmt_insert->error . "<br>";
        }
    } else {
        echo "Không tìm thấy thông tin khách hàng.";
    }
}
?>

<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<div class="hero overlay py-0">
    <div class="img-bg rellax ">
        <img src="images/nen.jpg" alt="Image" class="img-fluid">
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-6 mx-auto text-center">

                <h1 class="heading" data-aos="fade-up">LIÊN HỆ</h1>
                </h1>
                <p class="mb-4" data-aos="fade-up">Tại đây bạn có thể đưa ra những câu hỏi, thắc mắc và chúng tôi sẽ
                    giải đáp giúp bạn.</p>
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
<script>
$(document).ready(function() {
    $().UItoTop({
        easingType: 'easeOutQuart'
    });
});
</script>
<div class="row py-5 px-0 m-0">
    <div class="col-6 ">
        <h2>THÔNG TIN LIÊN LẠC</h2>
        <form id="form p-0 m-0" action="" method="POST">
            <div class="col-lg-63">
                <label for="KH_HOTEN" class="form-label">Họ và tên:<span class="error">* </span></label>
                <input type="text" class="form-control" id="KH_HOTEN" value="<?php echo $KH_HOTEN; ?>" name="KH_HOTEN"
                    readonly>
            </div>

            <div class="col-lg-63">
                <label for="LH_NOIDUNG" class="form-label">Message:<span class="error"> </span></label>
                <input type="text" class="form-control" id="LH_NOIDUNG" placeholder="Nhập câu hỏi" name="LH_NOIDUNG"
                    required>
            </div><br><br>
            <div class="col-lg-63">
                <button type="submit" class="btn btn-primary py-3 px-5" name="gui">Gửi</button>
            </div>
        </form>
    </div>
    <div class="col-6 order-lg-1">

        <figure class="">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15716.248961812964!2d105.7678787942648!3d10.011717790183933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0882b9a237601%3A0xf924331be06bfb14!2zUGjGsMahbmcgVHJhbmcgQ-G6p24gVGjGoQ!5e0!3m2!1svi!2s!4v1608912333584!5m2!1svi!2s"
                width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
        </figure>

    </div>

    <?php
    @include 'inc/footer.php';
    ?>

    <script>
    $(function() {
        $('#bookingForm').bookingForm({
            ownerEmail: '#'
        });
    })
    </script>