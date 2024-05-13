<?php
include('header.php');
include('connect.php');

$sql = "SELECT * FROM nguoidung";
if (isset($_GET["timkiem"])) {
    $search = $_GET["timkiem"];
    if (!empty($search)) {
        $sql = "SELECT * FROM nguoidung WHERE ND_HOTEN LIKE '%$search%'";
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
                <h3 class="page-title mb-0 p-0">USER</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">HOME</a></li>
                            <li class="breadcrumb-item active" aria-current="page">USER</li>
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
                        <h4 class="card-title">Manage User Accounts</h4>
                        <div class="text-start">
                            <form class="app-search ps-3" method="get" action="">
                                <input type="text" class="form-control" placeholder="Search" name="timkiem">
                                <button type="submit" class="srh-btn"><i class="ti-search"></i></button>
                            </form>
                        </div>

                        <div class="text-end">
                            <a href="themNguoidung.php" class="btn btn-primary">Add user</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">
                                            MUser</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            First and last name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Username</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Password</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Phone</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Edit User</th>
                                    </tr>
                                </thead>
                                <tbody><?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["ND_MA"] . "</td>";
                                                echo "<td>" . $row["ND_HOTEN"] . "</td>";
                                                echo "<td>" . $row["ND_USERNAME"] . "</td>";
                                                echo "<td>" . $row["ND_PASSWORD"] . "</td>";
                                                echo "<td>" . $row["ND_SDT"] . "</td>";
                                                echo "<td>" . $row["ND_EMAIL"] . "</td>";
                                                echo "<td><a href='suaNguoidung.php?NDID=" . $row["ND_MA"] . "'>Edit</a> || <a onclick=\"return confirm('Bạn có chắc muốn xóa không???')\" href='xoaNguoidung.php?NDID=" . $row["ND_MA"] . "'>Delete</a></td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='6'>Không tìm thấy kết quả.</td></tr>";
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