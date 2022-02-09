<!DOCTYPE html>
<html>

<?php
// require('../../../config/connectdb.php');
include_once('../../../script/assets/plugins/googleApi/mapApi.html');
include_once("../../../config/connectdb.php");
?>

<head>
	<meta charset="utf-8">
	<title>สมัครสมาชิกโรงคั่วกาแฟ</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="css/style.css" />
	<link href="css/sweetalert.css" rel="stylesheet">

</head>
<!-- <script src="../../../script/assets/plugins/googleApi/mapApi.html"></script> -->

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAw0nLxD9NsQiJKwFKM38AODUypI8f5FdI&v=weekly&language=th"></script> -->



<style type="text/css" media="all">
	/* body {
		background-color: #fff;
	} */

	#map-canvas {
		display: block;
		margin: 10px auto;
		height: 400px;
		width: 100%;
		background-color: #ccc;
	}
</style>
<script src="./js/jquery.min.js"></script>
<script>
	var check_num_trade_reg = false;
	var check_e_mail_roasters = false;
	$(document).ready(function() {
		// alert('Please');
		// swal("", "เกินข้อผิดพลาด!", "error");

	});
</script>

<script>
	var make_ = new google.maps.LatLng(13.730995466424108, 100.51986257812496);
	var marker;
	var map;

	function initialize() {

		var mapOptions = {
			zoom: 10,
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
</script>

<body class="form-v10">
	<div class="page-content">
		<div class="form-v10-content">
			<!-- <form class="form-detail" action="่" method="post" id="myform"> -->
			<div class="form-detail " id="myform">

				<div class="form-left">
					<h2>ข้อมูลทั่วไปสำหรับโรงคั่วกาแฟ</h2>

					<!-- ชื่อโรงคั่วกาแฟ  company -->
					<div class="form-row">
						<input type="text" name="company" class="company input-name_roasters" placeholder="ชื่อโรงคั่วกาแฟ" required>
					</div>
					<!-- เลขทะเบียนการค้า trade registration number -->
					<div class="form-row">
						<input type="text" name="company" class="company input-num_trade_reg" placeholder="เลขทะเบียนการค้า" required>
					</div>
					<script>
						$('.input-num_trade_reg').keyup(function() {
							var str = $(this).val();
							$.ajax({
								url: "./controller/register.php",
								type: "POST",
								data: {
									key: 'num_trade_reg',
									num_trade_reg: str
								},
								success(result, textStatus, jqXHR) {
									// return alert(result);
									if (result == 0) {
										check_num_trade_reg = true;
									} else {
										check_num_trade_reg = false;
										return swal("", "ไม่สามารถใช้เลขทะเบียนการค้านี้ได้!", "error");
										// break;
									}
									// 
								},
								error(result, textStatus, jqXHR) {
									return swal("", "เกินข้อผิดพลาด!", "error");
								}
							});
						});
					</script>
					<!-- ชื่อผู้ประกอบการ  -->
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="first_name" id="first_name" class="input-text input-name" placeholder="ชื่อผู้ประกอบการ" required>

						</div>
						<div class="form-row form-row-2">
							<input type="text" name="last_name" id="last_name" class="input-text input-last_name" placeholder="นามสกุลผู้ประกอบการ" required>
						</div>
					</div>

					<div class="form-row">
						<input type="tel" name="tel_roasters" class="company input-tel_roasters" placeholder="เบอร์ติดต่อ" required>
						<p style="font-size:13px;margin-top: 0px; color:#FF0033;">ต้องใส่เป็นตัวเลขและมีจำนวน 10 ตัวเท่านั้น</p>
					</div>
					<div class="form-row">
						<input type="email" name="company" class="company input-e_mail_roasters" placeholder="อีเมลโรงคั่วกาแฟ" required>
						<p style="font-size:13px;margin-top: 0px; color:#FF0033;">Example : xxxx@gmail.com</p>
						<script>
							$('.input-e_mail_roasters').keyup(function() {
								var str = $(this).val();
								$.ajax({
									url: "./controller/register.php",
									type: "POST",
									data: {
										key: 'e_mail_roasters',
										e_mail_roasters: str
									},
									success(result, textStatus, jqXHR) {
										// return alert(result);
										if (result == 0) {
											check_e_mail_roasters = true;
										} else {
											check_e_mail_roasters = false;
											return swal("", "ไม่สามารถใช้อีเมลโรงคั่วกาแฟนี้ได้!", "error");
											// break;
										}
										// 
									},
									error(result, textStatus, jqXHR) {
										return swal("", "เกินข้อผิดพลาด!", "error");
									}
								});
							});
						</script>
					</div>
					<div class="form-row">
						<input type="password" name="company" class="company input-pass_roasters" placeholder="รหัสผ่านโรงคั่วกาแฟ" required>
						<p style="font-size:13px;margin-top: 0px; color:#FF0033;">ต้องมีอย่างน้อย 6 ตัวอักษรและประกอบด้วย a-z A-Z 0-9</p>
					</div>
					<!-- รายละเอียดต่าง ๆ -->
					<div class="form-row">
						<!-- <input type="text" name="company" class="company"  placeholder="รายละเอียดต่างๆ ของโรงคั่วกาแฟ" required> -->
						<textarea class="input-detail_roasters" placeholder="รายละเอียดต่างๆ ของโรงคั่วกาแฟ"></textarea>
					</div>

				</div>
				<div class="form-right">
					<h2>รายละเอียดการติดต่อ</h2>
					<h5>ที่ตั้งสำนักงาน</h5>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="" class="input-text input-add_number" placeholder="เลขที่/หมูที่" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="last_name" class="input-text input-road" placeholder="ซอย/ถนน" required>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="" class="input-text input-sub-district" placeholder="แขวง / ตำบล" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="last_name" class="input-text input-district" placeholder="เขต / อำเภอ" required>
						</div>
					</div>

					<style>
						input[type=number]::-webkit-inner-spin-button {
							-webkit-appearance: none;
						}
					</style>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="number" name="zip" class="zip input-post-office" id="zip" placeholder="ไปรษณีย์" required>
						</div>
						<div class="form-row form-row-2">
							<select name="place" class="input-province">
								<option value="" selected disabled>เลือกจังหวัด</option>
								<?php
								foreach (Database::query("SELECT * FROM `provinces` Order by `name_provinces` ASC ", PDO::FETCH_ASSOC) as $row) :
								?>
									<option value="<?php echo $row['id_provinces'] ?>"><?php echo $row['name_provinces'] ?></option>

								<?php
								endforeach;
								?>
							</select>
							<span class="select-btn">
								<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</div>
					</div>
					<script>
						$(".input-province").on("change", function() {
							// alert($(this).val());
							$.ajax({
								url : "./controller/register.php",
								type : "POST",
								data : {
									key : "get_provinces",
									id_provinces : $(this).val()
								},success : function(result, textStatus,jqXHR){
									const obj = JSON.parse(result);
									make_ = new google.maps.LatLng(obj[0]['province_lat'], obj[0]['province_lon']);
									$("#map-canvas").show();
									initialize();

								},error : function(result, textStatus, jqXHR){

								}
							});
							// switch ($(this).val()) {
							// 	case '1':
							// 		break;
								
							// }
							
						});
					</script>

					<!-- <strong>Latitude</strong> <input type="text" name="lat" id="lat" />-
					<strong>Longitude</strong> <input type="text" name="lng" id="lng" /> -->
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" disabled name="company" class="company input-lat_roasters" id="lat" placeholder="ละติจูดโรงคั่วกาแฟ" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" disabled name="company" class="company input-lng_roasters" id="lng" placeholder="ลองจิจูดโรงคั่วกาแฟ" required>
						</div>
					</div>
					<div class="form-row">
						<div id="map-canvas" style="display:none"></div>
					</div>

					<div class="form-checkbox">
						<label class="container">
							<p>ยืนยันการลงทะเบียน</p>
							<input type="checkbox" id="check-box_ok" name="checkbox">
							<span class="checkmark"></span>
						</label>
						<script>
							$(document).ready(function() {
								$('#mod_save').hide();

							});
							$('#check-box_ok').click(function() {
								if ($('#check-box_ok').prop('checked') == true) {
									// alert('OK');
									$('#mod_save').show();
								} else {
									$('#mod_save').hide();

									// alert('Error');
								}
							});
						</script>
					</div>
					<!-- <div class="form-checkbox">ssss</div> -->
					<div class="form-row-last">
						<input id="mod_save" type="button" name="register" class="register" value="Register Badge">
						<!-- <button class="btn btn-primary register" type="button" id="sumit_register">Register Badge</button> -->
						<script>
							$('.register').on('click', function() {
								// alert('Register Badge');

								// general_information
								var name_roasters = $('.input-name_roasters').val() == '' ? false : $('.input-name_roasters').val();
								var num_trade_reg = $('.input-num_trade_reg').val() == '' ? false : $('.input-num_trade_reg').val();
								var name = /^[ก-๏\sa-zA-Z\s]+$/.test($('.input-name').val()) != true ? false : $('.input-name').val();
								var last_name = /^[ก-๏\sa-zA-Z\s]+$/.test($('.input-last_name').val()) != true ? false : $('.input-last_name').val();
								var tel_roasters = /^0[0-9]{8,9}$/.test($('.input-tel_roasters').val()) != true ? false : $('.input-tel_roasters').val();
								var e_mail_roasters = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/.test($('.input-e_mail_roasters').val()) != true ? false : $('.input-e_mail_roasters').val();
								var pass_roasters = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,64}$/.test($('.input-pass_roasters').val()) != true ? false : $('.input-pass_roasters').val();
								var detail_roasters = $('.input-detail_roasters').val() == '' ? false : $('.input-detail_roasters').val();

								// contact_details
								var add_number = $('.input-add_number').val() == '' ? false : $('.input-add_number').val();
								var road = $('.input-road').val() == '' ? false : $('.input-road').val();
								var sub_district = $('.input-sub-district').val() == '' ? false : $('.input-sub-district').val();
								var district = $('.input-district').val() == '' ? false : $('.input-district').val();

								var post_office = $('.input-post-office').val() == '' ? false : $('.input-post-office').val();
								var province = $('.input-province').val() == '' ? false : $('.input-province').val();

								// ที่ตั้งสำนักงาน
								var lat_roasters = $('.input-lat_roasters').val() == '' ? false : $('.input-lat_roasters').val();
								var lng_roasters = $('.input-lng_roasters').val() == '' ? false : $('.input-lng_roasters').val();


								// alert(name_roasters + "\n " + num_trade_reg + " \n" + name + "\n " + last_name + " \n" + e_mail_roasters + " \n" + pass_roasters + " \n" +detail_roasters );
								// alert(add_number + "\n " + road + " \n" + sub_district +" \n "+ district + " \n" + post_office + " \n" + province + "\n " + lat_roasters + "\n " +lng_roasters );

								var general_information_check = tel_roasters == false || name_roasters == false || num_trade_reg == false || name == false || last_name == false || e_mail_roasters == false || pass_roasters == false ? true : false;
								var contact_details_check = add_number == false || sub_district == false || district == false || post_office == false || province == false || lat_roasters == false || lng_roasters == false ? true : false;

								if (general_information_check) {
									return swal("", "กรุณาตรวจสอบข้อมูลทั่วไป!", "error");
									// return alert("กรุณาตรวจสอบข้อมูลทั่วไป");
								} else if (pass_roasters == false) {
									return swal("", "กรุณาตรวจสอบรหัสผ่าน", "error");
								} else if (check_num_trade_reg == false) {
									return swal("", "กรุณาตรวจสอบเลขทะเบียนการค้า", "error");
									// กรุณาตรวจสอบเลขทะเบียนการค้า
								} else if (check_e_mail_roasters == false) {
									return swal("", "กรุณาตรวจสอบอีเมล", "error");
								} else if (contact_details_check) {
									return swal("", "กรุณาตรวจสอบรายละเอียดการติดต่อ!", "error");
									// return alert("กรุณาตรวจสอบรายละเอียดการติดต่อ");
								}

								{

									$.ajax({
										url: "./controller/register.php",
										type: "post",
										data: {
											key: "register",
											name_roasters: name_roasters,
											num_trade_reg: num_trade_reg,
											name_entrep: name + " " + last_name,
											address_office: " เลขที่/หมูที่ " + add_number +
												" ซอย/ถนน " + (road == false ? " - " : road) +
												" แขวง/ตำบล " + sub_district +
												" เขต/อำเภอ " + district,
											id_provinces: province,
											tel_roasters: tel_roasters,
											code_provinces: post_office,
											lat_roasters: lat_roasters,
											lng_roasters: lng_roasters,
											detail_roasters: (detail_roasters == false ? " - " : detail_roasters),
											e_mail_roasters: e_mail_roasters,
											pass_roasters: pass_roasters

										},
										success: function(result, textStatus, jqXHR) {
											// alert(result);
											if (result == 'success') {
												timemer();
											} else {
												swal("", "เกินข้อผิดพลาด!", "error");
											}
										},
										error: function(result, textStatus, jqX) {
											swal("", "เกินข้อผิดพลาด!", "error");
										}

									});
								}
								// alert('ข้อมูลถูกต้อง')


							});

							function sleep(ms) {
								return new Promise(resolve => setTimeout(resolve, ms));
							}

							async function timemer() {
								swal("ลงทะเบียนสำเร็จ close in 2 seconds !!", {
									icon: "success",
									buttons: false,
									timer: 2000,
								});
								// swal("SUCCESS", "อัพเดตข้อมูลสำร็จ!", "success", {
								//     buttons: false
								// });
								await sleep(2000);
								history.back(1);
							}
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="./js/jquery.min.js"></script>
	<script src="./js/sweetalert.min.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->


</html>