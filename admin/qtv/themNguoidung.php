<?php
include('header.php');
// include('connect.php');
?>
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
        </div>
    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <form action="addNguoidung.php" method="POST" class="form-horizontal form-material mx-2">
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Full Name</label>
                        <div class="col-md-12">
                            <input type="text" name="ND_HOTEN" class="form-control ps-0 form-control-line" placeholder="Nhập tên Người dùng" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Username</label>
                        <div class="col-md-12">
                            <input type="text" name="ND_USERNAME" class="form-control ps-0 form-control-line" placeholder="Nhập tên đăng nhập Người dùng" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Password</label>
                        <div class="col-md-12">
                            <input type="password" name="ND_PASSWORD" class="form-control ps-0 form-control-line" placeholder="Nhập mật khẩu tại đây" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Repassword</label>
                        <div class="col-md-12">
                            <input type="password" name="ND_repass" id="ND_repass" class="form-control ps-0 form-control-line" placeholder="Nhập lại mật khẩu tại đây" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="email" name="ND_EMAIL" placeholder="Nhập địa chỉ email" class="form-control ps-0 form-control-line" id="ND_EMAIL" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Phone No</label>
                        <div class="col-md-12">
                            <input type="text" name="ND_SDT" placeholder="Nhập số điện thoại " class="form-control ps-0 form-control-line" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 d-flex">
                            <button type="submit" name="submit" class="btn btn-success mx-auto mx-md-0 text-white">Add</button>
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