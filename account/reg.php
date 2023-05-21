<?php
$error = "";
$success = "";

// Nếu người dùng đã submit form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Kết nối DB
	require_once('../connect.php');

	// import sendEmail
	require_once('../auth/sendEmail.php');

	$fullname = $_POST['fullname'] ?? '';
	$email = $_POST['email'] ?? '';
	$password = $_POST['password'] ?? '';
	$password_hash = password_hash($password, PASSWORD_DEFAULT);

	// Kiểm tra email có tồn tại chưa.
	if (find_user_by_email($email)) {
		$error = "Tài khoản đã tồn tại";
	} else {
		// tạo key token verify account. Random 6 kí tự
		$random_token = substr(uniqid(), 0, 6);
		$token_hash = password_hash($random_token, PASSWORD_DEFAULT);

		// tạo đường dẫn verify account
		$url_verify_account = _WEB_URL . '/auth/verify.php?email=' . $email . '&token=' . $random_token;

		// lưu vào CSDL
		$sql = "INSERT INTO tb_khachhang (`gmail_kh`, `matkhau_kh`, `full_name`, `verify_email`, `key_token`) VALUES ('$email', '$password_hash', '$fullname', NULL, '$token_hash')";

		if ($conn->query($sql) === TRUE) {
			// Sau khi tạo thành công bắt đầu gửi mail.
			if (send_email($email, $fullname, $url_verify_account)) {
				$success = "Đăng ký thành công vui lòng kiểm tra email để xác thực tài khoản.";
				$_SESSION['dangky'] = $fullname;
				$_SESSION['id_khachhang'] = mysqli_insert_id($conn);
			} else {
				// Nếu không thành công thì xoá user vừa tạo.
				$error = "Đăng ký không thành công";
				delete_user_by_email($email);
				header("Refresh:0");
			}
		} else {
			$error = "Đăng ký không thành công.";
		}
	}
}
?>

<!doctype html>
<html>

<head>
	<title>Đăng ký</title>
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
	<link href="./reg.css" rel='stylesheet' type='text/css' media="all" />
	<!-- /css -->
</head>

<body>
	<h1 class="w3ls" style="color: black">Đăng ký</h1>
	<div class="content-w3ls">
		<div class="content-agile1">
			<h2 class="agileits1" style="color: black">MR. LEE</h2>
			<p class="agileits2" style="color: black">-modern & fashion-</p>
		</div>
		<div class="content-agile2">
			<form action="#" method="post">
				<div class="form-control w3layouts">
					<input type="text" id="firstname" name="fullname" placeholder="Họ và Tên" title="Vui lòng nhập họ và tên của bạn" required="">
				</div>

				<div class="form-control w3layouts">
					<input type="email" id="email" name="email" placeholder="mail@example.com" title="Vui lòng nhập địa chỉ email hợp lệ" required="">
				</div>

				<div class="form-control agileinfo">
					<input type="password" class="lock" name="password" placeholder="Mật Khẩu" id="password1" required="">
				</div>

				<div class="form-control agileinfo">
					<input type="password" class="lock" name="confirm-password" placeholder="Xác nhận Mật Khẩu" id="password2" required="">
				</div>

				<input type="submit" class="register" name="dangky" value="Đăng ký">
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
	<p class="copyright w3l" style="color: black">Bạn đã có tài khoản? Đăng nhập <a href="./login.php" target="_blank">tại đây</a></p>

	<?php if (!empty($error)) : ?>
		<script type="text/javascript">
			alert("<?= $error ?>")
		</script>
	<?php endif ?>

	<?php if (!empty($success)) : ?>
		<script type="text/javascript">
			alert("<?= $success ?>")

	 
			window.location.href = "<?= _WEB_URL ?>/account/login.php";
		</script>
	<?php endif ?>
</body>

</html>