<?php
$activate = "blog";
include('inc/header.php');
include('function.php');
include('connect.php');
?>
<div class="hero overlay py-0">
    <div class="img-bg rellax ">
        <img src="images/nen.jpg" alt="Image" class="img-fluid">
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-6 mx-auto text-center">

                <h1 class="heading" data-aos="fade-up">TIN TỨC</h1>
                <p class="mb-4" data-aos="fade-up">Tại đây chúng tôi sẽ cập nhật những tin tức gần nhất, liên quan nhất
                    và những điều thú vị về các địa điểm tại Cần Thơ.</p>
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

<body>
    <div class="bg-white">
        <div class="banners">
            <form id="product-search" method="GET">
                <input type="text" name="BV_TIEUDE" placeholder="Tìm kiếm..." class="search" />
                <button type="submit" value="Tìm kiếm" class="submit"><i class="fa fa-search"
                        aria-hidden="true"></i></button>
            </form>
            <?php

            $BV_TIEUDE = isset($_GET['BV_TIEUDE']) ? $_GET['BV_TIEUDE'] : "";
            $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 8;
            $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại
            $offset = ($current_page - 1) * $item_per_page;
            if ($BV_TIEUDE) {
                $products = mysqli_query($conn, "SELECT * FROM `baiviet` WHERE `BV_TIEUDE` LIKE '%" . $BV_TIEUDE . "%' AND `BV_TINHTRANG` = 'Upload' ORDER BY `BV_MA` ASC LIMIT 12");
                $totalRecords = mysqli_query($conn, "SELECT * FROM `baiviet` WHERE `BV_TIEUDE` LIKE '%" . $BV_TIEUDE . "%' AND `BV_TINHTRANG` = 'Upload'");
            } else {
                $products = mysqli_query($conn, "SELECT * FROM `baiviet` WHERE `BV_TINHTRANG` = 'Upload' ORDER BY `BV_MA` ASC LIMIT 12");
                $totalRecords = mysqli_query($conn, "SELECT * FROM `baiviet` WHERE `BV_TINHTRANG` = 'Upload'");
            }
            $totalRecords = $totalRecords->num_rows;
            $totalPages = ceil($totalRecords / $item_per_page);
            ?>

            <div class="row p-0 m-0">
                <?php
                mysqli_query($conn, "SET NAMES 'utf8'");
                while ($row = mysqli_fetch_array($products)) {
                ?>
                <div class="col-4 p-2">
                    <div class="card p-2" style="width: 100%;">
                        <img src="images/<?php echo $row["BV_HINHANH"] ?>" class="card-img-top" alt="..."
                            style="width: 100%; height: 200px; object-fit: contain">
                        <div class="card-body">
                            <h5 class="card-title text-dark pt-2"><?php echo $row["BV_TIEUDE"] ?></h5>
                            <a class="col-5 btn btn-primary"
                                href="chitietbaiviet.php?id=<?php echo $row["BV_MA"]; ?>">Chi tiết</a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="clear-both"></div>
            <?php
            include 'pagination.php';
            ?>
        </div>
        <!-- <script>
        document.addEventListener(' DOMContentLoaded', function() {
            var showDetailLinks = document.querySelectorAll('.show-detail');
            showDetailLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    var detail = this.parentElement.querySelector('.detail');
                    var summary = this.parentElement.querySelector('.summary');
                    if (detail.style.display === 'none') {
                        detail.style.display = 'block';
                        summary.style.display = 'none';
                        this.textContent = 'Ẩn chi tiết';
                    } else {
                        detail.style.display = 'none';
                        summary.style.display = 'block';
                        this.textContent = 'Xem chi tiết';
                    }
                });
            });
        });
        </script> -->
    </div>
    <!--==============================footer=================================-->
    <?php
    include('inc/footer.php');
    ?>