<?php
include('header.php');
require 'connect.php';
?>
<div class="page-wrapper">
    <?php
    $BVID = $_GET["BVID"];
    $sql = "select * from baiviet where BV_MA = " . $BVID . "";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $BVID = $row["BV_MA"];
        $tkid = $row["BV_MA"];
        $BV_TIEUDE = $row["BV_TIEUDE"];
        $BV_NOIDUNG = $row["BV_NOIDUNG"];
        $BV_TINHTRANG = $row["BV_TINHTRANG"];
        $tkavt = $row["BV_HINHANH"];
    }
    ?>
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">ARTICLES</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">HOME</a></li>
                            <li class="breadcrumb-item active" aria-current="page">EDIT ARTICLES
                                <?php echo $BVID; ?> -
                                <?php echo $BV_TIEUDE; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <form action="upBaiviet.php" method="POST" class="form-horizontal form-material mx-2"
                    enctype="multipart/form-data">
                    <input type="hidden" name="BVID" value="<?php echo $BVID; ?>">

                    <div class="form-group">
                        <label class="col-md-12 mb-0">Article Title</label>
                        <div class="col-md-12">
                            <input type="text" name="BV_TIEUDE" class="form-control ps-0 form-control-line"
                                value="<?php echo $BV_TIEUDE; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 mb-0">Content</label>
                        <div class="col-md-12">
                            <textarea name="BV_NOIDUNG" class="form-control ps-0 form-control-line"
                                required><?php echo isset($BV_NOIDUNG) ? $BV_NOIDUNG : ''; ?></textarea>

                            <!-- <input type="text" name="BV_NOIDUNG" class="form-control ps-0 form-control-line" value="<?php echo $BV_NOIDUNG; ?>" required> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Post Status</label>
                        <select class="form-control" id="select" name="BV_TINHTRANG">
                            <option>Select Status</option>
                            <option value="0">Upload</option>
                            <option value="1">Draft</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Image</label>
                        <div class="col-md-12">
                            <input type="hidden" name="old_tImg" value="<?php echo $tkavt; ?>" accept="image/*">
                            <input class="form-control" type="file" name="tImg" id="tImg" accept="image/*">
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
                <button type="submit" name="submit" class="btn btn-success mx-auto mx-md-0 text-white">Upload</button>
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