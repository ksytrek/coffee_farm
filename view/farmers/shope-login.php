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
<!-- <script src=" https://maps.googleapis.com/maps/api/js?key=AIzaSyD1f4vUGxabEU5Ayz4D6fiHLyV_iC2f0-E&v=weekly&sensor=false&language=th"></script> -->
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
    google.maps.event.addDomListener(window, 'load', initialize);
</script>



<?php
include_once('./navbar.php');
?>

<head>
    <meta charset="utf-8">
    <title>Metronic Shop UI</title>

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
                    <h1>LOGIN</h1>
                    <!-- BEGIN CHECKOUT PAGE -->
                    <div class="panel-group checkout-page accordion scrollable" id="checkout-page">

                        <!-- BEGIN CHECKOUT -->
                        <div id="checkout" class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#checkout-page" href="#checkout-content" class="accordion-toggle">
                                        LOGIN FARMERS
                                    </a>
                                </h2>
                            </div>
                            <div id="checkout-content" class="panel-collapse collapse ">
                                <div class="panel-body row">
                                    <!-- <div class="col-md-6 col-sm-6">
                                        <h3>New Customer</h3>
                                        <p>Checkout Options:</p>
                                        <div class="radio-list">
                                            <label>
                                                <input type="radio" name="account" value="register">
                                                Register Account
                                            </label>
                                            <label>
                                                <input type="radio" name="account" value="guest"> Guest
                                                Checkout
                                            </label>
                                        </div>
                                        <p>By creating an account you will
                                            be able to shop faster, be up to
                                            date on an order's status, and
                                            keep track of the orders you
                                            have previously made.</p>
                                        <button class="btn btn-primary" type="submit" data-toggle="collapse" data-parent="#checkout-page" data-target="#payment-address-content">Continue</button>
                                    </div> -->
                                    <div class="col-md-12 col-sm-12">
                                        <h3>Login Farmers</h3>
                                        <p>I am a returning customer.</p>
                                        <form role="form" action="javascript:loginfarmers();">
                                            <div class="form-group">
                                                <label for="email-login">E-Mail<span class="require">*</span></label>
                                                <input type="email" id="email-login" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="password-login">Password<span class="require">*</span></label>
                                                <input type="password" id="password-login" class="form-control" required>
                                            </div>
                                            <label style="margin-bottom: 10px"><input type="checkbox"> จดจำฉันไว้ </label>
                                            <br>
                                            <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-address-content">ฉันยังไม่มีรหัสเข้าสู่ระบบ</a>
                                            <div class="padding-top-20 text-right">
                                                <button class="btn btn-primary" type="submit">Login</button>
                                            </div>

                                            <script>
                                                function loginfarmers() {
                                                    alert("Loging farmes");
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
                                        Register Account Farmers
                                    </a>
                                </h2>
                            </div>
                            <div id="payment-address-content" class="panel-collapse collapse in">
                                <form id="form_register_farmers" action="javascript:void(0)" method="post"" <div class=" panel-body row">
                                    <div class="col-md-6 col-sm-6">
                                        <h3>ข้อมูลส่วนเกษตรกร</h3>
                                        <div class="form-group">
                                            <label for="firstname"> ชื่อเกษตรกร <span class="require">*</span></label>
                                            <input name="input-name" value="1" type="text" id="firstname455554" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="lastname">นามสกุลเกษตรกร
                                                <span class="require">*</span></label>
                                            <input name="input-last_name" value="2" type="text" id="lastname" class="form-control">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="email">E-Mail <span class="require">*</span></label>
                                            <input name="input-email_farmers" type="email" id="email" class="form-control">
                                        </div> -->
                                        <div class="form-group">
                                            <label for="telephone">เบอร์โทรเกษตรกร
                                                <span class="require">*</span></label>
                                            <input name="input-tel_farmers" value="3"  type="text" id="telephone" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="fax">line เกษตรกร</label>
                                            <input name="input-line_farmers" value="4"  type="text"  class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="fax">facebook เกษตรกร</label>
                                            <input name="input-face_farmers" value="5"   type="text"  class="form-control">
                                        </div>

                                        <h3>ข้อมูลฟาร์ม</h3>



                                        <div class="form-group">
                                            <div class="col-md-6 " style="padding-left: 0px; padding-right: 4px;">
                                                <div class="form-group">
                                                    <label for="fax">จำนวนพื้นที่เพาะปลูกไร่ <span class="require">*</span></label>
                                                    <input name="input-num_farm" value="6"  type="text"  class="form-control">
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
                                                    <input name="input-num_field" value="7"  type="text"  class="form-control">
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
                                                    border: 1px solid #ccc;
                                                    box-shadow: 1px 1px 1px #999;
                                                    /* height:10rem */
                                                }
                                            </style>
                                            <textarea name="input-detail_farm"    class="form-control">8</textarea>
                                            <!-- <input type="text"  class="form-control">
                                         -->
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 " style="padding-left: 0px; padding-right: 4px;">
                                                <div class="form-group">
                                                    <label for="fax">เกษตรอินทรีย์ <span class="require">*</span></label>
                                                    <div class="radio-list">
                                                        <label>
                                                            <input name="input-organic_farm" type="radio"  value="9" checked> อินทรีย์
                                                        </label>
                                                        <label>
                                                            <input name="input-organic_farm" type="radio"  value="9"> ไม่อินทรีย์
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 " style="padding-right: 0px; padding-left: 4px;">
                                                <div class="form-group">
                                                    <label for="fax">รูปแบบการขาย <span class="require">*</span></label>
                                                    <div class="radio-list">
                                                        <label>
                                                            <input name="input-type_sale" type="radio"  value="10" checked> ขายแบบพันธะสัญญา
                                                        </label>
                                                        <label>
                                                            <input name="input-type_sale" type="radio"  value="10"> ขายแบบเดี่ยว
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>





                                        <h3>ข้อมูลเข้าระบบ</h3>
                                        <div class="form-group">
                                            <label for="password"> E-Mail <span class="require">*</span></label>
                                            <input name="input-email_farmers" value="11"  type="text" id="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password-confirm">Password <span class="require">*</span></label>
                                            <input name="input-pass_farmers" value="12"  type="text" id="password-confirm" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">

                                        <h3>ที่อยู่เกษตรกร</h3>
                                        <div class="form-group">
                                            <label for="company">เลทที่/หมูที่ <span class="require">*</span></label>
                                            <input name="input-add_number" value="13-1" type="text" id="company" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="address1">ซอย/ถนน</label>
                                            <input name="input-road" type="text" value="13-2" id="address1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="address2">แขวง/ตำบล <span class="require">*</span></label>
                                            <input name="input-sub_district" value="13-3" type="text" id="address2" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="city"> เขต/อำเภอ <span class="require">*</span></label>
                                            <input name="input-district" value="13-4" type="text" id="city" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="post-code">รหัสไปรษณี
                                                <span class="require">*</span></label>
                                            <input name="input-post_office" value="14" type="text" id="post-code" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="country">จังหวัด<span class="require">*</span></label>
                                            <select  name="input-province"  class="form-control input-sm" id="country">
                                                <option value="15 "> 15</option>
                                                <!-- --- PleaseSelect ---  -->
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
                                                    <input  name="input-lat_farm" value="16" id='lat' value="100.265437234" disabled type="text" id="city" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6 " style="padding-right: 0px; padding-left: 4px;">
                                                <div class="form-group">
                                                    <label for="city"> ลองจิจูดฟาร์ม </label>
                                                    <input  name="input-lng_farm" value="17" id='lng' value="100.265437234" disabled type="text" id="city" class="form-control">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="city"> เลือกที่ตั้งฟามร์ม <span class="require">*</span></label>
                                            <div id="map-canvas" class="map-canvas"></div>
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
                                        <button class="btn btn-primary pull-right" type="submit" id="button-payment-address">Continue</button>
                                        <script>
                                            $("#button-payment-address").click(function() {
                                                // alert("Register Farmes");
                                            });
                                        </script>

                                    </div>
                            </div>
                            </form>

                            <script>
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

                                    // console.log(JSON.stringify(values));
                                    $.ajax({
                                        url: "./controllers/register_faramers.php",
                                        type: "POST",
                                        data: {
                                            key: "form_register_farmers",
                                            data: values
                                        },success: function(result, textStatus, jqXHR) {
                                            console.log(result);
                                            console.log(JSON.stringify(values));
                                        },error: function(jqXHR, textStatus, errorThrown){

                                        }
                                    });

                                    // alert(values['input-name']);



                                });
                                // $("#form_register_farmers").submit(function() {
                                //     alert('Please');
                                //     var values = {};
                                //     $.each($("#form_register_farmers").serializeArray(), function(i, field) {
                                //         // values[field.name] = field.value;
                                //         alert(field.value);
                                //     });

                                //     $.each(values, function(i, field) {
                                //         alert(field[i]);
                                //     });
                                // });

                                // })
                            </script>

                            <script>
                                // $('#form_register_farmers').submit(function(event) {
                                //     // alert($(this).elements['firstname455554']);

                                //     // alert($( "input" ).first().val());

                                // });


                                // function form_register_farmers() {
                                //     // alert("Register Farmers");
                                // }
                            </script>
                        </div>
                    </div>

                    <!-- <div id="shipping-address" class="panel
                                panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#checkout-page" href="#shipping-address-content" class="accordion-toggle">
                                        Step 3: Delivery Details
                                    </a>
                                </h2>
                            </div>
                            <div id="shipping-address-content" class="panel-collapse collapse">
                                <div class="panel-body row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname-dd">First
                                                Name <span class="require">*</span></label>
                                            <input type="text" id="firstname-dd" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="lastname-dd">Last
                                                Name <span class="require">*</span></label>
                                            <input type="text" id="lastname-dd" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="email-dd">E-Mail
                                                <span class="require">*</span></label>
                                            <input type="text" id="email-dd" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="telephone-dd">Telephone
                                                <span class="require">*</span></label>
                                            <input type="text" id="telephone-dd" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="fax-dd">Fax</label>
                                            <input type="text" id="fax-dd" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="company-dd">Company</label>
                                            <input type="text" id="company-dd" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="address1-dd">Address
                                                1</label>
                                            <input type="text" id="address1-dd" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="address2-dd">Address
                                                2</label>
                                            <input type="text" id="address2-dd" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="city-dd">City <span class="require">*</span></label>
                                            <input type="text" id="city-dd" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="post-code-dd">Post
                                                Code <span class="require">*</span></label>
                                            <input type="text" id="post-code-dd" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="country-dd">Country
                                                <span class="require">*</span></label>
                                            <select class="form-control
                                                    input-sm" id="country-dd">
                                                <option value=""> --- Please
                                                    Select --- </option>
                                                <option value="244">Aaland
                                                    Islands</option>
                                                <option value="1">Afghanistan</option>
                                                <option value="2">Albania</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="region-state-dd">Region/State
                                                <span class="require">*</span></label>
                                            <select class="form-control
                                                    input-sm" id="region-state-dd">
                                                <option value=""> --- Please
                                                    Select --- </option>
                                                <option value="3513">Aberdeen</option>
                                                <option value="3514">Aberdeenshire</option>
                                                <option value="3515">Anglesey</option>
                                                <option value="3516">Angus</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary
                                                pull-right" type="submit" id="button-shipping-address" data-toggle="collapse" data-parent="#checkout-page" data-target="#shipping-method-content">Continue</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="shipping-method" class="panel
                                panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#checkout-page" href="#shipping-method-content" class="accordion-toggle">
                                        Step 4: Delivery Method
                                    </a>
                                </h2>
                            </div>
                            <div id="shipping-method-content" class="panel-collapse collapse">
                                <div class="panel-body row">
                                    <div class="col-md-12">
                                        <p>Please select the preferred
                                            shipping method to use on this
                                            order.</p>
                                        <h4>Flat Rate</h4>
                                        <div class="radio-list">
                                            <label>
                                                <input type="radio" name="FlatShippingRate" value="FlatShippingRate">
                                                Flat Shipping Rate
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="delivery-comments">Add
                                                Comments About Your Order</label>
                                            <textarea id="delivery-comments" rows="8" class="form-control"></textarea>
                                        </div>
                                        <button class="btn btn-primary
                                                pull-right" type="submit" id="button-shipping-method" data-toggle="collapse" data-parent="#checkout-page" data-target="#payment-method-content">Continue</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="payment-method" class="panel
                                panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-method-content" class="accordion-toggle">
                                        Step 5: Payment Method
                                    </a>
                                </h2>
                            </div>
                            <div id="payment-method-content" class="panel-collapse collapse">
                                <div class="panel-body row">
                                    <div class="col-md-12">
                                        <p>Please select the preferred
                                            payment method to use on this
                                            order.</p>
                                        <div class="radio-list">
                                            <label>
                                                <input type="radio" name="CashOnDelivery" value="CashOnDelivery">
                                                Cash On Delivery
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="delivery-payment-method">Add
                                                Comments About Your Order</label>
                                            <textarea id="delivery-payment-method" rows="8" class="form-control"></textarea>
                                        </div>
                                        <button class="btn btn-primary
                                                pull-right" type="submit" id="button-payment-method" data-toggle="collapse" data-parent="#checkout-page" data-target="#confirm-content">Continue</button>
                                        <div class="checkbox pull-right">
                                            <label>
                                                <input type="checkbox"> I
                                                have read and agree to the
                                                <a title="Terms &
                                                        Conditions" href="javascript:;">Terms
                                                    & Conditions </a>
                                                &nbsp;&nbsp;&nbsp;
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="confirm" class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#checkout-page" href="#confirm-content" class="accordion-toggle">
                                        Step 6: Confirm Order
                                    </a>
                                </h2>
                            </div>
                            <div id="confirm-content" class="panel-collapse
                                    collapse">
                                <div class="panel-body row">
                                    <div class="col-md-12 clearfix">
                                        <div class="table-wrapper-responsive">
                                            <table>
                                                <tr>
                                                    <th class="checkout-image">Image</th>
                                                    <th class="checkout-description">Description</th>
                                                    <th class="checkout-model">Model</th>
                                                    <th class="checkout-quantity">Quantity</th>
                                                    <th class="checkout-price">Price</th>
                                                    <th class="checkout-total">Total</th>
                                                </tr>
                                                <tr>
                                                    <td class="checkout-image">
                                                        <a href="javascript:;"><img src="assets/pages/img/products/model3.jpg" alt="Berry
                                                                    Lace Dress"></a>
                                                    </td>
                                                    <td class="checkout-description">
                                                        <h3><a href="javascript:;">Cool
                                                                green dress
                                                                with red
                                                                bell</a></h3>
                                                        <p><strong>Item 1</strong>
                                                            - Color: Green;
                                                            Size: S</p>
                                                        <em>More info is
                                                            here</em>
                                                    </td>
                                                    <td class="checkout-model">RES.193</td>
                                                    <td class="checkout-quantity">1</td>
                                                    <td class="checkout-price"><strong><span>$</span>47.00</strong></td>
                                                    <td class="checkout-total"><strong><span>$</span>47.00</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="checkout-image">
                                                        <a href="javascript:;"><img src="assets/pages/img/products/model4.jpg" alt="Berry
                                                                    Lace Dress"></a>
                                                    </td>
                                                    <td class="checkout-description">
                                                        <h3><a href="javascript:;">Cool
                                                                green dress
                                                                with red
                                                                bell</a></h3>
                                                        <p><strong>Item 1</strong>
                                                            - Color: Green;
                                                            Size: S</p>
                                                        <em>More info is
                                                            here</em>
                                                    </td>
                                                    <td class="checkout-model">RES.193</td>
                                                    <td class="checkout-quantity">1</td>
                                                    <td class="checkout-price"><strong><span>$</span>47.00</strong></td>
                                                    <td class="checkout-total"><strong><span>$</span>47.00</strong></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="checkout-total-block">
                                            <ul>
                                                <li>
                                                    <em>Sub total</em>
                                                    <strong class="price"><span>$</span>47.00</strong>
                                                </li>
                                                <li>
                                                    <em>Shipping cost</em>
                                                    <strong class="price"><span>$</span>3.00</strong>
                                                </li>
                                                <li>
                                                    <em>Eco Tax (-2.00)</em>
                                                    <strong class="price"><span>$</span>3.00</strong>
                                                </li>
                                                <li>
                                                    <em>VAT (17.5%)</em>
                                                    <strong class="price"><span>$</span>3.00</strong>
                                                </li>
                                                <li class="checkout-total-price">
                                                    <em>Total</em>
                                                    <strong class="price"><span>$</span>56.00</strong>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                        <button class="btn btn-primary
                                                pull-right" type="submit" id="button-confirm">Confirm
                                            Order</button>
                                        <button type="button" class="btn
                                                btn-default pull-right
                                                margin-right-20">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                </div>
                <!-- END CHECKOUT PAGE -->
            </div>
            <!-- END CONTENT -->
        </div>
    </div>
    </div>


    <?php
    include_once("./footer.php");
    ?>
    <!-- END fast view of a product -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="../../script/assets/plugins/respond.min.js"></script>  
    <![endif]-->
</body>
<!-- END BODY -->

</html>