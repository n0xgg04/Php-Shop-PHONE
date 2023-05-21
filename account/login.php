<?php
session_start();
if (isset($_SESSION['username'])) {
	header('Location: index.php');
	exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	require_once("../connect.php");

	$email = $_POST["email"] ?? '';
	$password = $_POST["password"] ?? '';

	// kiểm tra email với DB. 
	$user = find_user_by_email($email);

	// Nếu không tìm thấy email.
	if (!$user) {
		echo "<script>alert('Bạn chưa đăng ký tài khoản.')</script>";
	} else {
		// Nếu tìm thấy email. Bắt đầu so sánh passwordHash trong DB với password người dùng nhập
		$compare_pwd = verify_hash($password, $user['matkhau_kh']);

		// Nếu password không khớp với password đã hash trong DB
		if (!$compare_pwd) {
			echo "<script>alert('Sai mật khẩu')</script>";
		} else {
			// Nếu Ok thì bắt đầu kiểm tra tài khoản đã được xác thực hay chưa.
			if ($user['verify_email'] != NULL) {
				// Email đã được xác thực
				echo "<script>alert('Đăng nhập thành công')</script>";
				// Thay đổi thành sử dụng session để lưu thông tin đăng nhập
				$_SESSION['email'] = $email;
				header('Location: ' . _WEB_URL);
			} else {
				echo "<script>alert('Vui lòng xác thực email')</script>";
			}
		}
	}
}
?>
<!doctype html>
<html>

<head>
	<title>Đăng Nhập</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Official Signup Form Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
	<!-- /fonts -->
	<!-- css -->
	<link href="./login.css" rel='stylesheet' type='text/css' media="all" />
	<!-- /css -->
</head>

<body>
	<h1 class="w3ls" style="color: black">Đăng Nhập</h1>
	<div class="content-w3ls">
		<div class="content-agile1">
			<h2 class="agileits1" style="color: black">MR. LEE</h2>
			<p class="agileits2" style="color: black">-modern & fashion-</p>
		</div>
		<div class="content-agile2">
			<form action="#" method="post">
				<div class="form-control w3layouts">
					<input type="email" id="email" name="email" placeholder="Nhập email đã đăng ký" title="Vui lòng nhập địa chỉ email hợp lệ" required="">
				</div>

				<div class="form-control agileinfo">
					<input type="password" class="lock" name="password" placeholder="Mật Khẩu" id="password1" required="">
				</div>
		</div>

		<input type="submit" class="register" value="Đăng nhập">
		</form>
		<script type="text/javascript">
			window.onload = function() {
				document.getElementById("password1").onchange = validatePassword;
				document.getElementById("password2").onchange = validatePassword;
			}

			function validatePassword() {
				var pass2 = document.getElementById("password2").value;
				var pass1 = document.getElementById("password1").value;
				if (pass1 != pass2)
					document.getElementById("password2").setCustomValidity("Passwords Don't Match");
				else
					document.getElementById("password2").setCustomValidity('');
				//empty string means no validation error
			}
		</script>
		<p class="wthree w3l">Hoặc đăng nhập bằng</p>
		<ul class="social-agileinfo wthree2">
			<li><a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a></li>
			<li><a href="https://twitter.com/i/flow/login"><i class="fab fa-twitter"></i></a></li>
			<li><a href="http://accounts.google.com/"><i class="fab fa-google"></i></a></li>
		</ul>
	</div>
	<div class="clear"></div>
	</div>
	<p class="copyright w3l" style="color: black">Bạn chưa có tài khoản? Vui lòng đăng ký <a href="./reg.php" target="_blank">tại đây</a></p>
</body>

</html>