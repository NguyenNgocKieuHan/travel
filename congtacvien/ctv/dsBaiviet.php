<?php
include('header.php');
include('connect.php');
?>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Table</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Table</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- <div class="col-md-6 col-4 align-self-center">
                <div class="text-end upgrade-btn">
                    <a href="https://www.wrappixel.com/templates/monsteradmin/"
                        class="btn btn-success d-none d-md-inline-block text-white" target="_blank">Upgrade to
                        Pro</a>
                </div>
            </div> -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <?php
        $sql = "SELECT * FROM baiviet";
        if (isset($_GET["timkiem"])) {
            $search = $_GET["timkiem"];
            if ($search != null) {
                $sql = "SELECT * FROM baiviet WHERE BV_TIEUDE LIKE '%" . $search . "%';";
            }
        }
        ?>
        <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Quản lý Tài Khoản Người dùng</h4>
                        <div class="text-end">
                            <a href="themBaiviet.php" class="btn btn-primary">Thêm mới</a>
                        </div>
                        <h6 class="card-subtitle">Add class <code>.table</code></h6>
                        <!-- <div class="text-end">
                            <a href="themBaiviet.php" class="btn btn-primary">Thêm mới</a>
                        </div> -->
                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">
                                        Mã Bài Viết</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Tiêu Đề Bài Viết</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nội Dung Bài Viết</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Mô tả Bài Viết</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tình Trạng Bài Viết</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Hình ảnh Bài Viết</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Chỉnh sửa Bài Viết</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $result = $conn->query($sql);
                                        $result_all = $result->fetch_all(MYSQLI_ASSOC);
                                        foreach ($result_all as $row) {
                                            $bvid = $row["BV_MA"];
                                    ?>
                                            <tr class="height-100">
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        <?php echo $row["BV_MA"]; ?></p>
                                                </td>
                                                <!-- tieu de -->
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        <?php echo $row["BV_TIEUDE"]; ?></p>
                                                </td>
                                                <!-- noi dung -->
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        <?php echo $row["BV_NOIDUNG"]; ?></p>
                                                </td>
                                                <!-- mo ta-->
                                                <!-- <td>
                                            <p class="text-sm font-weight-bold mb-0">
                                                <?php echo $row["BV_MOTA"]; ?></p>
                                        </td> -->
                                                <!-- tinh trang -->
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        <?php echo $row["BV_TINHTRANG"]; ?></p>
                                                </td>
                                                <!-- hinh anh -->
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        <?php echo $row["BV_HINHANH"]; ?></p>
                                                </td>
                                                <td>
                                                    <a onclick="return confirm('Bạn có chắc muốn xóa không???')" href="xoaBaiviet.php?BVID=<?php echo $BVID; ?>">Xóa</a>
                                                </td>

                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <?php
    include('footer.php');
    ?>