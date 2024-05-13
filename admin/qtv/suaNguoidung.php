<?php
include('header.php');
require 'connect.php';
?>
<div class="page-wrapper">
    <?php
    $stmt = $conn->prepare("SELECT * FROM nguoidung WHERE ND_MA = ?");
    $stmt->bind_param("i", $_GET["NDID"]); // "i" là kiểu dữ liệu của ND_MA (integer)
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Dữ liệu được tìm thấy, tiếp tục xử lý
        $row = $result->fetch_assoc();
        // Lấy các thông tin từ hàng kết quả
        $NDID = $row["ND_MA"];
        $ND_HOTEN = $row["ND_HOTEN"];
        $ND_EMAIL = $row["ND_EMAIL"];
        $ND_SDT = $row["ND_SDT"];
        $ND_USERNAME = $row["ND_USERNAME"];
        $ND_PASSWORD = $row["ND_PASSWORD"];
    } else {
        echo "Không tìm thấy thông tin người dùng.";
        exit(); // Dừng thực thi của mã PHP sau khi xuất thông báo lỗi
    }

    ?>
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
                            <li class="breadcrumb-item active" aria-current="page">EDIT USER - <?php echo $NDID; ?>
                                <?php echo $ND_HOTEN; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <form action="upNguoidung.php" method="POST" class="form-horizontal form-material mx-2"
                    enctype="multipart/form-data">
                    <input type="hidden" name="NDID" value="<?php echo $NDID; ?>">

                    <div class="form-group">
                        <label class="col-md-12 mb-0">Full Name</label>
                        <div class="col-md-12">
                            <input type="text" name="ND_HOTEN" id="ND_HOTEN" class="form-control ps-0 form-control-line"
                                value="<?php echo $ND_HOTEN; ?>" required>
                        </div>
                    </div>
                    <div class=" form-group">
                        <label class="col-md-12 mb-0">Username</label>
                        <div class="col-md-12">
                            <input type="text" name="ND_USERNAME" id="ND_USERNAME" value="<?php echo $ND_USERNAME; ?>"
                                class="form-control ps-0 form-control-line" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Password</label>
                        <div class="col-md-12">
                            <input type="password" name="ND_PASSWORD" id="ND_PASSWORD"
                                value="<?php echo $ND_PASSWORD; ?>" class="form-control ps-0 form-control-line"
                                placeholder="Nhập mật khẩu tại đây" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="email" name="ND_EMAIL" value="<?php echo $ND_EMAIL; ?>"
                                class="form-control ps-0 form-control-line" id="ND_EMAIL" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Phone No</label>
                        <div class="col-md-12">
                            <input type="text" name="ND_SDT" value="<?php echo $ND_SDT; ?>"
                                class="form-control ps-0 form-control-line" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 d-flex">
                            <button type="submit" name="submit"
                                class="btn btn-success mx-auto mx-md-0 text-white">Update</button>
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
<!-- 
$NDID = $row["ND_MA"];
$ND_HOTEN = $row["ND_HOTEN"];
$ND_EMAIL = $row["ND_EMAIL"];
$ND_SDT = $row["ND_SDT"];
$ND_USERNAME = $row["ND_USERNAME"];
$ND_PASSWORD = $row["ND_PASSWORD"];
<form action="upNguoidung.php" method="POST" class="form-horizontal form-material mx-2">
    <div class="form-group">
        <label class="col-md-12 mb-0">Full Name</label>
        <div class="col-md-12">
            <input type="text" name="ND_HOTEN" id="ND_HOTEN" class="form-control ps-0 form-control-line"
                value="<?php echo $ND_HOTEN; ?>" required>
        </div>
    </div>
    <div class=" form-group">
        <label class="col-md-12 mb-0">Username</label>
        <div class="col-md-12">
            <input type="text" name="ND_USERNAME" id="ND_USERNAME" value="<?php echo $ND_USERNAME; ?>"
                class="form-control ps-0 form-control-line" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-12 mb-0">Password</label>
        <div class="col-md-12">
            <input type="password" name="ND_PASSWORD" id="ND_PASSWORD" value="<?php echo $ND_PASSWORD; ?>"
                class="form-control ps-0 form-control-line" placeholder="Nhập mật khẩu tại đây" required>
        </div>
    </div>
    <div class="form-group">
        <label for="example-email" class="col-md-12">Email</label>
        <div class="col-md-12">
            <input type="email" name="ND_EMAIL" value="<?php echo $ND_EMAIL; ?>"
                class="form-control ps-0 form-control-line" id="ND_EMAIL" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-12 mb-0">Phone No</label>
        <div class="col-md-12">
            <input type="text" name="ND_SDT" value="<?php echo $ND_SDT; ?>" class="form-control ps-0 form-control-line"
                required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12 d-flex">
            <button type="submit" name="submit" class="btn btn-success mx-auto mx-md-0 text-white">Update</button>
        </div>
    </div>
</form> -->