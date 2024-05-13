<?php
$activate = "tour";
include('inc/header.php');
include('function.php');
include('connect.php');

$host = "localhost";  // Địa chỉ máy chủ MySQL
$username = "root";  // Tên đăng nhập MySQL
$password = "";  // Mật khẩu MySQL
$database = "giraffe";  // Tên cơ sở dữ liệu

// Thực hiện kết nối đến cơ sở dữ liệu
$conn = mysqli_connect($host, $username, $password, $database);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối tới cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

$T_TEN = isset($_GET['T_TEN']) ? $_GET['T_TEN'] : "";
$item_per_page = 9;

// Xác định truy vấn SQL
$query = "SELECT tour.*, loaitour.LT_TEN
          FROM tour
          LEFT JOIN loaitour ON tour.LT_MA = loaitour.LT_MA
          WHERE tour.T_TEN LIKE '%" . $T_TEN . "%'
          ORDER BY tour.T_MA ASC";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Lỗi trong quá trình truy vấn cơ sở dữ liệu: " . mysqli_error($conn));
}

$totalRecords = mysqli_query($conn, "SELECT * FROM `tour` WHERE `T_TEN` LIKE '%" . $T_TEN . "%'");
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $item_per_page);
?>


<div class="hero overlay py-0 bg-white">
    <div class="img-bg rellax">
        <img src="images/nen.jpg" alt="Image" class="img-fluid">
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-12 mx-auto text-center">
                <h1 class="heading" data-aos="fade-up">TOUR CẦN THƠ</h1>
                <p class="mb-5" data-aos="fade-up">Cần Thơ có thời tiết ôn hoà, dễ chịu với nhiệt độ trung bình khoảng
                    27-28 độ C. Vì vậy mà bạn có thể đi du lịch Cần Thơ bất kì thời điểm nào trong năm. Cần Thơ có 2 mùa
                    là mùa mưa và mùa khô. Mỗi mùa ở nơi đây có một vẻ đẹp riêng.</p>
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
<div class="banners bg-white">
    <form id="product-search" method="GET">
        <input type="text" name="T_TEN" placeholder="Tìm kiếm..." class="search" value="<?php echo $T_TEN; ?>" />
        <button type="submit" value="Tìm kiếm" class="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>

    <div class="container">
        <div class="row"
            style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); grid-gap: 20px;">
            <?php
            mysqli_query($conn, "SET NAMES 'utf8'");
            while ($row = mysqli_fetch_array($result)) {
                // Lấy mã tour của tour hiện tại
                $current_T_MA = $row['T_MA'];

                // Truy vấn đánh giá của tour hiện tại
                $sql_reviews = "SELECT R_RATING FROM review WHERE T_MA = '$current_T_MA'";
                $result_reviews = mysqli_query($conn, $sql_reviews);

                // Khởi tạo biến để tính điểm trung bình và số lượng đánh giá
                $total_rating = 0;
                $num_reviews = 0;

                // Duyệt qua các đánh giá và tính tổng điểm và số lượng đánh giá
                while ($review_row = mysqli_fetch_assoc($result_reviews)) {
                    $total_rating += $review_row['R_RATING'];
                    $num_reviews++;
                }

                // Tính điểm trung bình nếu có đánh giá
                if ($num_reviews > 0) {
                    $avg_rating = $total_rating / $num_reviews;
                } else {
                    $avg_rating = 0; // Đặt điểm trung bình là 0 nếu không có đánh giá
                }
            ?>
            <div class="card" style="width: 100%;">
                <img src="images/<?php echo $row["T_HINHANH"]; ?>" class="card-img-top" alt="..."
                    style="width: 100%; height: 200px; object-fit: contain">
                <div class="card-body">
                    <div class="row">
                        <p class="col-4"><?php echo $row['LT_TEN'] ?></p>
                        <p class="col-4"><?php echo $row['T_NGAYKHOIHANH'] ?></p>
                        <p class="col-4"><?php echo number_format($avg_rating, 1) . "/5 "; ?>★</p>
                    </div>
                    <h5 class="card-title text-dark pt-2"><?php echo $row["T_TEN"]; ?></h5>
                    <div class="row m-0 p-0 d-flex justify-content-center">
                        <a class="col-5 btn btn-primary"><?php echo number_format($row['T_GIA'], 0, ",", ".") ?></a>
                        <a class="col-5 btn btn-primary" href="chitiettour.php?T_MA=<?php echo $row["T_MA"]; ?>">Chi
                            tiết</a>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>

    <?php
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    include 'pagination.php';
    ?>
</div>
<!--==============================footer=================================-->

<?php @include("inc/footer.php"); ?>
</div>