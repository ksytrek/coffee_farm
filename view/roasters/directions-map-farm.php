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
// include_once('../../config/connectdb.php');
$row_map = null;
if (isset($_SESSION['user_id']) && $_SESSION['key'] == 'roasters') {
    $id_roasters = $_SESSION['user_id'];
    $row_map = Database::query("SELECT `lat_roasters`,`lng_roasters` FROM `roasters` WHERE id_roasters = '$id_roasters';", PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);
}
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
            location.assign(insertParam(name, lat, lng));

        }

        function insertParam(name, lat, lng) {
            const u = new URL(window.location.href + "&searchPA=qwe&latA=0&lngA=0");
            u.searchParams.set("searchPA", name);
            u.searchParams.set("latA", lat);
            u.searchParams.set("lngA", lng);
            return u.toString();
        }



        if (searchPA == null) {
            <?php if ($row_map != null) : ?>
                latA = '<?php echo $row_map['lat_roasters'] ?>';
                lngA = '<?php echo $row_map['lng_roasters'] ?>';
            <?php else : ?>
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {

                        latA = position.coords.latitude;
                        lngA = position.coords.longitude;

                    }, function() {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });
                }
            <?php endif; ?>

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
                    // if (confirm('กรุณาเปิดอนุญาตให้เข้าถึงตำเเหน่ง')) {
                        // location.reload();
                    // } else {
                        // alert("กรุณาเปิดอนุญาตให้เข้าถึงตำเเหน่ง");
                        // location.reload();
                    // }
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
                <li><a href="./index.html">หน้าหลัก</a></li>
                <li class="active">ค้นหาเส้นทาง</li>
                <!-- <li><a href="javascript:cookie_add();">add</a></li>
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
                    <div id="map-canvas">

                    </div>
                </div>
                <div class="col-md-4">
                    <input id="searchTextField" class="form-control" type="text" placeholder="Enter a location" autocomplete="on" runat="server" />
                    <button onclick="search_addPA('input_addPA')" type="button" class="btn btn-default btn-sm ">ค้นหา</button>
                    <div class="col-md-8" style="padding-left: 0px; padding-right: 0px;">
                        <div class="form-group">
                            <input type="hidden" id="city_name" name="city2" />
                            <input type="hidden" id="city_Lat" name="cityLat" />
                            <input type="hidden" id="city_Lng" name="cityLng" />
                        </div>
                    </div>
                    <div class="col-md-4 align-text-left">

                    </div>
                    <div id="panel"></div>
                </div>
            </div>
        </div>
    </div>
    </div>



    <?php
    include_once("./footer.php");
    ?>


</body>


</html>