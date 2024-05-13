<?php
include('header.php');
require 'connect.php';
?>
<div class="page-wrapper">
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
                            <li class="breadcrumb-item active" aria-current="page">Thêm Tour</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <form action="addBaiviet.php" method="POST" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Tiêu đề bài viết</label>
                        <div class="col-md-12">
                            <input type="text" name="BV_TIEUDE" class="form-control ps-0 form-control-line" placeholder="Nhập tên tour" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Nội dung bài viết</label>
                        <div class="col-md-12">
                            <input type="text" name="BV_NOIDUNG" class="form-control ps-0 form-control-line" placeholder="Nhập tên tour" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Tình trạng bài viết</label>
                        <select class="form-control" id="select" name="BV_TINHTRANG">
                            <option>Chọn trạng thái</option>
                            <option value="0">Upload</option>
                            <option value="1">Nháp</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Hình ảnh</label>
                        <div class="col-md-12">
                            <!-- <input class="form-control form-control ps-0 form-control-line" type="file" name="T_HINHANH"
                                id="T_HINHANH" accept="image/*" required> -->
                            <input class="form-control form-control ps-0 form-control-line" type="file" name="bvImg" id="bvImg" accept="image/*" required>
                            <script>
                                var input = document.getElementById("bvImg");
                                var preview = document.getElementById("preview");

                                input.addEventListener("change", function() {
                                    preview.innerHTML = ""; // clear previous preview
                                    var files = this.files;
                                    for (var i = 0; i < files.length; i++) {
                                        var file = files[i];
                                        if (!file.type.startsWith("image/")) {
                                            continue
                                        } // skip non-image files
                                        var reader = new FileReader();
                                        reader.onload = function(e) {
                                            var img = document.createElement("img");
                                            img.src = e.target.result;
                                            img.width =
                                                1000; // set width for preview images
                                            img.className = "avatar avatar-xxl me-3";
                                            preview.appendChild(
                                                img); // append image to preview div
                                        };
                                        reader.readAsDataURL(file); // read file as data url
                                    }
                                });
                            </script>
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