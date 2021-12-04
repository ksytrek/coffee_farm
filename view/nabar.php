<!DOCTYPE html>
<html lang="en">

<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>Classimax</title> -->

    <!-- FAVICON -->
    <link href="img/favicon.png" rel="shortcut icon">
    <!-- PLUGINS CSS STYLE -->
    <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../script/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../script/plugins/bootstrap/css/bootstrap-slider.css">
    <!-- Font Awesome -->
    <link href="../script/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="../script/plugins/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="../script/plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
    <!-- Fancy Box -->
    <link href="../script/plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
    <link href="../script/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="../script/css/style.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="body-wrapper">


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light navigation">
                        <a class="navbar-brand" href="index.html">
                            <img src="images/logo.png" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto main-nav ">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.html">Home</a>
                                </li>
                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Dashboard<span><i class="fa fa-angle-down"></i></span>
                                    </a>

                                    <!-- Dropdown list -->
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="dashboard.html">Dashboard</a>
                                        <a class="dropdown-item" href="dashboard-my-ads.html">Dashboard My Ads</a>
                                        <a class="dropdown-item" href="dashboard-favourite-ads.html">Dashboard Favourite Ads</a>
                                        <a class="dropdown-item" href="dashboard-archived-ads.html">Dashboard Archived Ads</a>
                                        <a class="dropdown-item" href="dashboard-pending-ads.html">Dashboard Pending Ads</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Pages <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <!-- Dropdown list -->
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="about-us.html">About Us</a>
                                        <a class="dropdown-item" href="contact-us.html">Contact Us</a>
                                        <a class="dropdown-item" href="user-profile.html">User Profile</a>
                                        <a class="dropdown-item" href="404.html">404 Page</a>
                                        <a class="dropdown-item" href="package.html">Package</a>
                                        <a class="dropdown-item" href="single.html">Single Page</a>
                                        <a class="dropdown-item" href="store.html">Store Single</a>
                                        <a class="dropdown-item" href="single-blog.html">Single Post</a>
                                        <a class="dropdown-item" href="blog.html">Blog</a>

                                    </div>
                                </li>
                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Listing <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <!-- Dropdown list -->
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="category.html">Ad-Gird View</a>
                                        <a class="dropdown-item" href="ad-listing-list.html">Ad-List View</a>
                                    </div>
                                </li>
                            </ul>
                            <ul class="navbar-nav ml-auto mt-10">
                                <li class="nav-item">
                                    <a class="nav-link login-button" href="login.php">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white add-button" href="./register.php"><i class="fa fa-plus-circle"></i>สมัครสมาชิก</a>

                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border">
                        <h3 class="bg-gray p-4">Login Now</h3>
                        <form action="#">
                            <fieldset class="p-4">
                                <input type="text" placeholder="Username" class="border p-3 w-100 my-2">
                                <input type="password" placeholder="Password" class="border p-3 w-100 my-2">
                                <div class="loggedin-forgot">
                                    <input type="checkbox" id="keep-me-logged-in">
                                    <label for="keep-me-logged-in" class="pt-3 pb-2">Keep me logged in</label>
                                </div>
                                <button type="submit" class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Log in</button>
                                <a class="mt-3 d-block  text-primary" href="#">Forget Password?</a>
                                <a class="mt-3 d-inline-block text-primary" href="register.php">Register Now</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!--============================
=            Footer            =
=============================-->




    <!-- JAVASCRIPTS -->
    <script src="../script/plugins/jQuery/jquery.min.js"></script>
    <script src="../script/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../script/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../script/plugins/bootstrap/js/bootstrap-slider.js"></script>
    <!-- tether js -->
    <script src="../script/plugins/tether/js/tether.min.js"></script>
    <script src="../script/plugins/raty/jquery.raty-fa.js"></script>
    <script src="../script/plugins/slick-carousel/slick/slick.min.js"></script>
    <script src="../script/plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="../script/plugins/fancybox/jquery.fancybox.pack.js"></script>
    <script src="../script/plugins/smoothscroll/SmoothScroll.min.js"></script>
    <!-- google map -->
    <script src="../script/https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
    <script src="../script/plugins/google-map/gmap.js"></script>
    <script src="../script/js/script.js"></script>

</body>

</html>