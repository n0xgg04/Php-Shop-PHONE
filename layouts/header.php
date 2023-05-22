<?php
if (!isset($_SESSION)) session_start();

?>
<!-- Phần thân trên -->
<header>
    <div class="logo">
        <a href="/index.php">
            <img src="/img/MR.LEE.png" style="width: 100px; height: 50px; float: left"></img>
        </a>
    </div>

    <div class="menu">
        <li><a href="/products/iphone/iphone.php">iPhone</a>
            <ul class="menu1">
                <li><a href="../products/iphone/iphone_phanloai.php?phanloai=1">iPhone 14</a></li>
                <li><a href="../products/iphone/iphone_phanloai.php?phanloai=2">iPhone 13</a></li>
                <li><a href="../products/iphone/iphone_phanloai.php?phanloai=3">iPhone 12</a></li>
                <li><a href="../products/iphone/iphone_phanloai.php?phanloai=4">iPhone 11</a></li>
                <li><a href="../products/iphone/iphone_phanloai.php?phanloai=5">iPhone SE</a></li>
            </ul>
        </li>
        <li><a href="/products/mac/mac.php">Mac</a>
            <ul class="menu2">
                <li><a href="/products/mac/mac_phanloai.php?phanloai=6">Macbook Air</a></li>
                <li><a href="/products/mac/mac_phanloai.php?phanloai=7">Macbook Pro</a></li>
            </ul>
        </li>
        <li><a href="/products/ipad/ipad.php">iPad</a>
            <ul class="menu3">
                <li><a href="/products/ipad/ipad_phanloai.php?phanloai=8">iPad Gen</a></li>
                <li><a href="/products/ipad/ipad_phanloai.php?phanloai=9">iPad Pro</a></li>
                <li><a href="/products/ipad/ipad_phanloai.php?phanloai=10">iPad Air</a></li>
            </ul>
        </li>
        <li><a href="/products/watch/watch.php">Watch</a>
            <ul class="menu4">
                <li><a href="/products/watch/watch_phanloai.php?phanloai=11">Apple Watch Series 7</a></li>
                <li><a href="/products/watch/watch_phanloai.php?phanloai=12">Apple Watch Series 8</a></li>
                <li><a href="/products/watch/watch_phanloai.php?phanloai=13">Apple Watch Ultra</a></li>
            </ul>
        </li>
        <li><a href="/products/homepod/homepod.php">HomePod</a>
            <ul class="menu5">
                <li><a href="/products/homepod/homepod_phanloai.php?phanloai=14">HomePod Mini</a></li>
                <li><a href="/products/homepod/homepod_phanloai.php?phanloai=15">HomePod</a></li>
            </ul>
        </li>
        <li><a href="/products/phukien/phukien.php">Phụ kiện</a>
            <ul class="menu6">
                <li><a href="/products/phukien/phukien_phanloai.php?phanloai=16">Airpods</a></li>
                <li><a href="/products/phukien/phukien_phanloai.php?phanloai=17">Airtags</a></li>
                <li><a href="/products/phukien/phukien_phanloai.php?phanloai=22">Magsafe</a></li>
                <li><a href="/products/phukien/phukien_phanloai.php?phanloai=18">Case</a></li>
                <li><a href="/products/phukien/phukien_phanloai.php?phanloai=19">Keyboard</a></li>
            </ul>
        </li>
    </div>
    <div class="others">
        <li><input placeholder="Tìm kiếm" type="text"><i class="fas fa-search"></i></li>
        <li class="cart-li"><span class="fa fa-shopping-bag"></span>
            <div class="cart">
                <div class="cart-header">
                    <span>Giỏ hàng</span>
                </div>
                <div class="cart-list">

                </div>
                <div class="cart-footer cartPayment">
                    <div class="cart-footer_left">
                        <span>Tổng tiền : </span>
                        <span id="priceTotal">0</span>
                    </div>
                    <div class="cart-footer_right">
                        <button>Thanh toán</button>
                    </div>
                </div>
            </div>
        </li>

        <li><?php
            if (isset($_SESSION['email'])) {
                echo '<a href="/account/logout.php">Đăng xuất</a>';
            } else {
                echo '<a href="/account/login.php">Đăng nhập</a>';
            }
            ?></li>
    </div>

    </div>

</header>