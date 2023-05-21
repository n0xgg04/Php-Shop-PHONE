<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anomymous"></script>
    <link rel="stylesheet" href="./style.css">
    <title>Mr.Lee - Cửa hàng Apple chính hãng</title>
</head>

<body>
    <header>
        <div class="logo">
            <a href="index.php">
                <img src="img/MR.LEE.png" style="width: 100px; height: 50px; float: left"></img>
            </a>
        </div>
        <div class="menu">
            <li><a href="./products/iphone/iphone.php">iPhone</a>
                <ul class="menu1">
                    <li><a href="/products/iphone/iphone_phanloai.php?phanloai=1">iPhone 14</a></li>
                    <li><a href="/products/iphone/iphone_phanloai.php?phanloai=2">iPhone 13</a></li>
                    <li><a href="/products/iphone/iphone_phanloai.php?phanloai=3">iPhone 12</a></li>
                    <li><a href="/products/iphone/iphone_phanloai.php?phanloai=4">iPhone 11</a></li>
                    <li><a href="/products/iphone/iphone_phanloai.php?phanloai=5">iPhone SE</a></li>
                </ul>
            </li>
            <li><a href="./products/mac/mac.php">Mac</a>
                <ul class="menu2">
                    <li><a href="/products/mac/mac_phanloai.php?phanloai=6">Macbook Air</a></li>
                    <li><a href="/products/mac/mac_phanloai.php?phanloai=7">Macbook Pro</a></li>
                    <li><a href="/products/mac/mac_phanloai.php?phanloai=20">iMac</a></li>
                    <li><a href="/products/mac/mac_phanloai.php?phanloai=21">Mac Mini</a></li>
                </ul>
            </li>
            <li><a href="./products/ipad/ipad.php">iPad</a>
                <ul class="menu3">
                    <li><a href="/products/ipad/ipad_phanloai.php?phanloai=8">iPad Gen</a></li>
                    <li><a href="/products/ipad/ipad_phanloai.php?phanloai=9">iPad Pro</a></li>
                    <li><a href="/products/ipad/ipad_phanloai.php?phanloai=10">iPad Air</a></li>
                </ul>
            </li>
            <li><a href="./products/watch/watch.php">Watch</a>
                <ul class="menu4">
                    <li><a href="/products/watch/watch_phanloai.php?phanloai=11">Apple Watch Series 7</a></li>
                    <li><a href="/products/watch/watch_phanloai.php?phanloai=12">Apple Watch Series 8</a></li>
                    <li><a href="/products/watch/watch_phanloai.php?phanloai=13">Apple Watch Ultra</a></li>
                </ul>
            </li>
            <li><a href="./products/homepod/homepod.php">HomePod</a>
                <ul class="menu5">
                    <li><a href="/products/homepod/homepod_phanloai.php?phanloai=14">HomePod Mini</a></li>
                    <li><a href="/products/homepod/homepod_phanloai.php?phanloai=15">HomePod</a></li>
                </ul>
            </li>
            <li><a href="./products/phukien/phukien.php">Phụ kiện</a>
                <ul class="menu6">
                    <li><a href="/products/phukien/phukien_phanloai.php?phanloai=16">Airpods</a></li>
                    <li><a href="/products/phukien/phukien_phanloai.php?phanloai=17">Airtags</a></li>
                    <li><a href="/products/phukien/phukien_phanloai.php?phanloai=22">Magsafe</a></li>
                    <li><a href="/products/phukien/phukien_phanloai.php?phanloai=18">Case</a></li>
                    <li><a href="/products/phukien/phukien_phanloai.php?phanloai=19">Keyboard</a></li>
                </ul>
            </li>
        </div>
        <form id="products-search" method="GET" action="/products/iphone/iphone.php">
            <div class="others">
                <li><input placeholder="Tìm kiếm" type="text" value="<?= isset($_GET['tensanpham']) ? $_GET['tensanpham'] : "" ?>" name="tensanpham"><i class="fas fa-search"></i></li>
                <li><a class="fa fa-shopping-bag" href="/shopping_cart/shopping_cart.php"></a></li>
                <li><a class="fa fa-user" href="./account/login.php"></a></li>
            </div>
        </form>
    </header>
    <!------------------------------ Slide ------------------------------>
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
            <a href="" class="fab fa-google"></a>
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