<?php

// Xét múi giờ Việt Nam
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once("../connect.php");

$error = "";
$success = false;



// lấy email và token từ url
$email = $_GET['email'];
$token = $_GET['token'];

// Kiểm tra email có tồn tại trong hệ thống không?

$emailValid = find_user_by_email($email);

// Nếu không tồn tại in ra lỗi
if (!$emailValid) {
  $error = "Tài khoản không tồn tại";
}

// Kiểm tra xem người dùng có xác thực chưa bằng trường verify_email != NULL
if ($emailValid['verify_email'] != NULL) {
  $success = true;
} else {
  // Nếu tồn bắt đầu so sánh token.
  if (verify_hash($token, $emailValid['key_token'])) {
    // Nếu true. Cập nhập xoá key_token và cập nhật lại ngày, giờ xác thực email
    $current_date_time = new DateTime();

    $data = array(
      'key_token' => NULL,
      'verify_email' =>  $current_date_time->format('Y-m-d H:i:s'),
    );

    db_update('tb_khachhang', $data, '`id_khachhang` = ' . $emailValid['id_khachhang']);

    $success = true;
  } else {
    $error = "Mã token không hợp lệ";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xác thực tài khoản</title>
</head>

<body>
  <?php if ($error) : ?>
    <script>
      alert("Xác thực không thành công. <?= $error ?>")
    </script>
  <?php endif ?>

  <?php if ($error) : ?>
    <h1>
      Xác thực không thành công
    </h1>
  <?php endif ?>

  <?php if ($success) : ?>
    <script>
      alert("Xác thực thành công.")

      // Xác thực thành công chuyển hướng đến đăng nhập.
      window.location.href = "<?= _WEB_URL ?>/account/login.php";
    </script>
  <?php endif ?>

</body>

</html>