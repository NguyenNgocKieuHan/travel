<?php
include("header.php");
include('connect.php'); // Kết nối đến cơ sở dữ liệu

// Lấy tháng và năm hiện tại
$currentMonth = date('m'); // Lấy tháng hiện tại (01 đến 12)
$currentYear = date('Y'); // Lấy năm hiện tại
// Truy vấn thống kê hàng tháng
$sqlMonthlyBookings = "SELECT COUNT(*) AS TotalBookings, 
                              SUM(CASE WHEN HD_TRANGTHAI = 'HUY' THEN 1 ELSE 0 END) AS CancelledBookings
                       FROM hoadon
                       WHERE MONTH(T_NGAYKHOIHANH) = MONTH(CURRENT_DATE())
                         AND YEAR(T_NGAYKHOIHANH) = YEAR(CURRENT_DATE())
                         AND HD_TRANGTHAI IN ('DAT', 'HUY')";

// Truy vấn thống kê hàng năm
$sqlYearlyBookings = "SELECT YEAR(T_NGAYKHOIHANH) AS Year, 
                              COUNT(*) AS TotalBookings, 
                              SUM(CASE WHEN HD_TRANGTHAI = 'HUY' THEN 1 ELSE 0 END) AS CancelledBookings
                       FROM hoadon
                       WHERE HD_TRANGTHAI IN ('DAT', 'HUY')
                       GROUP BY YEAR(T_NGAYKHOIHANH)
                       ORDER BY Year DESC";

// Thực hiện truy vấn thống kê hàng tháng
$resultMonthly = $conn->query($sqlMonthlyBookings);
$totalMonthlyBookings = 0;
$monthlyCancellationRate = 0;

if ($resultMonthly && $resultMonthly->num_rows > 0) {
    $rowMonthly = $resultMonthly->fetch_assoc();
    $totalMonthlyBookings = (int) $rowMonthly['TotalBookings'];
    $cancelledMonthlyBookings = (int) $rowMonthly['CancelledBookings'];

    if ($totalMonthlyBookings > 0) {
        $monthlyCancellationRate = ($cancelledMonthlyBookings / $totalMonthlyBookings) * 100;
    }
}

// Thực hiện truy vấn thống kê hàng năm
$resultYearly = $conn->query($sqlYearlyBookings);
$totalYearlyBookings = 0;
$yearlyCancellationRate = 0;

if ($resultYearly && $resultYearly->num_rows > 0) {
    $rowYearly = $resultYearly->fetch_assoc();
    $totalYearlyBookings = (int) $rowYearly['TotalBookings'];
    $cancelledYearlyBookings = (int) $rowYearly['CancelledBookings'];

    if ($totalYearlyBookings > 0) {
        $yearlyCancellationRate = ($cancelledYearlyBookings / $totalYearlyBookings) * 100;
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="page-title mb-0 p-0">Dashboard</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Monthly Bookings</h4>
                        <div class="text-end">
                            <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i>
                                <?php echo $totalMonthlyBookings; ?></h2>
                            <span class="text-muted">Bookings This Month</span>
                        </div>
                        <span
                            class="text-success"><?php echo number_format($monthlyCancellationRate, 2) . "%"; ?></span>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="width: <?php echo $monthlyCancellationRate; ?>%; height: 6px;"
                                aria-valuenow="<?php echo $monthlyCancellationRate; ?>" aria-valuemin="0"
                                aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Yearly Bookings</h4>
                        <div class="text-end">
                            <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i>
                                <?php echo $totalYearlyBookings; ?></h2>
                            <span class="text-muted">Bookings This Year</span>
                        </div>
                        <span class="text-success"><?php echo number_format($yearlyCancellationRate, 2) . "%"; ?></span>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="width: <?php echo $yearlyCancellationRate; ?>%; height: 6px;"
                                aria-valuenow="<?php echo $yearlyCancellationRate; ?>" aria-valuemin="0"
                                aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Column -->
        </div>
        <h2>Number of tour bookings</h2>

        <canvas id="myChart" width="800" height="400"></canvas>
        <h2>Monthly revenue statistics</h2>

        <canvas id="monthlyChart" width="800" height="400"></canvas>
        <h2>Yearly revenue statistics</h2>
        <canvas id="yearlyChart" width="800" height="400"></canvas>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('data.php')
                .then(response => response.json())
                .then(data => {
                    drawChart(data);
                })
                .catch(error => console.error('Lỗi khi lấy dữ liệu:', error));
        });

        function drawChart(data) {
            const labels = data.map(item => `${item.T_MA} - ${item.T_TEN}`);
            const bookings = data.map(item => item.SoLuotDat);

            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Number of tour bookings',
                        data: bookings,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Number of tour bookings',
                                font: {
                                    size: 16,
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                precision: 0,
                                stepSize: 1,
                                font: {
                                    size: 14
                                }
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Tour',
                                font: {
                                    size: 16,
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                font: {
                                    size: 14
                                },
                                autoSkip: false, // Ngăn không cho nhãn tự động bị cắt
                                maxRotation: 90, // Quay nhãn lên 90 độ
                                minRotation: 90 // Quay nhãn xuống 90 độ


                            }
                        }
                    }
                }
            });
        }
        </script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('DATAA.php')
                .then(response => response.json())
                .then(data => {
                    const revenueByMonth = data.revenueByMonth;
                    const revenueByYear = data.revenueByYear;

                    // Lấy danh sách các tháng có doanh thu
                    const monthsWithData = [];
                    for (const month in revenueByMonth) {
                        if (revenueByMonth.hasOwnProperty(month) && revenueByMonth[month] > 0) {
                            monthsWithData.push(parseInt(month));
                        }
                    }

                    // Lấy danh sách các năm có doanh thu
                    const yearsWithData = Object.keys(revenueByYear).map(Number);

                    // Vẽ biểu đồ theo tháng và năm có doanh thu
                    drawMonthlyChart(revenueByMonth, monthsWithData);
                    drawYearlyChart(revenueByYear, yearsWithData);
                })
                .catch(error => console.error('Lỗi khi lấy dữ liệu:', error));
        });

        function drawMonthlyChart(revenueByMonth, monthsWithData) {
            const currentYear = new Date().getFullYear(); // Lấy năm hiện tại

            const months = [
                'January', 'February ', 'March', 'April',
                'May', 'June', 'July', 'August',
                'September', 'October', 'November', 'December'
            ];

            const dataToShow = [];
            const labelsToShow = [];

            // Lọc ra chỉ các tháng trong năm hiện tại từ danh sách monthsWithData
            const monthsInCurrentYear = monthsWithData.filter(monthIndex => {
                const monthDate = new Date(currentYear, monthIndex -
                    1); // Tạo đối tượng Date từ tháng và năm hiện tại
                return monthDate.getFullYear() === currentYear; // Chỉ lấy các tháng trong năm hiện tại
            });

            // Tạo dữ liệu và nhãn chỉ với các tháng trong năm hiện tại
            monthsInCurrentYear.forEach(monthIndex => {
                const monthLabel = months[monthIndex - 1];
                const monthRevenue = revenueByMonth[monthIndex];
                labelsToShow.push(monthLabel);
                dataToShow.push(monthRevenue);
            });

            const ctx = document.getElementById('monthlyChart').getContext('2d');
            const monthlyChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labelsToShow,
                    datasets: [{
                        label: 'Revenue by month',
                        data: dataToShow,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 0.6)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Revenue (VNĐ)'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
                            }
                        }
                    }
                }
            });
        }

        function drawYearlyChart(revenueByYear, yearsWithData) {
            const dataToShow = [];
            const labelsToShow = [];

            // Tạo dữ liệu và nhãn chỉ với các năm có doanh thu
            yearsWithData.forEach(year => {
                const yearLabel = year.toString();
                const yearRevenue = revenueByYear[year];
                labelsToShow.push(yearLabel);
                dataToShow.push(yearRevenue);
            });

            const ctx = document.getElementById('yearlyChart').getContext('2d');
            const yearlyChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labelsToShow,
                    datasets: [{
                        label: 'Revenue by year',
                        data: dataToShow,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Revenue (VNĐ)'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Year'
                            }
                        }
                    }
                }
            });
        }
        </script>
    </div>
</body>

<?php
include "footer.php";
?>