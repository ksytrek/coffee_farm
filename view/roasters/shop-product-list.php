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
                <li><a href="./shop-product-list.php">Home</a></li>
                <!-- <li><a href="javascript:cookie();">cookie</a></li>
                <li><a href="javascript:cookie_add();">add</a></li>
                <li><a href="javascript:cookie_json();">add</a></li> -->
                <script>
                    function cookie_json() {
                        var myObject = {
                            'name': 'Kasun',
                            'address': 'columbo',
                            'age': '29'
                        }

                        var count = Object.keys(myObject).length;
                        console.log(count);
                    }

                    function cookie_add() {
                        var b = [];
                        var x = readCookie('name');

                        b = JSON.parse(x);

                        b.push(['4', '2', '112']);
                        createCookie("name", JSON.stringify(b));

                        const json = readCookie('name');
                        const obj = JSON.parse(json);

                        console.log(obj.length);
                        obj.forEach(element => {
                            alert(element[0]);
                        });
                    }

                    function cookie() {
                        var product = [
                            [
                                '1', '2', '112'
                            ],
                            [
                                '2', '2', '112'
                            ]
                        ];
                        product.push(['3', '2', '112'])



                        createCookie("name", JSON.stringify(product));

                        const json = readCookie('name');
                        const obj = JSON.parse(json);

                        console.log(obj.length);
                        obj.forEach(element => {
                            // alert(element[0]);
                        });
                        // expected output: 42

                        // console.log(obj.result);
                        // expected output: true

                        // alert( getByteSize(document.cookie));
                        // product.length+

                    }

                    function getByteSize(s) {
                        return encodeURIComponent('<q></q>' + s).length;
                    }

                    $()
                </script>

                <!-- <li><a href="">Store</a></li> -->
                <!-- <li class="active">Men category</li> -->
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->

                <div class="sidebar col-md-3 col-sm-5">

                    <script>
                        const queryString = window.location.search;

                        function search_type(object) {
                            if (queryString.includes("?")) {
                                location.assign(window.location.href + "&type=" + object);
                            } else {
                                location.assign(window.location.href + "?type=" + object);
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
                        <!-- <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Ladies</a></li>
                        <li class="list-group-item clearfix dropdown active">
                            <a href="javascript:void(0);" class="collapsed">
                                <i class="fa fa-angle-right"></i>
                                Mens

                            </a>
                            <ul class="dropdown-menu" style="display:block;">
                                <li class="list-group-item dropdown clearfix active">
                                    <a href="javascript:void(0);" class="collapsed"><i class="fa fa-angle-right"></i> Shoes </a>
                                    <ul class="dropdown-menu" style="display:block;">
                                        <li class="list-group-item dropdown clearfix">
                                            <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Classic </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 1</a></li>
                                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 2</a></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item dropdown clearfix active">
                                            <a href="javascript:void(0);" class="collapsed"><i class="fa fa-angle-right"></i> Sport </a>
                                            <ul class="dropdown-menu" style="display:block;">
                                                <li class="active"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport 1</a></li>
                                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport 2</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Trainers</a></li>
                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Jeans</a></li>
                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Chinos</a></li>
                                <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> T-Shirts</a></li>
                            </ul>
                        </li> -->
                        <!-- <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Kids</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Accessories</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sports</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Brands</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Electronics</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Home & Garden</a></li>
                        <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Custom Link</a></li> -->
                    </ul>

                    <!-- <div class="sidebar-filter margin-bottom-25">
                        <h2>กรอง</h2>
                        <h3>ราคา</h3>
                        <p>
                            <label for="amount">ช่วงราคา:</label> &nbsp;&nbsp;
                            ค้นหาจาก <span id="sliderStatusMin"></span>
                            <br />
                            <br />
                        </p>
                        <input type="text" id="sampleSlider" />

                        <script>
                            // var max_price = '';
                            // alert(max_price);
                            var mySlider = null;
                            var count_bee = 0;
                            // $(document).ready(function() {
                            mySlider = new rSlider({
                                target: '#sampleSlider',
                                values: {
                                    min: 0,
                                    max: 100
                                },
                                width: null,
                                step: 10,
                                labels: false,
                                range: true,
                                tooltip: false,
                                // set: [0, 333],
                                scale: false,
                                onChange: function(vals) {
                                    // console.log(vals);


                                    const arrStr = vals.split(",");
                                    sliderChange(arrStr[0] + " - " + arrStr[1]);

                                    const min = arrStr[0];
                                    const max = arrStr[1];

                                    if (count_bee == 1) {
                                        count_bee = 0;
                                        if (queryString.includes("?")) {
                                            location.assign(window.location.href + "&between_min=" + min + "&between_max=" + max);
                                        } else {
                                            location.assign(window.location.href + "?" + "between_min=" + min + "&between_max=" + max);
                                        }
                                    }
                                    // alert(count_bee);;
                                    count_bee++;

                                },
                            });



                            window.onload = (event) => {

                            };
                        </script>

                        <script>
                            function sliderChange(val) {
                                document.getElementById('sliderStatusMin').innerHTML = val;

                                function displayItem(val) {

                                }

                                displayItem(val);
                            }
                        </script>

                    </div> -->

                    <!-- <div class="sidebar-products clearfix">
                        <h2>Bestsellers</h2>
                        <div class="item">
                            <a href="shop-item.php"><img src="../../script/assets/pages/img/products/k1.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                            <h3><a href="shop-item.php">Some Shoes in Animal with Cut Out</a></h3>
                            <div class="price">$31.00</div>
                        </div>
                        <div class="item">
                            <a href="shop-item.php"><img src="../../script/assets/pages/img/products/k4.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                            <h3><a href="shop-item.php">Some Shoes in Animal with Cut Out</a></h3>
                            <div class="price">$23.00</div>
                        </div>
                        <div class="item">
                            <a href="shop-item.php"><img src="../../script/assets/pages/img/products/k3.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                            <h3><a href="shop-item.php">Some Shoes in Animal with Cut Out</a></h3>
                            <div class="price">$86.00</div>
                        </div>
                    </div> -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-7">
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
                                    <option value="&amp;limit=10" <?php echo isset($_GET["limit"]) && $_GET["limit"] == 10 ?   'selected="selected "' : " " ?>>10</option>
                                    <option value="&amp;limit=25" <?php echo isset($_GET["limit"]) && $_GET["limit"] == 25 ?   'selected="selected "' : " " ?>>25</option>
                                    <option value="&amp;limit=50" <?php echo isset($_GET["limit"]) && $_GET["limit"] == 50 ?   'selected="selected "' : " " ?>>50</option>
                                    <option value="&amp;limit=75" <?php echo isset($_GET["limit"]) && $_GET["limit"] == 75 ?   'selected="selected "' : " " ?>>75</option>
                                    <option value="&amp;limit=100" <?php echo isset($_GET["limit"]) && $_GET["limit"] == 100 ?   'selected="selected "' : " " ?>>100</option>
                                </select>
                            </div>

                            <div class="pull-right">
                                <label class="control-label">จัดเรียง&nbsp;โดย:</label>
                                <select id='sort_by' class="form-control input-sm" onChange="select_sort_by(this);">
                                    <option value="&amp;sort=id_productsr&amp;order=ASC" <?php echo isset($_GET["sort"]) && $_GET["sort"] == 'id_productsr' && isset($_GET['order']) && $_GET['order'] == 'ASC' ?   'selected="selected "' : " " ?>>Default</option>
                                    <option value="&amp;sort=name_products&amp;order=ASC" <?php echo isset($_GET["sort"]) && $_GET["sort"] == 'name_products' && isset($_GET['order']) && $_GET['order'] == 'ASC' ?   'selected="selected "' : " " ?>>ชื่อ (A - Z)</option>
                                    <option value="&amp;sort=name_products&amp;order=DESC" <?php echo isset($_GET["sort"]) && $_GET["sort"] == 'name_products' && isset($_GET['order']) && $_GET['order'] == 'DESC' ?   'selected="selected "' : " " ?>>ชื่อ (Z - A)</option>
                                    <option value="&amp;sort=price_unit&amp;order=ASC" <?php echo isset($_GET["sort"]) && $_GET["sort"] == 'price_unit' && isset($_GET['order']) && $_GET['order'] == 'ASC' ?   'selected="selected "' : " " ?>>ราคา (ต่ำ &gt; สูง)</option>
                                    <option value="&amp;sort=price_unit&amp;order=DESC" <?php echo isset($_GET["sort"]) && $_GET["sort"] == 'price_unit' && isset($_GET['order']) && $_GET['order'] == 'DESC' ?   'selected="selected "' : " " ?>>ราคา (สูง &gt; ต่ำ)</option>
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

                        $pagesize = isset($_GET['limit']) ? $_GET['limit'] : 10;   //จำนวน record ที่ต้องการแสดงในหนึ่งหน้า
                        $sort =  isset($_GET['sort']) ? $_GET['sort'] : 'id_products';
                        $order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
                        $type = isset($_GET['type']) ? $_GET['type'] : '%%';

                        // $between_min = isset($_GET['between_min']) ? $_GET['between_min'] : "0";
                        // $between_max = isset($_GET['between_max']) ? $_GET['between_max'] : "(SELECT MAX(price_unit) as 'max' FROM products )";
                        // $between = " price_unit BETWEEN $between_min AND $between_max ";
                        // $newtype = "  id_typepro LIKE '%%' ";

                        $sql_count = "SELECT * FROM `products` WHERE  id_typepro LIKE '%$type%' ";
                        $sql_data = "SELECT * FROM products as pro 
                                                INNER JOIN typepro as ty ON ty.id_typepro = pro.id_typepro 
                                                INNER JOIN farmers as far ON far.id_farmers = pro.id_farmers 
                                                WHERE pro.id_typepro LIKE '%$type%'   ORDER BY pro.id_products $order LIMIT $start,$pagesize"; //คำสั่งแสดง record ต่อหนึ่งหน้า $pagesize = ต้องการกี่ record ต่อ

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
                            $num_rows = $result_data->rowCount();
                        } catch (Exception $e) {
                        }

                        foreach ($result_data as $row) :
                        ?>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="product-item">
                                    <div class="pi-img-wrapper">
                                        <img src="../../pictures/product/<?php echo $row['image_pro']; ?>" class="img-responsive" alt="Berry Lace Dress">
                                        <div>
                                            <a href="../../pictures/product/<?php echo $row['image_pro']; ?>" class="btn btn-default fancybox-button">Zoom</a>
                                            <a href="#product-pop-up-<?php echo $row['id_products']; ?>" class="btn btn-default fancybox-fast-view">View</a>
                                        </div>
                                    </div>
                                    <h3><a href="shop-item.php"><?php echo $row['name_products'] ?></a></h3>
                                    <div class="pi-price">฿<?php echo $row['price_unit'] ?></div>
                                    <a href="javascript:add_product(<?php echo $row['id_products'] ?>,<?php echo $row['id_farmers'] ?>,<?php echo $row['price_unit'] ?>,1);" class="btn btn-default add2cart">เพิ่มสินค้า</a>
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
                                                    <strong><span>&#3647;</span><?php echo $row['price_unit'] ?></strong>
                                                    <!-- <em>&#3647;<span>62.00</span></em>   จากราคา -->
                                                </div>

                                            </div>
                                            <div class="description">
                                                <p>ประเภทกาแฟ :
                                                    <strong> <?php echo $row['name_typepro']; ?></strong>
                                                </p>
                                                <p>คนขาย :
                                                    <strong> <?php echo $row['name_farmers']; ?></strong>
                                                </p>
                                            </div>
                                            <div class="product-page-options">

                                            </div>
                                            <div class="product-page-cart">
                                                <div class="product-quantity">
                                                    <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                                                </div>
                                                <button onclick="add_product(<?php echo $row['id_products'] ?>,<?php echo $row['id_farmers'] ?>,<?php echo $row['price_unit'] ?>,$('#product-quantity').val());" class="btn btn-primary" type="button">เพิ่มสินค้า</button>
                                                <a href="shop-item.php" class="btn btn-default">รายละเอียด</a>
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
                        <script>
                            function add_product(id_products, id_farmers, price_unit, num_item) {
                                var product = [];
                                var int_i = 0;
                                var num_item_new = parseInt(num_item);
                                if (readCookie('product') == null) {
                                    // alert( readCookie('product'));
                                    createCookie("product", JSON.stringify(product));
                                    product_new = {
                                        id_products: id_products,
                                        id_farmers: id_farmers,
                                        price_unit: price_unit,
                                        num_item: num_item_new
                                    };

                                    product.push(product_new);
                                    createCookie("product", JSON.stringify(product));

                                } else {
                                    product = JSON.parse(readCookie('product')); // array type
                                    product.forEach(function(value, i) {
                                        // alert(i);
                                        if (value.id_products == id_products) {
                                            int_i = i;
                                        }
                                    });

                                    product[int_i].num_item += num_item_new;
                                    createCookie("product", JSON.stringify(product));
                                }

                            }
                        </script>
                    </div>


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
                    <!-- END PAGINATOR -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>



    <?php
    include_once("./footer.php");
    ?>


    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
</body>


</html>