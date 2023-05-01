<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="login.css">
    <title>Form Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <form action="process_login.php" method="post">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username">
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Đăng nhập">
    </form>
</body>
</html>
<?php
// Kiểm tra xem form đã được gửi đi hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị từ form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Kiểm tra thông tin đăng nhập
    if ($username == "admin" && $password == "password") {
        echo "Đăng nhập thành công!";
    } else {
        echo "Thông tin đăng nhập không đúng.";
    }
}
?>