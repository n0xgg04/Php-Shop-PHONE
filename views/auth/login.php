<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/config/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anomymous"></script>
        <link rel="stylesheet" href="<?php loadAsset('css','style'); ?>">
        <link rel="stylesheet" href="<?php loadAsset('css','login'); ?>">
        <title>Trang Đăng Nhập</title>
    </head>
    <body>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/views/components/header.php'); ?>
    <h2>Đăng nhập</h2>
    <?php
    if(!empty($_POST)){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $num = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users WHERE username='{$username}' AND password='{$password}'"));
        if($num == 0){
            echo '<p style="color:red;text-align:center;">Tên đăng nhập hoặc mật khẩu không đúng</p>';
        }else{
            $_SESSION['username'] = $username;
            header('Location: /');
        }
    }

    ?>
    <form action="login.php" method="post">
        <h4><label for="username">Tên đăng nhập:</label></h4>
        <input type="text" id="username" name="username">
        <h4><label for="password">Mật khẩu:</label></h4>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Đăng nhập">
    </form>
    <div class="footer-items">
            <li><a href=""></a>Liên hệ</li>
            <li><a href=""></a>Tuyển dụng</li>
            <li><a href=""></a>Giới thiệu</li>
            <li>
                <a href="" class="fab fa-facebook-f"></a>
                <a href="" class="fab fa-twitter"></a>
                <a href="" class="fab fa-youtube"></a>
            </li>
        </div>
        <div class="footer-text">
            <p>
                Cửa hàng chuyên phân phối thiết bị Apple chính hãng Mr.Lee <br>
                Địa chỉ: 220 An Dương Vương, TP.Quy Nhơn, Bình Định <br>
                Đặt hàng online: <b>0843048799</b>
            </p>
        </div>
        <div class="footer-bottom">
            © Mr.Lee All rights reserved
        </div>
        <!------------------------------ script ------------------------------>
        <script src="./index.js"></script>
</body>
</html>
