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

                    <!-- <div class="sidebar-filter margin-bottom-25"> -->
                    <!-- <h2>กรอง</h2>

                        <h3>ราคา</h3>
                        <p>
                            <label for="amount">ช่วงราคา:</label> &nbsp;&nbsp;
                            ค้นหาจาก 0 - <span id="sliderStatusMin">200</span>
                            <br />
                            <input type="range" id="amount" min="0" max="200" value="200" style="border:0; color:#f6931f; font-weight:bold;" onChange="sliderChange(this.value)">

                        </p>
                        <script>
                            function sliderChange(val) {

                                document.getElementById('sliderStatusMin').innerHTML = val;

                                function displayItem(val) {
                                }

                                displayItem(val);
                            }
                        </script>
                        <div id="slider-range"></div> -->
                    <!-- </div> -->

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
                    $between = " price_unit BETWEEN $between_min AND $between_max ";
                    $newtype = "  id_typepro LIKE '%%' ";

                    $sql_count = "SELECT * FROM `products` WHERE  $newtype AND $between AND id_farmers = '$id_farmers'";
                    $sql_data = "SELECT * FROM products WHERE id_typepro LIKE '%$type%' AND $between AND id_farmers = '$id_farmers'  ORDER BY id_products $order LIMIT $start,$pagesize"; //คำสั่งแสดง record ต่อหนึ่งหน้า $pagesize = ต้องการกี่ record ต่อ

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


                    // foreach ($result_data as $row) :
                    ?>

                    <!-- <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="product-item">
                                    <div class="pi-img-wrapper">
                                        <img src="../../pictures/product/<?php echo $row['image_pro']; ?>" class="img-responsive" alt="Berry Lace Dress">
                                        <div>
                                            <a href="../../pictures/product/<?php echo $row['image_pro']; ?>" class="btn btn-default fancybox-button">Zoom</a>
                                            <a href="#product-pop-up-<?php echo $row['id_products']; ?>" class="btn btn-default fancybox-fast-view">View</a>
                                        </div>
                                    </div>
                                    <h3><a href="shop-item.php"><?php echo $row['name_products'] ?></a></h3>
                                    <div class="pi-price">฿29.00</div>
                                    <a href="javascript:;" class="btn btn-default add2cart">เพิ่มสินค้า</a>
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
                                            <h1>ชื่อรายการสินค้า</h1>
                                            <div class="price-availability-block clearfix">
                                                <div class="price">
                                                    <strong><span>&#3647;</span>47.00</strong>
                                                </div>

                                            </div>
                                            <div class="description">
                                                <p>รายละเอียดของรายการสินค้า</p>
                                            </div>

                                            <div class="product-page-cart">
                                                <div class="product-quantity">
                                                    <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                                                </div>
                                                <button class="btn btn-primary" type="submit">เพิ่มสินค้า</button>
                                                <a href="shop-item.php" class="btn btn-default">รายละเอียด</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                    <?php //endfor; 
                    // endforeach;
                    ?>

                    <div class="row product-list">
                        <!-- <h2>สินค้าของคุณที่กำลังประกาศขาย </h2> -->
                        <div class="product-page-content">
                            <ul id="myTab" class="nav nav-tabs">
                                <li class="active"><a href="#Description" data-toggle="tab">Description</a></li>
                                <li class="" ><a href="#Information" data-toggle="tab">Information</a></li>
                                <li class="" ><a href="#Reviews" data-toggle="tab">Reviews (2)</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="Description">
                                    <p>Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed sit nonumy nibh sed
                                        euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis
                                        molestie at dolore. Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed
                                        sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat
                                        Nostrud duis molestie at dolore. Lorem ipsum dolor ut sit ame dolore
                                        adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna
                                        aliquarm erat sit volutpat Nostrud duis molestie at dolore. </p>
                                </div>
                                <div class="tab-pane fade" id="Information">
                                    <table class="datasheet">
                                        <tr>
                                            <th colspan="2">Additional features</th>
                                        </tr>
                                        <tr>
                                            <td class="datasheet-features-type">Value 1</td>
                                            <td>21 cm</td>
                                        </tr>
                                        <tr>
                                            <td class="datasheet-features-type">Value 2</td>
                                            <td>700 gr.</td>
                                        </tr>
                                        <tr>
                                            <td class="datasheet-features-type">Value 3</td>
                                            <td>10 person</td>
                                        </tr>
                                        <tr>
                                            <td class="datasheet-features-type">Value 4</td>
                                            <td>14 cm</td>
                                        </tr>
                                        <tr>
                                            <td class="datasheet-features-type">Value 5</td>
                                            <td>plastic</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="tab-pane fade " id="Reviews">
                                    <!--<p>There are no reviews for this product.</p>-->
                                    <div class="review-item clearfix">
                                        <div class="review-item-submitted">
                                            <strong>Bob</strong>
                                            <em>30/12/2013 - 07:37</em>
                                            <div class="rateit" data-rateit-value="5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                        </div>
                                        <div class="review-item-content">
                                            <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis
                                                natoque penatibus et magnis dis parturient montes, nascetur
                                                ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in
                                                orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies
                                                tristique, enim mauris bibendum orci, a sodales lectus purus ut
                                                lorem.</p>
                                        </div>
                                    </div>
                                    <div class="review-item clearfix">
                                        <div class="review-item-submitted">
                                            <strong>Mary</strong>
                                            <em>13/12/2013 - 17:49</em>
                                            <div class="rateit" data-rateit-value="2.5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                        </div>
                                        <div class="review-item-content">
                                            <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis
                                                natoque penatibus et magnis dis parturient montes, nascetur
                                                ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in
                                                orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies
                                                tristique, enim mauris bibendum orci, a sodales lectus purus ut
                                                lorem.</p>
                                        </div>
                                    </div>

                                    <!-- BEGIN FORM-->
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
                                    <!-- END FORM-->
                                </div>
                            </div>
                        </div>
                    </div>




                    <!-- <div class="row margin-bottom-40 "> -->

                    <div class="row product-list">
                        <!-- <h2>สินค้าของคุณที่กำลังประกาศขาย </h2> -->
                        <div class="row list-view-sorting clearfix">
                            <div class="col-md-4 col-sm-4 ">
                                <!-- class=" list-view " ซ่อนการแสดง-->
                                <h2 class="pull-left">สินค้าของคุณที่กำลังประกาศขาย </h2>
                            </div>
                            <div class="col-md-8 col-sm-8">

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
                        <div class="owl-carousel owl-carousel5">
                            <?php

                            foreach ($result_data as $row) :
                            ?>

                                <div>
                                    <div class="product-item">
                                        <div class="pi-img-wrapper">
                                            <img src="../../pictures/product/<?php echo $row['image_pro']; ?>" class="img-responsive" alt="Berry Lace Dress">
                                            <div>
                                                <a href="../../pictures/product/<?php echo $row['image_pro']; ?>" class="btn btn-default fancybox-button">Zoom</a>
                                                <a href="#product-pop-up-<?php echo $row['id_products']; ?>" class="btn btn-default fancybox-fast-view">View</a>
                                            </div>
                                        </div>
                                        <h3><a href="shop-item.html"><?php echo $row['name_products'] ?></a></h3>
                                        <div class="pi-price">฿<?php echo $row['price_unit'] ?></div>
                                        <a href="javascript:;" class="btn btn-default add2cart">แก้ไข</a>
                                    </div>
                                </div>

                            <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                    <?php
                    foreach ($popup as $row) :
                    ?>
                        <div id="product-pop-up-<?php echo $row['id_products']; ?>" style="display: none; width: 700px;">
                            <div class="product-page product-pop-up">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-3">
                                        <div class="product-main-image">
                                            <img src="../../pictures/product/<?php echo $row['image_pro']; ?>" alt="Cool green dress with red bell" class="img-responsive">
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-9">
                                        <h1>ชื่อรายการสินค้า</h1>
                                        <div class="price-availability-block clearfix">
                                            <div class="price">
                                                <strong><span>&#3647;</span>47.00</strong>
                                                <!-- <em>&#3647;<span>62.00</span></em> -->
                                            </div>

                                        </div>
                                        <div class="description">
                                            <p>รายละเอียดของรายการสินค้า</p>
                                        </div>

                                        <div class="product-page-cart">
                                            <div class="product-quantity">
                                                <!-- <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm"> -->
                                            </div>
                                            <button class="btn btn-primary" type="submit">เพิ่มสินค้า</button>
                                            <a href="shop-item.php" class="btn btn-default">รายละเอียด</a>
                                        </div>
                                    </div>

                                    <!-- <div class="sticker sticker-sale"></div> -->
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    // foreach ($result_data as $row) :
                    ?>
                    <!-- </div> -->


                    <div class="row">
                        <!--  -->
                        <div class="col-md-4 col-sm-4 items-info"> รายการที่ <?php echo $num_rowsx == 0 ? 0 : $start + 1; ?> ถึง <?php echo $start + $pagesize > $num_rowsx ? $num_rowsx : $start + $pagesize; ?> of <?php echo $num_rowsx ?> รายการ</div>
                        <div class="col-md-8 col-sm-8">
                            <ul class="pagination pull-right" id="ul_page">
                                <?php
                                if ($page > 1) //ถ้า ค่า page มากกว่า 1 แสดงปุ่ม ย้อนกลับ Previuos
                                {
                                    $pg = $page - 1;
                                    //echo "<a href='news.php?page=$pg'>Previuos</a>"; //ส่งค่า page ที่ลดลง 1 เมื่อกดปุ่ม next
                                    echo "<li><a href='javascript:new_page($pg);'>Previuos &laquo;</a></li>";
                                }
                                ?>

                                <!-- <li><a href='javascript:;'>&laquo;</a></li> -->
                                <?php
                                // echo $totalpage;
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


                                <!-- <li><a href="javascript:;">1</a></li>
                                <li><span>2</span></li>
                                <li><a href="javascript:;">3</a></li>
                                <li><a href="javascript:;">4</a></li>
                                <li><a href="javascript:;">5</a></li> -->


                                <?php
                                //next
                                if ($page < $totalpage) //ถ้า ค่า page น้อยกว่า page ทั้งหมด(page ท้ายสุด) แสดงปุ่ม  Next
                                {
                                    $pg = $page + 1;
                                    //echo "<a href='news.php?page=$pg'>Previuos</a>"; //ส่งค่า page ที่ลดลง 1 เมื่อกดปุ่ม next
                                    echo "<li><a href='javascript:new_page($pg);'>Next &raquo;</a></li>";
                                }

                                ?>
                            </ul>

                            <script>
                                // $('#ul_page li').on('click', 'a',function() {
                                //     alert( this.innerHTML);

                                // });

                                function new_page(object) {
                                    // var count = 0;
                                    // alert(object);
                                    // 
                                    if (queryString.includes("?")) {
                                        location.assign(window.location.href + "&page=" + object);
                                    } else {
                                        location.assign(window.location.href + "?page=" + object);
                                    }
                                }
                            </script>
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