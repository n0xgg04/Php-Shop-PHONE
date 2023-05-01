<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anomymous"></script>
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="reg.css">
        <title>Trang Đăng Ký</title>
    </head>
    <body>
        <header>
            <div class="logo">
                <a href="../index.php"><img src="../img/MR.LEE.png" style="width: 100px; height: 50px; float: left"></a>
            </div>
            <div class="menu">
                <li><a href="../views/products/products.php">iPhone</a>
                    <ul class="menu1">
                        <li><a href="">iPhone 14</a></li>
                        <li><a href="">iPhone 13</a></li>
                        <li><a href="">iPhone 12</a></li>
                        <li><a href="">iPhone 11</a></li>
                        <li><a href="">iPhone SE</a></li>
                    </ul>
                </li>
                <li><a href="">Mac</a>
                    <ul class="menu2">
                        <li><a href="">Macbook Air</a></li>
                        <li><a href="">Macbook Pro</a></li>
                    </ul>
                </li>
                <li><a href="">iPad</a>
                    <ul class="menu3">
                        <li><a href="">iPad Gen</a></li>
                        <li><a href="">iPad Pro</a></li>
                        <li><a href="">iPad Air</a></li>
                    </ul>
                </li>
                <li><a href="">Watch</a>
                    <ul class="menu4">
                        <li><a href="">Apple Watch Series 7</a></li>
                        <li><a href="">Apple Watch Series 8</a></li>
                        <li><a href="">Apple Watch Ultra</a></li>
                    </ul>
                </li>
                <li><a href="">HomePod</a>
                    <ul class="menu5">
                        <li><a href="">HomePod Mini</a></li>
                        <li><a href="">HomePod</a></li>
                    </ul>
                </li>
                <li><a href="">Phụ kiện</a>
                    <ul class="menu6">
                        <li><a href="">Airpods</a></li>
                        <li><a href="">Airtags</a></li>
                        <li><a href="">Magsafe</a></li>
                        <li><a href="">Case</a></li>
                        <li><a href="">Keyboard</a></li>
                    </ul>
                </li>
            </div>
            <div class="others">
                <li><input placeholder="Tìm kiếm" type="text"><i class="fas fa-search"></i></li>
                <li><a class="fa fa-shopping-bag" href=""></a></li>
                <li><a class="fa fa-user" href="../account/login.php"></a></li>
            </div>
        </header>
        <h2>Hãy đăng ký ngay để cập nhật những tin tức mới nhất cùng những ưu đãi hấp dẫn</h2>
        <form action="process_login.php" method="post">
        <h4><label for="username" style="background:  #3e3e3f">Tên đăng nhập:</label></h4>
        <input type="text" id="username" name="username" style="background:  #3e3e3f" style="color: black">
        <h4><label for="password" style="background:  #3e3e3f">Mật khẩu:</label></h4>
        <input type="password" id="password" name="password"><br>
        <h4><label for="password" style="background:  #3e3e3f">Xác nhận mật khẩu:</label></h4>
        <input type="password" id="password" name="password"><br>
        <h4><label for="email" style="background:  #3e3e3f">Email:</label></h4>
        <input type="text" id="email" name="email"><br>
        <input type="submit" value="Đăng ký">
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
        <script src="../assets/js/index.js"></script>
        </body>
</html>
    