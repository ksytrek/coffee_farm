<!DOCTYPE html>
<!--
Template: Metronic Frontend Freebie - Responsive HTML Template Based On Twitter Bootstrap 3.3.4
Version: 1.0.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase Premium Metronic Admin Theme: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<?php
include_once('./navbar.php');

?>

<head>
    <meta charset="utf-8">
    <title>Metronic Shop UI</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta content="Metronic Shop UI description" name="description">
    <meta content="Metronic Shop UI keywords" name="keywords">
    <meta content="keenthemes" name="author">

    <meta property="og:site_name" content="-CUSTOMER VALUE-">
    <meta property="og:title" content="-CUSTOMER VALUE-">
    <meta property="og:description" content="-CUSTOMER VALUE-">
    <meta property="og:type" content="website">
    <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
    <meta property="og:url" content="-CUSTOMER VALUE-">

</head>
<!-- Head END -->

<!-- Body BEGIN -->

<body class="ecommerce">
    <!-- BEGIN STYLE CUSTOMIZER -->
    <!-- <div class="color-panel hidden-sm">
        <div class="color-mode-icons icon-color"></div>
        <div class="color-mode-icons icon-color-close"></div>
        <div class="color-mode">
            <p>THEME COLOR</p>
            <ul class="inline">
                <li class="color-red current color-default" data-style="red"></li>
                <li class="color-blue" data-style="blue"></li>
                <li class="color-green" data-style="green"></li>
                <li class="color-orange" data-style="orange"></li>
                <li class="color-gray" data-style="gray"></li>
                <li class="color-turquoise" data-style="turquoise"></li>
            </ul>
        </div>
    </div> -->
    <!-- END BEGIN STYLE CUSTOMIZER -->

    <!-- BEGIN SLIDER -->
    <!-- สไลด์ -->
    <div class="page-slider margin-bottom-35">
        <div id="carousel-example-generic" class="carousel slide carousel-slider">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <!-- First slide -->
                <div class="item carousel-item-four active">
                    <div class="container">
                        <div class="carousel-position-four text-center">
                            <h2 class="margin-bottom-20 animate-delay carousel-title-v3 border-bottom-title text-uppercase" data-animation="animated fadeInDown">
                                Tones of <br /><span class="color-red-v2">Shop UI Features</span><br /> designed
                            </h2>
                            <p class="carousel-subtitle-v2" data-animation="animated fadeInUp">Lorem ipsum dolor sit amet constectetuer diam <br />
                                adipiscing elit euismod ut laoreet dolore.</p>
                        </div>
                    </div>
                </div>

                <!-- Second slide -->
                <div class="item carousel-item-five">
                    <div class="container">
                        <div class="carousel-position-four text-center">
                            <h2 class="animate-delay carousel-title-v4" data-animation="animated fadeInDown">
                                Unlimted
                            </h2>
                            <p class="carousel-subtitle-v2" data-animation="animated fadeInDown">
                                Layout Options
                            </p>
                            <p class="carousel-subtitle-v3 margin-bottom-30" data-animation="animated fadeInUp">
                                Fully Responsive
                            </p>
                            <a class="carousel-btn" href="#" data-animation="animated fadeInUp">See More Details</a>
                        </div>
                        <img class="carousel-position-five animate-delay hidden-sm hidden-xs" src="assets/pages/img/shop-slider/slide2/price.png" alt="Price" data-animation="animated zoomIn">
                    </div>
                </div>

                <!-- Third slide -->
                <div class="item carousel-item-six">
                    <div class="container">
                        <div class="carousel-position-four text-center">
                            <span class="carousel-subtitle-v3 margin-bottom-15" data-animation="animated fadeInDown">
                                Full Admin &amp; Frontend
                            </span>
                            <p class="carousel-subtitle-v4" data-animation="animated fadeInDown">
                                eCommerce UI
                            </p>
                            <p class="carousel-subtitle-v3" data-animation="animated fadeInDown">
                                Is Ready For Your Project
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Fourth slide -->
                <div class="item carousel-item-seven">
                    <div class="center-block">
                        <div class="center-block-wrap">
                            <div class="center-block-body">
                                <h2 class="carousel-title-v1 margin-bottom-20" data-animation="animated fadeInDown">
                                    The most <br />
                                    wanted bijouterie
                                </h2>
                                <a class="carousel-btn" href="#" data-animation="animated fadeInUp">But It Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control carousel-control-shop" href="#carousel-example-generic" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            <a class="right carousel-control carousel-control-shop" href="#carousel-example-generic" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <!-- END SLIDER -->

    <div class="main">
        <div class="container">
            <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SALE PRODUCT -->
                <div class="col-md-12 sale-product">
                    <h2>สินค้าใหม่ล่าสุด</h2>
                    <div class="owl-carousel owl-carousel5">
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/model1.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/model1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:void(0);" class="btn btn-default add2cart">Add to cart</a>
                                <div class="sticker sticker-sale"></div>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/model2.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/model2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress2</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/model6.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/model6.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress2</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/model4.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/model4.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="javascript:;">Berry Lace Dress4</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                                <div class="sticker sticker-new"></div>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/model5.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/model5.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress5</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/model3.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/model3.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress3</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/model7.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/model7.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress3</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SALE PRODUCT -->
            </div>
            <!-- END SALE PRODUCT & NEW ARRIVALS -->

            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40 ">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-4">
                    <ul class="list-group margin-bottom-25 sidebar-menu">
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Ladies</a></li>
                        <li class="list-group-item clearfix dropdown">
                            <a href="shop-product-list.html">
                                <i class="fa fa-angle-right"></i>
                                Mens

                            </a>
                            <ul class="dropdown-menu">
                                <li class="list-group-item dropdown clearfix">
                                    <a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Shoes </a>
                                    <ul class="dropdown-menu">
                                        <li class="list-group-item dropdown clearfix">
                                            <a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 1</a></li>
                                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 2</a></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item dropdown clearfix">
                                            <a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport 1</a></li>
                                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport 2</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Trainers</a></li>
                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Jeans</a></li>
                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Chinos</a></li>
                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> T-Shirts</a></li>
                            </ul>
                        </li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Kids</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Accessories</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sports</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Brands</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Electronics</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Home & Garden</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Custom Link</a></li>
                    </ul>
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-8">
                    <h2>Three items</h2>
                    <div class="owl-carousel owl-carousel3">
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                                <div class="sticker sticker-new"></div>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress2</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/k3.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/k3.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress3</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/k4.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/k4.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress4</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                                <div class="sticker sticker-sale"></div>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress5</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress6</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->

            <!-- BEGIN TWO PRODUCTS & PROMO -->
            <div class="row margin-bottom-35 ">
                <!-- BEGIN TWO PRODUCTS -->
                <div class="col-md-6 two-items-bottom-items">
                    <h2>Two items</h2>
                    <div class="owl-carousel owl-carousel2">
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/k4.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/k4.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/k3.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/k3.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/k4.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/k4.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets/pages/img/products/k3.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets/pages/img/products/k3.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END TWO PRODUCTS -->
                <!-- BEGIN PROMO -->
                <div class="col-md-6 shop-index-carousel">
                    <div class="content-slider">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="assets/pages/img/index-sliders/slide1.jpg" class="img-responsive" alt="Berry Lace Dress">
                                </div>
                                <div class="item">
                                    <img src="assets/pages/img/index-sliders/slide2.jpg" class="img-responsive" alt="Berry Lace Dress">
                                </div>
                                <div class="item">
                                    <img src="assets/pages/img/index-sliders/slide3.jpg" class="img-responsive" alt="Berry Lace Dress">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PROMO -->
            </div>
            <!-- END TWO PRODUCTS & PROMO -->
        </div>
    </div>


    <!-- BEGIN fast view of a product -->
    <!-- แสดง รายละเอียด  สินค้า -->
    <div id="product-pop-up" style="display: none; width: 700px;">
        <div class="product-page product-pop-up">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                    <div class="product-main-image">
                        <img src="assets/pages/img/products/model7.jpg" alt="Cool green dress with red bell" class="img-responsive">
                    </div>
                    <div class="product-other-images">
                        <a href="javascript:;" class="active"><img alt="Berry Lace Dress" src="assets/pages/img/products/model3.jpg"></a>
                        <a href="javascript:;"><img alt="Berry Lace Dress" src="assets/pages/img/products/model4.jpg"></a>
                        <a href="javascript:;"><img alt="Berry Lace Dress" src="assets/pages/img/products/model5.jpg"></a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                    <h2>Cool green dress with red bell</h2>
                    <div class="price-availability-block clearfix">
                        <div class="price">
                            <strong><span>$</span>47.00</strong>
                            <em>$<span>62.00</span></em>
                        </div>
                        <div class="availability">
                            Availability: <strong>In Stock</strong>
                        </div>
                    </div>
                    <div class="description">
                        <p>Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat
                            Nostrud duis molestie at dolore.</p>
                    </div>
                    <div class="product-page-options">
                        <div class="pull-left">
                            <label class="control-label">Size:</label>
                            <select class="form-control input-sm">
                                <option>L</option>
                                <option>M</option>
                                <option>XL</option>
                            </select>
                        </div>
                        <div class="pull-left">
                            <label class="control-label">Color:</label>
                            <select class="form-control input-sm">
                                <option>Red</option>
                                <option>Blue</option>
                                <option>Black</option>
                            </select>
                        </div>
                    </div>
                    <div class="product-page-cart">
                        <div class="product-quantity">
                            <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                        </div>
                        <button class="btn btn-primary" type="submit">Add to cart</button>
                        <a href="shop-item.html" class="btn btn-default">More details</a>
                    </div>
                </div>

                <div class="sticker sticker-sale"></div>
            </div>
        </div>
    </div>


    <?php 
        include_once("./footer.php");
    ?>
    <!-- END fast view of a product -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]-->
</body>
<!-- END BODY -->

</html>