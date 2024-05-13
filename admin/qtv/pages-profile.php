<?php

include('header.php');
require 'connect.php';

// Check if user is logged in
if (!isset($_SESSION["ND_USERNAME"]) || empty($_SESSION["ND_USERNAME"])) {
    header("Location: login.php");
    exit();
}

$ND_USERNAME = $_SESSION["ND_USERNAME"];

// Retrieve user data from database
$stmt = $conn->prepare("SELECT * FROM nguoidung WHERE ND_USERNAME = ?");
$stmt->bind_param("s", $ND_USERNAME);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $ND_HOTEN = $row['ND_HOTEN'];
    $ND_SDT = $row['ND_SDT'];
    $ND_EMAIL = $row['ND_EMAIL'];
    // $ND_PASSWORD = $row['ND_PASSWORD'];
} else {
    echo "Không tìm thấy thông tin người dùng.";
    exit();
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $ND_HOTEN = $_POST['ND_HOTEN'];
    $ND_SDT = $_POST['ND_SDT'];
    $ND_EMAIL = $_POST['ND_EMAIL'];
    // $ND_PASSWORD = $_POST['ND_PASSWORD'];

    // Update user information in database
    $update_sql = "UPDATE nguoidung SET ND_HOTEN = ?, ND_SDT = ?, ND_EMAIL = ? WHERE ND_USERNAME = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssss", $ND_HOTEN, $ND_SDT, $ND_EMAIL, $ND_USERNAME);

    if ($stmt->execute()) {
        echo '<script>alert("Thông tin người dùng đã được cập nhật thành công."); location="index.php";</script>';
    } else {
        echo "Lỗi: " . $stmt->error;
    }
    $stmt->close();
}
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
                <h3 class="page-title mb-0 p-0">Profile</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
        <!-- Row -->
        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3>Profile</h3>
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <label>Username:</label>
                                            <input type="text" class="form-control" value="<?php echo $ND_USERNAME; ?>"
                                                readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Full Name:</label>
                                            <input type="text" class="form-control" name="ND_HOTEN"
                                                value="<?php echo $ND_HOTEN; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" name="ND_EMAIL"
                                                value="<?php echo $ND_EMAIL; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone No:</label>
                                            <input type="text" class="form-control" name="ND_SDT"
                                                value="<?php echo $ND_SDT; ?>">
                                        </div>
                                        <!-- Password field is intentionally omitted for security reasons -->
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>