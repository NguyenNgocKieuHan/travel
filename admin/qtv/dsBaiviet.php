<?php
include('header.php');
include('connect.php');

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM baiviet WHERE BV_TIEUDE LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM baiviet";
}

$result = $conn->query($sql);
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
                <h3 class="page-title mb-0 p-0">Article Management</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">HOME</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Article Management</li>
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

        <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Article Management</h4>
                        <div class="text-start">
                            <form class="app-search ps-3" method="post" action="">
                                <input type="text" class="form-control" placeholder="Search" name="search">
                                <button type="submit" class="srh-btn"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <div class="text-end">
                            <a href="themBaiviet.php" class="btn btn-primary">Add Article</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">
                                        MArticle</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Article Title</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Post Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Image</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Content</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Edit Article</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            // Hiển thị thông tin trong bảng
                                            echo "<tr>";
                                            echo "<td>" . $row["BV_MA"] . "</td>";
                                            echo "<td>" . $row["BV_TIEUDE"] . "</td>";
                                            // echo "<td>" . $row["BV_NOIDUNG"] . "</td>";
                                            echo "<td>";
                                            if ($row["BV_TINHTRANG"] == 0) {
                                                echo "Upload";
                                            } elseif ($row["BV_TINHTRANG"] == 1) {
                                                echo "Draft";
                                            } else {
                                                echo "Unknown"; // Trạng thái không xác định
                                            }
                                            echo "</td>";
                                            echo "<td><img src='../images/" . $row["BV_HINHANH"] . "' alt='Image' style='width: 100px;'></td>";
                                            echo "<td>" . substr($row["BV_NOIDUNG"], 0, 10  ) . "</td>";
                                            echo "<td><a href='suaBaiviet.php?BVID=" . $row["BV_MA"] . "'>Edit</a> || <a onclick='return confirm(\"Bạn có chắc muốn xóa không???\")' href='xoaBaiviet.php?BVID=" . $row["BV_MA"] . "'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>Không có bài viết nào được tìm thấy</td></tr>";
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