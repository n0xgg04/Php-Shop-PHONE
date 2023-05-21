<?php
session_start();

// Kiểm tra xem các thông tin sản phẩm đã được lưu trong session hay chưa
if (isset($_SESSION['product_image']) && isset($_SESSION['product_name']) && isset($_SESSION['product_price'])) {
    // Lấy thông tin sản phẩm từ session
    $productImage = $_SESSION['product_image'];
    $productName = $_SESSION['product_name'];
    $productPrice = $_SESSION['product_price'];

    // Hiển thị thông tin sản phẩm
    echo 'Product Image: ' . $productImage . '<br>';
    echo 'Product Name: ' . $productName . '<br>';
    echo 'Product Price: ' . $productPrice . '<br>';

    // Kiểm tra xem mảng sản phẩm đã được khởi tạo trong session hay chưa
    if (!isset($_SESSION['cart_items'])) {
        $_SESSION['cart_items'] = array(); // Khởi tạo mảng sản phẩm trong session nếu chưa tồn tại
    }

    // Tạo một mảng chứa thông tin sản phẩm
    $item = array(
        'product_image' => $productImage,
        'product_name' => $productName,
        'product_price' => $productPrice
    );

    // Thêm sản phẩm vào mảng dữ liệu của giỏ hàng trong session
    $_SESSION['cart_items'][] = $item;

    // Tiếp tục xử lý logic khác của trang shopping cart ở đây
} else {
    echo 'Không có thông tin sản phẩm.';
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anomymous"></script>
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../shopping_cart/shopping_cart.css">
        <title>Giỏ Hàng</title>
</head>
    <body>
        <header>
            <div class="logo">
                <a href="../index.php">
                    <img src="../img/MR.LEE.png" style="width: 100px; height: 50px; float: left"></img>
                </a>
            </div>
            <div class="menu">
                <li><a href="../products/iphone/iphone.php">iPhone</a>
                    <ul class="menu1">
                        <li><a href="/products/iphone/iphone_phanloai.php?phanloai=1">iPhone 14</a></li>
                        <li><a href="/products/iphone/iphone_phanloai.php?phanloai=2">iPhone 13</a></li>
                        <li><a href="/products/iphone/iphone_phanloai.php?phanloai=3">iPhone 12</a></li>
                        <li><a href="/products/iphone/iphone_phanloai.php?phanloai=4">iPhone 11</a></li>
                        <li><a href="/products/iphone/iphone_phanloai.php?phanloai=5">iPhone SE</a></li>
                    </ul>
                </li>
                <li><a href="../products/mac/mac.php">Mac</a>
                    <ul class="menu2">
                        <li><a href="/products/mac/mac_phanloai.php?phanloai=6">Macbook Air</a></li>
                        <li><a href="/products/mac/mac_phanloai.php?phanloai=7">Macbook Pro</a></li>
                        <li><a href="/products/mac/mac_phanloai.php?phanloai=20">iMac</a></li>
                        <li><a href="/products/mac/mac_phanloai.php?phanloai=21">Mac Mini</a></li>
                    </ul>
                </li>
                <li><a href="../products/ipad/ipad.php">iPad</a>
                    <ul class="menu3">
                        <li><a href="/products/ipad/ipad_phanloai.php?phanloai=8">iPad Gen</a></li>
                        <li><a href="/products/ipad/ipad_phanloai.php?phanloai=9">iPad Pro</a></li>
                        <li><a href="/products/ipad/ipad_phanloai.php?phanloai=10">iPad Air</a></li>
                    </ul>
                </li>
                <li><a href="../products/watch/watch.php">Watch</a>
                    <ul class="menu4">
                        <li><a href="/products/watch/watch_phanloai.php?phanloai=11">Apple Watch Series 7</a></li>
                        <li><a href="/products/watch/watch_phanloai.php?phanloai=12">Apple Watch Series 8</a></li>
                        <li><a href="/products/watch/watch_phanloai.php?phanloai=13">Apple Watch Ultra</a></li>
                    </ul>
                </li>
                <li><a href="../products/homepod/homepod.php">HomePod</a>
                    <ul class="menu5">
                        <li><a href="/products/homepod/homepod_phanloai.php?phanloai=14">HomePod Mini</a></li>
                        <li><a href="/products/homepod/homepod_phanloai.php?phanloai=15">HomePod</a></li>
                    </ul>
                </li>
                <li><a href="../products/phukien/phukien.php">Phụ kiện</a>
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
                <li><a class="fa fa-shopping-bag" href="./shopping_cart.php"><span id="cart-count"></span></a></li>
                <li><a class="fa fa-user" href="../account/login.php"></a></li>
            </div>
        </header>
        <!---------------------Bảng chọn------------------------>
        <div class="container">
        <h1 class="shopping_title">Giỏ Hàng Của Bạn</h1>
        <section class="shopping_cart">
                <div class="product_info" style="width: 1000px; height: 500px;">
                    <table class="shopping_cart_table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình đại diện</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                            <tbody>
                                <?php
                                    if (isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0) {
                                        $stt = 1;
                                        foreach ($_SESSION['cart_items'] as $item) {
                                            
                                            // Lấy thông tin sản phẩm từ mảng
                                            $productImage = $item['product_image'];
                                            $productName = $item['product_name'];
                                            $productPrice = $item['product_price'];

                                            // Hiển thị thông tin sản phẩm trong mỗi dòng của bảng
                                            echo '<tr>';
                                            echo '<td>' . $stt . '</td>';
                                            echo '<td>' . $productImage . '</td>';
                                            echo '<td>' . $productName . '</td>';
                                            echo '<td><input type="text" id="quantity_' . $stt . '"></td>'; // Số lượng (được điền thông qua JavaScript)
                                            echo '<td>' . $productPrice . '</td>';
                                            echo '<td id="total_' . $stt . '"></td>'; // Thành tiền (được điền thông qua JavaScript)
                                            echo '<td><button onclick="deleteRow(' . $stt . ')">Xóa</button></td>'; // Xóa (được điền thông qua JavaScript)
                                            echo '</tr>';

                                            $stt++;
                                        }
                                    } else {
                                        echo '<tr><td colspan="7" style="background-color:white;">Chưa có sản phẩm gì ở đây, hãy quay lại trang chủ để chọn sản phẩm tại
                                        <a href="../index.php">Trang chủ</a>.</td></tr>';
                                    }
                                    ?>
                            </tbody>
                        </table>
            </section>
            <section class="shopping_cart_footer" style="background-color: rgba(255, 255, 255, 0);text-align: center">
            <a href="./shopping_cart.php" class="btn2 btn-success btn-md btn-rounded" style="color: black; background-color: #b6b6b6;">
                        <i class="fa fa-wrench" style="color: black; background-color: #b6b6b6;"
                        aria-hidden="true"></i>&nbsp;Khôi phục giỏ hàng</a>
                    <a href="../index.php" class="btn2 btn-warning btn-md btn-rounded"><i class="fa fa-arrow-left"
                        aria-hidden="true"></i>&nbsp;Quay về trang chủ</a>
                    <a href="thongtinthanhtoan.php" class="btn2 btn-primary btn-md btn-rounded"><i
                        class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Thanh toán</a>
                    <a href="#" class="btn2 btn-update btn-md btn-rounded" onclick="updateCart()" style="color: black; background-color: #b6b6b6;
                    text-align:center"> 
                        <i class="fa fa-refresh" style="color: black; background-color: #b6b6b6;" aria-hidden="true"></i>&nbsp;Cập nhật</a>
                    <a id="delete_2" data-sp-ma="6" class="btn btn-danger btn-delete-sanpham" onclick="deleteRow()">
                        <i class="fa fa-trash" style="color:white;background-color:transparent" aria-hidden="true"></i> Xóa </a><br>
                    <div id="note" style="background-color: transparent; color: black;font-size:13px;font-family:Arial, Helvetica, sans-serif;" >
                        Sau khi chọn số lượng, vui lòng bấm "Cập nhật" để hiển thị giá tiền phải thanh toán
                    </div>
            </section>
        <script src="./store.js"></script>
        <script>
            var rows = document.querySelectorAll('.datarow');
            var cartItemCount = 0;
            for (var i = 0; i < rows.length; i++) {
                var quantity = parseInt(rows[i].querySelector('.value').textContent);
                cartItemCount += quantity;
            }
            document.getElementById('cart-count').innerHTML = cartItemCount;
        </script>

</body>
</html>

