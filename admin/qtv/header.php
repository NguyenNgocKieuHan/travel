<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
session_start();
require 'connect.php';

?>
<?php
// Check if user is not logged in
if (!isset($_SESSION["ND_USERNAME"])) {
    // Redirect user to the login page
    header("Location: login.php");
    exit(); // Stop further execution of this script after redirect
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Monsterlite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Monster admin lite design, Monster admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Monster Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>GIRAFFE</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo.jpg">
    <!-- Custom CSS -->
    <link href="../assets/plugins/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style>
.sidebar-submenu {
    display: none;
    /* Ẩn dropdown menu mặc định */
}

.sidebar-submenu.active {
    display: block;
    /* Hiển thị dropdown menu khi có class active */
}
</style>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../assets/images/logo-icon" alt="homepage" class="dark-logo" /> -->

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <h3><a href="#">GIRAFFE</a></h3>
                            <!-- <a>GIRAFFE</a> -->
                            <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" /> -->

                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto mt-md-0 ">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                        <!-- <li class="nav-item hidden-sm-down">
                            <form class="app-search ps-3">
                                <input type="text" class="form-control" placeholder="Search for..."> <a
                                    class="srh-btn"><i class="ti-search"></i></a>
                            </form>
                        </li> -->
                    </ul>

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">


                            <div class="text-start">
                                <?php
                                if (isset($_SESSION["ND_USERNAME"])) {
                                    // Display personalized greeting with username
                                    echo '<span class="text-maroon">Xin chào,</span>';
                                    echo '<span class="font-weight-bolder text-maroon">' . $_SESSION["ND_HOTEN"] . '</span>';
                                } else {
                                    // Display default greeting for guest (in case of unexpected condition)
                                    echo '<span class="text-maroon">Xin chào, Khách</span>';
                                }
                                ?>
                            </div>


                            <a href="#" class="btn btn-outline-light text-white font-weight-bold px-2 mt-n1 py-1"
                                onclick="confirmLogout()">
                                Logout
                                <i class="fas fa-sign-out-alt "></i>
                            </a>
                            <ul class="dropdown-menu show" aria-labelledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                    <script>
                    function confirmLogout() {
                        if (confirm("Bạn có chắc muốn đăng xuất?")) {
                            window.location.href =
                                "login.php"; // Chuyển hướng sang trang logout khi người dùng xác nhận
                        }
                    }
                    </script>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="index.php" aria-expanded="false"><i class="fas fa-bell"
                                    aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="pages-profile.php" aria-expanded="false">
                                <i class="fas fa-address-book" aria-hidden="true"></i><span class="hide-menu">Edit
                                    profile</span></a>
                        </li>
                        <li class="sidebar-item sidebar-dropdown">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                                <i class="fas fa-key" aria-hidden="true"></i>
                                <span class="hide-menu">Account Management</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dsNguoidung.php"
                                        aria-expanded="false">Manage User Accounts</a>
                                </li>
                                <li>
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dsKhachhang.php"
                                        aria-expanded="false">Manage Customer Accounts</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="dsTour.php" aria-expanded="false"><i class="fas fa-fighter-jet"
                                    aria-hidden="true"></i><span class="hide-menu">Tour Management</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="dsBaiviet.php" aria-expanded="false">
                                <i class="fas fa-window-restore" aria-hidden="true"></i><span class="hide-menu">Article
                                    Management</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="dsDattour.php" aria-expanded="false"><i class="fas fa-bars"
                                    aria-hidden="true"></i><span class="hide-menu">Manage Tour Bookings</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="qldoanhthu.php" aria-expanded="false"><i class="fas fa-hand-holding-usd"
                                    aria-hidden="true"></i><span class="hide-menu">Revenue management</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="dsLienhe.php" aria-expanded="false"><i class=" fas fa-phone"
                                    aria-hidden="true"></i><span class="hide-menu">See feedback</span></a></li>

                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            var sidebarItems = document.querySelectorAll('.sidebar-item.sidebar-dropdown');

            sidebarItems.forEach(function(item) {
                var link = item.querySelector('.sidebar-link');
                var submenu = item.querySelector('.sidebar-submenu');

                link.addEventListener('click', function(event) {
                    event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

                    if (submenu.classList.contains('active')) {
                        submenu.classList.remove('active'); // Nếu có class active thì loại bỏ
                    } else {
                        submenu.classList.add(
                            'active'); // Nếu không có class active thì thêm vào
                    }
                });
            });
        });
        </script>