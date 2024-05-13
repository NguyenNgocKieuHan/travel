<?php @include('inc/header.php');
?>

<head>
    <title>ĐĂNG NHẬP</title>
    <!-- <link href="css/login.css" rel="stylesheet" type="text/css" media="all" /> -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

    <!-- <link href="css/app.min.css" rel="stylesheet" type="text/css" media="all" /> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>

<body>
    <!--header start here-->

    <div class="hero overlay py-0 bg-white">
        <div class="img-bg rellax">
            <img src="images/nen.jpg" alt="Image" class="img-fluid">
        </div>

        <div class="container">
            <div class="row align-items-center justify-content-start">
                <div class="col-lg-6 mx-auto text-center">
                    <h1 class="heading" data-aos="fade-up">ĐĂNG NHẬP</h1>
                </div>

                </<div data-aos="fade-up">
                <a href="https://youtu.be/NhJrf3F1hCI?t=126" class="play-button align-items-center d-flex glightbox3">
                    <span class="icon-button me-3">
                        <span class="icon-play"></span>
                    </span>
                    <span class="caption">Watch Video</span>
                </a>
            </div>
        </div>
    </div>
    <form action="login_dn.php" method="post">
        <div class="col-lg-64">
            <label class="form-label" for="KH_USERNAME">Tên đăng nhập:</label>
            <input class="form-control" type="text" id="KH_USERNAME" name="KH_USERNAME"
                placeholder="Nhập tên đăng nhập tại đây " required />
        </div>
        <div class="col-lg-64">
            <label class="form-label" for="KH_PASSWORD">Mật khẩu:</label>
            <input class="form-control" type="password" id="KH_PASSWORD" name="KH_PASSWORD"
                placeholder="Nhập mật khẩu tại đây" required />
        </div>
        <div class="col-lg-64">
            <button type="submit" class="btn btn-primary py-3 px-5" name="login">Đăng nhập</button>
        </div>
        <div class="col-lg-64">
            <p>Bạn chưa có tài khoản? <a href="register.php">Đăng ký tại đây</a></p>
        </div>
    </form>


</body>

<?php
include('inc/footer.php');
?>