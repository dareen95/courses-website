<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coursegator";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Coursegator</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/web/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/web/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/web/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/web/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/web/css/themify-icons.css">
    <link rel="stylesheet" href="assets/web/css/nice-select.css">
    <link rel="stylesheet" href="assets/web/css/flaticon.css">
    <link rel="stylesheet" href="assets/web/css/gijgo.css">
    <link rel="stylesheet" href="assets/web/css/animate.css">
    <link rel="stylesheet" href="assets/web/css/slicknav.css">
    <link rel="stylesheet" href="assets/web/css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.php">
                                    <img src="assets/web/img/logo2.png" alt="">
                                </a>
                            </div>
                        </div>
                        <?php

                         $sql = "SELECT id, name FROM cats";
                        //$sql = "SELECT * FROM  cats";
                        $result = $conn->query($sql);

                        if (!empty($result) && $result->num_rows > 0) {

                            $cats = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        } else {
                            $cats = [];
                        }
                        // var_dump($cats);die;
                        ?>
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="index.php">home</a></li>
                                        <li><a href="all-courses.php">All Courses</a></li>
                                        <li><a href="#">Categories <i class="ti-angle-down"></i></a>
                                            <?php if (!empty($cats)) { ?>
                                                <ul class="submenu">
                                                    <?php foreach ($cats as $cat) { ?>
                                                        <li><a href="showcategory.php?id=<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>
                                        </li>
                                        <li><a href="enroll.php">Enroll</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-center">
                                <div class="live_chat_btn">
                                    <a class="boxed_btn_orange" href="#">
                                        <i class="fa fa-phone"></i>
                                        <span>+566543131</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->