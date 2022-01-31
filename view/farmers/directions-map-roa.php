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

    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAw0nLxD9NsQiJKwFKM38AODUypI8f5FdI&v=weekly&language=th"></script> -->

    <style type="text/css" media="all">
        #map-canvas {
            display: block;
            margin-bottom: 20px;
            height: 600px;
            width: 100%;
            background-color: #ccc;
        }
    </style>
    <script>
        const urlParams = new URLSearchParams(queryString);
        const latB = urlParams.get('lat');
        const lngB = urlParams.get('lng');
        const searchPA = urlParams.get('searchPA');


        // alert(latB);

        var latA = '',
            lngA = '';
        // alert(searchPA);

        function search_addPA(id) {
            var address = document.getElementById(id).value;
            geocoder.geocode({
                'address': address
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }

        function search_nameE(name, lat, lng) {
            // if (queryString.includes("?")) {
            location.assign(insertParam(name, lat, lng));
            // } else {
            //     location.assign(window.location.href + "?searchPA=" + name + "&latA=" + lat + "&lngA=" + lng);
            // }
            // alert( insertParam('name', name));
            // var stul = " " + insertParam('name', name)
            // stul += insertParam('latA', lat);
            // stul += insertParam('latA', lat);
            // alert( insertParam(name, lat, lng))
            // alert(window.location.href);
        }

        function insertParam(name, lat, lng) {
            const u = new URL(window.location.href + "&searchPA=qwe&latA=0&lngA=0");
            u.searchParams.set("searchPA", name);
            u.searchParams.set("latA", lat);
            u.searchParams.set("lngA", lng);
            return u.toString();
        }



        if (searchPA == null) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {

                    latA = position.coords.latitude;
                    lngA = position.coords.longitude;

                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            }
        } else {
            // searchPA = name city


            var url = new URL(window.location.href);

            url.searchParams.get("lngA");


            const G_latA = url.searchParams.get("latA");
            const G_lngA = url.searchParams.get("lngA");


            latA = G_latA;
            lngA = G_lngA;

            // alert(G_latA + " " + G_lngA);
            // if (navigator.geolocation) {
            //     navigator.geolocation.getCurrentPosition(function(position) {

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {

                    latA = G_latA;
                    lngA = G_lngA;

                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());


                });
            }

        }



        // alert(window.location.href)

        // var pointA = new google.maps.LatLng(latA, lngA);

        function initialize() {

            Search_initialize();
            var bangkok = new google.maps.LatLng(13.730995466424108, 100.51986257812496);

            var pointA = new google.maps.LatLng(latA, lngA),
                pointB = new google.maps.LatLng(latB, lngB),

                myOptions = {
                    zoom: 10,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    center: pointA
                },


                map = new google.maps.Map(document.getElementById('map-canvas'), myOptions),
                // Instantiate a directions service.
                directionsService = new google.maps.DirectionsService,
                directionsDisplay = new google.maps.DirectionsRenderer({
                    map: map
                }),


                markerA = new google.maps.Marker({
                    draggable: true, // ไม่สามารถเครื่อนย้ายได้
                    animation: google.maps.Animation.DROP,
                    position: pointA,
                    title: "point A",
                    // label: "A",
                    map: map
                }),

                markerB = new google.maps.Marker({
                    draggable: false, // ไม่สามารถเครื่อนย้ายได้
                    animation: google.maps.Animation.DROP,
                    position: pointB,
                    title: "point B",
                    // label: "B",
                    map: map,
                    icon: '../../script/assets/img/logos/farm.png',
                });



            calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);

        }

        function Search_initialize() {
            var input = document.getElementById('searchTextField');
            var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                var name = document.getElementById('city_name').value = place.name;
                var lat = document.getElementById('city_Lat').value = place.geometry.location.lat();
                var lng = document.getElementById('city_Lng').value = place.geometry.location.lng();
                search_nameE(name, lat, lng);

            });
        }



        function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
            directionsService.route({
                origin: pointA,
                destination: pointB,
                avoidTolls: true,
                avoidHighways: false,
                travelMode: google.maps.TravelMode.DRIVING
            }, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                    directionsDisplay.setPanel(document.getElementById('panel'));
                } else {
                    // window.alert('Directions request failed due to ' + status);
                    if (confirm('กรุณาเปิดอนุญาตให้เข้าถึงตำเเหน่ง')) {
                        location.reload();
                    } else {
                        alert("กรุณาเปิดอนุญาตให้เข้าถึงตำเเหน่ง");
                        location.reload();
                    }
                }
            });
        }


        google.maps.event.addDomListener(window, 'load', initialize);
    </script>


</head>


<body class="ecommerce">

    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <!-- <li><a href="./shop-product-list.php">Home</a></li>
                <li><a href="javascript:cookie();">cookie</a></li>
                <li><a href="javascript:cookie_add();">add</a></li>
                <li><a href="javascript:cookie_json();">add</a></li> -->

            </ul>

            <div class="row">
                <div class="alert-danger">
                    <p class="text-nowrap">** หมายเหตุ : การใช้งานบนโทรศัพมือถือ -> กรุณาเปิด GPS <br> การใช้งานบนคอมพิวเตอร์หรือโน๊ตบุค -> หากพบว่าไม่เป็นที่อยู่ปัจจุบน สามารถค้นหาสถานที่ใกล้เคียงจากช่องกรอกข้อมูล
                    </p>
                </div>
            </div>
            <div class="row">
                <!-- <div id="map-canvas"></div> -->
                <div class="col-md-8">
                    <div id="map-canvas"></div>
                </div>
                <div class="col-md-4"></div>
                    <div class="row">
                        <div class="col-md-8" style="padding-left: 0px; padding-right: 0px;">
                            <div class="form-group">
                                <input id="searchTextField" class="form-control" type="text" placeholder="Enter a location" autocomplete="on" runat="server" />
                                <input type="hidden" id="city_name" name="city2" />
                                <input type="hidden" id="city_Lat" name="cityLat" />
                                <input type="hidden" id="city_Lng" name="cityLng" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button onclick="search_addPA('input_addPA')" type="button" class="btn btn-default btn-sm">ค้นหา</button>
                        </div>

                    </div>
                    <div class="row">
                        <div id="panel"></div>
                    </div>
                </div>


                <!-- <iframe src="https://www.google.co.th/maps/"></iframe> -->
                <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK3RgqSLy1toc4lkh2JVFQ5ipuRB106vU&callback=initMap" async defer></script> -->

            </div>



            <!-- <div class="row margin-bottom-40">

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
                        
                    </ul>

                    
                </div>
               
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
                                                    <input id="input_item_product-<?php echo $row['id_products'];  ?>" onchange="count_ch(this.value)" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                                                </div>
                                                <button onclick="add_product(<?php echo $row['id_products'] ?>,<?php echo $row['id_farmers'] ?>,<?php echo $row['price_unit'] ?>,'input_item_product-<?php echo $row['id_products'];  ?>', '<?php echo $row['name_products'] ?>','<?php echo $row['image_pro'] ?>');" class="btn btn-primary" type="button">เพิ่มสินค้า</button>
                                                <a href="shop-item.php" class="btn btn-default">รายละเอียด</a>
                                            </div>
                                            <script>

                                            </script>
                                        </div>

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
                                var num_item_new = parseInt($("#"+num_item).val());
   
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
                                $("#"+num_item).val(1);
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
                </div>
            </div> -->
        </div>
    </div>



    <?php
    include_once("./footer.php");
    ?>


</body>


</html>