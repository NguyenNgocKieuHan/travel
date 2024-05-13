<?php
include('header.php');
include('connect.php');

$sql = "SELECT * FROM hoadon";

if (isset($_POST["search"])) {
    $search = $_POST["search"];
    if (!empty($search)) {
        $sql = "SELECT * FROM hoadon WHERE HD_MA LIKE '%$search%'";
    }
}

$result = $conn->query($sql);
?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Manage Tour Bookings</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">HOME</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Tour Bookings</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manage Tour Bookings</h4>
                        <div class="text-start">
                            <form class="app-search ps-3" method="post" action="">
                                <input type="text" class="form-control" placeholder="Search" name="search">
                                <button type="submit" class="srh-btn"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Tour ID</th>
                                        <th>Customer ID</th>
                                        <th>Amount of People</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Edit Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["HD_MA"] . "</td>";
                                            echo "<td>" . $row["T_MA"] . "</td>";
                                            echo "<td>" . $row["KH_MA"] . "</td>";
                                            echo "<td>" . $row["HD_SONGUOI"] . "</td>";
                                            echo "<td>" . number_format($row["HD_TONGTIEN"]) . " VNĐ</td>";
                                            echo "<td>" . $row["HD_TRANGTHAI"] . "</td>";
                                            echo "<td>";

                                            // Kiểm tra ngày khởi hành
                                            $departureDate = strtotime($row["T_NGAYKHOIHANH"]); // Đổi ngày khởi hành sang định dạng timestamp
                                            $currentDate = time(); // Thời điểm hiện tại

                                            if ($departureDate > $currentDate) { // Chỉ hiển thị nút cập nhật nếu ngày khởi hành sau thời điểm hiện tại
                                                echo "<form method='post' action='upStatus.php'>";
                                                echo "<input type='hidden' name='hd_ma' value='" . $row["HD_MA"] . "'>";
                                                echo "<select name='new_status'>";
                                                echo "<option value='DAT' " . ($row["HD_TRANGTHAI"] == 'DAT' ? 'selected' : '') . ">placed</option>";
                                                echo "<option value='HUY' " . ($row["HD_TRANGTHAI"] == 'HUY' ? 'selected' : '') . ">cancelled</option>";
                                                echo "</select>";
                                                echo "<button type='submit' class='btn btn-primary'>Update</button>";
                                                echo "</form>";
                                            } else {
                                                // Ngày khởi hành đã qua, không cho phép cập nhật trạng thái
                                                echo "Not Available"; 
                                            }

                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No results found.</td></tr>";
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>