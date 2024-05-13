<?php
include('inc/header.php')
?>

<head>
    <title>ĐĂNG KÝ</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php
    require_once("connect.php");
    if (isset($_POST["dangky"])) {
        //lấy thông tin từ các form bằng phương thức POST
        $KH_HOTEN = $_POST["ten"];
        $KH_SDT = $_POST["sdt"];
        $KH_EMAIL = $_POST["mail"];
        $KH_USERNAME = $_POST["tk"];
        $KH_PASSWORD = $_POST["mk"];
        $KH_DIACHI = $_POST["dc"];
        $confirm_password = $_POST["confirm_mk"];
        // $QH_MA = $_POST["qh"]; // Lấy giá trị mã quận/huyện từ select

        //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
        if ($KH_USERNAME == "" || $KH_DIACHI == "" || $KH_PASSWORD == "" || $KH_HOTEN == "" || $KH_SDT == "" || $KH_EMAIL == "" || $confirm_password == "") {
            echo "bạn vui lòng nhập đầy đủ thông tin";
            if ($password !== $confirm_password) {
                echo "Mật khẩu và xác nhận mật khẩu không trùng khớp";
            }
        } else {
            // Kiểm tra tài khoản đã tồn tại chưa
            $sql = "SELECT KH_PASSWORD FROM khachhang WHERE KH_USERNAME = '" . $KH_USERNAME . "'";
            $kt = mysqli_query($conn, $sql);
            if (mysqli_num_rows($kt)  > 0) {
                echo "Tài khoản đã tồn tại";
            } else {
                //thực hiện việc lưu trữ dữ liệu vào db
                // $sql = "INSERT INTO khachhang(
                // 			KH_HOTEN,
                // 			KH_EMAIL,
                // 			KH_SDT,KH_DIACHI,
                //             KH_USERNAME,
                // 			KH_PASSWORD
                // 		) VALUES (
                // 			'$KH_HOTEN' ,$KH_EMAIL,
                // 		    '$KH_SDT' ,'$KH_DIACHI',
                // 			'$KH_USERNAME',
                // 		    '$KH_PASSWORD'  
                // 		)";


                $sql = "INSERT INTO khachhang (
            KH_HOTEN,
            KH_EMAIL,
            KH_SDT,
            KH_DIACHI,
            KH_USERNAME,
            KH_PASSWORD
        ) VALUES (
            '$KH_HOTEN',
            '$KH_EMAIL',
            '$KH_SDT',
            '$KH_DIACHI',
            '$KH_USERNAME',
            '$KH_PASSWORD'
        )";

                // thực thi câu $sql với biến conn lấy từ file connection.php
                if (mysqli_query($conn, $sql)) {
                    echo '<script>
                            alert("Đăng ký thành công! Vui lòng đăng nhập lại! ");
                            location="login.php";</script>';

                    exit();
                } else {
                    echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }
    }
    ?>

    <div class="hero overlay py-0 bg-white">
        <div class="img-bg rellax">
            <img src="images/nen.jpg" alt="Image" class="img-fluid">
        </div>

        <div class="container">
            <div class="row align-items-center justify-content-start">
                <div class="col-lg-6 mx-auto text-center">
                    <h1 class="heading" data-aos="fade-up">ĐĂNG KÝ</h1>
                </div>
                <div data-aos="fade-up">
                    <a href="https://youtu.be/NhJrf3F1hCI?t=126"
                        class="play-button align-items-center d-flex glightbox3">
                        <span class="icon-button me-3">
                            <span class="icon-play"></span>
                        </span>
                        <span class="caption">Watch Video</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <form class="cart" action="" method="post">
        <div class="row">
            <div class="col-lg-6">
                <label for="username" class="form-label">Tên đăng nhập:<span class="error">* </span></label>
                <input type="text" class="form-control" id="username" placeholder="Nhập tên đăng nhập" name="tk"
                    required>
            </div>
            <div class="col-lg-6">
                <label for="hoten" class="form-label">Họ và tên:<span class="error"></span> </label>
                <input type="text" class="form-control" id="hoten" placeholder="Nhập tên của bạn" name="ten" required>
            </div>
            <div class="col-lg-6">
                <label for="username" class="form-label">Địa chỉ:<span class="error">* </span></label>
                <input type="text" class="form-control" id="diachi" placeholder="Nhập địa chỉ khách hàng" name="dc"
                    required>
            </div>
            <div class="col-lg-6">
                <label for="mail" class="form-label">Email:<span class="error">*</span> </label>
                <input type="mail" class="form-control" id="mail" placeholder="Nhập địa chỉ email của bạn" name="mail"
                    required>
            </div>
            <div class="col-lg-6">
                <label for="inputNumberl4" class="form-label">Số điện thoại:<span class="error"></span></label>
                <input type="text" class="form-control" id="sdt" placeholder="Nhập số điện thoại của bạn" name="sdt"
                    required>
            </div>

            <div class="col-lg-6">
                <label for="inputPassword4" class="form-label">Mật khẩu:<span class="error">*</span></label>
                <input type="password" class="form-control" id="matkhau" placeholder="Nhập mật khẩu" name="mk" required>
            </div>
            <div class="col-lg-6">
                <label for="confirm_password" class="form-label">Nhập lại mật khẩu:<span class="error">*</span></label>
                <input type="password" class="form-control" id="confirm_mk" placeholder="Nhập lại mật khẩu"
                    name="confirm_mk" required>
            </div>
        </div>
        <div class="col-lg-64">
            <button type="submit" class="btn btn-primary py-3 px-5" name="dangky">Đăng ký</button>
        </div>
        <div class="col-lg-64">
            <p>Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
        </div>
    </form>

    </div>
</body>

</html>

<script>
function showMessageBox() {
    var message = "Reservation successful!";
    alert(message);
}
</script>
<?php
include('inc/footer.php')
?>