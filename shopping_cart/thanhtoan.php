<?php
    session_start();
    require_once("../connect.php");
    $id_khachhang = $_SESSION['id_khachhang'] ?? '';
    $code_order = rand(0, 9999);
    $insert_cart = "INSERT INTO tb_cart(id_khachhang, code_cart, cart_status) VALUE('".$id_khachhang."', '".$code_order."', 1)";
    $cart_query = mysqli_query($conn, $insert_cart);
    if ($cart_query)
    {
        // Thêm giỏ hàng chi tiết
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                $id_sanpham = $value['id'];
                $soluong = $value['soluong'];
                $insert_order_details = "INSERT INTO tb_cart_details(id_sanpham, code_cart, soluong) VALUE('".$id_sanpham."', '".$code_order."', '".$soluong."')";
                mysqli_query($conn, $insert_order_details);
            }
        }
    }
?>