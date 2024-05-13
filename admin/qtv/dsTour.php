<?php
include('header.php');
include('connect.php');

$sql = "SELECT tour.*, loaitour.LT_TEN FROM tour LEFT JOIN loaitour ON tour.LT_MA = loaitour.LT_MA";
if (isset($_GET["timkiem"])) {
    $search = $_GET["timkiem"];
    if (!empty($search)) {
        $sql .= " WHERE tour.T_TEN LIKE '%$search%'";
    }
}


$result = $conn->query($sql);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                <h3 class="page-title mb-0 p-0">TOUR</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">HOME</a></li>
                            <li class="breadcrumb-item active" aria-current="page">TOUR</li>
                        </ol>
                    </nav>
                </div>
            </div>
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
                        <h4 class="card-title">Tour Management</h4>
                        <div class="text-start">
                            <form class="app-search ps-3" method="get" action="">
                                <input type="text" class="form-control" placeholder="Search" name="timkiem">
                                <button type="submit" class="srh-btn"><i class="ti-search"></i></button>
                            </form>
                        </div>

                        <div class="text-end">
                            <a href="themTour.php" class="btn btn-primary">Add Tour</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">
                                            MTour</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tour Type</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tour Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Image</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Departure Day</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tour Price</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Depcribe Tour</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Edit Tour</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["T_MA"] . "</td>";
                                            echo "<td>" . $row["LT_TEN"] . "</td>";
                                            echo "<td>" . $row["T_TEN"] . "</td>";
                                            echo "<td><img src='../images/" . $row["T_HINHANH"] . "' alt='Image' style='width: 100px;'></td>";
                                            echo "<td>" . $row["T_NGAYKHOIHANH"] . "</td>";
                                            echo "<td>" . number_format($row["T_GIA"]) . " VNĐ</td>"; // Định dạng hiển thị giá tour
                                            echo "<td>" . substr($row["T_MOTA"], 0, 10) . "</td>";

                                            // echo "<td><button onclick='showDescription(\"" . addslashes($row["T_MOTA"]) . "\")' class='btn btn-primary'>Xem thêm</button></td>";
                                            echo "<td><a href='suaTour.php?TID=" . $row["T_MA"] . "'>Edit</a> || <a onclick=\"return confirm('Bạn có chắc muốn xóa không???')\" href='xoaTour.php?TID=" . $row["T_MA"] . "'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>Không tìm thấy kết quả.</td></tr>";
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
    <!-- Modal -->


    <?php
    include('footer.php');
    ?>