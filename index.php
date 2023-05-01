<!DOCTYPE html>
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/config/autoload.php';
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anomymous"></script>
        <link rel="stylesheet" href="<?php loadAsset('css','style');?>">
        <title>Trang chủ</title>
    </head>
    <body>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/views/components/header.php'); ?>
        <section id="Slide">
            <div class="aspect-ratio-169">
                <img src="img/slide1.png">
                <img src="img/slide2.png">
            </div>
            <div class="dot-container">
                <div class="dot active"></div>
                <div class="dot"></div>
            </div>
        </section>
        <!------------------------------ app-container ------------------------------>
        <section class="app-container">
            <p>Nhận thông báo từ Mr.Lee</p>
            <div class="input-email">
                <input type="text" placeholder="Nhập email của bạn" style="color: white;">
                <i class="fas fa-arrow-left"></i>
            </div>
        </section>
        <!------------------------------ footer ------------------------------>
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
        <script src="assets/js/index.js"></script>
    </body>
</html>