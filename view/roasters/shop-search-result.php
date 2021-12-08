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
    <title>Search result | Metronic Shop UI</title>

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
    <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->

<body class="ecommerce">

    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="">Store</a></li>
                <li class="active">Search result</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-5">
                    <div class="sidebar-filter margin-bottom-25">
                        <h2>ค้นหาหมวดหมู่</h2>
                        <h3>มีจำหน่าย</h3>
                        <div class="checkbox-list">
                            <label><input type="checkbox"> Not Available (3)</label>
                            <label><input type="checkbox"> In Stock (26)</label>
                        </div>

                        <h3>Price</h3>
                        <p>
                            <label for="amount">Range:</label> &nbsp;&nbsp;
                            ค้นหาจาก 0 - <span id="sliderStatusMin">200</span>
                            <br/> 
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
                        <!-- <div id="slider-range"></div> -->
                    </div>

                    <div class="sidebar-products clearfix">
                        <h2>ขายดี</h2>
                        <div class="item">
                            <a href="shop-item.html"><img src="../../script/assets/pages/img/products/k1.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                            <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>
                            <div class="price">$31.00</div>
                        </div>
                        <div class="item">
                            <a href="shop-item.html"><img src="../../script/assets/pages/img/products/k4.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                            <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>
                            <div class="price">$23.00</div>
                        </div>
                        <div class="item">
                            <a href="shop-item.html"><img src="../../script/assets/pages/img/products/k3.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                            <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>
                            <div class="price">$86.00</div>
                        </div>
                    </div>
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-7">
                    <div class="content-search margin-bottom-20">
                        <div class="row">
                            <div class="col-md-6">
                                <h1>ผลการค้นหา <em><?php if(isset($_GET['search'])) :  echo $_GET['search']; endif; ?></em></h1>
                            </div>
                            <div class="col-md-6">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" placeholder="ค้นหาอีกครั้ง" class="form-control">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit">ค้นหา</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                                <label class="control-label">จัดเรียง:</label>
                                <select class="form-control input-sm">
                                    <option value="#?sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>
                                    <option value="#?sort=pd.name&amp;order=ASC">Name (A - Z)</option>
                                    <option value="#?sort=pd.name&amp;order=DESC">Name (Z - A)</option>
                                    <option value="#?sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>
                                    <option value="#?sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>
                                    <option value="#?sort=rating&amp;order=DESC">Rating (Highest)</option>
                                    <option value="#?sort=rating&amp;order=ASC">Rating (Lowest)</option>
                                    <option value="#?sort=p.model&amp;order=ASC">Model (A - Z)</option>
                                    <option value="#?sort=p.model&amp;order=DESC">Model (Z - A)</option>
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
                                    <img src="../../script/assets/pages/img/products/model1.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/assets/pages/img/products/model1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <!-- PRODUCT ITEM END -->
                        <!-- PRODUCT ITEM START -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="../../script/assets/pages/img/products/model2.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/assets/pages/img/products/model2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <!-- PRODUCT ITEM END -->
                        <!-- PRODUCT ITEM START -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="../../script/assets/pages/img/products/model6.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/assets/pages/img/products/model6.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress 2</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <!-- PRODUCT ITEM END -->
                    </div>
                    <div class="row product-list">
                        <!-- PRODUCT ITEM START -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="../../script/assets/pages/img/products/model4.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/assets/pages/img/products/model4.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <!-- PRODUCT ITEM END -->
                        <!-- PRODUCT ITEM START -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="../../script/assets/pages/img/products/model5.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/assets/pages/img/products/model5.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                                <div class="sticker sticker-new"></div>
                            </div>
                        </div>
                        <!-- PRODUCT ITEM END -->
                        <!-- PRODUCT ITEM START -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="../../script/assets/pages/img/products/model3.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/assets/pages/img/products/model3.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <!-- PRODUCT ITEM END -->
                    </div>
                    <div class="row product-list">
                        <!-- PRODUCT ITEM START -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="../../script/assets/pages/img/products/model7.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/assets/pages/img/products/model7.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <!-- PRODUCT ITEM END -->
                        <!-- PRODUCT ITEM START -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="../../script/assets/pages/img/products/model1.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/assets/pages/img/products/model1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </div>
                        <!-- PRODUCT ITEM END -->
                        <!-- PRODUCT ITEM START -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="../../script/assets/pages/img/products/model2.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/assets/pages/img/products/model2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                                <div class="sticker sticker-sale"></div>
                            </div>
                        </div>
                        <!-- PRODUCT ITEM END -->
                    </div>
                    <!-- END PRODUCT LIST -->
                    <!-- BEGIN PAGINATOR -->
                    <div class="row">
                        <div class="col-md-4 col-sm-4 items-info">Items 1 to 9 of 10 total</div>
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

    <!-- BEGIN BRANDS -->
    <div class="brands">
        <div class="container">
            <div class="owl-carousel owl-carousel6-brands">
                <a href="shop-product-list.html"><img src="../../script/assets/pages/img/brands/canon.jpg" alt="canon" title="canon"></a>
                <a href="shop-product-list.html"><img src="../../script/assets/pages/img/brands/esprit.jpg" alt="esprit" title="esprit"></a>
                <a href="shop-product-list.html"><img src="../../script/assets/pages/img/brands/gap.jpg" alt="gap" title="gap"></a>
                <a href="shop-product-list.html"><img src="../../script/assets/pages/img/brands/next.jpg" alt="next" title="next"></a>
                <a href="shop-product-list.html"><img src="../../script/assets/pages/img/brands/puma.jpg" alt="puma" title="puma"></a>
                <a href="shop-product-list.html"><img src="../../script/assets/pages/img/brands/zara.jpg" alt="zara" title="zara"></a>
                <a href="shop-product-list.html"><img src="../../script/assets/pages/img/brands/canon.jpg" alt="canon" title="canon"></a>
                <a href="shop-product-list.html"><img src="../../script/assets/pages/img/brands/esprit.jpg" alt="esprit" title="esprit"></a>
                <a href="shop-product-list.html"><img src="../../script/assets/pages/img/brands/gap.jpg" alt="gap" title="gap"></a>
                <a href="shop-product-list.html"><img src="../../script/assets/pages/img/brands/next.jpg" alt="next" title="next"></a>
                <a href="shop-product-list.html"><img src="../../script/assets/pages/img/brands/puma.jpg" alt="puma" title="puma"></a>
                <a href="shop-product-list.html"><img src="../../script/assets/pages/img/brands/zara.jpg" alt="zara" title="zara"></a>
            </div>
        </div>
    </div>

    <?php
    include_once("./footer.php");
    ?>
    <!-- END BRANDS -->
</body>
<!-- END BODY -->

</html>