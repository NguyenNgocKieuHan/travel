<?php
include('inc/header.php');
?>

<!-- Kết nối và truy vấn cơ sở dữ liệu để lấy thông tin tour -->
<?php
$conn = mysqli_connect("localhost", "root", "", "giraffe");

if (!$conn) {
    die("Kết nối tới cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

// Lấy mã tour từ URL
$T_MA = isset($_GET['T_MA']) ? $_GET['T_MA'] : 0;

// Truy vấn cơ sở dữ liệu để lấy thông tin tour
$query = "SELECT tour.*, loaitour.LT_TEN
              FROM tour
              LEFT JOIN loaitour ON tour.LT_MA = loaitour.LT_MA
              WHERE tour.T_MA = $T_MA";

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $tour = mysqli_fetch_assoc($result);
} else {
    die("Không tìm thấy thông tin tour.");
}
?>
<main>
    <div class="hero overlay py-0 bg-white">
        <div class="img-bg rellax">
            <img src="images/nen.jpg" alt="Image" class="img-fluid">
        </div>
        <div class="container">
            <div class="row align-items-center justify-content-start">
                <div class="col-lg-12 mx-auto text-center">
                    <h1 class="heading" data-aos="fade-up">Chi Tiết
                        <?php echo isset($tour['T_TEN']) ? $tour['T_TEN'] : ''; ?></h1>
                    <p class="mb-5" data-aos="fade-up">Thông tin tour sẽ được miêu tả rõ ràng cụ thể tại đây.</p>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="images/<?php echo isset($tour['T_HINHANH']) ? $tour['T_HINHANH'] : ''; ?>" alt="Hình ảnh tour" class="img-tour" style="max-width: 100%;">
                <?php
                if (isset($_GET['T_MA'])) {
                    $T_MA = $_GET['T_MA'];

                    $sql_reviews = "SELECT R_RATING FROM review WHERE T_MA = '$T_MA'";
                    $result_reviews = mysqli_query($conn, $sql_reviews);

                    $total_rating = 0;
                    $num_reviews = 0;

                    while ($row_review = mysqli_fetch_assoc($result_reviews)) {
                        $total_rating += $row_review['R_RATING'];
                        $num_reviews++;
                    }
                } else {
                    echo "Tham số 'T_MA' không tồn tại trong URL.";
                }
                ?>

            </div>
            <div class="col-lg-6">
                <div class="details">
                    <div class="detail-item">
                        <strong>Thông tin:</strong>
                        <?php echo isset($tour['T_TEN']) ? $tour['T_TEN'] : ''; ?>
                    </div>
                    <div class="detail-item">
                        <strong>Loại tour:</strong>
                        <?php echo isset($tour['LT_TEN']) ? $tour['LT_TEN'] : ''; ?>
                    </div>
                    <div class="detail-item">
                        <strong>Giá:</strong>
                        <?php echo isset($tour['T_GIA']) ? number_format($tour['T_GIA'], 0, ",", ".") . ' VNĐ' : ''; ?>
                    </div>
                    <div class="detail-item">
                        <strong>Ngày khởi hành:</strong>
                        <?php echo isset($tour['T_NGAYKHOIHANH']) ? $tour['T_NGAYKHOIHANH'] : ''; ?>
                    </div>
                    <div class="detail-item">
                        <strong>Đánh giá:</strong>
                        <?php if ($num_reviews > 0) {
                            $avg_rating = $total_rating / $num_reviews;
                            echo number_format($avg_rating, 1) . "/5 ";
                            echo "★";
                        } else {
                            echo "0/5 ";
                            echo "★";
                        } ?>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button type="button" class="btn4 btn-primary" onclick="redirectBookingPage()">Đặt tour</button>
            </div>
        </div>
        <hr style="margin-top: 20px;">

        <div class="col-lg-12 ">
            <div class="details">
                <div class="detail-item">
                    <strong>Mô tả:</strong>
                    <?php echo isset($tour['T_MOTA']) ? nl2br($tour['T_MOTA']) : ''; ?>
                </div>
            </div>
        </div>
        <hr style="margin-top: 20px;">

    </div>
    <script>
        function redirectBookingPage() {
            var T_MA = "<?php echo isset($tour['T_MA']) ? $tour['T_MA'] : ''; ?>";
            window.location.href = "booking.php?T_MA=" + T_MA;
        }
    </script>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $rating = $_POST['R_RATING'];
            $comment = $_POST['R_COMMENT'];

            $KH_USERNAME = isset($_SESSION['KH_USERNAME']) ? $_SESSION['KH_USERNAME'] : '';

            // Kiểm tra xem khách hàng đã đặt tour này chưa
            $checkBookingQuery = "SELECT * FROM hoadon WHERE T_MA = '$T_MA' AND KH_MA = (SELECT KH_MA FROM khachhang WHERE KH_USERNAME = '$KH_USERNAME')";
            $result_checkBooking = mysqli_query($conn, $checkBookingQuery);

            if ($result_checkBooking && mysqli_num_rows($result_checkBooking) > 0) {
                // Kiểm tra xem khách hàng đã đánh giá tour này chưa
                $checkReviewQuery = "SELECT * FROM review WHERE T_MA = '$T_MA' AND KH_MA = (SELECT KH_MA FROM khachhang WHERE KH_USERNAME = '$KH_USERNAME')";
                $result_checkReview = mysqli_query($conn, $checkReviewQuery);

                if ($result_checkReview && mysqli_num_rows($result_checkReview) > 0) {
                    echo "<script>alert('Bạn đã đánh giá tour này rồi, không thể đánh giá thêm lần nữa.');</script>";
                } else {
                    // Lấy ngày khởi hành của tour
                    $getTourStartDateQuery = "SELECT T_NGAYKHOIHANH FROM tour WHERE T_MA = '$T_MA'";
                    $result_tourStartDate = mysqli_query($conn, $getTourStartDateQuery);

                    if ($result_tourStartDate && mysqli_num_rows($result_tourStartDate) > 0) {
                        $row_tourStartDate = mysqli_fetch_assoc($result_tourStartDate);
                        $tourStartDate = strtotime($row_tourStartDate['T_NGAYKHOIHANH']);

                        // Lấy ngày hiện tại
                        $currentDate = time();

                        // Kiểm tra ngày bình luận phải sau ngày khởi hành tour ít nhất 1 ngày
                        if ($currentDate > $tourStartDate + 86400) { // 86400 giây = 1 ngày
                            // Lấy ID khách hàng
                            $sql_getCustomerId = "SELECT KH_MA FROM khachhang WHERE KH_USERNAME = '$KH_USERNAME'";
                            $result_customer_id = mysqli_query($conn, $sql_getCustomerId);

                            if ($result_customer_id && mysqli_num_rows($result_customer_id) > 0) {
                                $row_customer_id = mysqli_fetch_assoc($result_customer_id);
                                $KH_MA = $row_customer_id['KH_MA'];

                                // Thêm đánh giá vào cơ sở dữ liệu
                                $sql_insert = "INSERT INTO review (T_MA, KH_MA, R_RATING, R_COMMENT) VALUES ('$T_MA', '$KH_MA', '$rating', '$comment')";

                                if (mysqli_query($conn, $sql_insert)) {
                                    echo "<script>alert('Đánh giá đã được lưu thành công.');</script>";
                                } else {
                                    echo "Lỗi: " . mysqli_error($conn);
                                }
                            } else {
                                echo "<script>alert('Không tìm thấy thông tin khách hàng.');</script>";
                            }
                        } else {
                            echo "<script>alert('Ngày bình luận phải sau ngày khởi hành tour ít nhất 1 ngày.');</script>";
                        }
                    } else {
                        echo "<script>alert('Không tìm thấy ngày khởi hành của tour.');</script>";
                    }
                }
            } else {
                echo "<script>alert('Bạn chưa đặt tour này.');</script>";
            }
        }
        ?>
        <div class="row">
            <div class="col-lg-6">
                <style>
                    .review-box {
                        border: 1px solid #ccc;
                        border-radius: 5px;
                        padding: 10px;
                        margin-bottom: 10px;
                        width: 500px;
                        overflow: auto;
                    }

                    .customer-rating {
                        display: flex;
                        align-items: center;
                    }

                    .customer-name {
                        margin-right: 10px;
                    }

                    .star {
                        width: 20px;
                        height: 20px;
                    }

                    .review-comment {
                        margin-top: 5px;
                    }
                </style>
                <?php
                // Truy vấn cơ sở dữ liệu để lấy thông tin đánh giá
                $sql_review = "SELECT * FROM review WHERE T_MA = '$T_MA'";
                $result_review = mysqli_query($conn, $sql_review);

                if ($result_review && mysqli_num_rows($result_review) > 0) {
                    echo "<div class='row'>";
                    echo "<div class='col-lg-6'>";
                    echo "<label class='form-label'>Đánh giá:</label>";
                    while ($row_review = mysqli_fetch_assoc($result_review)) {
                        // Truy vấn để lấy tên khách hàng từ mã khách hàng
                        $kh_ma = $row_review['KH_MA'];
                        $sql_customer = "SELECT KH_HOTEN FROM khachhang WHERE KH_MA = '$kh_ma'";
                        $result_customer = mysqli_query($conn, $sql_customer);
                        $row_customer = mysqli_fetch_assoc($result_customer);

                        echo "<div class='review-box'>";
                        echo "<div class='review-content'>";
                        echo "<p class='customer-rating'>";
                        echo "<span class='customer-name'>Tên khách hàng: " . $row_customer['KH_HOTEN'] . "</span>";
                        echo "<span class='rating-stars'>";
                        for ($i = 0; $i < $row_review['R_RATING']; $i++) {
                            echo "<img src='star.jpg' alt='star' class='star'>";
                        }
                        echo "</span></p>";
                        echo "<p class='review-comment'>Nội dung đánh giá: " . $row_review['R_COMMENT'] . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }

                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "<p>Chưa có đánh giá nào cho tour này.</p>";
                }
                ?>
            </div>
            <div class="col-lg-6">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?T_MA=$T_MA"); ?>" method="post">
                    <div class="mb-3">
                        <label for="R_RATING" class="form-label">Rating:</label>
                        <select name="R_RATING" id="R_RATING" class="form-select">
                            <option value="5">5 Sao</option>
                            <option value="4">4 Sao</option>
                            <option value="3">3 Sao</option>
                            <option value="2">2 Sao</option>
                            <option value="1">1 Sao</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="R_COMMENT" class="form-label">Nhận xét:</label>
                        <textarea id="R_COMMENT" name="R_COMMENT" class="form-control" rows="4" cols="50"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                </form>
            </div>
        </div>
    </div>

</main>

<?php include("inc/footer.php");  ?>