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
</style>

<!-- <script src="./js/jquery.min.js"></script> -->

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
    // google.maps.event.addDomListener(window, 'load', initialize);
</script>




<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAw0nLxD9NsQiJKwFKM38AODUypI8f5FdI&libraries=places&v=weekly&language=th"></script> -->

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

</head>
<!-- Head END -->

<!-- Body BEGIN -->

<body class="ecommerce">


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
                                        <form id="form_loging" role="form" action="javascript:loginfarmers();">
                                            <div class="form-group">
                                                <label for="email-login">E-Mail<span class="require">*</span></label>
                                                <input type="email" id="email-login" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="password-login">Password<span class="require">*</span></label>
                                                <input type="password" id="password-login" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" class="form-control" placeholder="อักษร 8-12 และ A-Za-z0-9!@#$%^&*_=+-">
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
                                                                    alert("ยินดีตอนรับเข้าสู่ระบบ");
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
                                            <!-- <hr> -->
                                            <!-- <div class="login-socio">
                                                <p class="text-muted">or
                                                    login using:</p>
                                                <ul class="social-icons">
                                                    <li><a href="javascript:;" data-original-title="facebook" class="facebook" title="facebook"></a></li>
                                                    <li><a href="javascript:;" data-original-title="Twitter" class="twitter" title="Twitter"></a></li>
                                                    <li><a href="javascript:;" data-original-title="Google
                                                                Plus" class="googleplus" title="Google
                                                                Plus"></a></li>
                                                    <li><a href="javascript:;" data-original-title="Linkedin" class="linkedin" title="LinkedIn"></a></li>
                                                </ul>
                                            </div> -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END CHECKOUT -->

                        <!-- BEGIN PAYMENT ADDRESS -->

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
                                            <label for="firstname"> ชื่อเกษตรกร <span class="require">*</span></label>
                                            <input name="input-name" type="text" id="firstname455554" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="lastname">นามสกุลเกษตรกร
                                                <span class="require">*</span></label>
                                            <input name="input-last_name" type="text" id="lastname" class="form-control" required>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="email">E-Mail <span class="require">*</span></label>
                                            <input name="input-email_farmers" type="email" id="email" class="form-control">
                                        </div> -->
                                        <div class="form-group">
                                            <label for="telephone">เบอร์โทรเกษตรกร
                                                <span class="require">*</span></label>
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
                                            <!-- <div class="col-md-4 " style="padding-left: 0px; padding-right: 0px;">
                                                <div class="form-group">
                                                    <label for="fax">จำนวนพื้นที่เพาะปลูกไร่</label>
                                                    <input type="text"  class="form-control">
                                                </div>
                                            </div> -->
                                            <!-- <div style="margin-left: 0; margin-right:"></div> -->
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
                                                // listen for the change event so we can capture the file
                                                fileInput_.addEventListener("change", (e) => {
                                                    // get a reference to the file
                                                    const file = e.target.files[0];
                                                    // console.log(file);
                                                    // var fi = e.files[0];
                                                    // set file as image source


                                                    const reader = new FileReader();
                                                    reader.onloadend = (e) => {
                                                        var img_ = document.createElement("img");
                                                        img_.onload = function(event) {
                                                            // Dynamically create a canvas element
                                                            var canvas = document.createElement("canvas");
                                                            canvas.width = 800;
                                                            canvas.height = 600;
                                                            // var canvas = document.getElementById("canvas");
                                                            var ctx = canvas.getContext("2d");
                                                            // Actual resizing
                                                            ctx.drawImage(img_, 0, 0, canvas.width, canvas.height);

                                                            // Show resized image in preview element
                                                            var dataurl = canvas.toDataURL(file.type);
                                                            // document.getElementById("preview").src = dataurl;
                                                            imageElement_.src = dataurl;

                                                            // console.log(dataurl.replace(/^data:image\/(png|jpg);base64,/, ""));
                                                            const base64String_S = dataurl
                                                                .replace("data:", "")
                                                                .replace(/^.+,/, "");
                                                            base64StringImg = base64String_S;

                                                            // console.log(base64String_S);
                                                            // location.assign("./controllers/bs.php?s="+base64StringImg);
                                                            // $.ajax({
                                                            //     url: "./controllers/bs.php",
                                                            //     type: "POST",
                                                            //     data : {
                                                            //         data: base64StringImg
                                                            //     },
                                                            //     success: function(result, textStatus, jqXHR) {
                                                            //         console.log(result);
                                                            //     }
                                                            // });
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
                                            <!-- <div class="col-md-4 " style="padding-left: 0px; padding-right: 0px;">
                                                <div class="form-group">
                                                    <label for="fax">จำนวนพื้นที่เพาะปลูกไร่</label>
                                                    <input type="text"  class="form-control">
                                                </div>
                                            </div> -->
                                            <!-- <div style="margin-left: 0; margin-right:"></div> -->
                                            <div class="col-md-6 " style="padding-right: 0px; padding-left: 4px;">
                                                <div class="form-group">
                                                    <label for="fax">จำนวนพื้นที่เพาะปลูกงาน <span class="require">*</span></label>
                                                    <input name="input-num_field" min="0" required type="number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="password-confirm">Password
                                                Confirm <span class="require">*</span></label>
                                            <input type="text" id="password-confirm" class="form-control">
                                        </div> -->


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
                                            <!-- <input type="text"  class="form-control">
                                         -->
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
                                            <label for="password"> E-Mail <span class="require">*</span></label>
                                            <input name="input-email_farmers" required type="email" id="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password-confirm">Password <span class="require">*</span></label>
                                            <input name="input-pass_farmers" required type="password" id="password-confirm" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">

                                        <h3>ที่อยู่เกษตรกร</h3>
                                        <div class="form-group">
                                            <label for="company">เลทที่/หมูที่ <span class="require">*</span></label>
                                            <input name="input-add_number" required type="text" id="company" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="address1">ซอย/ถนน</label>
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
                                            <select name="input-province" class="form-control input-sm" id="country" required>
                                                <option disabled selected value=""> --- PleaseSelect --- </option>
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

                                        <h3>ข้อมูลพิกัด</h3>
                                        <div class="form-group">
                                            <div class="col-md-6 " style="padding-left: 0px; padding-right: 4px;">
                                                <div class="form-group">
                                                    <label for="city"> ละติจูดฟาร์ม </label>
                                                    <input name="input-lat_farm" id='lat' disabled type="number" id="city" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6 " style="padding-right: 0px; padding-left: 4px;">
                                                <div class="form-group">
                                                    <label for="city"> ลองจิจูดฟาร์ม </label>
                                                    <input name="input-lng_farm" id='lng' disabled type="number" id="city" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="city"> เลือกที่ตั้งฟามร์ม <span class="require">*</span><a href="javascript:initialize();$('#map-canvas').css('display','block');">คลิ๊กเพื่อเลือกที่ตั้งฟาร์ม</a></label>
                                            <div id="map-canvas" style="display: none" class="map-canvas"></div>
                                        </div>
                                    </div>



                                    <hr>
                                    <div class="col-md-12">
                                        <!-- <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I
                                                wish to subscribe to the OXY
                                                newsletter.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked="checked"> My
                                                delivery and billing
                                                addresses are the same.
                                            </label>
                                        </div>                                 <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I
                                                wish to subscribe to the OXY
                                                newsletter.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked="checked"> My
                                                delivery and billing
                                                addresses are the same.
                                            </label>
                                        </div> -->
                                        <button class="btn btn-primary pull-right" type="submit" id="button-payment-address">ลงทะเบียน</button>

                                    </div>
                                    <!-- </form> -->
                            </div>
                            <script>
                                // $("#button-payment-address").click(function() {
                                //     // alert("Register Farmes");
                                // });

                                $("#form_register_farmers").keypress((e) => {
                                    if (e.which === 13) {
                                        // $("#form_register_farmers").submit();
                                        // alert('Form submitted successfully.')
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
                                    console.log(JSON.stringify(values));


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
                                        <form id="form_forgot_password" role="form" action="javascript:loginfarmers();">
                                            <div class="form-group">
                                                <label for="">อีเมล์เกษตรกร<span class="require">*</span></label>
                                                <input type="email" id="email_forgot" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" placeholder="อีเมลใช้ลงทะเบียน">
                                            </div>
                                            <div class="form-group">
                                                <label for="">เบอร์ติดต่อ<span class="require">*</span></label>
                                                <input type="text" id="tel_forgot" class="form-control" placeholder="เบอร์มือถือ 10 หลัก">
                                            </div>

                                            <div class="padding-top-20 text-right">
                                                <button class="btn btn-primary" type="submit">ส่งรหัสผ่านใหม่</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT -->
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
<!-- END BODY -->

</html>