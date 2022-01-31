<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->

<head>
    <meta charset="utf-8">
    <title>Shopping cart</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta content="Metronic Shop UI description" name="description">
    <meta content="Metronic Shop UI keywords" name="keywords">
    <meta content="keenthemes" name="author">

    <meta property="og:site_name" content="-CUSTOMER VALUE-">
    <meta property="og:title" content="-CUSTOMER VALUE-">
    <meta property="og:description" content="-CUSTOMER VALUE-">
    <meta property="og:type" content="website">
    <meta property="og:image" content="-CUSTOMER VALUE-">
    <meta property="og:url" content="-CUSTOMER VALUE-">



    <script>
        var total = 0;
    </script>

</head>

<?php
include_once('./navbar.php');
?>



<body class="ecommerce">
    <script>
        $(document).ready(function() {
            $("#sum_cart").html(JSON.parse(readCookie('product')).length != 0 ? " ( " + JSON.parse(readCookie('product')).length + " )" : "");
        });


        function cancel_transel(id_transale) {
            // alert(id_transale);
            if (confirm('คุณต้องการยกเลิกรายการสั่งซื้อหรือไม่')) {
                $.ajax({
                    url: "../controllers/update_staus_transale.php",
                    type: "POST",
                    data: {
                        key: "update_cancel_transale",
                        id_transale: id_transale,
                        status: 4
                    },
                    success: function(result, textStatus, jqXHR) {
                        // console.log(result);
                        if (result == 'success') {
                            alert("ยกเลิกการสั่งซื้อสินค้าสำเร็จ");
                            location.reload();
                        } else {
                            alert("ระบบตรวจพบข้อผิดพลาดบางอย่าง")
                        }
                    },
                    error: function(result, textStatus, jqXHR) {
                        alert("ระบบตรวจพบข้อผิดพลาดบางอย่างจากเซิฟเวอร์")
                    }
                });
            }

        }

        function do_farm(id_farmers){
            location.assign('./information-farm.php?infr='+id_farmers)
        }
    </script>



    <div class="main">
        <div class="container">
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->

                <div class="col-md-12 col-sm-12">
                    <!-- <h1>ตะกร้าสินค้า</h1> -->
                    <div class="row product-list">
                        <!-- <h2>สินค้าของคุณที่กำลังประกาศขาย </h2> -->
                        <div class="product-page-content">
                            <ul id="myTab" class="nav nav-tabs">
                                <li class="active"><a href="#product_all" data-toggle="tab">ตะกร้าสินค้าสินค้าทั้งหมด<span id="sum_cart"></span></a></li>

                                <?php

                                if (isset($id_roasters)) :

                                    $count_Waiting_confirmation_seller = 0; // 1 = รอยืนยันคำสั่งขาย 
                                    $count_pending = 0; // 2 = ยืนยันคำสั่งขายและดำเนินการ 
                                    $count_trade_complete = 0;  // 3 = การซื้อขายเสร็จสิ้น 
                                    $count_cancel_trade = 0;  // 4 = ยกเลิกการซื้อขาย


                                    $sql_trans = "SELECT * FROM `transale` WHERE id_roasters = '{$id_roasters}'";
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
                                    <li class=""><a href="#wait_for_sale" onclick="update_click_tab(1)" data-toggle="tab">รอยืนยันจากผู้ขาย <?php echo $count_Waiting_confirmation_seller != 0 ? " ( " . $count_Waiting_confirmation_seller . " ) " : "" ?> </a></li>
                                    <li class=""><a href="#pending" onclick="update_click_tab(2)" data-toggle="tab">รอดำเนินการ <?php echo $count_pending  != 0 ? " ( " . $count_pending .  " ) " : "" ?> </a></li>
                                    <li class=""><a href="#trade_complete" onclick="update_click_tab(3)" data-toggle="tab">การซื้อขายเสร็จสิ้น <?php echo $count_trade_complete  != 0 ? " ( " . $count_trade_complete .  " ) " : "" ?> </a></li>
                                    <li class=""><a href="#cancel_trade" onclick="update_click_tab(4)" data-toggle="tab">ยกเลิกการซื้อขาย <?php echo $count_cancel_trade  != 0 ? " ( " . $count_cancel_trade . " ) " : ""  ?> </a></li>
                                <?php endif; ?>
                                <script>
                                    function update_click_tab(numClick) {
                                        if (numClick == 1) {
                                            $.ajax({
                                                url: "./shop-shopping-cart-wait_for_sale.php",
                                                type: "POST",
                                                data: {
                                                    key: "wait_for_sale",
                                                    id_roasters: ID_ROASTERS,
                                                    status: numClick
                                                },
                                                success: function(result, textStatus, jqXHR) {
                                                    $("#wait_for_sale").html(result);
                                                },
                                                error: function(result, textStatus, jqXHR) {
                                                    $("#wait_for_sale").html("ระบบตรวจพบข้อผิดพลาดจากเซิฟเวอร์"+ jqXHR + "\n" + textStatus );
                                                }
                                            });

                                        } else if (numClick == 2) {
                                            // alert(numClick)
                                            $.ajax({
                                                url: "./shop-shopping-cart-pending.php",
                                                type: "POST",
                                                data: {
                                                    key: "pending",
                                                    id_roasters: ID_ROASTERS,
                                                    status: numClick
                                                },
                                                success: function(result, textStatus, jqXHR) {
                                                    $("#pending").html(result);
                                                },
                                                error: function(result, textStatus, jqXHR) {
                                                    $("#pending").html("ระบบตรวจพบข้อผิดพลาดจากเซิฟเวอร์" + jqXHR + "\n" + textStatus );
                                                }
                                            });


                                        } else if (numClick == 3) {
                                            $.ajax({
                                                url: "./shop-shopping-cart-trade_complete.php",
                                                type: "POST",
                                                data: {
                                                    key: "trade_complete",
                                                    id_roasters: ID_ROASTERS,
                                                    status: numClick
                                                },
                                                success: function(result, textStatus, jqXHR) {
                                                    $("#trade_complete").html(result);
                                                },
                                                error: function(result, textStatus, jqXHR) {
                                                    $("#trade_complete").html("ระบบตรวจพบข้อผิดพลาดจากเซิฟเวอร์"+ jqXHR + "\n" + textStatus );
                                                }
                                            });
                                            // $("#trade_complete").html();

                                        } else if (numClick == 4) {
                                            $.ajax({
                                                url: "./shop-shopping-cart-cancel_trade.php",
                                                type: "POST",
                                                data: {
                                                    key: "cancel_trade",
                                                    id_roasters: ID_ROASTERS,
                                                    status: numClick
                                                },
                                                success: function(result, textStatus, jqXHR) {
                                                    $("#cancel_trade").html(result);
                                                },
                                                error: function(result, textStatus, jqXHR) {
                                                    $("#cancel_trade").html("ระบบตรวจพบข้อผิดพลาดจากเซิฟเวอร์"+ jqXHR + "\n" + textStatus );
                                                }
                                            });
                                            // $("#cancel_trade").html();
                                        }
                                    }
                                </script>
                            </ul>

                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="product_all">
                                    <div class="goods-page">
                                        <div id="div-product" class="goods-data clearfix">
                                            <div class="table-wrapper-responsive">

                                                <table summary="Shopping cart" id="product_item_all">
                                                    <thead>
                                                        <th class="goods-page-image">ภาพ</th>
                                                        <th class="goods-page-description">ชื่อสินค้า</th>
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

                                                        $('#tbb_product_item_all').empty();
                                                        // tb_mg_room.clear();
                                                        product.forEach(function(value, index) {
                                                            // alert(index);
                                                            sum_total = value.price_unit * value.num_item;
                                                            total += sum_total;
                                                            str_items += '<tr>' +
                                                                '<td class="goods-page-image">' +
                                                                '<a href="javascript:;"><img src="../../pictures/product/' + value.image_pro + '" alt="Berry Lace Dress"></a>' +
                                                                '</td>' +
                                                                '<td class="goods-page-description">' +
                                                                '<h3><a href="javascript:;">' + value.name_products + '</a></h3>' +
                                                                // '<em>รายละเอียดเพิ่มเติม</em>' +
                                                                '</td>' +
                                                                '<td class="goods-page-quantity">' +
                                                                '<div class="product-quantity">' +
                                                                // '<div>' +
                                                                // '<input id="demo_vertical" type="text" value="" name="demo_vertical">' +
                                                                // '</div>' +
                                                                '<input  onchange="add_item(' + value.id_products + ',this.value,' + index + ')" type="text" value="' + value.num_item + '" readonly class="form-control input-sm">' +
                                                                '</div>' +
                                                                '</td>' +
                                                                '<td class="goods-page-price">' +
                                                                '<strong><span></span>' + THB.format(value.price_unit) + '</strong>' +
                                                                '</td>' +
                                                                '<td class="goods-page-total">' +
                                                                '<strong><span></span>' + THB.format(sum_total) + '</strong>' +
                                                                '</td>' +
                                                                '<td class="del-goods-col">' +
                                                                '<a  class="del-goods" href="javascript:del_items_ca(' + index + ');">&nbsp;</a>' +
                                                                '</td>' +
                                                                '</tr>';

                                                        });

                                                        if (product == '') {
                                                            // $("#product_item_all").hide();
                                                            // $(".shopping-total").hide();
                                                            // $("#div-product").hide();
                                                            $("#div-product").html('ตะกร้าสินค้าของคุณ ไม่มีสินค้า <a href="shop-product-list.php">คลิ๊กเพื่อไปยังหน้ารายการสินค้า</a>');
                                                            $("#confirm_sales_orders").css('display', 'none');
                                                        }

                                                        $('#tbb_product_item_all').html(str_items);

                                                    }

                                                    function del_items_ca(index) {

                                                        const json = readCookie('product');
                                                        const product = JSON.parse(json);

                                                        product.splice(index, 1);

                                                        createCookie("product", JSON.stringify(product));

                                                        // update_product();
                                                        window.location.reload();
                                                    }

                                                    function add_item(id_products, item, index) {
                                                        // alert(item);
                                                        if (item == 0) {
                                                            del_items(index);
                                                        } else {
                                                            var int_i = 0;
                                                            var product = [];
                                                            var num_item_new = parseInt(item);

                                                            product = JSON.parse(readCookie('product')); // array type
                                                            product.forEach(function(value, i) {
                                                                // alert(i);
                                                                if (value.id_products == id_products) {
                                                                    int_i += 1;
                                                                    product[i].num_item = num_item_new;
                                                                }
                                                            });

                                                            createCookie("product", JSON.stringify(product));
                                                            // update_product();
                                                        }
                                                        window.location.reload();
                                                    }

                                                    window.onload = function() {
                                                        // product_item_all();
                                                    };

                                                    $(document).ready(function() {
                                                        product_item_all();
                                                        $("#total").html(THB.format(total));

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
                                        <button class="btn btn-default" type="button" onclick="window.location.assign('shop-product-list.php')">ซื้อกาแฟเพิ่มเติม<i class="fa fa-shopping-cart"></i></button>
                                        <button id="confirm_sales_orders" class="btn btn-primary" type="button">ยืนยันสั่งซื้อสินค้า <i class="fa fa-check"></i></button>
                                        <script>
                                            $("#confirm_sales_orders").click(function() {
                                                // alert(ID_ROASTERS);
                                                if (ID_ROASTERS == 'null') {
                                                    alert("กรุณาล็อกอินเข้าสู่ระบบก่อน");
                                                    location.assign('./login/');
                                                }

                                                const json = readCookie('product');
                                                const product = JSON.parse(json);


                                                var self_list = {};
                                                var id_farmers = {};
                                                var product_sel = {};
                                                product.forEach(function(value_pro, index) {
                                                    var tem = [];
                                                    if (id_farmers == '') {
                                                        id_farmers[value_pro.id_farmers.toString()] = tem;
                                                    } else {
                                                        id_farmers[value_pro.id_farmers.toString()] = tem;
                                                    }

                                                });

                                                $.each(id_farmers, function(key, value) {
                                                    product.forEach(function(value, index) {
                                                        var tem_pro = new Object();
                                                        if (value.id_farmers == key) {
                                                            tem_pro['id_roasters'] = ID_ROASTERS
                                                            tem_pro['id_products'] = value.id_products.toString();
                                                            tem_pro['id_farmers'] = value.id_farmers.toString()
                                                            tem_pro['num_item'] = value.num_item.toString()
                                                            tem_pro['price_unit'] = value.price_unit.toString()
                                                            tem_pro['sum_price'] = (value.price_unit * value.num_item).toString()
                                                            id_farmers[key].push(tem_pro);
                                                        }
                                                    });
                                                });


                                                const trnsale = JSON.stringify(id_farmers)
                                                console.log(id_farmers);
                                                $.ajax({
                                                    url: "controllers/add_trnsale.php",
                                                    type: "POST",
                                                    data: {
                                                        key: "add_trnsale",
                                                        // data : trnsale,
                                                        sel: id_farmers,
                                                        id_roasters: ID_ROASTERS
                                                    },
                                                    success: function(result, textStatus, jqXHR) {
                                                        console.log(result);
                                                        if (result == 'success') {
                                                            removeCookie('product');
                                                            alert("สั่งซื้อสินค้าสำเร็จ")
                                                            location.reload();
                                                        }else if(result == 'error'){
                                                            alert('ระบบตรวจพบข้อผิดพลาดบางอย่าง')
                                                        }else{
                                                            alert(result);
                                                        }
                                                    },
                                                    error: function(result, textStatus, jqXHR) {
                                                        alert('ระบบตรวจพบข้อผิดพลาดบางอย่าง\n this Server');
                                                    }
                                                });
                                                // console.log(new Date());

                                            });
                                        </script>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="wait_for_sale">
                                    <!-- รอยืนยันจากผู้ขาย -->

                                </div>

                                <div class="tab-pane fade" id="pending">
                                    <!-- รอดำเนินการ -->

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




</body>
<?php
include_once('./footer.php');
?>
<!-- END BODY -->

</html>