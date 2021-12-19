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
    <title>รายละเอียดสินค้า</title>

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

<?php

$row = null;
if (isset($_GET["product"])) {
    $id_products = $_GET["product"];
    $sql_data_item = "SELECT *,IF(`organic_farm` = 1 ,'อินทรีย์','ไม่อินทรีย์') as 'organic_farm_new',IF(type_sale=1,'ขายแบบพันธะสัญญา','ขายแบบเดี่ยว') as 'type_sale_new' FROM products as pro INNER JOIN typepro as ty ON ty.id_typepro = pro.id_typepro INNER JOIN farmers as far ON far.id_farmers = pro.id_farmers WHERE pro.id_products = '2';SELECT * FROM products as pro INNER JOIN typepro as ty ON ty.id_typepro = pro.id_typepro INNER JOIN farmers as far ON far.id_farmers = pro.id_farmers WHERE pro.id_products = '$id_products';";

    try {
        $row = Database::query($sql_data_item, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
} else {
    echo "<script type='text/javascript'>" . "window.location.assign('./shop-product-list.php')" . "</script>";
}


?>

<body class="ecommerce">


    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="">Store</a></li>
                <li class="active"><?php echo $row['name_products'] ?></li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->

                <!-- END SIDEBAR -->

                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <div class="product-page">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="product-main-image">
                                    <img src="../../pictures/product/<?php echo $row['image_pro']; ?>" alt="" class="img-responsive" data-BigImgsrc="../../pictures/product/<?php echo $row['image_pro']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <h1><?php echo $row['name_products'] ?></h1>
                                <div class="price-availability-block clearfix">
                                    <div class="price">
                                        <strong><span>&#3647;</span><?php echo $row['price_unit'] . '.' . '00' ?></strong>

                                    </div>

                                </div>
                                <div class="description">
                                    <p>ประเภทกาแฟ :
                                        <strong> <?php echo $row['name_typepro']; ?></strong>
                                    </p>
                                    <p>ชื่อฟาร์มที่ขาย :
                                        <strong><a href="./information-farm.php?infr=<?php echo $row['id_farmers']; ?>"><?php echo $row['name_farmers']; ?></a></strong>
                                    </p>
                                </div>
                                <div class="product-page-options">

                                </div>
                                <div class="product-page-cart">
                                    <div class="product-quantity">
                                        <input id="input_item_product-<?php echo $row['id_products'];  ?>" type="text" value="1" readonly class="form-control input-sm">
                                    </div>
                                    <button onclick="add_product(<?php echo $row['id_products'] ?>,<?php echo $row['id_farmers'] ?>,<?php echo $row['price_unit'] ?>,'input_item_product-<?php echo $row['id_products'];  ?>', '<?php echo $row['name_products'] ?>','<?php echo $row['image_pro'] ?>');" class="btn btn-primary" type="button">เพิ่มสินค้า</button>
                                </div>
                                <!-- <div class="review">
                                    <input type="range" value="4" step="0.25" id="backing4">
                                    <div class="rateit" data-rateit-backingfld="#backing4" data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                                    </div>
                                    <a href="javascript:;">7 reviews</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:;">Write a review</a>
                                </div> -->
                                <!-- <ul class="social-icons">
                                    <li><a class="facebook" data-original-title="facebook" href="javascript:;"></a></li>
                                    <li><a class="twitter" data-original-title="twitter" href="javascript:;"></a></li>
                                    <li><a class="googleplus" data-original-title="googleplus" href="javascript:;"></a></li>
                                    <li><a class="evernote" data-original-title="evernote" href="javascript:;"></a></li>
                                    <li><a class="tumblr" data-original-title="tumblr" href="javascript:;"></a></li>
                                </ul> -->
                            </div>

                            <div class="product-page-content">
                                <ul id="myTab" class="nav nav-tabs">
                                    <!-- <li class=""><a href="#Description" data-toggle="tab">รายละเอียดสินค้า</a></li> -->
                                    <li class="active"><a href="#Information" data-toggle="tab">ข้อมูลเกียวกับสินคา</a></li>
                                    <!-- <li class="active"><a href="#Reviews" data-toggle="tab">Reviews (2)</a></li> -->
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade" id="Description">
                                        <!-- <p>รายละเอียดสินค้า</p> -->
                                    </div>
                                    <div class="tab-pane fade in active " id="Information">
                                        <table class="datasheet">
                                            <tr>
                                                <th colspan="2">รายละเอียดสินค้า</th>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">ชื่อสินค้า</td>
                                                <td class="text-capitalize"><?php echo $row['name_products'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">ประเภทกาแฟ</td>
                                                <td class="text-capitalize"><?php echo $row['name_typepro'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">ราคาต่อหน่วย (บาท/kg)</td>
                                                <td class="text-capitalize"><?php echo $row['price_unit'] ?>/Kg</td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">จำนวนคงเหลือ (kg)</td>
                                                <td class="text-capitalize"><?php echo $row['num_stock'] ?> (Kg)</td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">ประเภทการเพราะปลูก</td>
                                                <td class="text-capitalize"><?php echo $row['organic_farm_new'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">การค้าขายแบบ</td>
                                                <td class="text-capitalize"><?php echo $row['type_sale_new'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">อีเมล์เกษตรกร</td>
                                                <td class="text-capitalize"><?php echo $row['email_farmers'] ?></td>
                                            </tr>


                                        </table>
                                    </div>
                                    <!-- <div class="tab-pane fade in active" id="Reviews">
                                        <div class="review-item clearfix">
                                            <div class="review-item-submitted">
                                                <strong>Bob</strong>
                                                <em>30/12/2013 - 07:37</em>
                                                <div class="rateit" data-rateit-value="5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                            </div>
                                            <div class="review-item-content">
                                                <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris bibendum orci, a sodales lectus purus ut lorem.</p>
                                            </div>
                                        </div>
                                        <div class="review-item clearfix">
                                            <div class="review-item-submitted">
                                                <strong>Mary</strong>
                                                <em>13/12/2013 - 17:49</em>
                                                <div class="rateit" data-rateit-value="2.5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                            </div>
                                            <div class="review-item-content">
                                                <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris bibendum orci, a sodales lectus purus ut lorem.</p>
                                            </div>
                                        </div>


                                        <form action="#" class="reviews-form" role="form">
                                            <h2>Write a review</h2>
                                            <div class="form-group">
                                                <label for="name">Name <span class="require">*</span></label>
                                                <input type="text" class="form-control" id="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="review">Review <span class="require">*</span></label>
                                                <textarea class="form-control" rows="8" id="review"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Rating</label>
                                                <input type="range" value="4" step="0.25" id="backing5">
                                                <div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                                                </div>
                                            </div>
                                            <div class="padding-top-20">
                                                <button type="submit" class="btn btn-primary">Send</button>
                                            </div>
                                        </form>

                                    </div> -->
                                </div>
                            </div>

                            <!-- <div class="sticker sticker-sale"></div> -->
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->

            <!-- BEGIN SIMILAR PRODUCTS -->
            <!-- <div class="row margin-bottom-40">
                <div class="col-md-12 col-sm-12">
                    <h2>Most popular products</h2>
                    <div class="owl-carousel owl-carousel4">
                        <div>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="../../script/assets/pages/img/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/assets/pages/img/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
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
                                    <img src="../../script/assets/pages/img/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/assets/pages/img/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
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
                                    <img src="../../script/assets/pages/img/products/k3.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/assets/pages/img/products/k3.jpg" class="btn btn-default fancybox-button">Zoom</a>
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
                                    <img src="../../script/assets/pages/img/products/k4.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/assets/pages/img/products/k4.jpg" class="btn btn-default fancybox-button">Zoom</a>
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
                                    <img src="../../script/assets/pages/img/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/assets/pages/img/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
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
                                    <img src="../../script/assets/pages/img/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="../../script/assets/pages/img/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
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
            </div> -->
            <!-- END SIMILAR PRODUCTS -->
        </div>
    </div>

    <?php
    include_once('./footer.php');
    ?>
</body>
<!-- END BODY -->

</html>