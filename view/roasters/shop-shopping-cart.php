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

<head>
    <meta charset="utf-8">
    <title>Shopping cart | Metronic Shop UI</title>

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


    <script>
        var total = 0;
    </script>
    <!-- Theme styles END -->
</head>
<!-- Head END -->
<?php
include_once('./navbar.php');
?>
<!-- Body BEGIN -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


<body class="ecommerce">


    <div class="main">
        <div class="container">
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1>ตะกร้าสินค้า</h1>
                    <div class="goods-page">
                        <div class="goods-data clearfix">
                            <div class="table-wrapper-responsive">
                                <table summary="Shopping cart" id="product_item_all">
                                    <thead>
                                        <th class="goods-page-image">ภาพ</th>
                                        <th class="goods-page-description">รายละเอียด</th>
                                        <th class="goods-page-quantity">ปริมาณ</th>
                                        <th class="goods-page-price">ราคาต่อหน่วย</th>
                                        <th class="goods-page-total" colspan="2">รวม</th>
                                    </thead>
                                    <tbody id="tbb_product_item_all">

                                    </tbody>

                                </table>
                                <script>
                                    

                                    function product_item_all() {
                                        var str_items = "";

                                        const json = readCookie('product');
                                        const product = JSON.parse(json);

                                        var sum_total = 0;


                                        product.forEach(function(value, index) {
                                            sum_total = value.price_unit*value.num_item;
                                            total += sum_total;
                                            str_items += '<tr>' +
                                                '<td class="goods-page-image">' +
                                                '<a href="javascript:;"><img src="../../pictures/product/' + value.image_pro + '" alt="Berry Lace Dress"></a>' +
                                                '</td>' +
                                                '<td class="goods-page-description">' +
                                                '<h3><a href="javascript:;">'+  value.name_products +'</a></h3>' +
                                                '<em>รายละเอียดเพิ่มเติม</em>' +
                                                '</td>' +
                                                '<td class="goods-page-quantity">' +
                                                '<div class="product-quantity click">' +
                                                '<input id="product-quantity" onclick="" type="text" value="' + value.num_item + '" readonly class="form-control input-sm">' +
                                                '</div>' +
                                                '</td>' +
                                                '<td class="goods-page-price">' +
                                                '<strong><span>฿</span>'+ value.price_unit +'</strong>' +
                                                '</td>' +
                                                '<td class="goods-page-total">' +
                                                '<strong><span>฿</span>'+ sum_total + '</strong>' +
                                                '</td>' +
                                                '<td class="del-goods-col">' +
                                                '<a class="del-goods" href="javascript:;">&nbsp;</a>' +
                                                '</td>' +
                                                '</tr>';

                                                

                                        });

                                        // $('#tbb_product_item_all > tbody:last').append(str_items);
                                        $('#tbb_product_item_all').html(str_items);
                                    }
                                    $("#tbb_product_item_all").on("click", ".goods-page-quantity", function(event) {
                                        console.log('clicked');
                                    });


                                    $(document).ready(function() {
                                        product_item_all();
                                        $("#total").html("<span>฿</span>" + total );
                                    });
                                </script>
                            </div>

                            <div class="shopping-total">
                                <ul>
                                    <li class="shopping-total-price">
                                        <em>Total</em>
                                        <strong id="total" class="price"></strong>
                                    </li>
                                </ul>

                                <script>
                                    
                                </script>
                            </div>
                        </div>
                        <button class="btn btn-default" type="submit">ซื้อกาแฟเพิ่มเติม<i class="fa fa-shopping-cart"></i></button>
                        <button class="btn btn-primary" type="submit">ยืนยันสั่งซื้อสินค้า <i class="fa fa-check"></i></button>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->

        </div>
    </div>




</body>
<?php
include_once('./footer.php');
?>
<!-- END BODY -->

</html>