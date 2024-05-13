<?php
include('header.php');
require 'connect.php';
?>
<div class="page-wrapper">
    <?php
    $TID = $_GET["TID"];
    require 'connect.php';
    $sql = "select * from tour where T_MA = " . $TID . "";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $TID = $row["T_MA"];
        $tkid = $row["T_MA"];
        $T_TEN = $row["T_TEN"];
        $LT_MA = $row["LT_MA"];
        $T_NGAYKHOIHANH = $row["T_NGAYKHOIHANH"];
        $GT_GIA = $row["GT_GIA"];
        $T_MOTA = $row["T_MOTA"];
        $tkavt = $row["T_HINHANH"];
    }
    ?>
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">TOUR</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa tour có mã
                                <?php echo $TID; ?> -
                                <?php echo $T_TEN; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <form action="upTour.php" method="POST" class="form-horizontal form-material mx-2"
                    enctype="multipart/form-data">
                    <input type="hidden" name="TID" value="<?php echo $TID; ?>">

                    <div class="form-group">
                        <label class="col-md-12 mb-0">Tên Tour</label>
                        <div class="col-md-12">
                            <input type="text" name="T_TEN" class="form-control ps-0 form-control-line"
                                value="<?php echo $T_TEN; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Loại tour</label>
                        <div class="col-md-12">
                            <select class="form-control ps-0 form-control-line" id="tour" name="LT_MA">
                                <option selected>Chọn loại tour</option required>
                                <?php
                                // Truy vấn để lấy danh sách loại tour
                                $sql = "SELECT LT_MA, LT_TEN FROM loaitour";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row["LT_MA"] . '">' . $row["LT_TEN"] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Ngày khởi hành</label>
                        <div class="col-md-12">
                            <input type="date" name="T_NGAYKHOIHANH" class="form-control ps-0 form-control-line"
                                value="<?php echo $T_NGAYKHOIHANH; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Giá tour</label>
                        <div class="col-md-12">
                            <input type="text" name="GT_GIA" value="<?php echo $GT_GIA; ?>"
                                class="form-control ps-0 form-control-line" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Mô tả</label>
                        <div class="col-md-12">
                            <input type="text" name="T_MOTA" value="<?php echo $T_MOTA; ?>"
                                class=" form-control ps-0 form-control-line" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Hình ảnh</label>
                        <div class="col-md-12">
                            <input type="hidden" name="old_tImg" value="<?php echo $tkavt; ?>" accept="image/*">
                            <input class="form-control" type="file" name="tImg" id="tImg" accept="image/*">
                            <!-- <input class="form-control form-control ps-0 form-control-line"
                                value="<?php echo $tkavt; ?>" type="file" name="T_HINHANH" id="T_HINHANH"
                                accept="image/*" required> -->
                        </div>
                        <div class="mb-3 px-3 col-3">
                            <div id="preview">
                                <img id="old_img" src="../images/<?php echo $tkavt; ?>"
                                    class="rounded-circle avatar avatar-xxl ms-4" alt="">
                            </div>
                            <script>
                            var input = document.getElementById("tImg");
                            var preview = document.getElementById("preview");
                            var old_img = document.getElementById("old_img");

                            input.addEventListener("change", function() {
                                preview.innerHTML =
                                    ""; // clear previous preview
                                old_img.innerHTML = "";
                                var files = this.files;
                                for (var i = 0; i < files.length; i++) {
                                    var file = files[i];
                                    if (!file.type.startsWith("image/")) {
                                        continue;
                                    } // skip non-image files
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        var img = document.createElement(
                                            "img");
                                        img.src = e.target.result;
                                        img.width =
                                            200; // set width for preview images
                                        img.className =
                                            "rounded-circle avatar avatar-xxl ms-4";
                                        preview.appendChild(
                                            img
                                        ); // append image to preview div
                                    };
                                    reader.readAsDataURL(
                                        file); // read file as data url
                                }
                            });
                            </script>
                        </div>
                    </div>
            </div>

        </div>
        <div class="form-group">
            <div class="col-sm-12 d-flex">
                <button type="submit" name="submit" class="btn btn-success mx-auto mx-md-0 text-white">Create</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>

<!-- Row -->
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right sidebar -->
<!-- ============================================================== -->
<!-- .right-sidebar -->
<!-- ============================================================== -->
<!-- End Right sidebar -->
<!-- ============================================================== -->
</div>
<?php
include('footer.php');
?>