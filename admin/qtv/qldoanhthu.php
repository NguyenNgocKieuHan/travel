<?php
include('header.php');
require 'connect.php';

// Check if user is logged in
if (!isset($_SESSION["ND_USERNAME"]) || empty($_SESSION["ND_USERNAME"])) {
    header("Location: login.php");
    exit();
}

// Initialize variables for selected month and total revenue
$selected_month = '';
$total_revenue = 0;

// Handle form submission
if (isset($_GET['selected_month'])) {
    $selected_month = $_GET['selected_month'];

    // Calculate first and last day of the selected month
    $first_day_of_month = date('Y-m-01', strtotime($selected_month));
    $last_day_of_month = date('Y-m-t', strtotime($selected_month));

    // Query to calculate total revenue within the selected month
    $sql_total_revenue = "SELECT SUM(HD_TONGTIEN) AS total_revenue FROM hoadon WHERE T_NGAYKHOIHANH BETWEEN '$first_day_of_month' AND '$last_day_of_month'";
    $result_total_revenue = $conn->query($sql_total_revenue);

    if ($result_total_revenue && $result_total_revenue->num_rows > 0) {
        $row_total_revenue = $result_total_revenue->fetch_assoc();
        $total_revenue = $row_total_revenue['total_revenue'];
    }
}
?>

<!-- HTML Section -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quản lý doanh thu</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="page-title mb-0 p-0">Revenue Management</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Revenue Management</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form method="get" action="">

                            <div class="form-group">
                                <label class="col-md-12 mb-0">Departure Day</label>
                                <div class="col-md-12">
                                    <input type="month" name="selected_month" id="datepicker"
                                        class="form-control ps-0 form-control-line" required>
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label class="col-md-12 mb-0">Chọn tháng và năm:</label>
                                <div class="col-md-12">
                                    <input type="text" id="datepicker" name="selected_month" class="form-control ps-0 form-control-line" required value="<?php echo htmlspecialchars($selected_month); ?>">
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div class="col-sm-12 d-flex">
                                    <button type="submit" class="btn btn-primary">View revenue</button>
                                </div>
                            </div>
                        </form>

                        <!-- Display total revenue if available -->
                        <?php if (!empty($selected_month)) : ?>
                        <h3>Revenue during the month <?php echo htmlspecialchars($selected_month); ?>:
                            <?php echo number_format($total_revenue); ?> VNĐ</h3>

                        <!-- Display list of invoices within the selected month -->
                        <?php
                            $sql_hoadon = "SELECT * FROM hoadon WHERE T_NGAYKHOIHANH BETWEEN '$first_day_of_month' AND '$last_day_of_month'";
                            $result_hoadon = $conn->query($sql_hoadon);

                            if ($result_hoadon && $result_hoadon->num_rows > 0) : ?>
                        <h4>List of bills for the month <?php echo htmlspecialchars($selected_month); ?>:</h4>
                        <table border="1">
                            <thead>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">
                                    STT</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    MBill</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Post Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Image</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Content</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Edit Article</th>
                                </tr>
                            </thead>
                            <tr>
                                <th>STT</th>
                                <th>MBill</th>
                                <th>MTour</th>
                                <th>MCustomer</th>
                                <th>Departure day</th>
                                <th>Amount of people</th>
                                <th>The total amount</th>
                            </tr>
                            <?php $count = 0; ?>
                            <?php while ($row_hoadon = $result_hoadon->fetch_assoc()) : ?>
                            <?php $count++; ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $row_hoadon['HD_MA']; ?></td>
                                <td><?php echo $row_hoadon['T_MA']; ?></td>
                                <td><?php echo $row_hoadon['KH_MA']; ?></td>
                                <td><?php echo $row_hoadon['T_NGAYKHOIHANH']; ?></td>
                                <td><?php echo $row_hoadon['HD_SONGUOI']; ?></td>
                                <td><?php echo number_format($row_hoadon['HD_TONGTIEN']) . 'VND';
                                                ?></td>
                                <!-- <td><?php echo $row_hoadon['HD_TONGTIEN']; ?></td> -->
                            </tr>
                            <?php endwhile; ?>
                        </table>
                        <?php else : ?>
                        <p>No bills for the month <?php echo htmlspecialchars($selected_month); ?>.</p>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(function() {
        // Initialize datepicker for selecting month and year
        $("#datepicker").datepicker({
            dateFormat: 'yy-mm', // Date format (year-month)
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            onClose: function(dateText, inst) {
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
        });
    });
    </script>

</body>

</html>

<?php include('footer.php'); ?>