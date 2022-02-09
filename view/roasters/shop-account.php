<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->

<head>
    <meta charset="utf-8">
    <title>ข้อมูลส่วนตัว</title>

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

    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAw0nLxD9NsQiJKwFKM38AODUypI8f5FdI&libraries=places&v=weekly&language=th"></script> -->
    <?php require_once('./navbar.php') ?>
    <style type="text/css" media="all">
        .map-canvas {
            display: block;
            /* margin: 10px auto; */
            height: 400px;
            width: 100%;
            background-color: #ccc;
        }
    </style>

    <script>
        var bangkok = new google.maps.LatLng(13.730995466424108, 100.51986257812496);
        var marker;
        var map;

        function initialize() {
            var mapOptions = {
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center: bangkok
            };

            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: bangkok
            });
            google.maps.event.addListener(marker, 'click', toggleBounce);
            google.maps.event.addListener(marker, 'drag', function(event) {
                document.getElementById("lat").value = marker.getPosition().lat();
                document.getElementById("lng").value = marker.getPosition().lng();
            });

            google.maps.event.addListener(marker, 'dragend', function(event) {
                var point = marker.getPoint();
                map.panTo(point);
            });
        }

        function toggleBounce() {
            if (marker.getAnimation() != null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }

        $(document).ready(function() {
            <?php if (isset($_GET['date'])) : ?>
                $.ajax({
                    url: "./shop-account-order_history.php?date=<?php echo isset($_GET['date']) ? $_GET['date'] : 'null' ?>",
                    type: "POST",
                    data: {
                        key: "order_history",
                        id_roasters: ID_ROASTERS
                    },
                    success: function(result, textStatus, jqXHR) {
                        $("#content").html(result);
                    },
                    error: function(result, textStatus, jqXHR) {
                        $("#content").html('เกิดข้อผิดพลาดบางอย่าง');
                    }
                });
            <?php else : ?>
                $.ajax({
                    url: "./shop-account-information.php",
                    type: "POST",
                    data: {
                        key: "information",
                        id_roasters: ID_ROASTERS
                    },
                    success: function(result, textStatus, jqXHR) {
                        $("#content").html(result);
                    },
                    error: function(result, textStatus, jqXHR) {
                        $("#content").html('เกิดข้อผิดพลาดบางอย่าง');
                    }
                });
            <?php endif; ?>

        });
    </script>


</head>
<!-- Head END -->

<!-- Body BEGIN -->

<body class="ecommerce">


    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="./index.html">Home</a></li>
                <!-- <li><a href="">Store</a></li> -->
                <li class="active">ข้อมูลส่วนตัว</li>
            </ul>

            <div class="row margin-bottom-40">
                <div class="sidebar col-md-3 col-sm-3">
                    <h4>ข้อมูลทั่วไปบัญชีของฉัน</h4>
                    <ul class="list-group margin-bottom-25 sidebar-menu">
                        <li class="list-group-item clearfix"><a href="javascript:account_information('information');"><i class="fa fa-angle-right"></i> ข้อมูลบัญชีของคุณ</a></li>
                        <li class="list-group-item clearfix"><a href="javascript:account_information('edit_account');"><i class="fa fa-angle-right"></i> แก้ไขข้อมูลบัญชีของคุณ</a></li>
                        <li class="list-group-item clearfix"><a href="javascript:account_information('change_password');"><i class="fa fa-angle-right"></i> เปลี่ยนรหัสผ่านของคุณ</a></li>
                        <li class="list-group-item clearfix"><a href="javascript:account_information('edit_address');"><i class="fa fa-angle-right"></i> แก้ไขรายการสมุดที่อยู่ของคุณ</a></li>

                    </ul>
                    <h4>คำสั่งซื้อของฉัน</h4>
                    <ul class="list-group margin-bottom-25 sidebar-menu">
                        <li class="list-group-item clearfix"><a href="javascript:account_information('order_history');"><i class="fa fa-angle-right"></i> ดูประวัติการสั่งซื้อของคุณ</a></li>
                    </ul>

                    <script>
                        function account_information(key) {
                            $("#content").html('');
                            if (key == 'edit_account') {
                                $.ajax({
                                    url: "./shop-account-edit_account.php",
                                    type: "POST",
                                    data: {
                                        key: "edit_account",
                                        id_roasters: ID_ROASTERS
                                    },
                                    success: function(result, textStatus, jqXHR) {
                                        $("#content").html(result);
                                    },
                                    error: function(result, textStatus, jqXHR) {
                                        $("#content").html('เกิดข้อผิดพลาดบางอย่าง');
                                    }
                                });
                            } else if (key == "change_password") {
                                $.ajax({
                                    url: "./shop-account-change_password.php",
                                    type: "POST",
                                    data: {
                                        key: "change_password",
                                        id_roasters: ID_ROASTERS
                                    },
                                    success: function(result, textStatus, jqXHR) {
                                        $("#content").html(result);
                                    },
                                    error: function(result, textStatus, jqXHR) {
                                        $("#content").html('เกิดข้อผิดพลาดบางอย่าง');

                                    }
                                });
                            } else if (key == "edit_address") {
                                $.ajax({
                                    url: "./shop-account-edit_address.php",
                                    type: "POST",
                                    data: {
                                        key: "edit_address",
                                        id_roasters: ID_ROASTERS
                                    },
                                    success: function(result, textStatus, jqXHR) {
                                        $("#content").html(result);
                                    },
                                    error: function(result, textStatus, jqXHR) {
                                        $("#content").html('เกิดข้อผิดพลาดบางอย่าง');
                                    }
                                });
                            } else if (key == 'information') {
                                $.ajax({
                                    url: "./shop-account-information.php",
                                    type: "POST",
                                    data: {
                                        key: "information",
                                        id_roasters: ID_ROASTERS
                                    },
                                    success: function(result, textStatus, jqXHR) {
                                        $("#content").html(result);
                                    },
                                    error: function(result, textStatus, jqXHR) {
                                        $("#content").html('เกิดข้อผิดพลาดบางอย่าง');
                                    }
                                });
                            } else if (key == 'order_history') {
                                $.ajax({
                                    url: "./shop-account-order_history.php?date=<?php echo isset($_GET['date']) ? $_GET['date'] : 'null' ?>",
                                    type: "POST",
                                    data: {
                                        key: "order_history",
                                        id_roasters: ID_ROASTERS
                                    },
                                    success: function(result, textStatus, jqXHR) {
                                        $("#content").html(result);
                                    },
                                    error: function(result, textStatus, jqXHR) {
                                        $("#content").html('เกิดข้อผิดพลาดบางอย่าง');
                                    }
                                });
                            }
                        }
                    </script>
                </div>

                <div class="col-md-9 col-sm-9">
                    <hr>
                    <div id="content" class="content-page">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('./footer.php') ?>
</body>

</html>