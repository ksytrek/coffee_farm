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

                    <?php
                    $page = null;
                    $start = 0; // ค่าของ record โดย page1 $startต้อง=0, page2 $startต้อง=3,page3 $startต้อง=6

                    $pagesize = isset($_GET['limit']) ? $_GET['limit'] : 10;   //จำนวน record ที่ต้องการแสดงในหนึ่งหน้า
                    $sort =  isset($_GET['sort']) ? $_GET['sort'] : 'id_products';
                    $order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
                    $type = isset($_GET['type']) ? $_GET['type'] : '%%';

                    $between_min = isset($_GET['between_min']) ? $_GET['between_min'] : "0";
                    $between_max = isset($_GET['between_max']) ? $_GET['between_max'] : "(SELECT MAX(price_unit) as 'max' FROM products )";
                    $between = "price_unit BETWEEN $between_min AND $between_max ";
                    $newtype = "  id_typepro LIKE '%%' ";

                    $sql_count = "SELECT * FROM `products` WHERE  $newtype AND $between AND id_farmers = '$id_farmers' AND status_products != '3' ";
                    $sql_data = "SELECT * FROM products as pro INNER JOIN typepro as ty ON pro.id_typepro = ty.id_typepro  WHERE pro.id_typepro LIKE '%$type%' AND pro.$between AND pro.id_farmers = '$id_farmers'  AND pro.status_products != '3'  ORDER BY pro.id_products $order LIMIT $start,$pagesize"; //คำสั่งแสดง record ต่อหนึ่งหน้า $pagesize = ต้องการกี่ record ต่อ

                    $result_count = Database::query($sql_count, PDO::FETCH_ASSOC);                      //เก็บข้อมูลไว้ใน $result
                    $num_rowsx = $result_count->rowCount();   //ใช้คำสั่ง mysql_num_rows เพื่อหาจำนวน record ทั้งหมด
                    $totalpage =  ceil($num_rowsx / $pagesize);


                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                        $start = ($page - 1) * $pagesize; //นี้เป็นสูตรการคำนวนครับ
                        // 2 -1 * 50
                        if ($num_rowsx < $start) {
                            $start = 0;
                        }
                    } else {
                        $page = 0;
                        $start = 0;
                    }

                    // echo $_GET['page'];



                    //หาค่า page ทั้งหมดว่ามีกี่ page โดยการนำ record ทั้งหมดมาหารกับจำนวน record ที่แสดงต่อหนึ่งหน้า //แต่อาจได้ค่าทศนิยม เราจึงใช้คำสั่ง ceil เพื่อปัดค่าขึ้นเป็นจำนวนเต็มครับ
                    //หนึ่งหน้า  $start= เริ่มจาก record ที่เท่าไหร่
                    $result_data = null;
                    $num_rows = null;

                    try {
                        // $sql_data = "SELECT * FROM products WHERE id_typepro LIKE '%$type%' ORDER BY id_products $order LIMIT $start,$pagesize";
                        $result_data =  Database::query($sql_data, PDO::FETCH_ASSOC);
                        $popup = Database::query($sql_data, PDO::FETCH_ASSOC);
                        $num_rows = $result_data->rowCount();
                    } catch (Exception $e) {
                    }


                    ?>
                    <div class="row product-list">
                        <!-- <h2>สินค้าของคุณที่กำลังประกาศขาย </h2> -->
                        <div class="product-page-content">
                            <ul id="myTab" class="nav nav-tabs">
                                <li class="active"><a href="#product_all"  data-toggle="tab">สินค้าทั้งหมด</a></li>
                                <li class=""><a href="#wait_for_sale" onclick="tableProductList('wait_for_sale')" data-toggle="tab">รอยืนยันคำสั่งขาย</a></li>
                                <li class=""><a href="#confirm_sales_orders" onclick="tableProductList('confirm_sales_orders')" data-toggle="tab">ยืนยันคำสั่งขายและดำเนินการ</a></li>
                                <li class=""><a href="#trade_complete" onclick="tableProductList('trade_complete')" data-toggle="tab">การซื้อขายเสร็จสิ้น</a></li>
                                <li class=""><a href="#cancel_trade" onclick="tableProductList('cancel_trade')"  data-toggle="tab">ยกเลิกการซื้อขาย</a></li>
                            </ul>
                            <script>
                                function tableProductList(value_pro){
                                    if(value_pro == "product_all"){
                                        $.ajax({
                                            url : './page/product_all.php',
                                            type : 'POST',
                                            data: {
                                                key : "product_all",
                                                id_farmers : ID_FARMERS
                                            },success: function(result, textStatus, jqXHR) {
                                                $("#product_all").html(result)
                                            },error: function(result, textStatus, jqXHR){

                                            }
                                        });
                                    }else if(value_pro == "wait_for_sale"){
                                        // alert("Please wait")
                                        $.ajax({
                                            url : './page/wait_for_sale.php',
                                            type : 'POST',
                                            data: {
                                                key : "wait_for_sale",
                                                id_farmers : ID_FARMERS
                                            },success: function(result, textStatus, jqXHR) {
                                                $("#wait_for_sale").html(result)
                                            },error: function(result, textStatus, jqXHR){

                                            }
                                        });
                                    }else if(value_pro == "confirm_sales_orders"){
                                        // alert("Please wait")
                                        $.ajax({
                                            url : './page/confirm_sales_orders.php',
                                            type : 'POST',
                                            data: {
                                                key : "confirm_sales_orders",
                                                id_farmers : ID_FARMERS
                                            },success: function(result, textStatus, jqXHR) {
                                                $("#confirm_sales_orders").html(result)
                                            },error: function(result, textStatus, jqXHR){

                                            }
                                        });
                                    }else if(value_pro == "trade_complete"){
                                        // alert("Please wait")
                                        $.ajax({
                                            url : './page/trade_complete.php',
                                            type : 'POST',
                                            data: {
                                                key : "trade_complete",
                                                id_farmers : ID_FARMERS
                                            },success: function(result, textStatus, jqXHR) {
                                                $("#trade_complete").html(result)
                                            },error: function(result, textStatus, jqXHR){

                                            }
                                        });
                                    }else if(value_pro == "cancel_trade"){
                                        // alert("Please wait")
                                        $.ajax({
                                            url : './page/cancel_trade.php',
                                            type : 'POST',
                                            data: {
                                                key : "cancel_trade",
                                                id_farmers : ID_FARMERS
                                            },success: function(result, textStatus, jqXHR) {
                                                $("#cancel_trade").html(result)
                                            },error: function(result, textStatus, jqXHR){

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