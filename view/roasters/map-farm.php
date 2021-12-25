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

    <?php


    $resultArray = array();
    $jsoo = null;
    try {
        $sql_location_search = "SELECT * FROM `farmers`";
        if ($show_tebelig = Database::query($sql_location_search, PDO::FETCH_ASSOC)) {
            foreach ($show_tebelig  as $row) {
                array_push($resultArray, $row);
            }
            $jsoo = json_encode($resultArray);
        } else {
            $jsoo = json_encode($resultArray);
        }
    } catch (Exception $e) {
        $resultArray = [
            "error" => $e->getMessage()
        ];
        $jsoo =  json_encode($resultArray);
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

        var bangkok = new google.maps.LatLng(13.730995466424108, 100.51986257812496);
        
        var locations = JSON.parse(JSON.stringify(<?php echo $jsoo ?>));
        var map;
        var marker;
        var infoWindow;

        function initialize() {

            var mapOptions = {
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center: bangkok
            };

            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            var marker;
            $.each(locations, function(index, locations) {
                var title = "ฟาร์มคุณ "+locations.name_farmers
                var lat = locations.lat_farm
                var long = locations.lng_farm
                var add = locations.address_farmers

                var position = new google.maps.LatLng(lat, long);
                var marker = new google.maps.Marker({
                    map: map,
                    draggable: false, // ไม่สามารถเครื่อนย้ายได้
                    animation: google.maps.Animation.DROP,
                    position: position,
                    title: title,
                    icon: '../../script/assets/img/logos/farm.png',
                });

   


                var content = "ที่ตั้งฟาร์ม "+ add + " <a href='./directions-map-farm.php?lat=" + lat + "&lng=" + long + "'>ค้นหาเส้นทาง</a>";

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

            });
           
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

</head>


<body class="ecommerce">

    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="./shop-product-list.php">Home</a></li>
            </ul>
            <div>
                <div id="map-canvas"></div>
            </div>
        </div>
    </div>



    <?php
    include_once("./footer.php");
    ?>


</body>


</html>