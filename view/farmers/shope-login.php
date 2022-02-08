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

<!-- Head BEGIN -->
<!-- <script src=" https://maps.googleapis.com/maps/api/js?key=AIzaSyD1f4vUGxabEU5Ayz4D6fiHLyV_iC2f0-E&v=weekly&sensor=false&language=th"></script>
 -->
<?php
include_once('./navbar.php');
?>
<style type="text/css" media="all">
    /* body {
		background-color: #fff;
	} */
    .map-canvas {
        display: block;
        /* margin: 10px auto; */
        height: 400px;
        width: 100%;
        background-color: #ccc;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(255, 255, 255, .8) url('http://i.stack.imgur.com/FhHRx.gif') 50% 50% no-repeat;
    }

    body.loading .modal {
        overflow: hidden;
    }

    body.loading .modal {
        display: block;
    }
</style>

<!-- <script src="./js/jquery.min.js"></script> -->

<script>
    var make_ = new google.maps.LatLng(13.730995466424108, 100.51986257812496);
    var marker;
    var map;

    function initialize() {
        var mapOptions = {
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: make_
        };

        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: make_
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
    // google.maps.event.addDomListener(window, 'load', initialize);


    var check_email_farmers = false;
</script>




<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAw0nLxD9NsQiJKwFKM38AODUypI8f5FdI&libraries=places&v=weekly&language=th"></script> -->

<head>
    <meta charset="utf-8">
    <title>ล็อกอินสำหรับเกษตรกร</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta content="Metronic Shop UI description" name="description">
    <meta content="Metronic Shop UI keywords" name="keywords">
    <meta content="keenthemes" name="author">

    <meta property="og:site_name" content="-CUSTOMER VALUE-">
    <meta property="og:title" content="-CUSTOMER VALUE-">
    <meta property="og:description" content="-CUSTOMER VALUE-">
    <meta property="og:type" content="website">
    <meta property="og:image" content="-CUSTOMER VALUE-">
    <meta property="og:url" content="-CUSTOMER VALUE-">

</head>


<body class="ecommerce loading">

    <div class="modal">
        <!-- Place at bottom of page -->
    </div>

    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <!-- <li><a href="index.html">Home</a></li> -->
                <!-- <li><a href="">Store</a></li> -->
                <!-- <li class="active">LOGIN</li> -->
            </ul>
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1>หน้าหลัก</h1>
                    <!-- BEGIN CHECKOUT PAGE -->
                    <div class="panel-group checkout-page accordion scrollable" id="checkout-page">

                        <!-- BEGIN CHECKOUT -->
                        <div id="checkout" class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#checkout-page" href="#checkout-content" class="accordion-toggle">
                                        ล็อกอินสำหรับเกษตรกร
                                    </a>
                                </h2>
                            </div>
                            <div id="checkout-content" class="panel-collapse collapse in ">
                                <div class="panel-body row">
                                    <div class="col-md-12 col-sm-12">
                                        <h3>เข้าสู่ระบบเกษตรกร</h3>
                                        <!-- <p>I am a returning customer.</p> -->
                                        <form id="form_loging" role="form" action="javascript:void(0);">
                                            <div class="form-group">
                                                <label for="email-login">ที่อยู่อีเมล<span class="require">*</span></label>
                                                <input type="email" id="email-login" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="password-login">รหัสผ่าน<span class="require">*</span></label>
                                                <input type="password" id="password-login" class="form-control" required>
                                            </div>
                                            <!-- อย่างน้อย 1 ตัวพิมพ์ใหญ่
                                            อย่างน้อย 1 ตัวพิมพ์เล็ก
                                            อย่างน้อย 1 หมายเลข
                                            อนุญาตให้ใช้สัญลักษณ์อย่างน้อย 1 สัญลักษณ์  !@#$%^&*_=+-
                                            ขั้นต่ำ 8 ตัวอักษรและสูงสุด 12 ตัวอักษร -->
                                            <label style="margin-bottom: 10px"><input id="Login_farmers" onclick="lsRememberMe()" type="checkbox"> จดจำฉันไว้ </label>
                                            <br>
                                            <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-address-content">ฉันยังไม่มีรหัสเข้าสู่ระบบ</a>
                                            <br>
                                            <a data-toggle="collapse" data-parent="#checkout-page" href="#forgot_password-content">ลืมรหัสผ่าน</a>
                                            <div class="padding-top-20 text-right">
                                                <button class="btn btn-primary" type="submit">เข้าสู่ระบบเกษตรกร</button>
                                            </div>
                                            <script>
                                                // function loginfarmers() {
                                                //     alert("Loging farmes");
                                                // }
                                                $("#form_loging").keypress((e) => {
                                                    if (e.which === 13) {

                                                    }
                                                })
                                                $("#form_loging").submit(function() {
                                                    var e_mail_frame = $("#email-login").val();
                                                    var pass_farmers = $("#password-login").val();

                                                    // alert(e_mail_frame + ": " + pass_farmers);




                                                    // if (confirm("ต้องการล็อกอินเข้าสู่ระบบใช่หรือไม่?")) {
                                                    $.ajax({
                                                        url: "./controllers/login_farmers.php",
                                                        type: "POST",
                                                        data: {
                                                            key: "login_farmers",
                                                            email_farmers: e_mail_frame,
                                                            pass_farmers: pass_farmers
                                                        },
                                                        success: function(result, textStatus, jqXHR) {
                                                            // alert(result);
                                                            if (result == '1') {
                                                                // alert("ยินดีตอนรับเข้าสู่ระบบ");
                                                                location.assign('./framers-index.php');

                                                            } else {
                                                                alert('รหัสผ่านไม่ถูกต้อง');
                                                                // alert(result);
                                                            }
                                                        },
                                                        error: function(result, textStatus, jqXHR) {

                                                        }
                                                    });
                                                    // }


                                                });
                                            </script>
                                            <script>
                                                const rmCheck_framers = document.getElementById("Login_farmers"),
                                                    emailInput_framers = document.getElementById("email-login"),
                                                    passwordInput_framers = document.getElementById("password-login");

                                                if (localStorage.checkbox_framers && localStorage.checkbox_framers !== "") {
                                                    rmCheck_framers.setAttribute("checked", "checked");
                                                    emailInput_framers.value = localStorage.username_framers;
                                                    passwordInput_framers.value = localStorage.password_framers;
                                                } else {
                                                    rmCheck_framers.removeAttribute("checked");
                                                    emailInput_framers.value = "";
                                                    passwordInput_framers.value = "";
                                                }

                                                function lsRememberMe() {
                                                    if (rmCheck_framers.checked && emailInput_framers.value !== "") {
                                                        localStorage.username_framers = emailInput_framers.value;
                                                        localStorage.checkbox_framers = rmCheck_framers.value;
                                                        localStorage.password_framers = passwordInput_framers.value;
                                                    } else {
                                                        localStorage.username_framers = "";
                                                        localStorage.checkbox_framers = "";
                                                        localStorage.password_framers = "";
                                                    }
                                                }
                                            </script>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="payment-address" class="panel panel-default ">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-address-content" class="accordion-toggle">
                                        ลงทะเบียนบัญชีเกษตรกร
                                    </a>
                                </h2>
                            </div>
                            <div id="payment-address-content" class="panel-collapse collapse ">
                                <form id="form_register_farmers" action="javascript:void(0)" method="post" enctype="multipart/form-data" class="panel-body row">
                                    <div class="col-md-6 col-sm-6">
                                        <h3>ข้อมูลส่วนเกษตรกร</h3>
                                        <div class="form-group">
                                            <label for="firstname">ชื่อเกษตรกร <span class="require">* (ต้องเป็นภาษาไทย หรือ ภาษาอังกฤษ เท่านั้น)</span></label>
                                            <input name="input-name" type="text" pattern="^[ก-๏\sa-zA-Z\s]+$" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="lastname">นามสกุลเกษตรกร
                                                <span class="require">* (ต้องเป็นภาษาไทย หรือ ภาษาอังกฤษ เท่านั้น)</span></label>
                                            <input name="input-last_name" type="text" pattern="^[ก-๏\sa-zA-Z\s]+$" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="telephone">เบอร์โทรเกษตรกร
                                                <span class="require">* (เบอร์มือถือ 10 หลัก ไม่ต้องใส่เครื่องหมาย - หรือ เว้นวรรค)</span></label>
                                            <input name="input-tel_farmers" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" id="telephone" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="fax">line เกษตรกร</label>
                                            <input name="input-line_farmers" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="fax">facebook เกษตรกร</label>
                                            <input name="input-face_farmers" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 " style="padding-left: 0px; padding-right: 4px;">
                                                <div class="form-group">
                                                    <label for="fax">รูปเกษตรกร <span class="require">*</span></label>
                                                    <input id='input-image_farmers' name="input-image_farmers" type="file" accept="image/*" class="form-control" required>

                                                </div>
                                            </div>
                                            <div class="col-md-6 " style="padding-right: 0px; padding-left: 4px;">
                                                <div class="form-group">
                                                    <img id="img" width="100%" height="150px" src="../../script/assets/img/logos/person.png" alt="" />
                                                </div>
                                            </div>
                                            <script>
                                                const imageElement_ = document.querySelector("img[id=img]");
                                                var base64StringImg = null;
                                                // get a reference to the file input
                                                const fileInput_ = document.querySelector("input[id=input-image_farmers]");

                                                var canvas;
                                                fileInput_.addEventListener("change", (e) => {
                                                    // get a reference to the file
                                                    const file = e.target.files[0];

                                                    const reader = new FileReader();
                                                    reader.onloadend = (e) => {
                                                        var img_ = document.createElement("img");
                                                        img_.onload = function(event) {
                                                            var canvas = document.createElement("canvas");
                                                            canvas.width = 800;
                                                            canvas.height = 600;
                                                            var ctx = canvas.getContext("2d");
                                                            ctx.drawImage(img_, 0, 0, canvas.width, canvas.height);
                                                            var dataurl = canvas.toDataURL(file.type);
                                                            imageElement_.src = dataurl;
                                                            const base64String_S = dataurl
                                                                .replace("data:", "")
                                                                .replace(/^.+,/, "");
                                                            base64StringImg = base64String_S;
                                                        }
                                                        img_.src = e.target.result;
                                                    };
                                                    reader.readAsDataURL(file);
                                                });
                                            </script>
                                        </div>

                                        <h3>ข้อมูลฟาร์ม</h3>
                                        <div class="form-group">
                                            <div class="col-md-6 " style="padding-left: 0px; padding-right: 4px;">
                                                <div class="form-group">
                                                    <label for="fax">จำนวนพื้นที่เพาะปลูกไร่ <span class="require">*</span></label>
                                                    <input name="input-num_farm" required min="0" type="number" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6 " style="padding-right: 0px; padding-left: 4px;">
                                                <div class="form-group">
                                                    <label for="fax">จำนวนพื้นที่เพาะปลูกงาน <span class="require">*</span></label>
                                                    <input name="input-num_field" min="0" required type="number" class="form-control">
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="fax">อธิบายละเอียดต่างๆ เช่นช่วงเวลาเก็บเกี่ยว</label>
                                            <style type="text/css">
                                                textarea {
                                                    font-size: 1.4rem;
                                                    letter-spacing: 1px;
                                                }

                                                textarea {
                                                    min-width: 100%;
                                                    padding: 10px;
                                                    max-width: 100%;
                                                    line-height: 1.5;
                                                    border-radius: 5px;
                                                    border: 0.02px solid #ccc;
                                                    box-shadow: 1px 1px 1px #999;
                                                    height: 80px
                                                }
                                            </style>
                                            <textarea name="input-detail_farm" class=""></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 " style="padding-left: 0px; padding-right: 4px;">
                                                <div class="form-group">
                                                    <label for="fax">เกษตรอินทรีย์ <span class="require">*</span></label>
                                                    <div class="radio-list">
                                                        <label>
                                                            <input name="input-organic_farm" type="radio" value="1" required> อินทรีย์
                                                        </label>
                                                        <label>
                                                            <input name="input-organic_farm" type="radio" value="2" required> ไม่อินทรีย์
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 " style="padding-right: 0px; padding-left: 4px;">
                                                <div class="form-group">
                                                    <label for="fax">รูปแบบการขาย <span class="require">*</span></label>
                                                    <div class="radio-list">
                                                        <label>
                                                            <input name="input-type_sale" type="radio" value="1" required> ขายแบบพันธะสัญญา
                                                        </label>
                                                        <label>
                                                            <input name="input-type_sale" type="radio" value="2" required> ขายแบบเดี่ยว
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ยังไม่เช็ค อีเมล์เกษตรกร ว่ามีการซ้ำกันหรือไม่  -->
                                        <h3>ข้อมูลเข้าระบบ</h3>
                                        <div class="form-group">
                                            <label for="password"> E-Mail <span class="require">* </span></label>
                                            <input id="input-email_farmers" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="input-email_farmers" required type="email" id="password" class="form-control">
                                            <script>
                                                $('#input-email_farmers').keyup(function() {
                                                    var str = $(this).val();
                                                    // alert(str)
                                                    $.ajax({
                                                        url: "./controllers/register_faramers.php",
                                                        type: "POST",
                                                        data: {
                                                            key: 'check_email_farmers',
                                                            email_farmers: str
                                                        },
                                                        success(result, textStatus, jqXHR) {
                                                            // return alert(result);
                                                            // return swal("", "ไม่สามารถใช้เลขทะเบียนการค้านี้ได้!", "error");
                                                            if (result == 0) {
                                                                check_email_farmers = true;
                                                            } else {
                                                                check_email_farmers = false;
                                                                return alert("ไม่สามารถใช้อีเมลนี้ได้!");
                                                                // return swal("", "ไม่สามารถใช้เลขทะเบียนการค้านี้ได้!", "error");

                                                                // break;
                                                            }
                                                            // 
                                                        },
                                                        error(result, textStatus, jqXHR) {
                                                            check_email_farmers = false;
                                                            return alert("เกิดข้อผิดพลาด!");
                                                            // return swal("", "เกินข้อผิดพลาด!", "error");
                                                        }
                                                    });
                                                });
                                            </script>
                                        </div>
                                        <div class="form-group">
                                            <label for="password-confirm">Password <span class="require">* (ต้องมีอย่างน้อย 6 ตัวอักษรและประกอบด้วย a-z A-Z 0-9)</span></label>
                                            <input name="input-pass_farmers" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,64}$" required type="password" id="password-confirm" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">

                                        <h3>ที่อยู่เกษตรกร</h3>
                                        <div class="form-group">
                                            <label for="company">เลขที่/หมูที่ <span class="require">*</span></label>
                                            <input name="input-add_number" required type="text" id="company" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="address1">ซอย/ถนน <span class="require"> (หากไม่มีให้ปล่อยว่างไว้)</span></label>
                                            <input name="input-road" type="text" id="address1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="address2">แขวง/ตำบล <span class="require">*</span></label>
                                            <input name="input-sub_district" required type="text" id="address2" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="city"> เขต/อำเภอ <span class="require">*</span></label>
                                            <input name="input-district" required type="text" id="city" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="post-code">รหัสไปรษณี
                                                <span class="require">*</span></label>
                                            <input name="input-post_office" min="0" required type="number" id="post-code" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="country">จังหวัด<span class="require">*</span></label>
                                            <select id="input-province" name="input-province" class="form-control input-sm" id="country" required>
                                                <option disabled selected> --- PleaseSelect --- </option>
                                                <!--   -->
                                                <?php
                                                foreach (Database::query("SELECT * FROM `provinces` Order by `name_provinces` ASC ", PDO::FETCH_ASSOC) as $row) :
                                                ?>
                                                    <option value="<?php echo $row['id_provinces'] ?>"><?php echo $row['name_provinces'] ?></option>
                                                <?php
                                                endforeach;
                                                ?>

                                            </select>
                                        </div>
                                        <script>
                                            $("#input-province").on("change", function() {
                                                // alert($(this).val());
                                                $.ajax({
                                                    url: "./controllers/register_faramers.php",
                                                    type: "POST",
                                                    data: {
                                                        key: "get_provinces",
                                                        id_provinces: $(this).val()
                                                    },
                                                    success: function(result, textStatus, jqXHR) {
                                                        // console.log(result);
                                                        const obj = JSON.parse(result);
                                                        make_ = new google.maps.LatLng(obj[0]['province_lat'], obj[0]['province_lon']);
                                                        $("#map-canvas").show();
                                                        initialize();

                                                    },
                                                    error: function(result, textStatus, jqXHR) {

                                                    }
                                                });
                                                // switch ($(this).val()) {
                                                // 	case '1':
                                                // 		break;

                                                // }

                                            });
                                        </script>

                                        <h3>ข้อมูลพิกัด <span class="require"></span></h3>
                                        <div class="form-group">
                                            <div class="col-md-6 " style="padding-left: 0px; padding-right: 4px;">
                                                <div class="form-group">
                                                    <label for="city"> ละติจูดฟาร์ม </label>
                                                    <input name="input-lat_farm" id='lat' disabled type="text" id="city" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6 " style="padding-right: 0px; padding-left: 4px;">
                                                <div class="form-group">
                                                    <label for="city"> ลองจิจูดฟาร์ม </label>
                                                    <input name="input-lng_farm" id='lng' disabled type="text" id="city" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="city"> เลือกที่ตั้งฟามร์ม <span class="require">* </span><a href="javascript:initialize();$('#map-canvas').css('display','block');">คลิ๊กเพื่อเลือกที่ตั้งฟาร์ม</a></label>
                                            <div id="map-canvas" style="display: none" class="map-canvas"></div>
                                        </div>
                                    </div>



                                    <hr>
                                    <div class="col-md-12">

                                        <button class="btn btn-primary pull-right" type="submit" id="button-payment-address">ลงทะเบียน</button>

                                    </div>
                                </form>
                            </div>
                            <script>
                                // $("#button-payment-address").click(function() {
                                //     // alert("Register Farmes");
                                // });

                                $("#form_register_farmers").keypress((e) => {
                                    if (e.which === 13) {

                                    }
                                })

                                $("#form_register_farmers").submit(function() {
                                    // get all the inputs into an array.
                                    var $inputs = $("#form_register_farmers :input");
                                    var values = {};
                                    $inputs.each(function() {
                                        values[this.name] = $(this).val();
                                    });

                                    // set values
                                    values['input-image_farmers'] = base64StringImg;
                                    values['input-organic_farm'] = $('input[name=input-organic_farm]:checked', $(this)).val();
                                    values['input-type_sale'] = $('input[name=input-type_sale]:checked', $(this)).val();
                                    // alert(
                                    // console.log(JSON.stringify(values));

                                    if (check_email_farmers == true) {
                                        $.ajax({
                                            url: "./controllers/register_faramers.php",
                                            type: "POST",
                                            // dataType: 'text',
                                            data: {
                                                key: "form_register_farmers",
                                                data: values,
                                                // form_data: form_data
                                            },
                                            success: function(result, textStatus, jqXHR) {
                                                // console.log(result);
                                                if (result == "success") {
                                                    alert("สมัครสมาชิกสำเร็จ");
                                                    $("#form_register_farmers").trigger("reset");
                                                    location.reload();

                                                } else {
                                                    alert("เกิดข้อผิดพลาดบางอย่าง");
                                                    location.reload();
                                                }
                                                // console.log(JSON.stringify(values));
                                            },
                                            error: function(jqXHR, textStatus, errorThrown) {

                                            }
                                        });
                                    }
                                });
                            </script>
                        </div>

                        <div id="forgot_password" class="panel panel-default ">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#checkout-page" href="#forgot_password-content" class="accordion-toggle">
                                        ลืมรหัสผ่าน
                                    </a>
                                </h2>
                            </div>
                            <div id="forgot_password-content" class="panel-collapse collapse ">
                                <div class="panel-body row">
                                    <div class="col-md-12 col-sm-12">
                                        <form id="form_forgot_password" role="form" action="javascript:void(0);">
                                            <div class="form-group">
                                                <label for="">อีเมล์เกษตรกร<span class="require">*</span></label>
                                                <input type="email" id="email_forgot" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" placeholder="อีเมลใช้ลงทะเบียน">
                                            </div>
                                            <div class="form-group">
                                                <label for="">เบอร์ติดต่อ<span class="require">*</span></label>
                                                <input type="tel" id="tel_forgot" pattern="^0[0-9]{8,9}$" class="form-control" placeholder="เบอร์มือถือ 10 หลัก">
                                            </div>

                                            <div class="padding-top-20 text-right">
                                                <button class="btn btn-primary" type="submit">ส่งรหัสผ่านใหม่</button>
                                            </div>
                                        </form>
                                        <script>
                                            $("#form_forgot_password").submit(function() {
                                                var body = $("body");
                                                // body.addClass("loading");
                                                body.removeClass("loading");
                                                // alert( $("#email_forgot").val() + $("#tel_forgot").val())
                                                $.ajax({
                                                    url: "../controllers/resetPass.php",
                                                    type: "POST",
                                                    data: {
                                                        key: "resetPass_farmers",
                                                        email_forgot: $("#email_forgot").val(),
                                                        tel_forgot: $("#tel_forgot").val()
                                                    },
                                                    cache: false,
                                                    beforeSend: function() {
                                                        // console.log(result);
                                                        body.addClass("loading");
                                                    },
                                                    success: function(result, textStatus, jqXHR) {
                                                        // alert(result);
                                                        if (result == 'success') {
                                                            alert("กรุณาตรวจสอบอีเมลของท่าน")
                                                        }
                                                        body.removeClass("loading");
                                                        $("#form_forgot_password").trigger("reset");
                                                    },
                                                    error: function(jqXHR, textStatus, errorThrown) {
                                                        alert(result);
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include_once("./footer.php");
        ?>

        <!--[if lt IE 9]>
    <script src="../../script/assets/plugins/respond.min.js"></script>  
    <![endif]-->
</body>

</html>