<?php
include('header.php');
include('connect.php');

// $sql = "SELECT * FROM lienhe";
// if (isset($_GET["timkiem"])) {
//     $search = $_GET["timkiem"];
//     if (!empty($search)) {
//         $sql = "SELECT * FROM lienhe WHERE KH_HOTEN LIKE '%$search%'";
//     }
// }

$sql = "SELECT lienhe.LH_MA, khachhang.KH_HOTEN, lienhe.LH_NOIDUNG FROM lienhe JOIN khachhang ON lienhe.KH_MA = khachhang.KH_MA";
if (isset($_GET["timkiem"])) {
    $search = $_GET["timkiem"];
    if (!empty($search)) {
        $sql = "SELECT lienhe.LH_MA, khachhang.KH_HOTEN, lienhe.LH_NOIDUNG FROM lienhe JOIN khachhang ON lienhe.KH_MA = khachhang.KH_MA WHERE khachhang.KH_HOTEN LIKE '%$search%'";
    }
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
                <h3 class="page-title mb-0 p-0">CONTACT</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">HOME</a></li>
                            <li class="breadcrumb-item active" aria-current="page">CONTACT</li>
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
                        <h4 class="card-title">Contact Management</h4>
                        <div class="text-end">
                            <form class="app-search ps-3" method="post" action="">
                                <input type="text" class="form-control" placeholder="Search" name="search">
                                <button type="submit" class="srh-btn"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">
                                            MContact</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            First and last name</th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Content</th>
                                    </tr>
                                </thead>
                                <tbody><?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["LH_MA"] . "</td>";
                                                echo "<td>" . $row["KH_HOTEN"] . "</td>";
                                                echo "<td>" . $row["LH_NOIDUNG"] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='3'>Không tìm thấy kết quả.</td></tr>";
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