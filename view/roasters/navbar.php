<!DOCTYPE html>

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
    const ID_ROASTERS = '<?php echo $id_roasters == null ? "null" : "$id_roasters"; ?>';
</script>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="../../script/assets/img/logos/Logo_n.png" type="image/x-icon">

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



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,300;0,400;1,200;1,300&family=Maitree:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
    <!-- 1.11.2 -->
    <script src="../../script/assets/plugins/jquery.min.js" type="text/javascript"></script>
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

    <?php
    include_once("../../script/assets/plugins/googleApi/mapApi.html")
    ?>

    <script>
        $(document).ready(function() {
            var product = [];
            if (readCookie('product') == null) {

                createCookie("product", JSON.stringify(product));

            }
        });
        //  COOKie function 
        function createCookie(name, value, days = 1) { // date /1 ?????????
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

        function GetFilename(url) {
            if (url) {
                var m = url.toString().match(/.*\/(.+?)\./);
                if (m && m.length > 1) {
                    return m[1];
                }
            }
            return "";
        }

        const queryString = window.location.search;
        const name_file = GetFilename(window.location.href);


        function add_product(id_products, id_farmers, price_unit, num_item, name_products, image_pro) {
            var product = [];
            var int_i = 0;
            var num_item_new = parseInt($("#" + num_item).val());

            // alert($("#"+num_item).val());

            product_new = {
                id_products: id_products,
                id_farmers: id_farmers,
                price_unit: price_unit,
                num_item: num_item_new,
                name_products: name_products,
                image_pro: image_pro
            };

            if (readCookie('product') == null) {
                createCookie("product", JSON.stringify(product));

                product.push(product_new);
                createCookie("product", JSON.stringify(product));
                update_product();

            } else {
                product = JSON.parse(readCookie('product')); // array type
                product.forEach(function(value, i) {
                    if (value.id_products == id_products) {
                        int_i += 1;
                        product[i].num_item += num_item_new;
                    }
                });

                if (int_i == 0) {

                    product.push(product_new);
                    createCookie("product", JSON.stringify(product));

                    update_product();
                } else {
                    createCookie("product", JSON.stringify(product));
                    update_product();
                }

            }
            $("#" + num_item).val(1);
        }
    </script>

</head>
<!-- Head END -->

<!-- Body BEGIN -->

<body class="ecommerce">

    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">

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
                            <li><a href="shop-account.php">?????????????????????????????????</a></li>
                            <li><a href="./shop-shopping-cart.php">????????????????????????????????????</a></li>
                            <li><a href="./controllers/logout.php">Log Out</a></li>

                        <?php endif; ?>
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>
    </div>

    <div class="header">
        <div class="container">
            <a class="site-logo" href="./shop-product-list.php"><img src="../../script/assets/img/logos/ubru_logo.png" width="115px" height=60px" alt="Metronic Shop UI"></a>
            <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
            <!-- BEGIN CART -->
            <div class="top-cart-block">
                <div class="top-cart-info">
                    <a id="sum_product" href="javascript:update_product();" class="top-cart-info-count"><span id="sum_item"> </span> ??????????????????</a>
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
                    </script>

                </div>
                <i class="fa fa-shopping-cart"></i>

                <div class="top-cart-content-wrapper">
                    <div class="top-cart-content">
                        <ul id="cart_list_product" class="scroller" style="height: 250px;">
                        </ul>
                        <div class="text-right">
                            <a href="shop-shopping-cart.php" class="btn btn-default">????????????????????????????????????</a>
                            <!-- <a href="shop-checkout.php" class="btn btn-primary">Checkout</a> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-navigation">
                <ul>
                    <!-- active -->
                    <li><a href="./shop-product-list.php">????????????????????????????????????</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">????????????????????????</a>
                        <!-- BEGIN DROPDOWN MENU -->
                        <ul class="dropdown-menu">
                            <?php
                            foreach (Database::query("SELECT * FROM `typepro`", PDO::FETCH_ASSOC) as $row) :
                            ?>
                                <li><a href="./shop-product-list.php?type=<?php echo $row['id_typepro'] ?>"><?php echo $row['name_typepro'] ?></a></li>
                                <!-- <li><a href="shop-product-list.html">Jackets and Coats</a></li> -->
                            <?php
                            endforeach;
                            ?>
                        </ul>
                        <!-- END DROPDOWN MENU -->
                    </li>

                    <li class="dropdown dropdown100 nav-catalogue">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:void(0);">
                            ??????????????????????????????
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="header-navigation-content">
                                    <div class="row">
                                        <?php foreach (Database::query("SELECT * FROM `products` WHERE  id_products NOT IN (SELECT id_products FROM products WHERE status_products = 0) ORDER BY id_products DESC LIMIT 4;", PDO::FETCH_ASSOC) as $row) : ?>
                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <div class="product-item">
                                                    <div class="pi-img-wrapper">
                                                        <a href="shop-item.php?product=<?php echo $row['id_products'] ?>"><img src="../../pictures/product/<?php echo $row['image_pro'] ?>" class=" img-responsive" alt="Berry Lace Dress"></a>
                                                    </div>
                                                    <h3><a href="shop-item.php?product=<?php echo $row['id_products'] ?>"><?php echo $row['name_products'] ?></a></h3>
                                                    <div class="pi-price">???<?php echo $row['price_unit'] ?></div>
                                                    <a href="javascript:add_product(<?php echo $row['id_products'] ?>,<?php echo $row['id_farmers'] ?>,<?php echo $row['price_unit'] ?>,'input__product-<?php echo $row['id_products']; ?>', '<?php echo $row['name_products'] ?>','<?php echo $row['image_pro'] ?>');" class="btn btn-default add2cart">?????????????????????????????????</a>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- <li><a href="./map-farm.php">????????????????????????????????????</a></li> -->
                    <li><a href="./search_farm.php">??????????????????????????????</a></li>
                    <!-- BEGIN TOP SEARCH -->
                    <li class="menu-search">
                        <span class="sep"></span>
                        <i class="fa fa-search search-btn"></i>
                        <div class="search-box">
                            <form action="javascript:search()">
                                <div class="input-group">
                                    <input id="input-bar-search" value="<?php if (isset($_GET['name'])) : echo $_GET['name'];
                                                                        endif; ?>" type="text" placeholder="????????????????????????????????????" class="form-control input-search">
                                    <span class="input-group-btn">
                                        <button onclick="search_name_nabar('input-bar-search')" class="btn btn-primary" type="button">???????????????</button>
                                    </span>
                                </div>
                            </form>

                            <script>
                                // alert(name_file)
                                function search_name_nabar(object) {
                                    var name = $("#" + object).val();

                                    if (name_file == "shop-product-list") {
                                        // alert(name_file);
                                        if (queryString.includes("?")) {
                                            location.assign(window.location.href + "&name=" + name);
                                        } else {
                                            location.assign(window.location.href + "?name=" + name);
                                        }
                                    } else {
                                        // alert(name_file);
                                        location.assign("./shop-product-list.php" + "?name=" + name);
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
</body>

<!-- END BODY -->

</html>