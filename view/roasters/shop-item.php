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
    $sql_data_item = "SELECT *, DATE_FORMAT(pro.harvest_date, '%e %M  %Y') AS date_time_harvest_date,IF(`organic_farm` = 1 ,'อินทรีย์','ไม่อินทรีย์') as 'organic_farm_new',IF(type_sale=1,'ขายแบบพันธะสัญญา','ขายแบบเดี่ยว') as 'type_sale_new' 
    FROM products as pro 
    INNER JOIN typepro as ty ON ty.id_typepro = pro.id_typepro 
    INNER JOIN farmers as far ON far.id_farmers = pro.id_farmers 
    WHERE pro.id_products = '$id_products';";

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
                                    <p>วันที่เก็บเกี่ยว :
                                        <strong> <?php echo $row['date_time_harvest_date']; ?></strong>
                                    </p>
                                    <p>ประเภทกาแฟ :
                                        <strong> <?php echo $row['name_typepro']; ?></strong>
                                    </p>
                                    <p>ชื่อฟาร์มที่่ขาย :
                                        <strong><a href="./information-farm.php?infr=<?php echo $row['id_farmers']; ?>"><?php echo $row['name_farmers']; ?></a></strong>
                                    </p>
                                </div>
                                <div class="product-page-options">

                                </div>
                                <div class="product-page-cart">
                                    <div class="product-quantity">
                                        <style>
                                            input[type=number]::-webkit-inner-spin-button {
                                                -webkit-appearance: none;
                                            }
                                        </style>
                                        <input id="input_item_product-<?php echo $row['id_products']; ?>" min="0" max="100" type="number" value="1" class="form-control input-sm">
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
                                    <li class="active"><a href="#Information" data-toggle="tab">ข้อมูลเกียวกับสินคา</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade" id="Description">
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
                                                <td class="datasheet-features-type">วันที่เก็บเกี่ยว</td>
                                                <td class="text-capitalize"><?php echo $row['date_time_harvest_date'] ?></td>
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

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php
    include_once('./footer.php');
    ?>
</body>
<!-- END BODY -->

</html>