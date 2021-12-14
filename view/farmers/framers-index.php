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
            echo $id_farmers;
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
                    <div class="row list-view-sorting clearfix">
                        <div class="col-md-2 col-sm-2 list-view">
                            <a href="javascript:;"><i class="fa fa-th-large"></i></a>
                            <a href="javascript:;"><i class="fa fa-th-list"></i></a>
                        </div>
                        <div class="col-md-10 col-sm-10">

                            <div class="pull-right">

                                <label class="control-label">แสดง:</label>
                                <select class="form-control input-sm">
                                    <option value="#?limit=24" selected="selected">24</option>
                                    <option value="#?limit=25">25</option>
                                    <option value="#?limit=50">50</option>
                                    <option value="#?limit=75">75</option>
                                    <option value="#?limit=100">100</option>
                                </select>

                            </div>


                            <div class="pull-right">
                                <label class="control-label">จัดเรียง&nbsp;โดย:</label>
                                <select class="form-control input-sm">
                                    <option value="#?sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>
                                    <option value="#?sort=pd.name&amp;order=ASC">ชื่อ (A - Z)</option>
                                    <option value="#?sort=pd.name&amp;order=DESC">ชื่อ (Z - A)</option>
                                    <option value="#?sort=p.price&amp;order=ASC">ราคา (ต่ำ &gt; สูง)</option>
                                    <option value="#?sort=p.price&amp;order=DESC">ราคา (สูง &gt; ต่ำ)</option>
                                    <!-- <option value="#?sort=rating&amp;order=DESC">Rating (Highest)</option>
                                    <option value="#?sort=rating&amp;order=ASC">Rating (Lowest)</option> -->
                                    <!-- <option value="#?sort=p.model&amp;order=ASC">Model (A - Z)</option>
                                    <option value="#?sort=p.model&amp;order=DESC">Model (Z - A)</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- BEGIN PRODUCT LIST -->
                    <h2>สินค้าของคุณที่กำลังประกาศขาย </h2>

                    <div class="row product-list">
                        <!-- PRODUCT ITEM START -->
                        <?php
                        // for ($i = 0; $i < 5; $i++) :
                        $page = null;
                        $pagesize = 5;   //จำนวน record ที่ต้องการแสดงในหนึ่งหน้า
                        $start = 0; // ค่าของ record โดย page1 $startต้อง=0, page2 $startต้อง=3,page3 $startต้อง=6

                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                            $start = ($page - 1) * $pagesize  ; //นี้เป็นสูตรการคำนวนครับ
                        } else {
                            $page = 0;
                            $start = 0;
                        }

                        $sql_count = "SELECT * FROM `products` WHERE id_farmers LIKE '1';";

                        $result_count = Database::query($sql_count, PDO::FETCH_ASSOC);                      //เก็บข้อมูลไว้ใน $result
                        $num_rowsx = $result_count->rowCount();   //ใช้คำสั่ง mysql_num_rows เพื่อหาจำนวน record ทั้งหมด
                        $totalpage =  ceil($num_rowsx / $pagesize);
                        //หาค่า page ทั้งหมดว่ามีกี่ page โดยการนำ record ทั้งหมดมาหารกับจำนวน record ที่แสดงต่อหนึ่งหน้า //แต่อาจได้ค่าทศนิยม เราจึงใช้คำสั่ง ceil เพื่อปัดค่าขึ้นเป็นจำนวนเต็มครับ
                        $sql_data = "SELECT * FROM products WHERE id_farmers LIKE '1' ORDER BY id_products ASC LIMIT $start,$pagesize"; //คำสั่งแสดง record ต่อหนึ่งหน้า $pagesize = ต้องการกี่ record ต่อ
                        //หนึ่งหน้า  $start= เริ่มจาก record ที่เท่าไหร่
                        $result_data =  Database::query($sql_data, PDO::FETCH_ASSOC);
                        $num_rows = $result_data->rowCount();

                        // echo  $page;


                        // $sql_count = "SELECT COUNT(*) FROM `products` WHERE id_farmers LIKE '1'";
                        // $query = Database::query($sql_count, PDO::FETCH_ASSOC);
                        // $row = count($query->fetch());

                        // $rows = $row;

                        // $page_rows = 6;  //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า 

                        // $last = ceil($rows / $page_rows);

                        // if ($last < 1) {
                        //     $last = 1;
                        // }

                        // $pagenum = 1;

                        // if (isset($_GET['pn'])) {
                        //     // $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
                        //     $pagenum = $_GET['pn'];
                        // }

                        // if ($pagenum < 1) {
                        //     $pagenum = 1;
                        // } else if ($pagenum > $last) {
                        //     $pagenum = $last;
                        // }

                        // $limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;

                        // $nquery = Database::query("SELECT * FROM `products` $limit", PDO::FETCH_ASSOC);




                        foreach ($result_data as $row) :
                        ?>


                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="product-item">
                                    <div class="pi-img-wrapper">
                                        <img src="../../script/pictures/<?php echo $row['image_pro']; ?>" class="img-responsive" alt="Berry Lace Dress">
                                        <div>
                                            <a href="../../script/pictures/<?php echo $row['image_pro']; ?>" class="btn btn-default fancybox-button">Zoom</a>
                                            <a href="#product-pop-up-<?php echo '1'; ?>" class="btn btn-default fancybox-fast-view">View</a>
                                        </div>
                                    </div>
                                    <h3><a href="shop-item.php"><?php echo $row['name_products'] ?></a></h3>
                                    <div class="pi-price">฿29.00</div>
                                    <a href="javascript:;" class="btn btn-default add2cart">เพิ่มสินค้า</a>
                                </div>
                            </div>

                            <div id="product-pop-up-<?php echo '1'; ?>" style="display: none; width: 700px;">
                                <div class="product-page product-pop-up">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-3">
                                            <div class="product-main-image">
                                                <img src="../../script/pictures/<?php echo $row['image_pro']; ?>" alt="Cool green dress with red bell" class="img-responsive">
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

                                                <button class="btn btn-primary" type="submit">เพิ่มสินค้า</button>
                                                <a href="shop-item.php" class="btn btn-default">รายละเอียด</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        <?php //endfor; 
                        endforeach;
                        ?>

                    </div>
                    <div class="row">
                        <!--  -->
                        <div class="col-md-4 col-sm-4 items-info"> รายการที่ <?php echo $start+1 ; ?> ถึง <?php echo $start + $pagesize > $num_rowsx ? $num_rowsx: $start + $pagesize ; ?> of <?php echo $num_rowsx ?> รายการ</div>
                        <div class="col-md-8 col-sm-8">
                            <ul class="pagination pull-right">
                                <?php
                                if ($page > 1) //ถ้า ค่า page มากกว่า 1 แสดงปุ่ม ย้อนกลับ Previuos
                                {
                                    $pg = $page - 1;
                                    //echo "<a href='news.php?page=$pg'>Previuos</a>"; //ส่งค่า page ที่ลดลง 1 เมื่อกดปุ่ม next
                                    echo "<li><a href='framers-index.php?page=$pg'>Previuos &laquo;</a></li>";
                                }
                                ?>

                                <!-- <li><a href='javascript:;'>&laquo;</a></li> -->
                                <?php
                                // echo $totalpage;
                                for ($i = 1; $i <= $totalpage; $i++) :

                                    if (isset($_GET['page']) && $_GET['page'] == $i) {
                                        echo "<li><span>$i</span></li>";
                                    }else if(!isset($_GET['page']) && $i == 1){
                                        echo "<li><span>1</span></li>";
                                    } else {
                                        echo "<li><a href='framers-index.php?page=$i'>$i</a></li>";
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
                                    echo "<li><a href='framers-index.php?page=$pg'>Next &raquo;</a></li>";
                                }

                                ?>
                            </ul>
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
</body>
<!-- END BODY -->

</html>