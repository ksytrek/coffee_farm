<!doctype html>
<html lang="en">

<head>
	<title>เข้าสู่ระบบสำหรับโรงคั่วกาแฟ</title>
    <link rel="icon" href="../../../script/assets/img/logos/Logo_n.png" type="image/x-icon">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="../../../script/assets/plugins/jquery.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/style.css">
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->

</head>
<style type="text/css">
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

<script>
	$(document).ready(function() {
		var body = $("body");
		body.removeClass("loading");
	});
</script>


<body class="  img js-fullheight loading" style="background-image: url(images/bg1.jpg);">
	<!-- <body class="loading" style="background-color:aquamarine"> -->
	<div class="modal">
		<!-- Place at bottom of page -->
	</div>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<!-- <h2 class="heading-section">Login #10</h2> -->
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<h3 class="mb-4 text-center">สำหรับโรงคั่วกาแฟ</h3>
						<form action="javascript:login()" class="signin-form">
							<div class="form-group">
								<input type="text" id='email_roasters' class="form-control" placeholder="E-mail" required>
							</div>
							<div class="form-group">
								<!-- pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" -->
								<!-- pattern="^(?=.*[a-z])(?=.*[0-9]).{6,12}$" -->
								<input id="password_roasters" type="password" class="form-control" placeholder="Password" required>
								<span toggle="#password_roasters" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3">เข้าสู่ระบบ</button>
								<script>
									function login() {
										var e_mail_roasters = $('#email_roasters').val();
										var pass_roasters = $('#password_roasters').val();
										var body = $("body");
										
										// alert(email_roasters + " " + password_roasters);
										$.ajax({
											url: './controller/login.php',
											type: 'POST',
											data: {
												key: 'login_roasters',
												e_mail_roasters: e_mail_roasters,
												pass_roasters: pass_roasters
											},
											cache: false,
											beforeSend: function() {
												// console.log(result);
												body.addClass("loading");
											},
											success: function(result, textStatus, jqXHR) {
												// alert(result);

												var json = JSON.parse(result);
												if (json != "") {
													// alert('ยินดีตอนรับเข้าสู่ระบบ');
													body.removeClass("loading");
													location.assign('../shop-product-list.php');
												} else {
													// alert(json[0].pass_roasters);
													body.removeClass("loading");
													alert('อีเมลหรือรหัสผ่านไม่ถูกต้อง');

												}
												// var e_mail_roasters = json[0].e_mail_roasters;
												// var pass_roasters = json[0].pass_roasters;
											},
											error: function(result, textStatus, jqXHR) {
												alert('เกินข้อผิดพลาดทางระบบ');
											}
										});
									}
								</script>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary">จดจำฉันไว้
										<input type="checkbox" id="rememberMe_per" onclick="lsRememberMe()">
										<!-- checked -->
										<span class="checkmark"></span>
									</label>
									<script>
										const rmCheck = document.getElementById("rememberMe_per"),
											emailInput = document.getElementById("email_roasters"),
											passwordInput = document.getElementById("password_roasters");

										if (localStorage.checkbox && localStorage.checkbox !== "") {
											rmCheck.setAttribute("checked", "checked");
											emailInput.value = localStorage.username;
											passwordInput.value = localStorage.password;
										} else {
											rmCheck.removeAttribute("checked");
											emailInput.value = "";
											passwordInput.value = "";
										}

										function lsRememberMe() {
											if (rmCheck.checked && emailInput.value !== "") {
												localStorage.username = emailInput.value;
												localStorage.checkbox = rmCheck.value;
												localStorage.password = passwordInput.value;
											} else {
												localStorage.username = "";
												localStorage.checkbox = "";
												localStorage.password = "";
											}
										}
									</script>
								</div>
								<div class="w-50 text-md-right">
									<a href="../shop-product-list.php" style="color: #fff">ดูรายการกาแฟ</a>

								</div>
							</div>
							<div class=" form-group d-md-flex" style="margin-top:-10px">
								<div class="w-50 ">
									<a href="../register/" style="color: #fff">ลงทะเบียน</a>
								</div>
								<div class="w-50 text-md-right">
									<a href="./forgot_password.php" style="color: #fff">ลืมรหัสผ่าน</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>