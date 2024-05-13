 <?php
    // $activate = "profile";
    include('header.php');

    // Kiểm tra xem người dùng đã đăng nhập hay chưa

    if (!isset($_SESSION["ND_USERNAME"]) || empty($_SESSION["ND_USERNAME"])) {
        header("Location: login.php");
        exit();
    }

    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "giraffe";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Lấy thông tin người dùng từ cơ sở dữ liệu
    $ND_USERNAME = $_SESSION["ND_USERNAME"];
    $sql = "SELECT * FROM nguoidung WHERE ND_USERNAME= '$ND_USERNAME'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ND_HOTEN = $row['ND_HOTEN'];
        $ND_SDT = $row['ND_SDT'];
        $ND_USERNAME = $row['ND_USERNAME'];
        $ND_EMAIL = $row['ND_EMAIL'];
        $ND_PASSWORD = $row['ND_PASSWORD'];

        // Thêm dòng này để lấy giá trị ND_USERNAMEname
    } else {
        echo "Không tìm thấy thông tin người dùng.";
        exit();
    }


    // Xử lý khi form được submit
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $ND_HOTEN = $_POST['ND_HOTEN'];
        $ND_SDT = $_POST['ND_SDT'];

        // Cập nhật thông tin người dùng vào cơ sở dữ liệu
        $update_sql = "UPDATE nguoidung SET ND_HOTEN = '$ND_HOTEN', ND_SDT = '$ND_SDT', ND_EMAIL = '$ND_EMAIL', ND_PASSWORD = '$ND_PASSWORD' WHERE ND_USERNAME = '$ND_USERNAME'";
        if ($conn->query($update_sql) === TRUE) {
            echo '<script>
            alert("Thông tin người dùng đã được cập nhật thành công. ");
            location="index.php";</script>';

            // echo "Thông tin người dùng đã được cập nhật thành công.";
        } else {
            echo "Lỗi: " . $update_sql . "<br>" . $conn->error;
        }
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
         <!-- Row -->
         <div class="row">
             <!-- Column -->
             <!-- <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body profile-card">
                        <center class="mt-4"> <img src="../assets/images/users/5.jpg" class="rounded-circle"
                                width="150" />
                            <h4 class="card-title mt-2">Hanna Gover</h4>
                            <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                            <div class="row justify-content-center">
                                <div class="col-4">
                                    <a href="javascript:void(0)" class="link">
                                        <i class="icon-people" aria-hidden="true"></i>
                                        <span class="font-normal">254</span>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0)" class="link">
                                        <i class="icon-picture" aria-hidden="true"></i>
                                        <span class="font-normal">54</span>
                                    </a>
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
            </div> -->
             <!-- Column -->
             <!-- Column -->

             <div class="container-fluid">
                 <div class="row">
                     <div class="col-lg-8 col-xlg-9 col-md-7">
                         <?php
                            if (isset($_SESSION['NDID'])) { // Kiểm tra xem người dùng đã đăng nhập chưa
                                $NDID = $_SESSION['NDID'];
                                require 'connect.php';

                                $sql = "SELECT * FROM nguoidung WHERE ND_MA = $NDID";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    $ND_HOTEN = $row["ND_HOTEN"];
                                    $ND_EMAIL = $row["ND_EMAIL"];
                                    $ND_SDT = $row["ND_SDT"];
                                    $ND_USERNAME = $row["ND_USERNAME"];
                                    $ND_PASSWORD = $row["ND_PASSWORD"];
                                }
                            }
                            ?>

                         <div class="card">
                             <div class="card-body">
                                 <form class="form-horizontal form-material mx-2" method="post" action="">

                                     <!-- Hiển thị tên đăng nhập của người dùng -->
                                     <div class="form-group">
                                         <label class="col-md-12 mb-0">Username</label>
                                         <div class="col-md-12">
                                             <input type="text" name="ND_USERNAME" value="<?php echo $ND_USERNAME; ?>"
                                                 class="form-control ps-0 form-control-line" readonly>
                                         </div>
                                     </div>
                                     <!-- Hiển thị tên người dùng -->
                                     <div class="form-group">
                                         <label class="col-md-12 mb-0">Full Name</label>
                                         <div class="col-md-12">
                                             <input type="text" name="ND_HOTEN" value="<?php echo $ND_HOTEN; ?>"
                                                 class="form-control ps-0 form-control-line">
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-md-12 mb-0">Password</label>
                                         <div class="col-md-12">
                                             <input type="password" value="<?php echo $ND_PASSWORD; ?>"
                                                 class="form-control ps-0 form-control-line">
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label for="example-email" class="col-md-12">Email</label>
                                         <div class="col-md-12">
                                             <input type="email" value="<?php echo $ND_EMAIL; ?>"
                                                 class="form-control ps-0 form-control-line" name="example-email"
                                                 id="example-email">
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-md-12 mb-0">Phone No</label>
                                         <div class="col-md-12">
                                             <input type="text" value="<?php echo $ND_SDT; ?>"
                                                 class="form-control ps-0 form-control-line">
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <div class="col-sm-12 d-flex">
                                             <button type="submit" name="submit"
                                                 class="btn btn-success mx-auto mx-md-0 text-white">Update
                                                 Profile</button>
                                         </div>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                     <!-- Column -->
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
             <!-- ============================================================== -->
             <!-- End Container fluid  -->
             <!-- ============================================================== -->
             <!-- ============================================================== -->
             <?php
                include('footer.php');
                ?>