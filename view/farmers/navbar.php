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
include_once('../../config/connectdb.php');
session_start();
$id_farmers = null;
$email_farmers = null;
// $_SESSION['user_id']= "ddd";
if (isset($_SESSION['key']) && $_SESSION['key'] == 'framers' && isset($_SESSION['id'])) {
    $id_farmers = $_SESSION['id'];
    $email_farmers = $_SESSION['user_id'];
    // echo $_SESSION['key'];
}
// echo $_SESSION['user_id'];
// if (!isset($id_farmers)  && strpos( $_SERVER['REQUEST_URI'], "shope-login.php" ) == true ) {
//     // header("Location:shope-login.php");
//     echo "shope-login.php";
// }else{
//     // echo $_SERVER['REQUEST_URI'];
//     header("Location:shope-login.php");
// }

// echo $_SERVER['REQUEST_URI'];
// echo strpos( $_SERVER['REQUEST_URI'], "shope-login.php" );

$myString = $_SERVER['REQUEST_URI'];
if (!strpos($myString, 'shope-login.php') && $id_farmers == null) {
    header("Location:shope-login.php");
} else if (strpos($myString, 'shope-login.php') && $id_farmers != null) {
    header("Location:framers-index.php");
} else {
    // echo $_SESSION['user_id'];
}

?>
<script>
    const ID_FARMERS = '<?php echo $id_farmers; ?>';
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


    <style type="text/css" media="all">
        /* .modal-fullscreen { */
        .modal-dialog_fullscreen {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .modal-content_fullscreen {
            height: auto;
            min-height: 100%;
            border: 0 none;
            border-radius: 0;
            box-shadow: none;
        }

        /* } */
    </style>




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
                        if (!isset($id_farmers)) :
                        ?>
                            <li><a id="signIN" href="./shope-login.php">Sign In</a></li>
                            <li><a id="signUP" href="./shope-login.php">Sign UP</a></li>


                        <?php elseif (isset($id_farmers)) : ?>
                            <li><a href="javascript:void(0);">บัญชีของฉัน</a></li>
                            <!-- <li><a href="shop-wishlist.html">รายการโปรดของฉัน</a></li> -->
                            <!-- <li><a href="javascript:void(0);">เมนู 1</a></li> -->
                            <li><a href="./controllers/logout.php">Log Out</a></li>

                        <?php endif; ?>
                    </ul>
                    <script>

                    </script>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>
    </div>
    <!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
    <div class="header">
        <div class="container">
            <a class="site-logo" href="<?php if (!isset($id_farmers)) : echo "./shope-login.php";
                                        else : echo "./framers-index.php";
                                        endif; ?>"><img src="../../script/assets/img/logos/1.png" width="128px" height="40px" alt="Metronic Shop UI"></a>
            <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>


            <!-- BEGIN NAVIGATION -->
            <div class="header-navigation">
                <ul>
                    <!-- active -->
                    <?php
                    if (isset($id_farmers)) :
                    ?>
                        <li><a href="javascript:void(0);">หน้าหลัก</a></li>
                        <li class="dropdown ">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:void(0);">
                                จัดการสินค้า
                            </a>

                            <ul class="dropdown-menu">
                                <!-- class="active" -->
                                <li><a href="javascript:void(0);">รายการสินค้า</a></li>
                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#addProduct">เพิ่มสินค้า</a></li>

                            </ul>
                        </li>
                        <li><a href="javascript:void(0);">รายการขาย</a></li>

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

                        <!-- <li><a href="shop-item.html">Kids</a></li> -->
                        <!-- <li><a href="javascript:void(0);">รายการขายสำเร็จ</a></li>
                        <li><a href="javascript:void(0);">เมนู 3</a></li>
                        <li><a href="javascript:void(0);">เมนู 4</a></li>
                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#addProduct">เมนู 5</a></li> -->





                    <?php elseif (!isset($id_farmers)) : ?>
                        <li><a href="./shope-login.php">หน้าหลัก</a></li>
                    <?php endif; ?>
                    <!-- BEGIN TOP SEARCH -->
                    <!-- <li class="menu-search">
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
                    </li> -->
                    <!-- END TOP SEARCH -->
                </ul>
            </div>
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> -->
            <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">เพิ่มรายการสินค้า</h4>
                        </div>
                        <div class="modal-body">
                            <form id="form_addProduct" role="form" action="javascript:farmers_addProduct();">
                                <input type="hidden" name="id_farmers" value="<?php echo $id_farmers ?>">
                                <div class="form-group">
                                    <label for=""> ชื่อสินค้ากาแฟ <span class="require">*</span></label>

                                    <input type="text" name="name_products" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for=""> ประเภทกาแฟ <span class="require">*</span></label>
                                    <select class="form-control" name="id_typepro">
                                        <option disabled selected>--- Please Select ---</option>
                                        <?php
                                        $result = Database::query("SELECT * FROM `typepro`", PDO::FETCH_ASSOC);
                                        foreach ($result as $row) :
                                        ?>
                                            <option value="<?php echo $row['id_typepro'] ?>"><?php echo $row['name_typepro'] ?></option>

                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">จำนวนคงเหลือ(kg) <span class="require">*</span></label>
                                    <input type="number" name="num_stock" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for=""> ราคาต่อหน่วย (บาท/kg) <span class="require">*</span></label>
                                    <input type="number" name="price_unit" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for=""> รูปสินค้า <span class="require">*</span></label>
                                    <input type="file" name="image_pro" class="form-control">
                                </div>
                                <div class="form-group">
                                    <img id="img_product" src="../../script/pictures/default_image.jpg" width="100%" height="180px">
                                </div>
                                <script>
                                    // get a reference to the file input
                                    const imageElement = document.querySelector("img[id=img_product]");
                                    var base64StringImg_product = null;
                                    // get a reference to the file input
                                    const fileInput = document.querySelector("input[type=file]");

                                    var canvas;
                                    // listen for the change event so we can capture the file
                                    fileInput.addEventListener("change", (e) => {
                                        // get a reference to the file
                                        const file = e.target.files[0];
                                        // console.log(file);
                                        // var fi = e.files[0];
                                        // set file as image source


                                        const reader = new FileReader();
                                        reader.onloadend = (e) => {
                                            var img = document.createElement("img");
                                            img.onload = function(event) {
                                                // Dynamically create a canvas element
                                                var canvas = document.createElement("canvas");
                                                canvas.width = 960;
                                                canvas.height = 720;
                                                // var canvas = document.getElementById("canvas");
                                                var ctx = canvas.getContext("2d");
                                                // Actual resizing
                                                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                                                // Show resized image in preview element
                                                var dataurl = canvas.toDataURL(file.type);
                                                // document.getElementById("preview").src = dataurl;
                                                imageElement.src = dataurl;

                                                // console.log(dataurl.replace(/^data:image\/(png|jpg);base64,/, ""));
                                                const base64String_ = dataurl
                                                    .replace("data:", "")
                                                    .replace(/^.+,/, "");
                                                base64StringImg_product = base64String_;

                                                // console.log(base64String);
                                            }
                                            img.src = e.target.result;
                                        };
                                        reader.readAsDataURL(file);
                                    });
                                </script>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิกโพสต์ขายสินค้า</button>
                            <button type="submit" class="btn btn-primary">โพสต์ขายสินค้า</button>
                        </div>

                    </div>

                    <script>
                        $("#form_addProduct").submit(function() {
                            // alert("Add Product");
                            var $inputs = $("#form_addProduct :input");
                            var values = {};
                            $inputs.each(function() {
                                values[this.name] = $(this).val();
                            });

                            values['image_pro'] = base64StringImg_product;

                            // console.log(JSON.stringify(values));
                            $.ajax({
                                url: "./controllers/mg_product.php",
                                type: "POST",
                                // dataType: 'text',
                                data: {
                                    key: "form_addProduct",
                                    data: values,
                                    // form_data: form_data
                                },
                                success: function(result, textStatus, jqXHR) {
                                    // console.log(result);
                                    // alert(result);

                                    if (result == "success") {
                                        alert("เพิ่มสินค้าสำเร็จ");
                                        $("#form_addProduct").trigger("reset");
                                        location.reload();

                                    } else {
                                        alert("เกิดข้อผิดพลาดบางอย่าง");
                                        location.reload();
                                    }
                                    // console.log(JSON.stringify(values));
                                },
                                error: function(jqXHR, textStatus, errorThrown) {

                                }
                            });

                        });
                    </script>
                </div>
            </div>
        </div>

        <!-- Modal Fullscreen -->
    </div>
    </div>
    <!-- Header END -->
    <?php
    // if (isset($id_farmers)) :
    ?>
        <!-- <div class="title-wrapper">
            <div class="container">
                <div class="container-inner">
                    <h1><span>ล็อกอินโดย</span></h1>
                    <em> <?php //echo $email_farmers; ?></em>
                </div>
            </div>
        </div> -->

    <?php //endif; ?>






</body>

<!-- END BODY -->

</html>
</script>