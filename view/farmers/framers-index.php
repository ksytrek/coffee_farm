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
    <title><?php
            echo $email_farmers;
            ?></title>

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



    <script>
        const queryString = window.location.search;
        window.onload = function() {
            // alert(ID_FARMERS);
        }
    </script>
    <script>
        function update_staus_transale(id_transale, status) {
            // alert(id_transale);
            if (status == 2 && confirm('คุณต้องการตอบรับคำสั่งซื้อสินค้าหรือไม่')) {
                send_satus_update(id_transale, status);
            }
            if (status == 3 && confirm('คุณต้องการยืนยันคำสั่งซื้อสินค้าหรือไม่')) {
                send_satus_update(id_transale, status);
            }
            if (status == 4 && confirm('คุณต้องการยกเลิกรายการสั่งซื้อหรือไม่')) {
                send_satus_update(id_transale, status);
            }


        }

        function send_satus_update(id_transale, status) {
            $.ajax({
                url: "./controllers/update_staus_transale.php",
                type: "POST",
                data: {
                    key: "update_staus_transale",
                    id_transale: id_transale,
                    status: status
                },
                success: function(result, textStatus, jqXHR) {
                    // console.log(result);
                    if (result == 'error') {
                        alert("ระบบตรวจพบข้อผิดพลาดบางอย่าง")
                        location.reload();
                    } else {
                        location.reload();
                    }
                },
                error: function(result, textStatus, jqXHR) {
                    alert("ระบบตรวจพบข้อผิดพลาดบางอย่างจากเซิฟเวอร์")
                }
            });
        }
    </script>

    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="./framers-index.php">Home</a></li>
                <!-- <li><a href="">Store</a></li> -->
                <!-- <li class="active">Men category</li> -->
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-5">

                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <!-- BEGIN PRODUCT LIST -->
                    <div class="row product-list">
                        <!-- <h2>สินค้าของคุณที่กำลังประกาศขาย </h2> -->
                        <div class="product-page-content">
                            <ul id="myTab" class="nav nav-tabs">
                                <li class="active"><a href="#product_all" data-toggle="tab">สินค้าทั้งหมด</a></li>
                                <?php

                                $count_Waiting_confirmation_seller = 0; // 1 = รอยืนยันคำสั่งขาย 
                                $count_pending = 0; // 2 = ยืนยันคำสั่งขายและดำเนินการ 
                                $count_trade_complete = 0;  // 3 = การซื้อขายเสร็จสิ้น 
                                $count_cancel_trade = 0;  // 4 = ยกเลิกการซื้อขาย


                                $sql_trans = "SELECT * FROM `transale` WHERE id_farmers = '{$id_farmers}'";
                                foreach (Database::query($sql_trans, PDO::FETCH_ASSOC) as $row) {
                                    if ($row['status_transale'] == '1') {
                                        $count_Waiting_confirmation_seller++;
                                    } else if ($row['status_transale'] == '2') {
                                        $count_pending++;
                                    } else if ($row['status_transale'] == '3') {
                                        $count_trade_complete++;
                                    } else if ($row['status_transale'] == '4') {
                                        $count_cancel_trade++;
                                    }
                                }

                                ?>
                                <li class=""><a href="#wait_for_sale" onclick="tableProductList('wait_for_sale')" data-toggle="tab">รอยืนยันคำสั่งขาย <?php echo $count_Waiting_confirmation_seller != 0 ? " ( " . $count_Waiting_confirmation_seller . " ) " : "" ?></a></li>
                                <li class=""><a href="#confirm_sales_orders" onclick="tableProductList('confirm_sales_orders')" data-toggle="tab">ยืนยันคำสั่งขายและดำเนินการ <?php echo $count_pending  != 0 ? " ( " . $count_pending .  " ) " : "" ?></a></li>
                                <li class=""><a href="#trade_complete" onclick="tableProductList('trade_complete')" data-toggle="tab">การซื้อขายเสร็จสิ้น <?php echo $count_trade_complete  != 0 ? " ( " . $count_trade_complete .  " ) " : "" ?></a></li>
                                <li class=""><a href="#cancel_trade" onclick="tableProductList('cancel_trade')" data-toggle="tab">ยกเลิกการซื้อขาย <?php echo $count_cancel_trade  != 0 ? " ( " . $count_cancel_trade . " ) " : ""  ?></a></li>
                            </ul>
                            <script>
                                function tableProductList(value_pro) {
                                    if (value_pro == "product_all") {
                                        $.ajax({
                                            url: './page/product_all.php',
                                            type: 'POST',
                                            data: {
                                                key: "product_all",
                                                id_farmers: ID_FARMERS
                                            },
                                            success: function(result, textStatus, jqXHR) {
                                                $("#product_all").html(result)
                                            },
                                            error: function(result, textStatus, jqXHR) {

                                            }
                                        });
                                    } else if (value_pro == "wait_for_sale") {
                                        // alert("Please wait")
                                        $.ajax({
                                            url: './page/wait_for_sale.php',
                                            type: 'POST',
                                            data: {
                                                key: "wait_for_sale",
                                                id_farmers: ID_FARMERS
                                            },
                                            success: function(result, textStatus, jqXHR) {
                                                $("#wait_for_sale").html(result)
                                            },
                                            error: function(result, textStatus, jqXHR) {

                                            }
                                        });
                                    } else if (value_pro == "confirm_sales_orders") {
                                        // alert("Please wait")
                                        $.ajax({
                                            url: './page/confirm_sales_orders.php',
                                            type: 'POST',
                                            data: {
                                                key: "confirm_sales_orders",
                                                id_farmers: ID_FARMERS
                                            },
                                            success: function(result, textStatus, jqXHR) {
                                                $("#confirm_sales_orders").html(result)
                                            },
                                            error: function(result, textStatus, jqXHR) {

                                            }
                                        });
                                    } else if (value_pro == "trade_complete") {
                                        // alert("Please wait")
                                        $.ajax({
                                            url: './page/trade_complete.php',
                                            type: 'POST',
                                            data: {
                                                key: "trade_complete",
                                                id_farmers: ID_FARMERS
                                            },
                                            success: function(result, textStatus, jqXHR) {
                                                $("#trade_complete").html(result)
                                            },
                                            error: function(result, textStatus, jqXHR) {

                                            }
                                        });
                                    } else if (value_pro == "cancel_trade") {
                                        // alert("Please wait")
                                        $.ajax({
                                            url: './page/cancel_trade.php',
                                            type: 'POST',
                                            data: {
                                                key: "cancel_trade",
                                                id_farmers: ID_FARMERS
                                            },
                                            success: function(result, textStatus, jqXHR) {
                                                $("#cancel_trade").html(result)
                                            },
                                            error: function(result, textStatus, jqXHR) {

                                            }
                                        });
                                    }
                                }
                            </script>

                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="product_all">
                                    <!--  สินค้าทั้งหมด  -->
                                    <?php include_once("./page/product_all.php"); ?>
                                </div>

                                <div class="tab-pane fade" id="wait_for_sale">

                                </div>

                                <div class="tab-pane fade " id="confirm_sales_orders">
                                    <!--  ยืนยันคำสั่งขายและดำเนินการ  -->


                                </div>
                                <div class="tab-pane fade " id="trade_complete">
                                    <!--  การซื้อขายเสร็จสิ้น  -->
                                </div>
                                <div class="tab-pane fade " id="cancel_trade">
                                    <!--  ยกเลิกการซื้อขาย  -->

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>


    <?php
    include_once("./footer.php");
    ?>
</body>
<!-- END BODY -->

</html>