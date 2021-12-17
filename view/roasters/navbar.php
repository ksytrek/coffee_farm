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
include('../../config/connectdb.php');
session_start();
$id_roasters = null;
if (isset($_SESSION['user_id']) && $_SESSION['key'] == 'roasters') {
    $id_roasters = $_SESSION['user_id'];
}

?>
<script>
    const ID_ROASTERS = '<?php echo $id_roasters; ?>';
    // alert(ID_ROASTERS);
</script>

<head>
    <meta charset="utf-8">
    <!-- <title>Metronic Shop UI</title> -->

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

    <!-- Fonts START -->
    <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"> -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,300;0,400;1,200;1,300&family=Maitree:wght@300&display=swap" rel="stylesheet"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,300;0,400;1,200;1,300&family=Maitree:wght@300;400;500;600;700&display=swap" rel="stylesheet">


    <!--- fonts for slider on the index page -->
    <!-- Fonts END -->
    <style type="text/css">
        /* .ecommerce{
            font-family: 'Kodchasan', sans-serif;
            font-family: 'Maitree', serif;
        } */
    </style>

    <!-- Global styles START -->
    <link href="../../script/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../script/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
    <link href="../../script/assets/pages/css/animate.css" rel="stylesheet">
    <link href="../../script/assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <link href="../../script/assets/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
    <!-- Page level plugin styles END -->

    <!-- Theme styles START -->
    <link href="../../script/assets/pages/css/components.css" rel="stylesheet">
    <link href="../../script/assets/pages/css/slider.css" rel="stylesheet">
    <link href="../../script/assets/pages/css/style-shop.css" rel="stylesheet" type="text/css">
    <link href="../../script/assets/corporate/css/style.css" rel="stylesheet">
    <link href="../../script/assets/corporate/css/style-responsive.css" rel="stylesheet">
    <link href="../../script/assets/corporate/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="../../script/assets/corporate/css/custom.css" rel="stylesheet">
    <!-- Theme styles END -->

    <!-- Script -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- v1.11.2  -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <!-- <script src="../../script/assets/plugins/jquery.min.js" type="text/javascript"></script> -->
    <!-- <script src="../../script/assets/plugins/jquery.minGGG.js" type="text/javascript"></script> -->
    <script src="../../script/assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="../../script/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="../../script/assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>

    <script src="../../script/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>

    <script src="../../script/assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="../../script/assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
    <script src='../../script/assets/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->


    <script src="../../script/assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->

    <script src="../../script/assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script src="../../script/assets/pages/scripts/bs-carousel.js" type="text/javascript"></script>

    <script>
        //  COOKie function 
        function createCookie(name, value, days = 1) { // date /1 วัน
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));

                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + value + expires + "; path=/";
        }

        function readCookie(name) {
            var name1 = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1, c.length);
                }
                if (c.indexOf(name1) == 0) {
                    return c.substring(name1.length, c.length);
                }
            }
            return null;
        }

        function removeCookie(name) {
            createCookie(name, "", -1);
        }

        let THB = Intl.NumberFormat("th-TH", {
            style: "currency",
            currency: "THB",
        });
    </script>

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

    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <!-- <li><i class="fa fa-phone"></i><span>+1 456 6717</span></li> -->
                        <!-- BEGIN CURRENCIES -->


                        <!-- <li class="shop-currencies">
                            <a href="javascript:void(0);">€</a>
                            <a href="javascript:void(0);">£</a>
                            <a href="javascript:void(0);" class="current">$</a>
                        </li> -->

                        <!-- END CURRENCIES -->
                        <!-- BEGIN LANGS -->

                        <!-- เลือกภาษาใช้เเสดง -->
                        <!-- <li class="langs-block">
                            <a href="javascript:void(0);" class="current">English </a>
                            <div class="langs-block-others-wrapper">
                                <div class="langs-block-others">
                                    <a href="javascript:void(0);">French</a>
                                    <a href="javascript:void(0);">Germany</a>
                                    <a href="javascript:void(0);">Turkish</a>
                                </div>
                            </div>
                        </li> -->

                        <!-- END LANGS -->
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                        <?php
                        if (!isset($id_roasters)) :
                        ?>
                            <li><a href="../roasters/login/">Sign In</a></li>
                            <li><a href="../roasters/register/">Sign UP</a></li>
                        <?php elseif (isset($id_roasters)) : ?>
                            <li><a href="shop-account.html">บัญชีของฉัน</a></li>
                            <!-- <li><a href="shop-wishlist.html">รายการโปรดของฉัน</a></li> -->
                            <li><a href="./shop-shopping-cart.php">ตะกร้าสินค้า</a></li>
                            <li><a href="./controllers/logout.php">Log Out</a></li>

                        <?php endif; ?>
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>
    </div>
    <!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
    <div class="header">
        <div class="container">
            <a class="site-logo" href="./shop-product-list.php"><img src="../../script/assets/img/logos/1.png" width="128px" height="40px" alt="Metronic Shop UI"></a>
            <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
            <!-- BEGIN CART -->
            <div class="top-cart-block">
                <div class="top-cart-info">
                    <a id="sum_product" href="javascript:update_product();" class="top-cart-info-count"><span id="sum_item"> </span> สินค้า</a>
                    <a href="javascript:void(0);" class="top-cart-info-value"><span id="sum_product_price"></span></a>
                    <script>
                        function update_product() {
                            // var product = json.parse(readCookie('product'));
                            const json = readCookie('product');
                            const product = JSON.parse(json);
                            var sum_item = product.length;
                            $("#sum_item").html(sum_item);
                            console.log(product.length);

                            var str = "";
                            var munny = 0;
                            product.forEach(function(value, i) {
                                str += '<li>' +
                                    '<a href="shop-item.php"><img src="../../pictures/product/' + value.image_pro + '" alt="Rolex Classic Watch" width="37" height="34"></a> ' +
                                    '<span class="cart-content-count">x ' + value.num_item + '</span>' +
                                    '<strong><a href="shop-item.php">' + value.name_products + '</a></strong>' +
                                    '<em>' + THB.format(value.price_unit) + '</em>' +
                                    '<a href="javascript:del_items(' + i + ');" class="del-goods">&nbsp;</a>' +
                                    ' </li>';
                                munny += (value.price_unit * value.num_item);
                            });
                            $("#cart_list_product").html(str);
                            $("#sum_product_price").html(THB.format(munny));
                        }

                        function del_items(index) {

                            const json = readCookie('product');
                            const product = JSON.parse(json);

                            product.splice(index, 1);

                            createCookie("product", JSON.stringify(product));

                            update_product();
                        }

                        $(document).ready(function() {
                            update_product();
                        });
                        // $("#sum_product").click(function() {
                        //     var htmlString = $(this).html();
                        //     // $(this).text(htmlString);
                        //     alert(htmlString);
                        // });
                    </script>

                </div>
                <i class="fa fa-shopping-cart"></i>

                <div class="top-cart-content-wrapper">
                    <div class="top-cart-content">
                        <ul id="cart_list_product" class="scroller" style="height: 250px;">
                            <!-- <li>
                                <a href="shop-item.php"><img src="../../script/assets/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                                <span class="cart-content-count">x 1</span>
                                <strong><a href="shop-item.php">Rolex Classic Watch</a></strong>
                                <em>$1230</em>
                                <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                            </li> -->
                        </ul>


                        <div class="text-right">
                            <a href="shop-shopping-cart.php" class="btn btn-default">ตะกร้าสินค้า</a>
                            <!-- <a href="shop-checkout.php" class="btn btn-primary">Checkout</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!--END CART -->

            <!-- BEGIN NAVIGATION -->
            <div class="header-navigation">
                <ul>
                    <!-- active -->
                    <li><a href="./shop-product-list.php">รายการสินค้า</a></li>

                    <!-- <li class="dropdown "> 
                        <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:void(0);">
                            หน้าหลัก
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="shop-index.html">Home Default</a></li>
                            <li class="active"><a href="shop-index-header-fix.html">Home Header Fixed</a></li>
                            <li><a href="shop-index-light-footer.html">Home Light Footer</a></li>
                            <li><a href="shop-product-list.html">Product List</a></li>
                            <li><a href="shop-search-result.html">Search Result</a></li>
                            <li><a href="shop-item.php">Product Page</a></li>
                            <li><a href="shop-shopping-cart-null.html">Shopping Cart (Null Cart)</a></li>
                            <li><a href="shop-shopping-cart.html">Shopping Cart</a></li>
                            <li><a href="shop-checkout.html">Checkout</a></li>
                            <li><a href="shop-about.html">About</a></li>
                            <li><a href="shop-contacts.html">Contacts</a></li>
                            <li><a href="shop-account.html">My account</a></li>
                            <li><a href="shop-wishlist.html">My Wish List</a></li>
                            <li><a href="shop-goods-compare.html">Product Comparison</a></li>
                            <li><a href="shop-standart-forms.html">Standart Forms</a></li>
                            <li><a href="shop-faq.html">FAQ</a></li>
                            <li><a href="shop-privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="shop-terms-conditions-page.html">Terms &amp; Conditions</a></li>
                        </ul>
                    </li> -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                            สายพันธุ์เมล็ดกาแฟ
                        </a>
                        <!-- BEGIN DROPDOWN MENU -->
                        <ul class="dropdown-menu">
                            <!-- <li class="dropdown-submenu">
                                <a href="shop-product-list.html">Hi Tops <i class="fa fa-angle-right"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="shop-product-list.html">Second Level Link</a></li>
                                    <li><a href="shop-product-list.html">Second Level Link</a></li>
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                                            Second Level Link
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="shop-product-list.html">Third Level Link</a></li>
                                            <li><a href="shop-product-list.html">Third Level Link</a></li>
                                            <li><a href="shop-product-list.html">Third Level Link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li> -->
                            <?php
                            foreach (Database::query("SELECT * FROM `typepro`", PDO::FETCH_ASSOC) as $row) :
                            ?>
                                <li><a href="./shop-search-result.php?search=<?php echo $row['name_typepro'] ?>"><?php echo $row['name_typepro'] ?></a></li>
                                <!-- <li><a href="shop-product-list.html">Jackets and Coats</a></li> -->
                            <?php
                            endforeach;
                            ?>
                        </ul>
                        <!-- END DROPDOWN MENU -->
                    </li>
                    <!-- <li class="dropdown dropdown-megamenu">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                            ประเภทกาแฟ
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="header-navigation-content">
                                    <div class="row">
                                        <div class="col-md-4 header-navigation-col">
                                            <h4>Footwear</h4>
                                            <ul>
                                                <li><a href="shop-product-list.html">Astro Trainers</a></li>
                                                <li><a href="shop-product-list.html">Basketball Shoes</a></li>
                                                <li><a href="shop-product-list.html">Boots</a></li>
                                                <li><a href="shop-product-list.html">Canvas Shoes</a></li>
                                                <li><a href="shop-product-list.html">Football Boots</a></li>
                                                <li><a href="shop-product-list.html">Golf Shoes</a></li>
                                                <li><a href="shop-product-list.html">Hi Tops</a></li>
                                                <li><a href="shop-product-list.html">Indoor and Court Trainers</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 header-navigation-col">
                                            <h4>Clothing</h4>
                                            <ul>
                                                <li><a href="shop-product-list.html">Base Layer</a></li>
                                                <li><a href="shop-product-list.html">Character</a></li>
                                                <li><a href="shop-product-list.html">Chinos</a></li>
                                                <li><a href="shop-product-list.html">Combats</a></li>
                                                <li><a href="shop-product-list.html">Cricket Clothing</a></li>
                                                <li><a href="shop-product-list.html">Fleeces</a></li>
                                                <li><a href="shop-product-list.html">Gilets</a></li>
                                                <li><a href="shop-product-list.html">Golf Tops</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 header-navigation-col">
                                            <h4>Accessories</h4>
                                            <ul>
                                                <li><a href="shop-product-list.html">Belts</a></li>
                                                <li><a href="shop-product-list.html">Caps</a></li>
                                                <li><a href="shop-product-list.html">Gloves, Hats and Scarves</a></li>
                                            </ul>

                                            <h4>Clearance</h4>
                                            <ul>
                                                <li><a href="shop-product-list.html">Jackets</a></li>
                                                <li><a href="shop-product-list.html">Bottoms</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-12 nav-brands">
                                            <ul>
                                                <li><a href="shop-product-list.html"><img title="esprit" alt="esprit" src="../../script/assets/pages/img/brands/esprit.jpg"></a></li>
                                                <li><a href="shop-product-list.html"><img title="gap" alt="gap" src="../../script/assets/pages/img/brands/gap.jpg"></a></li>
                                                <li><a href="shop-product-list.html"><img title="next" alt="next" src="../../script/assets/pages/img/brands/next.jpg"></a></li>
                                                <li><a href="shop-product-list.html"><img title="puma" alt="puma" src="../../script/assets/pages/img/brands/puma.jpg"></a></li>
                                                <li><a href="shop-product-list.html"><img title="zara" alt="zara" src="../../script/assets/pages/img/brands/zara.jpg"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li><a href="shop-item.php">Kids</a></li> -->
                    <!-- <li><a href="shop-product-list.php">รายการสินค้า</a></li> -->
                    <li class="dropdown dropdown100 nav-catalogue">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:void(0);">
                            สินค้าใหม่
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="header-navigation-content">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <div class="product-item">
                                                <div class="pi-img-wrapper">
                                                    <a href="shop-item.php"><img src="../../script/pictures/3.jpeg"" class=" img-responsive" alt="Berry Lace Dress"></a>
                                                </div>
                                                <h3><a href="shop-item.php">กาแฟโลโกกาญจนบุรี</a></h3>
                                                <div class="pi-price">฿29.00</div>
                                                <a href="javascript:void(0);" class="btn btn-default add2cart">เพิ่มสินค้า</a>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <div class="product-item">
                                                <div class="pi-img-wrapper">
                                                    <a href="shop-item.php"><img src="../../script/pictures/3.jpeg" class="img-responsive" alt="Berry Lace Dress"></a>
                                                </div>
                                                <h3><a href="shop-item.php">กาแฟโลโกกาญจนบุรี</a></h3>
                                                <div class="pi-price">฿29.00</div>
                                                <a href="javascript:void(0);" class="btn btn-default add2cart">เพิ่มสินค้า</a>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <div class="product-item">
                                                <div class="pi-img-wrapper">
                                                    <a href="shop-item.php"><img src="../../script/pictures/3.jpeg"" class=" img-responsive" alt="กาแฟโลโกกาญจนบุรี"></a>
                                                </div>
                                                <h3><a href="shop-item.php">กาแฟโลโกกาญจนบุรี</a></h3>
                                                <div class="pi-price">฿29.00</div>
                                                <a href="javascript:void(0);" class="btn btn-default add2cart">เพิ่มสินค้า</a>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <div class="product-item">
                                                <div class="pi-img-wrapper">
                                                    <a href="shop-item.php"><img src="../../script/pictures/3.jpeg"" class=" img-responsive" alt="กาแฟโลโกกาญจนบุรี"></a>
                                                </div>
                                                <h3><a href="shop-item.php">กาแฟโลโกกาญจนบุรี</a></h3>
                                                <div class="pi-price">฿29.00</div>
                                                <a href="javascript:void(0);" class="btn btn-default add2cart">เพิ่มสินค้า</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li><a href="./shop-product-list.php">ที่ตั้งฟาร์ม</a></li>
                    <!-- BEGIN TOP SEARCH -->
                    <li class="menu-search">
                        <span class="sep"></span>
                        <i class="fa fa-search search-btn"></i>
                        <div class="search-box">
                            <form action="javascript:search()">
                                <div class="input-group">
                                    <input type="text" placeholder="Search" class="form-control input-search">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </span>
                                </div>
                            </form>

                            <script>
                                function search() {
                                    // alert( );
                                    var search_text = $('.input-search').val();
                                    if (search_text == '') {
                                        location.assign('./shop-search-result.php');
                                    } else {
                                        location.assign('./shop-search-result.php?search=' + search_text);
                                    }
                                }
                            </script>
                        </div>
                    </li>
                    <!-- END TOP SEARCH -->
                </ul>
            </div>
            <!-- END NAVIGATION -->
        </div>
    </div>
    <!-- Header END -->





</body>

<!-- END BODY -->

</html>