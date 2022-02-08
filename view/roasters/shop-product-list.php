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
include_once './navbar.php';
?>
<!-- Head BEGIN -->

<head>
    <meta charset="utf-8">
    <title>หน้าหลัก</title>

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

    <link rel="stylesheet" href="./scripts/css/rSlider.min.css">
    <script src="./scripts/js/rSlider.min.js"></script>
</head>
<!-- Head END -->

<!-- Body BEGIN -->

<body class="ecommerce">




    <!-- <div class="title-wrapper">
        <div class="container">
            <div class="container-inner">
                <h1><span>MEN</span> CATEGORY</h1>
                <em>Over 4000 Items are available here</em>
            </div>
        </div>
    </div> -->

    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="./index.html">หน้าหลัก</a></li>
                <!-- <li><a href="">รายการสินค้า</a></li> -->
                <li class="active">รายการสินค้า</li>
                <!-- <li class="active">Men category</li> -->
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->

                <div class="sidebar col-md-3 col-sm-5">

                    <script>
                        function search_type(object) {
                            if (queryString.includes("?")) {
                                location.assign(window.location.href + "&type=" + object);
                            } else {
                                location.assign(window.location.href + "?type=" + object);
                            }
                        }

                        function search_name(object) {
                            var name = $("#" + object).val();

                            if (queryString.includes("?")) {
                                location.assign(window.location.href + "&name=" + name);
                            } else {
                                location.assign(window.location.href + "?name=" + name);
                            }
                        }

                        function select_provinces(object) {
                            var name = $("#" + object).val();
                            // alert(name);

                            if (queryString.includes("?")) {
                                location.assign(window.location.href + "&provinces=" + name);
                            } else {
                                location.assign(window.location.href + "?provinces=" + name);
                            }
                        }
                    </script>

                    <ul class="list-group margin-bottom-25 sidebar-menu">
                        <h2>ค้นหาหมวดหมู่</h2>
                        <?php
                        $result = Database::query("SELECT * FROM `typepro`", PDO::FETCH_ASSOC);
                        foreach ($result as $row) :
                        ?>
                            <li class="list-group-item clearfix"><a href="javascript:search_type(<?php echo $row['id_typepro'] ?>); ">&nbsp;<i class="fa fa-angle-right"></i><?php echo $row['name_typepro'] ?></a></li>
                        <?php endforeach; ?>

                    </ul>
                    <h2>ค้นหาจากจังหวัด</h2>

                    <select id="select_provinces" name="select_provinces" class="form-control input-sm" onChange="select_provinces('select_provinces');">



                        <option selected disabled> เลือกจังหวัด</option>
                        <?php
                        $result_provinces = Database::query("SELECT * FROM `provinces`", PDO::FETCH_ASSOC);
                        foreach ($result_provinces as $row_provinces) :
                        ?>
                            <option value="<?php echo $row_provinces['id_provinces'] ?>" <?php echo isset($_GET["provinces"]) && $_GET["provinces"] == $row_provinces['id_provinces'] ? 'selected="selected "' : " " ?>><?php echo $row_provinces['name_provinces'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-9 col-sm-7">
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6" style="margin-bottom: 10px;">
                            <form action="#">
                                <div class="input-group">
                                    <input id="search-name" value="<?php if (isset($_GET['name'])) : echo $_GET['name'];
                                                                    endif; ?>" type="text" placeholder="ค้นหาจากชื่อ" class="form-control">
                                    <span class="input-group-btn">
                                        <button onclick="search_name('search-name')" class="btn btn-primary" type="button">ค้นหา</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="row list-view-sorting clearfix">
                        <div class="col-md-2 col-sm-2 list-view">
                            <a href="javascript:;"><i class="fa fa-th-large"></i></a>
                            <a href="javascript:;"><i class="fa fa-th-list"></i></a>
                        </div>


                        <script>
                            window.onload = (event) => {
                                var url = window.location.href;
                                const urlParams = new URLSearchParams(queryString);
                                const sort = urlParams.get('sort');
                                const order = urlParams.get('order');
                                const limit = urlParams.get('limit');
                                const page = urlParams.get('page');
                                // const min_bee = urlParams.get('between_min');
                                // const max_bee = urlParams.get('between_max');
                            };



                            // count_bee = 0;
                        </script>

                        <div class="col-md-10 col-sm-10">
                            <div class="pull-right">
                                <button id="btn_reset" type="button" class="btn btn-default btn-sm ">คืนค่าเริ่มต้น</button>
                                <script>
                                    $("#btn_reset").click(function() {
                                        location.assign("<?php echo $_SERVER['PHP_SELF'] ?>");
                                    });
                                </script>
                            </div>
                            <div class="pull-right">
                                <label class="control-label">แสดง:</label>
                                <select id="select_limit" name="select_limit" class="form-control input-sm" onChange="select_sort_by(this);">
                                    <option value="&amp;limit=10" <?php echo isset($_GET["limit"]) && $_GET["limit"] == 10 ? 'selected="selected "' : " " ?>>10</option>
                                    <option value="&amp;limit=25" <?php echo isset($_GET["limit"]) && $_GET["limit"] == 25 ? 'selected="selected "' : " " ?>>25</option>
                                    <option value="&amp;limit=50" <?php echo isset($_GET["limit"]) && $_GET["limit"] == 50 ? 'selected="selected "' : " " ?>>50</option>
                                    <option value="&amp;limit=75" <?php echo isset($_GET["limit"]) && $_GET["limit"] == 75 ? 'selected="selected "' : " " ?>>75</option>
                                    <option value="&amp;limit=100" <?php echo isset($_GET["limit"]) && $_GET["limit"] == 100 ? 'selected="selected "' : " " ?>>100</option>
                                </select>
                            </div>

                            <div class="pull-right">
                                <label class="control-label">จัดเรียง&nbsp;โดย:</label>
                                <select id='sort_by' class="form-control input-sm" onChange="select_sort_by(this);">
                                    <option value="&amp;sort=id_productsr&amp;order=ASC" <?php echo isset($_GET["sort"]) && $_GET["sort"] == 'id_productsr' && isset($_GET['order']) && $_GET['order'] == 'ASC' ? 'selected="selected "' : " " ?>>Default</option>
                                    <option value="&amp;sort=name_products&amp;order=ASC" <?php echo isset($_GET["sort"]) && $_GET["sort"] == 'name_products' && isset($_GET['order']) && $_GET['order'] == 'ASC' ? 'selected="selected "' : " " ?>>ชื่อ (A - Z)</option>
                                    <option value="&amp;sort=name_products&amp;order=DESC" <?php echo isset($_GET["sort"]) && $_GET["sort"] == 'name_products' && isset($_GET['order']) && $_GET['order'] == 'DESC' ? 'selected="selected "' : " " ?>>ชื่อ (Z - A)</option>
                                    <option value="&amp;sort=price_unit&amp;order=ASC" <?php echo isset($_GET["sort"]) && $_GET["sort"] == 'price_unit' && isset($_GET['order']) && $_GET['order'] == 'ASC' ? 'selected="selected "' : " " ?>>ราคา (ต่ำ &gt; สูง)</option>
                                    <option value="&amp;sort=price_unit&amp;order=DESC" <?php echo isset($_GET["sort"]) && $_GET["sort"] == 'price_unit' && isset($_GET['order']) && $_GET['order'] == 'DESC' ? 'selected="selected "' : " " ?>>ราคา (สูง &gt; ต่ำ)</option>
                                </select>

                                <script>
                                    function select_sort_by(object) {
                                        var count = 0;
                                        //
                                        if (queryString.includes("?")) {
                                            location.assign(window.location.href + object.value);
                                        } else {
                                            location.assign(window.location.href + "?" + object.value);
                                        }
                                    }

                                    function select_limit(object) {
                                        if (queryString.includes("?")) {
                                            location.assign(window.location.href + object.value);
                                        } else {
                                            location.assign(window.location.href + "?" + object.value);
                                        }
                                    }
                                </script>
                            </div>

                        </div>
                    </div>

                    <div class="row product-list">

                        <?php

                        $page = null;
                        $start = 0; // ค่าของ record โดย page1 $startต้อง=0, page2 $startต้อง=3,page3 $startต้อง=6

                        $pagesize = isset($_GET['limit']) ? $_GET['limit'] : 10; //จำนวน record ที่ต้องการแสดงในหนึ่งหน้า
                        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id_products';
                        $order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
                        $type = isset($_GET['type']) ? $_GET['type'] : '%%';
                        $name = isset($_GET['name']) ? $_GET['name'] : '%%';
                        $provinces = isset($_GET['provinces']) ? $_GET['provinces'] : '%%';
                        // $between_min = isset($_GET['between_min']) ? $_GET['between_min'] : "0";
                        // $between_max = isset($_GET['between_max']) ? $_GET['between_max'] : "(SELECT MAX(price_unit) as 'max' FROM products )";
                        // $between = " price_unit BETWEEN $between_min AND $between_max ";
                        // $newtype = "  id_typepro LIKE '%%' ";

                        // AND far.id_provinces LIKE '$provinces'
                        // AND far.id_provinces LIKE '$provinces'

                        $sql_count = "SELECT *  FROM `products` as pro INNER JOIN farmers as far ON far.id_farmers = pro.id_farmers
                                                 WHERE id_provinces LIKE '$provinces'
                                                    AND  id_typepro LIKE '%$type%'
                                                    AND name_products LIKE '%$name%'
                                                    AND id_products NOT IN (SELECT id_products FROM products WHERE status_products = 0 OR status_products = 3) ";
                        $sql_data = "SELECT *, DATE_FORMAT(pro.harvest_date, '%e %M  %Y') AS date_time_harvest_date FROM products as pro
                                                INNER JOIN typepro as ty ON ty.id_typepro = pro.id_typepro
                                                INNER JOIN farmers as far ON far.id_farmers = pro.id_farmers
                                                WHERE id_provinces LIKE '$provinces' AND pro.id_typepro LIKE '%$type%' AND name_products LIKE '%$name%'  AND id_products NOT IN (SELECT id_products FROM products WHERE status_products = 0 OR status_products = 3 )   ORDER BY pro.$sort $order LIMIT $start,$pagesize"; //คำสั่งแสดง record ต่อหนึ่งหน้า $pagesize = ต้องการกี่ record ต่อ

                        $result_count = Database::query($sql_count, PDO::FETCH_ASSOC); //เก็บข้อมูลไว้ใน $result
                        $num_rowsx = $result_count->rowCount(); //ใช้คำสั่ง mysql_num_rows เพื่อหาจำนวน record ทั้งหมด
                        $totalpage = ceil($num_rowsx / $pagesize);

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

                        // $num = 8456.22;

                        $result_data = null;
                        $num_rows = null;

                        try {
                            // $sql_data = "SELECT * FROM products WHERE id_typepro LIKE '%$type%' ORDER BY id_products $order LIMIT $start,$pagesize";
                            $result_data = Database::query($sql_data, PDO::FETCH_ASSOC);
                            $num_rows = $result_data->rowCount();
                        } catch (Exception $e) {
                        }

                        // $fmt = new NumberFormatter('th_TH', NumberFormatter::CURRENCY);
                        // echo $ft->formatCurrency(100, 'THB');

                        // setlocale(LC_MONETARY, "en_US.UTF-8");
                        // echo money_format("%i", $number);

                        foreach ($result_data as $row) :
                            // $fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
                            // echo $fmt->formatCurrency(1234567.891234567890000, "EUR")."\n";
                            // echo $fmt->formatCurrency(1234567.891234567890000, "RUR")."\n";
                        ?>

                            <style>
                                input[type=number]::-webkit-inner-spin-button {
                                    -webkit-appearance: none;
                                }
                            </style>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="product-item">
                                    <div class="pi-img-wrapper">
                                        <img src="../../pictures/product/<?php echo $row['image_pro']; ?>" class="img-responsive" alt="Berry Lace Dress">
                                        <div>
                                            <a href="../../pictures/product/<?php echo $row['image_pro']; ?>" class="btn btn-default fancybox-button">Zoom</a>
                                            <a href="#product-pop-up-<?php echo $row['id_products']; ?>" class="btn btn-default fancybox-fast-view">View</a>
                                        </div>
                                    </div>
                                    <h3 style="margin:2px;padding:2px;"><a href="shop-item.php?product=<?php echo $row['id_products'] ?>"><?php echo $row['name_products'] ?></a></h3>
                                    <div class="description" style="margin: 2px ; margin-left: 0px;">
                                        <div class="col-xs-12">
                                            คลัง <strong><?php echo $row['num_stock']; ?></strong> Kg.

                                        </div>

                                    </div>
                                    <div class="description" style="margin: 2px ; margin-left: 0px;">
                                        <div class="col-xs-12">
                                            เก็บเกี่ยว <strong><?php echo $row['date_time_harvest_date']; ?></strong>

                                        </div>

                                    </div>
                                    <div class="pi-price">฿<?php echo $row['price_unit'] . '.' . '00' ?></div>
                                    <!-- <a href="#product-pop-up-<?php echo $row['id_products']; ?>" class="btn btn-default add2cart fancybox-fast-vie">เพิ่มสินค้า</a> -->
                                    <!-- <input id="input__product-<?php echo $row['id_products']; ?>" type="number" value="1"> -->

                                    <div class="product-quantity " style="margin-right: 0px; margin-left: 10px;">
                                        <input id="input__product-<?php echo $row['id_products']; ?>" min="1" max="100" type="number" value="1" name="product-quantity" class="form-control input-sm">
                                    </div>
                                    <a href="javascript:add_product(<?php echo $row['id_products'] ?>,<?php echo $row['id_farmers'] ?>,<?php echo $row['price_unit'] ?>,'input__product-<?php echo $row['id_products']; ?>', '<?php echo $row['name_products'] ?>','<?php echo $row['image_pro'] ?>');" class="btn btn-default add2cart">เพิ่มสินค้า</a>

                                </div>
                            </div>

                            <div id="product-pop-up-<?php echo $row['id_products']; ?>" style="display: none; width: 700px;">
                                <div class="product-page product-pop-up">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-3">
                                            <div class="product-main-image">
                                                <img src="../../pictures/product/<?php echo $row['image_pro']; ?>" alt="Cool green dress with red bell" class="img-responsive">
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-9">
                                            <h1><?php echo $row['name_products'] ?></h1>
                                            <div class="price-availability-block clearfix">
                                                <div class="price">
                                                    <strong><span>&#3647;</span><?php echo $row['price_unit'] . '.' . '00' ?></strong>
                                                    <!-- <em>&#3647;<span>62.00</span></em>   จากราคา -->
                                                </div>

                                            </div>
                                            <div class="description">
                                                <p>เก็บเกี่ยว :
                                                    <strong> <?php echo $row['date_time_harvest_date']; ?> </strong>
                                                </p>
                                                <p>คงเหลือ :
                                                    <strong> <?php echo $row['num_stock']; ?> Kg.</strong>
                                                </p>
                                                <p>ประเภทกาแฟ :
                                                    <strong> <?php echo $row['name_typepro']; ?></strong>
                                                </p>
                                                <p>ชื่อฟาร์มที่ขาย :
                                                    <strong><a href="./information-farm.php?infr=<?php echo $row['id_farmers'] ?>"><?php echo $row['name_farmers']; ?></a></strong>
                                                </p>
                                            </div>
                                            <div class="product-page-options">

                                            </div>
                                            <div class="product-page-cart">
                                                <div class="product-quantity">
                                                    <input id="input_item_product-<?php echo $row['id_products']; ?>" min="0" value="1" max="100" type="number" name="product-quantity" class="form-control input-sm">

                                                </div>
                                                <!-- <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <input id="input_item_product-<?php echo $row['id_products']; ?>" min="0" max="99999" value="1" type="number" name="product-quantity" class="form-control input-sm">
                                                    </div>
                                                </div> -->
                                                <button onclick="add_product(<?php echo $row['id_products'] ?>,<?php echo $row['id_farmers'] ?>,<?php echo $row['price_unit'] ?>,'input_item_product-<?php echo $row['id_products']; ?>', '<?php echo $row['name_products'] ?>','<?php echo $row['image_pro'] ?>');" class="btn btn-primary" type="button">เพิ่มสินค้า</button>
                                                <a href="shop-item.php?product=<?php echo $row['id_products'] ?>" class="btn btn-default">รายละเอียด</a>
                                            </div>
                                            <script>

                                            </script>
                                        </div>

                                        <!-- <div class="sticker sticker-sale"></div> -->
                                    </div>
                                </div>
                            </div>

                        <?php //endfor;
                        endforeach;
                        ?>
                    </div>


                    <?php if ($num_rowsx != 0) : ?>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 items-info"> รายการที่ <?php echo $num_rowsx == 0 ? 0 : $start + 1; ?> ถึง <?php echo $start + $pagesize > $num_rowsx ? $num_rowsx : $start + $pagesize; ?> of <?php echo $num_rowsx ?> รายการ</div>
                            <div class="col-md-8 col-sm-8">
                                <ul class="pagination pull-right" id="ul_page">
                                    <?php
                                    if ($page > 1) //ถ้า ค่า page มากกว่า 1 แสดงปุ่ม ย้อนกลับ Previuos
                                    {
                                        $pg = $page - 1;

                                        echo "<li><a href='javascript:new_page($pg);'>Previuos &laquo;</a></li>";
                                    }
                                    ?>

                                    <?php

                                    for ($i = 1; $i <= $totalpage; $i++) :

                                        if (isset($_GET['page']) && $_GET['page'] == $i) {
                                            echo "<li><span>$i</span></li>";
                                        } else if (!isset($_GET['page']) && $i == 1) {
                                            echo "<li><span>1</span></li>";
                                        } else {
                                            echo "<li><a href='javascript:new_page($i);'>$i</a></li>";
                                        }
                                    // $page++;
                                    endfor;
                                    ?>





                                    <?php
                                    //next
                                    if ($page < $totalpage && $page != 0) //ถ้า ค่า page น้อยกว่า page ทั้งหมด(page ท้ายสุด) แสดงปุ่ม  Next
                                    {
                                        $pg = $page + 1;
                                        //echo "<a href='news.php?page=$pg'>Previuos</a>"; //ส่งค่า page ที่ลดลง 1 เมื่อกดปุ่ม next
                                        echo "<li><a href='javascript:new_page($pg);'>Next &raquo;</a></li>";
                                    }

                                    ?>
                                </ul>
                                <script>
                                    function new_page(object) {
                                        if (queryString.includes("?")) {
                                            location.assign(window.location.href + "&page=" + object);
                                        } else {
                                            location.assign(window.location.href + "?page=" + object);
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="row">
                            ไม่พบรายการที่ค้นหา
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>



    <?php
    include_once "./footer.php";
    ?>


</body>


</html>