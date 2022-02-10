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
    <title>ข้อมูลโรงคั่วกาแฟ</title>

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

    <!-- <script src=" https://maps.googleapis.com/maps/api/js?key=AIzaSyD1f4vUGxabEU5Ayz4D6fiHLyV_iC2f0-E&v=weekly&language=th"></script> -->

    <!-- <script src=" https://maps.googleapis.com/maps/api/js?key=GtuOframRJFxrA13qh79g)5iFSeQZHnX)woFM2oq5S1D462QaqsxgnbFbEmYlw1X1iWaNxYNMydBE0FKaI4n26W=====2&v=weekly&sensor=false&language=th" ></script> -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1f4vUGxabEU5Ayz4D6fiHLyV_iC2f0-E&v=weekly&libraries=places&language=en" async defer></script> -->
    <!-- <script src="./register/js/jquery.min.js"></script> -->
    <?php

    $row_data = null;
    $row_pro = null;
    $pro_count = null;
    if (isset($_GET["inroa"])) {
        $id_roasters = $_GET["inroa"];
        $sql_data_roasters = "SELECT * FROM `roasters` as ro INNER JOIN provinces as pvi ON pvi.id_provinces = ro.id_provinces WHERE id_roasters = '$id_roasters';";
        // $sql_product_roasters = "SELECT * FROM `products` as pro INNER JOIN `roasters` as far ON far.id_roasters = pro.id_roasters;";

        try {
            $row_data = Database::query($sql_data_roasters, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);
            // $row_pro = Database::query($sql_product_roasters, PDO::FETCH_ASSOC); //$result_count->rowCount(); 
            // $pro_count = $row_pro->rowCount();
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
        var roaasterLocation = new google.maps.LatLng("<?php echo $row_data['lat_roasters'] ?>", "<?php echo $row_data['lng_roasters'] ?>");

        var map;
        var marker;
        var infoWindow;




        function initialize() {


            var mapOptions = {
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center: roaasterLocation
            };

            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            marker = new google.maps.Marker({
                map: map,
                draggable: false, // ไม่สามารถเครื่อนย้ายได้
                animation: google.maps.Animation.DROP,
                position: roaasterLocation,
                title: 'loan',
                icon: '../../script/assets/img/logos/farm.png',
                // 'description': '<b>มหาวิทยาลัยสงขลานครินทร์:</b> (อังกฤษ: Prince of Songkla University; อักษรย่อ: ม.อ.) เป็นมหาวิทยาลัยแห่งแรกในภาคใต้ของประเทศไทย ตาม พระราชบัญญัติมหาวิทยาลัยสงขลานครินทร์ พ.ศ. ๒๕๑๑ ก่อตั้งในปี พ.ศ. 2510 ต่อมา พระบาทสมเด็จพระปรมินทรมหาภูมิพลอดุลยเดชได้พระราชทานชื่อเมื่อวันที่ 22 กันยายน พ.ศ. 2510 จึงถือว่าวันที่ 22 กันยายนของทุกปี เป็นวันสงขลานครินทร์'
            });



            var content = "<?php echo $row_data['address_office']. $row_data['name_provinces'] . " " . $row_data['code_provinces'] ; ?> <a href='./directions-map-roa.php?id=<?php echo $_GET['inroa']?>&lat=<?php echo $row_data['lat_roasters']?>&lng=<?php echo $row_data['lng_roasters']?>'>ค้นหาเส้นทาง</a>";
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

        // google.maps.event.addDomListener(window, 'load', initialize);
    </script>




</head>
<!-- Head END -->

<!-- Body BEGIN -->

<body class="ecommerce">


    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">ข้อมูลโรงคั่วกาแฟ</li>
            </ul>
            <div class="row margin-bottom-40">
                <div class="col-md-12 col-sm-12">
                    <div class="product-page">
                        <h1>ข้อมูลทั่วไป</h1>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">

                                        <label>
                                            <h4>รายละเอียดโรงคั่วกาแฟ</h4>
                                        </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-lg-4">
                                        <label>เลขทะเบียนการค้า</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-lg-8">
                                        <p class="text-capitalize   "><?php echo $row_data['num_trade_reg'] ?> </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-lg-4">
                                        <label>ชื่อโรงคั่วกาแฟ</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-lg-8">
                                        <p class="text-capitalize "><?php echo $row_data['name_roasters'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-lg-4">
                                        <label>ชื่อผู้ประกอบการ</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-lg-8">
                                        <p class="text-capitalize   "> <?php echo $row_data['name_entrep'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-lg-4">
                                        <label>เบอร์ติดต่อ</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-lg-8">
                                        <p class="text-capitalize   "> <?php echo $row_data['tel_roasters'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-lg-4">
                                        <label>ที่ตั้งสำนักงาน</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-lg-8">
                                        <p class="text-capitalize   "><?php echo $row_data['address_office']; ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="product-page-content">
                                <ul id="myTab" class="nav nav-tabs">
                                    <li class="active"><a href="#Information" data-toggle="tab">รายละเอียดโรงคั่วกาแฟ</a></li>

                                    <li><a href="#map-farm-show" onclick="initialize();" data-toggle="tab">ที่ตั้งโรงคั่วกาแฟ</a></li>
                                    <li><a href="#Description" data-toggle="tab">ประวัติการซื้อขาย</a></li>
                                    <!-- <li class="active"><a href="#Reviews" data-toggle="tab">Reviews (2)</a></li> -->
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="Information">
                                        <table class="datasheet">
                                            <tr>
                                                <th colspan="2">รายละเอียดโรงคั่วกาแฟ</th>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">ชื่อโรงคั่วกาแฟ</td>
                                                <td class="text-capitalize"><?php echo $row_data['name_roasters'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">เลขทะเบียนการค้า</td>
                                                <td class="text-capitalize"> <?php echo $row_data['num_trade_reg']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">ชื่อผู้ประกอบการ</td>
                                                <td class="text-capitalize"><?php echo $row_data['name_entrep'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">ที่ตั้งสำนักงาน</td>
                                                <td class="text-capitalize"><?php echo $row_data['address_office'] . " จังหวัด " . $row_data['name_provinces'] . " " . $row_data['code_provinces'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">อีเมลโรงคั่วกาแฟ</td>
                                                <td class="text-capitalize"><?php echo $row_data['e_mail_roasters']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">เบอร์ติดต่อ</td>
                                                <td class="text-capitalize"><?php echo $row_data['tel_roasters']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">ละติจูดโรงคั่วกาแฟ</td>
                                                <td class="text-capitalize"><?php echo $row_data['lat_roasters']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">ลองจิจูดโรงคั่วกาแฟ</td>
                                                <td class="text-capitalize"><?php echo $row_data['lng_roasters'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="datasheet-features-type">รายละเอียดต่างๆ ของโรงคั่วกาแฟ</td>
                                                <td class="text-capitalize"><?php echo $row_data['detail_roasters'] == '-' ? " - " : $row_data['detail_roasters']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade  " id="map-farm-show">
                                        <div id="map-canvas"></div>
                                    </div>
                                    <div class="tab-pane fade  " id="Description">
                                        <?php
                                        $id_roasters = $_GET['inroa'];
                                        $id_products = null;
                                        $status = null;

                                        $sql_select_transale = "SELECT * FROM `transale` AS trn 
                                                                    INNER JOIN transalede AS trnde ON trnde.id_transale = trn.id_transale 
                                                                    WHERE trn.id_roasters = '$id_roasters' AND trn.id_farmers = '$id_farmers'   AND trn.status_transale = '3';";

                                        $sql_transale = "SELECT *, DATE_FORMAT(trn.date_transale, '%H:%i:%s น. %e %M  %Y') AS date_time 
                                                                FROM `transale` as trn 
                                                                INNER JOIN roasters AS roa ON roa.id_roasters = trn.id_roasters 
                                                                WHERE trn.id_roasters = '$id_roasters' AND trn.id_farmers = '$id_farmers'   AND trn.status_transale = '3' ORDER BY trn.date_transale DESC; ";

                                        ?>

                                        <style type="text/css" media="all">
                                            .title {
                                                font-size: 16px;
                                            }

                                            .content {
                                                font-size: 10px;

                                            }

                                            .underline {
                                                /* border-bottom: double 5px #FFC778; */
                                                text-decoration: underline;
                                            }
                                        </style>

                                        <div class="goods-page">
                                            <div id="div-product" class="goods-data ">
                                                <div id="div-product" class="goods-data clearfix">
                                                    <?php

                                                    $result = Database::query($sql_transale, PDO::FETCH_ASSOC);
                                                    if ($result->rowCount() != 0) :
                                                        foreach ($result as $row) :
                                                            $id_transale = $row['id_transale'];
                                                            $sql_select_transale_de = "SELECT * FROM `transalede` AS trade INNER JOIN products AS pro ON pro.id_products = trade.id_products WHERE trade.id_transale = '$id_transale' ";
                                                    ?>
                                                            <div class="col-md-12" style="margin-left: 0px; border: 1px solid red; margin-bottom: 10px;">
                                                                <div class="row" style="padding:10px">
                                                                    <br> วันที่สั่งซื้อ : <?php echo $row['date_time']; ?>

                                                                    <hr>
                                                                </div>
                                                                <?php
                                                                foreach (Database::query($sql_select_transale_de, PDO::FETCH_ASSOC) as $row_de) :
                                                                ?>
                                                                    <div class="row product-item">
                                                                        <div class="col-sm-3 text-center">
                                                                            <img width="70%" height="100px" src="../../pictures/product/<?php echo $row_de['image_pro'] ?>">
                                                                        </div>
                                                                        <div class="col-sm-3 text-left margin-top-10">
                                                                            ชื่อสินค้า : <?php echo $row_de['name_products'] ?>
                                                                        </div>
                                                                        <div class="col-sm-2 text-left margin-top-10">
                                                                            ราคาต่อชิ้น : <?php echo $row_de['price_tran'] ?> บาท
                                                                        </div>
                                                                        <div class="col-sm-2 text-left margin-top-10">
                                                                            จำนวน : <?php echo $row_de['num_item'] ?> ชิ้น
                                                                        </div>
                                                                        <div class="col-sm-2 text-center margin-top-10 ">

                                                                            ราคารวม : <span class="datasheet-features-type "><?php echo $row_de['price_tran'] * $row_de['num_item'] ?></span> บาท
                                                                        </div>
                                                                    </div>
                                                                <?php
                                                                endforeach;
                                                                ?>
                                                                <div class="col-md-12 text-right  margin-bottom-35 ">

                                                                    <div class="underline">
                                                                        ยอดคำสั่งซื้อทั้งหมด : <span class="datasheet-features-type title"><?php echo $row['sum_price'] ?></span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        <?php
                                                        endforeach;
                                                    else :
                                                        ?>
                                                        <div>
                                                            ไม่มีประวัติการซื้อขาย
                                                        </div>
                                                    <?php
                                                    endif;
                                                    ?>
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

    </div>
    </div>

    <?php
    include_once('./footer.php');
    ?>
</body>
<!-- END BODY -->

</html>