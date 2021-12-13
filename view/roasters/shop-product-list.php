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
<?php
include_once('./navbar.php');
?>
<!-- Head BEGIN -->

<head>
    <meta charset="utf-8">
    <title>หน้าหลัก</title>

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




    <!-- <div class="title-wrapper">
        <div class="container">
            <div class="container-inner">
                <h1><span>MEN</span> CATEGORY</h1>
                <em>Over 4000 Items are available here</em>
            </div>
        </div>
    </div> -->

    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="./shop-product-list.php">Home</a></li>
                <!-- <li><a href="">Store</a></li> -->
                <!-- <li class="active">Men category</li> -->
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-5">
                    <ul class="list-group margin-bottom-25 sidebar-menu">
                        <?php
                        foreach (Database::query("SELECT * FROM `typepro`", PDO::FETCH_ASSOC) as $row) :
                        ?>
                            <li class="list-group-item clearfix"><a href="./shop-product-list.php?type=<?php echo $row['name_typepro'] ?>">&nbsp;<i class="fa fa-angle-right"></i><?php echo $row['name_typepro'] ?></a></li>
                        <?php endforeach; ?>
                        <!-- <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Ladies</a></li>
                        <li class="list-group-item clearfix dropdown active">
                            <a href="javascript:void(0);" class="collapsed">
                                <i class="fa fa-angle-right"></i>
                                Mens

                            </a>
                            <ul class="dropdown-menu" style="display:block;">
                                <li class="list-group-item dropdown clearfix active">
                                    <a href="javascript:void(0);" class="collapsed"><i class="fa fa-angle-right"></i> Shoes </a>
                                    <ul class="dropdown-menu" style="display:block;">
                                        <li class="list-group-item dropdown clearfix">
                                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Classic </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 1</a></li>
                                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 2</a></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item dropdown clearfix active">
                                            <a href="javascript:void(0);" class="collapsed"><i class="fa fa-angle-right"></i> Sport </a>
                                            <ul class="dropdown-menu" style="display:block;">
                                                <li class="active"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport 1</a></li>
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
                        </li> -->
                        <!-- <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Kids</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Accessories</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sports</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Brands</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Electronics</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Home & Garden</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Custom Link</a></li> -->
                    </ul>

                    <div class="sidebar-filter margin-bottom-25">
                        <h2>กรอง</h2>
                        <!-- <h3>Availability</h3>
                        <div class="checkbox-list">
                            <label><input type="checkbox"> Not Available (3)</label>
                            <label><input type="checkbox"> In Stock (26)</label>
                        </div> -->

                        <h3>ราคา</h3>
                        <p>
                            <label for="amount">ช่วงราคา:</label> &nbsp;&nbsp;
                            ค้นหาจาก 0 - <span id="sliderStatusMin">200</span>
                            <br />
                            <input type="range" id="amount" min="0" max="200" value="200" style="border:0; color:#f6931f; font-weight:bold;" onChange="sliderChange(this.value)">

                        </p>
                        <script>
                            function sliderChange(val) {

                                document.getElementById('sliderStatusMin').innerHTML = val;

                                function displayItem(val) {
                                    // $('.item').filter(function() {
                                    //     var price = $(this).data('price');
                                    //     if (price < val) {
                                    //         return price;
                                    //     }

                                    // }).hide();

                                    // $('.item').filter(function() {
                                    //     var price = $(this).data('price');
                                    //     if (price > val) {
                                    //         return price;
                                    //     }

                                    // }).show();
                                }

                                displayItem(val);
                            }
                        </script>
                        <div id="slider-range"></div>
                    </div>

                    <!-- <div class="sidebar-products clearfix">
                        <h2>Bestsellers</h2>
                        <div class="item">
                            <a href="shop-item.php"><img src="../../script/assets/pages/img/products/k1.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                            <h3><a href="shop-item.php">Some Shoes in Animal with Cut Out</a></h3>
                            <div class="price">$31.00</div>
                        </div>
                        <div class="item">
                            <a href="shop-item.php"><img src="../../script/assets/pages/img/products/k4.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                            <h3><a href="shop-item.php">Some Shoes in Animal with Cut Out</a></h3>
                            <div class="price">$23.00</div>
                        </div>
                        <div class="item">
                            <a href="shop-item.php"><img src="../../script/assets/pages/img/products/k3.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                            <h3><a href="shop-item.php">Some Shoes in Animal with Cut Out</a></h3>
                            <div class="price">$86.00</div>
                        </div>
                    </div> -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-7">
                    <div class="row list-view-sorting clearfix">
                        <div class="col-md-2 col-sm-2 list-view">
                            <a href="javascript:;"><i class="fa fa-th-large"></i></a>
                            <a href="javascript:;"><i class="fa fa-th-list"></i></a>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="pull-right">
                                <label class="control-label">แสดง:</label>
                                <select class="form-control input-sm">
                                    <option value="#?limit=24" selected="selected">24</option>
                                    <option value="#?limit=25">25</option>
                                    <option value="#?limit=50">50</option>
                                    <option value="#?limit=75">75</option>
                                    <option value="#?limit=100">100</option>
                                </select>
                            </div>
                            <div class="pull-right">
                                <label class="control-label">จัดเรียง&nbsp;โดย:</label>
                                <select class="form-control input-sm">
                                    <option value="#?sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>
                                    <option value="#?sort=pd.name&amp;order=ASC">ชื่อ (A - Z)</option>
                                    <option value="#?sort=pd.name&amp;order=DESC">ชื่อ (Z - A)</option>
                                    <option value="#?sort=p.price&amp;order=ASC">ราคา (ต่ำ &gt; สูง)</option>
                                    <option value="#?sort=p.price&amp;order=DESC">ราคา (สูง &gt; ต่ำ)</option>
                                    <!-- <option value="#?sort=rating&amp;order=DESC">Rating (Highest)</option>
                                    <option value="#?sort=rating&amp;order=ASC">Rating (Lowest)</option> -->
                                    <!-- <option value="#?sort=p.model&amp;order=ASC">Model (A - Z)</option>
                                    <option value="#?sort=p.model&amp;order=DESC">Model (Z - A)</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- BEGIN PRODUCT LIST -->
                    <div class="row product-list">
                        <!-- PRODUCT ITEM START -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="../../script/pictures/6.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/pictures/6.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.php">กาแฟโลโกกาญจนบุรี</a></h3>
                                <div class="pi-price">฿29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">เพิ่มสินค้า</a>
                            </div>
                        </div>
                        <!-- PRODUCT ITEM END -->
                        <!-- PRODUCT ITEM START -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="../../script/pictures/2.jpeg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/pictures/2.jpeg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.php">กาแฟโลโกกาญจนบุรี</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">เพิ่มสินค้า</a>
                            </div>
                        </div>
                        <!-- PRODUCT ITEM END -->
                        <!-- PRODUCT ITEM START -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="../../script/pictures/8.jpeg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/pictures/8.jpeg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.php">กาแฟโลโกกาญจนบุรี</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">เพิ่มสินค้า</a>
                            </div>
                        </div>
                        <!-- PRODUCT ITEM END -->
                    </div>
                    <div class="row product-list">
                        <!-- PRODUCT ITEM START -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="../../script/pictures/6.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/pictures/6.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.php">กาแฟโลโกกาญจนบุรี</a></h3>
                                <div class="pi-price">฿29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">เพิ่มสินค้า</a>
                            </div>
                        </div>
                        <!-- PRODUCT ITEM END -->
                        <!-- PRODUCT ITEM START -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="../../script/pictures/2.jpeg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/pictures/2.jpeg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="./shop-item.php">กาแฟโลโกกาญจนบุรี</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">เพิ่มสินค้า</a>
                            </div>
                        </div>
                        <!-- PRODUCT ITEM END -->
                        <!-- PRODUCT ITEM START -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="../../script/pictures/8.jpeg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/pictures/8.jpeg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.php">กาแฟโลโกกาญจนบุรี</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">เพิ่มสินค้า</a>
                            </div>
                        </div>
                        <!-- PRODUCT ITEM END -->
                    </div>
                    <div class="row product-list">
                        <!-- PRODUCT ITEM START -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="../../script/pictures/6.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/pictures/6.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.php">กาแฟโลโกกาญจนบุรี</a></h3>
                                <div class="pi-price">฿29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">เพิ่มสินค้า</a>
                            </div>
                        </div>
                        <!-- PRODUCT ITEM END -->
                        <!-- PRODUCT ITEM START -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="../../script/pictures/2.jpeg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/pictures/2.jpeg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.php">กาแฟโลโกกาญจนบุรี</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">เพิ่มสินค้า</a>
                            </div>
                        </div>
                        <!-- PRODUCT ITEM END -->
                        <!-- PRODUCT ITEM START -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="../../script/pictures/8.jpeg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/pictures/8.jpeg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.php">กาแฟโลโกกาญจนบุรี</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">เพิ่มสินค้า</a>
                            </div>
                        </div>
                        <!-- PRODUCT ITEM END -->
                    </div>
                    <!-- END PRODUCT LIST -->
                    <!-- BEGIN PAGINATOR -->
                    <div class="row">
                        <div class="col-md-4 col-sm-4 items-info">รายการที่ 1 ถึง 9 of 10 รายการ</div>
                        <div class="col-md-8 col-sm-8">
                            <ul class="pagination pull-right">
                                <li><a href="javascript:;">&laquo;</a></li>
                                <li><a href="javascript:;">1</a></li>
                                <li><span>2</span></li>
                                <li><a href="javascript:;">3</a></li>
                                <li><a href="javascript:;">4</a></li>
                                <li><a href="javascript:;">5</a></li>
                                <li><a href="javascript:;">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END PAGINATOR -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>

    <div id="product-pop-up" style="display: none; width: 700px;">
        <div class="product-page product-pop-up">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                    <div class="product-main-image">
                        <img src="../../script/pictures/6.jpg" alt="Cool green dress with red bell" class="img-responsive">
                    </div>
                    <!-- <div class="product-other-images"> -->
                        <!-- <a href="javascript:;" class="active"><img alt="กาแฟโลโกกาญจนบุรี" src="../../script/assets/pages/img/products/model3.jpg"></a>
                        <a href="javascript:;"><img alt="กาแฟโลโกกาญจนบุรี" src="../../script/assets/pages/img/products/model4.jpg"></a>
                        <a href="javascript:;"><img alt="Berry Lace Dress" src="../../script/assets/pages/img/products/model5.jpg"></a> -->
                    <!-- </div> -->
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                    <h1>ชื่อรายการสินค้า</h1>
                    <div class="price-availability-block clearfix">
                        <div class="price">
                            <strong><span>&#3647;</span>47.00</strong>
                            <!-- <em>&#3647;<span>62.00</span></em> -->
                        </div>
                        <!-- <div class="availability">
                            Availability: <strong>In Stock</strong>
                        </div> -->
                    </div>
                    <div class="description">
                        <p>รายละเอียดของรายการสินค้า</p>
                    </div>
                    <!-- <div class="product-page-options">
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
                    </div> -->
                    <div class="product-page-cart">
                        <div class="product-quantity">
                            <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                        </div>
                        <button class="btn btn-primary" type="submit">เพิ่มสินค้า</button>
                        <a href="shop-item.php" class="btn btn-default">รายละเอียด</a>
                    </div>
                </div>

                <!-- <div class="sticker sticker-sale"></div> -->
            </div>
        </div>
    </div>
    <!-- END fa

    <?php
    include_once("./footer.php");
    ?>
</body>
<!-- END BODY -->

</html>