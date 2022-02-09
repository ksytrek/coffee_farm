<!DOCTYPE html>

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
    <title>ข้อมูลฟาร์ม</title>

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
    <?php

    $row_infor = null;
    $row_pro = null;
    $pro_count = null;
    if (isset($_GET["infr"])) {
        $id_farmers = $_GET["infr"];
        $sql_data_farmers = "SELECT * ,IF(`organic_farm` = 1 ,'อินทรีย์','ไม่อินทรีย์') as 'organic_farm_new',IF(type_sale=1,'ขายแบบพันธะสัญญา','ขายแบบเดี่ยว') as 'type_sale_new'  FROM `farmers` WHERE `id_farmers` = '$id_farmers'";
        $sql_product_farmers = "SELECT * FROM `products` as pro INNER JOIN `farmers` as far ON far.id_farmers = pro.id_farmers;";

        try {
            $row_infor = Database::query($sql_data_farmers, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);
            $row_pro = Database::query($sql_product_farmers, PDO::FETCH_ASSOC); //$result_count->rowCount(); 
            $pro_count = $row_pro->rowCount();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    } else {
        echo "<script type='text/javascript'>" . "window.history.back(1)" . "</script>";
    }

    ?>
    <style type="text/css" media="all">
        #map-canvas {
            display: block;
            margin: 10px auto;
            height: 600px;
            width: 100%;
            background-color: #ccc;
        }
    </style>
    <script>
        var farmLocation = new google.maps.LatLng("<?php echo $row_infor['lat_farm'] ?>","<?php echo $row_infor['lng_farm'] ?>");

        var map;
        var marker;
        var infoWindow;
        function initialize() {
            var mapOptions = {
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center: farmLocation
            };

            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            marker = new google.maps.Marker({
                map: map,
                draggable: false, // ไม่สามารถเครื่อนย้ายได้
                animation: google.maps.Animation.DROP,
                position: farmLocation,
                title: 'loan',
                icon: '../../script/assets/img/logos/farm.png',
            });

            var content = "<?php echo $row_infor['address_farmers']." ".$row_infor['code_provinces'] ?> <a href='./directions-map-farm.php?lat=<?php echo $row_infor['lat_farm'] ?>&lng=<?php echo $row_infor['lng_farm'] ?>'>ค้นหาเส้นทาง</a>";
            var infowindow = new google.maps.InfoWindow()


            google.maps.event.addListener(marker, 'click', (function(marker, content, infowindow) {
                return function() {
                    if (marker.getAnimation() != null) {
                        marker.setAnimation(null);
                        infowindow.close();
                    } else {
                        marker.setAnimation(google.maps.Animation.BOUNCE);
                        infowindow.setContent(content);
                        infowindow.open(map, marker);
                    }
                };
            })(marker, content, infowindow));

        }
    </script>
</head>


<body class="ecommerce">


    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">ข้อมูลฟาร์ม</li>
            </ul>
            <div class="row margin-bottom-40">
                <div class="col-md-12 col-sm-12">
                    <div class="product-page">
                        <h1>ข้อมูลทั่วไป</h1>
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <label>
                                    <h4>รูปเกษตรกร</h4>
                                </label>
                                <div class="product-main-image">
                                    <img src="../../pictures/farmers/<?php echo $row_infor['image_farmers'] ?>" alt="Cool green dress with red bell" class="img-responsive" >
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">

                                        <label>
                                            <h4>รายละเอียดฟาร์ม</h4>
                                        </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-lg-4">
                                        <label>จำนวนสินค้าทั้งหมด</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-lg-8">
                                        <p class="text-capitalize   "><?php echo $pro_count ?> </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-lg-4">
                                        <label>การเกษตรประเภท</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-lg-8">
                                        <p class="text-capitalize "><?php echo $row_infor['organic_farm_new'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-lg-4">
                                        <label>การค้าขายแบบ</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-lg-8">
                                        <p class="text-capitalize   "> <?php echo $row_infor['type_sale_new'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-lg-4">
                                        <label>อธิบายละเอียดต่างๆ</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-lg-8">
                                        <p class="text-capitalize   "><?php echo $row_infor['detail_farm']==""? '-': $row_infor['detail_farm'] ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="product-page-content">
                                <ul id="myTab" class="nav nav-tabs">
                                    <li class="active"><a href="#Information" data-toggle="tab">รายละเอียดฟาร์ม</a></li>

                                    <li><a href="#map-farm-show" onclick="initialize()" data-toggle="tab">ที่ตั้งฟาร์ม</a></li>
                                    <li><a href="#Description" data-toggle="tab">สินค้าทั้งหมด</a></li>
                                    <!-- <li class="active"><a href="#Reviews" data-toggle="tab">Reviews (2)</a></li> -->
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="Information">
                                        <table class="datasheet">
                                            <tr>
                                                <th colspan="2">รายละเอียดฟาร์ม</th>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">ชื่อเกษตรกร</td>
                                                <td class="text-capitalize"><?php echo $row_infor['name_farmers'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">จำนวนพื้นที่เพาะปลูก</td>
                                                <td class="text-capitalize"> <?php echo $row_infor['num_farm']." ไร่ ".$row_infor['num_field']." งาน" ?></td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">อีเมล์เกษตรกร</td>
                                                <td class="text-capitalize"><?php echo $row_infor['email_farmers'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">เบอร์โทรเกษตรกร</td>
                                                <td class="text-capitalize"><?php echo $row_infor['tel_farmers'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">line เกษตรกร</td>
                                                <td class="text-capitalize"><?php echo $row_infor['line_farmers']==""? "-":$row_infor['line_farmers'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">facebook เกษตรกร</td>
                                                <td class="text-capitalize"><?php echo $row_infor['face_farmers']==""? "-":$row_infor['face_farmers'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">ที่อยู่เกษตรกร</td>
                                                <td class="text-capitalize"><?php echo $row_infor['address_farmers'] ?></td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div class="tab-pane fade  " id="map-farm-show">
                                        <div id="map-canvas"></div>
                                    </div>
                                    <div class="tab-pane fade  " id="Description">
                                        <div class="col-md-12 col-sm-12">
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
                                                    };
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



                                                $sql_count = "SELECT * FROM `products` WHERE  id_typepro LIKE '%$type%' AND id_farmers = '$id_farmers' ";
                                                $sql_data = "SELECT * FROM products as pro 
                                                INNER JOIN typepro as ty ON ty.id_typepro = pro.id_typepro 
                                                INNER JOIN farmers as far ON far.id_farmers = pro.id_farmers 
                                                WHERE pro.id_typepro LIKE '%$type%' AND far.id_farmers = '$id_farmers'   ORDER BY pro.id_products $order LIMIT $start,$pagesize"; //คำสั่งแสดง record ต่อหนึ่งหน้า $pagesize = ต้องการกี่ record ต่อ

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

                                                $result_data = null;
                                                $num_rows = null;

                                                try {
                                                    // $sql_data = "SELECT * FROM products WHERE id_typepro LIKE '%$type%' ORDER BY id_products $order LIMIT $start,$pagesize";
                                                    $result_data =  Database::query($sql_data, PDO::FETCH_ASSOC);
                                                    $num_rows = $result_data->rowCount();
                                                } catch (Exception $e) {
                                                    echo "<script type='text/javascript'>" . "alert('ตรวจพบขอผิดพลาด');window.history.back(1);" . "</script>";
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
                                                            <div class="pi-price">฿<?php echo $row['price_unit'] . '.' . '00' ?></div>
                                                            <input id="input__product-<?php echo $row['id_products'];  ?>" type="hidden" value="1">
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
                                                                        <p>ประเภทกาแฟ :
                                                                            <strong> <?php echo $row['name_typepro']; ?></strong>
                                                                        </p>
                                                                        <p>ชื่อฟาร์มที่ขาย :
                                                                            <strong><a href="./information-farm.php"><?php echo $row['name_farmers']; ?></a></strong>
                                                                        </p>
                                                                    </div>
                                                                    <div class="product-page-options">

                                                                    </div>
                                                                    <div class="product-page-cart">
                                                                        <div class="product-quantity">
                                                                            <input id="input_item_product-<?php echo $row['id_products'];  ?>" onchange="count_ch(this.value)" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                                                                        </div>
                                                                        <button onclick="add_product(<?php echo $row['id_products'] ?>,<?php echo $row['id_farmers'] ?>,<?php echo $row['price_unit'] ?>,'input_item_product-<?php echo $row['id_products'];  ?>', '<?php echo $row['name_products'] ?>','<?php echo $row['image_pro'] ?>');" class="btn btn-primary" type="button">เพิ่มสินค้า</button>
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
                                                <script>
                                                    var count_item = 0;

                                                    function count_ch(value) {
                                                        // alert(value);
                                                    }
                                                    // $("#product-quantity").change(function(){
                                                    //     // alert($(this.val()));
                                                    //     alert($("#product-quantity").val());
                                                    // });

                                                    // $("#product-quantity").on('change', function(){

                                                    // });

                                                    function add_product(id_products, id_farmers, price_unit, num_item, name_products, image_pro) {
                                                        var product = [];
                                                        var int_i = 0;
                                                        var num_item_new = parseInt($("#" + num_item).val());

                                                        // alert($("#"+num_item).val());

                                                        product_new = {
                                                            id_products: id_products,
                                                            id_farmers: id_farmers,
                                                            price_unit: price_unit,
                                                            num_item: num_item_new,
                                                            name_products: name_products,
                                                            image_pro: image_pro
                                                        };

                                                        if (readCookie('product') == null) {
                                                            createCookie("product", JSON.stringify(product));

                                                            product.push(product_new);
                                                            createCookie("product", JSON.stringify(product));
                                                            update_product();

                                                        } else {
                                                            product = JSON.parse(readCookie('product')); // array type
                                                            product.forEach(function(value, i) {
                                                                if (value.id_products == id_products) {
                                                                    int_i += 1;
                                                                    product[i].num_item += num_item_new;
                                                                }
                                                            });

                                                            if (int_i == 0) {

                                                                product.push(product_new);
                                                                createCookie("product", JSON.stringify(product));

                                                                update_product();
                                                            } else {
                                                                createCookie("product", JSON.stringify(product));
                                                                update_product();
                                                            }

                                                        }
                                                        $("#" + num_item).val(1);
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
                                    </div>


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