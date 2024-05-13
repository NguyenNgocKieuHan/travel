<?php
$activate = "blog";
include "inc/header.php";
require "connect.php";

// Lấy thông tin bài viết dựa trên ID được truyền qua URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $baiviet_id = $_GET['id'];
    $sql = "SELECT * FROM baiviet WHERE BV_MA = $baiviet_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy bài viết.";
    }
} else {
    echo "ID bài viết không hợp lệ.";
}
?>
<div class="hero overlay py-0 bg-white">
    <div class="img-bg rellax">
        <img src="images/nen.jpg" alt="Image" class="img-fluid">
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-12 mx-auto text-center">
                <h1 class="heading" data-aos="fade-up">TIN TỨC</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <img src="images/<?php echo isset($row['BV_HINHANH']) ? $row['BV_HINHANH'] : ''; ?>" alt="Hình ảnh tour"
                class="img-tour" style="max-width: 100%;">

            <div class="details">
                <div class="detail-item">
                    <strong>THÔNG TIN :</strong>
                    <?php echo isset($row['BV_TIEUDE']) ? $row['BV_TIEUDE'] : ''; ?>
                </div>
            </div>
            <!-- <div class="text-end">
                <button type="button" class="btn4 btn-primary" onclick="redirectBookingPage()">Đặt tour</button>
            </div> -->

        </div>
        <div class="col-lg-6">
            <div class="details" style="text-align: justify;">
                <div class="detail-item">
                    <strong>NỘI DUNG:</strong>
                    <?php echo isset($row['BV_NOIDUNG']) ? nl2br($row['BV_NOIDUNG']) : ''; ?>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-12">
            <div class="details" style="text-align: justify;">
                <div class="detail-item">
                    <strong>NỘI DUNG:</strong>
                    <?php echo isset($row['BV_NOIDUNG']) ? nl2br($row['BV_NOIDUNG']) : ''; ?>
                </div>
            </div>
        </div> -->

    </div>
</div>
<?php include "inc/footer.php" ?>