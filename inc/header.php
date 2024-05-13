 <?php
    // Start the session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    ?>
 <!doctype html>
 <html lang="en">

 <head>

     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- <meta name="author" content="Untree.co"> -->
     <link rel="shortcut icon" href="logo.jpg">

     <meta name="description" content="" />
     <meta name="keywords" content="bootstrap, bootstrap5" />

     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Brygada+1918:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@400;700&display=swap" rel="stylesheet">

     <link rel="stylesheet" href="fonts/icomoon/style.css">
     <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

     <link rel="stylesheet" href="./css/tiny-slider.css">
     <link rel="stylesheet" href="./css/aos.css">
     <link rel="stylesheet" href="./css/flatpickr.min.css">
     <link rel="stylesheet" href="./css/glightbox.min.css">
     <link rel="stylesheet" href="./css/style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

     <title>GIRAFFE</title>
 </head>

 <body>

     <div class="site-mobile-menu site-navbar-target">
         <div class="site-mobile-menu-header">
             <div class="site-mobile-menu-close">
                 <span class="icofont-close js-menu-toggle"></span>
             </div>
         </div>
         <div class="site-mobile-menu-body"></div>
     </div>

     <nav class="site-nav mt-3">
         <div class="container">

             <div class="site-navigation">
                 <div class="row">
                     <div class="col-6 col-lg-3">
                         <a href="#" class="logo m-0 float-start">GIRAFFE</a>
                     </div>
                     <div class="col-lg-65 d-none d-lg-inline-block text-center nav-center-wrap">
                         <ul class="js-clone-nav  text-center site-menu p-0 m-0">
                             <li class="nav-item <?php echo ($activate == "index" ? "active" : "") ?>"><a href="index.php" class="nav-link">TRANG CHỦ</a></li>
                             <li class="nav-item <?php echo ($activate == "blog" ? "active" : "") ?>"><a href="blog.php" class="nav-link">TIN TỨC</a></li>
                             <li class="nav-item <?php echo ($activate == "tour" ? "active" : "") ?>"><a href="tour.php" class="nav-link">TOUR</a></li>
                             <?php
                                if (isset($_SESSION["KH_USERNAME"])) {
                                ?>

                                 <li class="nav-item <?php echo ($activate == "contact" ? "active" : "") ?>"><a href="contact.php" class="nav-link">LIÊN HỆ</a></li>
                                 <!-- <button class="cta-button"><a href="bookingtour.php">ĐẶT TOUR</a></button> -->
                                 <li class="nav-item <?php echo ($activate == "profile" ? "active" : "") ?>"><a href="profile.php" class="nav-link">THÔNG TIN</a></li>

                                 <li class="nav-item <?php echo ($activate == "lichsudattour" ? "active" : "") ?>">
                                     <a href="lichsudattour.php" class="nav-link">LỊCH SỬ</a>
                                 </li>
                                 <i> <label for="">Xin chào: </label><?php echo $_SESSION["KH_USERNAME"]; ?></i>
                                 <a href='logout.php'><i class="fa-solid fa-right-from-bracket"></i></a>
                             <?php
                                }
                                ?>
                         </ul>
                     </div>
                     <div class="col-6 col-lg-3 text-lg-end">
                         <div class="js-clone-nav d-none d-lg-flex text-end site-menu ">
                             <div class="icons">
                                 <?php
                                    if (!isset($_SESSION["KH_USERNAME"])) {
                                    ?>
                                     <div class="menu">
                                         <button class="btn menu-show"><i class="fa-regular fa-user"></i></button>
                                         <ul class="menu-list">
                                             <li class="menu-item"><a href="register.php">ĐĂNG KÝ
                                                 </a>
                                             </li>
                                             <li class="menu-item"><a href="login.php">ĐĂNG NHẬP
                                                 </a>
                                             </li>
                                         </ul>
                                     </div>
                                 <?php } ?>
                             </div>
                             <!-- <a href="#"
                                 class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
                                 data-toggle="collapse" data-target="#main-navbar">
                                 <span></span></a> -->
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </nav>