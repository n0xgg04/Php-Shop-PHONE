<?php 
session_start();

// Xử lý yêu cầu khi người dùng nhấn vào nút "Buy Now"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['BuyNow'])) {
    // Lấy thông tin sản phẩm từ form
    $productImage = $_POST['product_image'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];

    // Lưu thông tin vào session
    $_SESSION['product_image'] = $productImage;
    $_SESSION['product_name'] = $productName;
    $_SESSION['product_price'] = $productPrice;

    // Chuyển hướng đến trang giỏ hàng
    header('Location: ../shopping_cart/shopping_cart.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/chitietsanpham/detail.css">
    <link rel="stylesheet" href="/chitietsanpham/style.css">
    <link rel="stylesheet" href="/chitietsanpham/cart.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        .cartPayment{
          display: flex;
          flex-direction: row;
          justify-content: space-around;
          align-items: center;
          }

            .cart-footer_right{
              box-sizing: border-box;
            }
          .cart-footer_right button{
            font-size: 15px;
            cursor: pointer;
            width: 120px;
            border: none;
            background: #ffffff;
            border-radius: 10px;
            padding: 10px 7px;
          }

          input[type="number"]{
            color: #000000;
          }

    </style>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT']."/layouts/header.php"; ?>

    <?php
    if($_GET['proid'] != ''){
        $pro_id = $_GET['proid'];
                    require '../connect.php';
                    $sql= "SELECT * FROM tb_sanpham WHERE id_sanpham = $pro_id";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) { 
                        $img = $row['hinhanh'];
                        $ten_sp = $row['tensanpham'];
                        $price = $row['giaban'];
                        $update = $row['Updateprice'];
                    }
                } else{
                    echo "Not found.";
                }
              ?>



    <!-----------Phần hình ảnh------------------------------------->
    <div class="intro-detail">
        <div class="center-page">
            <aside id="slider-detail">
                <div class="img-daidien">
                    <form action="../shopping_cart/shopping_cart.php" method="post"></form>
                    <img class="product-photo" src="<?php echo $img?>" alt="iphone14" style="width: 730px; height: auto; margin-left:30px">
                    <input type="hidden" name="product_image" value="<?php echo $img?>">
                       
                </div>
                <!-- nút-->
            <?php
                    // require '../connect.php';
                    // $sql= "SELECT * FROM tb_phanloai JOIN tb_sanpham ON tb_phanloai.id_phanloai = tb_sanpham.id_phanloai JOIN tb_mathang WHERE tb_sanpham.id_mathang = tb_mathang.id_mathang";
                    // $result = mysqli_query($conn, $sql);
                    // while($row = mysqli_fetch_assoc($result)) {
                    //     $img = $row['hinhanh'];
                    //     $ten_sp = $row['tensanpham'];
                    // '<a class="owl-dot active dotnumber2 img" data-info="2" data-position-left="95"
                    // style="height: 8.33333%;" href = "'. $ten_sp.'.php">
                    //     <img class="theImg"
                    //         src="'.$img.'"
                    //         alt="'. $ten_sp . '" title=" ' .$ten_sp . '"></a>';
                    // }
              ?>
            </aside>
        </div>


        <!--bên phần thông tin-->
        <aside>
            <form action="../shopping_cart/shopping_cart.php" method="post">
            <h1 class="product-name"><?php echo $ten_sp?></h1>
            <input type="hidden" name="product_name" value="<?php echo $ten_sp?>">
            <div class="price-promo-local">
                <span class="">Giá và khuyến mãi tại: Hồ Chí Minh</span>
                <div class="store-province" style="display: none;">
                    <div class="SearchContainer">
                        <input id="SearchProvince" placeholder="Tìm theo tỉnh thành">
                        <!-- <i class="topzone-search"></i> -->
                    </div>
                    <ul class="Provinces">
                        <li class="Item active">
                            <a href="javascript:locationConfirm(3)">Hồ Chí Minh</a>
                        </li>
                        <li class="Item ">
                            <a href="javascript:locationConfirm(5)">Hà Nội</a>
                        </li>
                    </ul>
                </div>
            </div>
            <form action="../shopping_cart/shopping_cart.php" method="post"></form>
                <strong class="price" data-price="43990000" data-disprice="41990000" data-percent="4">
                <?php echo number_format($price)?>₫ <strike> 43.990.000₫</strike>
                <input type="hidden" name="product_price" value="<?php echo $price?>">
                <span class="update-price"><?php echo number_format($update)?>₫</span>
            </strong>

            <div class="capacity">
                <span>Dung lượng</span>
                <ul>
                    <li class="active">
                        <a href="/iphone/iphone-14-pro-max">
                            128GB
                        </a>
                    </li>
                    <li class="active">
                        <a href="/iphone/iphone-14-pro-max-256gb">
                            256GB
                        </a>
                    </li>
                    <li class="active">
                        <a href="/iphone/iphone-14-pro-max-512gb">
                            512GB
                        </a>
                    </li>
                    <li class="active">
                        <a href="/iphone/iphone-14-pro-max-1tb">
                            1TB
                        </a>
                    </li>
                </ul>
            </div>

            <div class="color-sp">
                <span>Màu: Vàng</span>
                <ul>
                    <li class="active" data-idx="15" data-color="15" data-type="2" data-code="0131491003419"
                        data-name="Màu: Vàng">
                        <a href="javascript:;" style="background-color:#f4e8ce"></a>
                    </li>
                    <li class="" data-idx="5" data-color="5" data-type="2" data-code="0131491003415"
                        data-name="Màu: Bạc">
                        <a href="javascript:;" style="background-color:#f0f2f2"></a>
                    </li>
                    <li class="" data-idx="11" data-color="11" data-type="2" data-code="0131491003413"
                        data-name="Màu: Đen">
                        <a href="javascript:;" style="background-color:#403e3d"></a>
                    </li>
                    <li class="" data-idx="9" data-color="9" data-type="2" data-code="0131491003420"
                        data-name="Màu: Tím">
                        <a href="javascript:;" style="background-color:#594f63"></a>
                    </li>
                </ul>
            </div>

            <div id="promotion-detail" class="box-promo nomal">
                <h3>Khuyến mãi</h3>
                <small>Giá và khuyến mãi dự kiến áp dụng đến 23:00 | 18/05</small>
                <hr />
                <div class="content-promo">
                    <p data-promotion="1561331" data-group="WebNote" data-discount="0" data-productcode=""
                        data-tovalue="3000">
                        <i></i>
                        <b>Thu cũ Đổi mới: Giảm đến 2 triệu (Tùy model máy cũ, không kèm các hình thức thanh toán
                            online, mua kèm)  <a href="/watchdetail/watch.php">Xem chi tiết</a> </b>

                              
                    </p>
                    <p data-promotion="1567654" data-group="WebNote" data-discount="0" data-productcode=""
                        data-tovalue="1000">
                        <i></i>
                        <b>
                            Mua kèm iPhone ưu đãi thêm (Tuỳ model và không kèm khuyến mãi khác của sản phẩm mua kèm):

                            <span class="">- Phụ kiện Apple: Giảm đến 50%.<a href="/watchdetail/watch.php">Xem chi tiết</a></span>
                            <span class="">- Apple Watch: Giảm đến 27%. <a href="/watchdetail/watch.php">Xem chi tiết</a></span>
                            <span class="">- iPad: Giảm đến 50%.<a href="/watchdetail/watch.php">Xem chi tiết</a></span>

                        </b>
                    </p>
                    <p data-promotion="1581118" data-group="WebNote" data-discount="0" data-productcode=""
                        data-tovalue="0">
                        <i></i>
                        <b>Giảm 100,000đ Cho Đơn Hàng Từ 10 Triệu Khi Thanh Toán Quét Mã SmartPay QR Bằng Ứng Dụng Ngân
                            Hàng<a href="/watchdetail/watch.php">Xem chi tiết</a></b>
                    </p>
                    <p data-promotion="1523693" data-group="WebNote" data-discount="0" data-productcode=""
                        data-tovalue="0">
                        <i></i>
                        <b>Giảm 15% gói Bảo hiểm rơi vỡ <a href="/watchdetail/watch.php">Xem chi tiết</a></b>
                    </p>
                </div>
            </div>
            <div class="buy-sp normal has-threebtn">
                <a href="javascript:void(0)" class="btn-buy full">
                    Mua ngay
                </a>
                <a href="/tra-gop/tai-chinh/iphone/iphone-14-pro-max-1tb?productCode=0131491003419"
                    class="btn-ins pay-taichinh has-another-pay">
                    Mua trả góp
                    <span>Qua công ty tài chính</span>
                </a>
                <a href="/tra-gop/the/iphone/iphone-14-pro-max-1tb?productCode=0131491003419"
                    class="btn-ins pay-nganluong has-another-pay">
                    Trả góp qua thẻ
                    <span>Visa, Mastercard, JCB, Amex</span>
                </a>
            </div>

            <div class="btn-area clearfix"></div>
            <div class="popup-error">
                <div>
                    
                    <div></div>
                    <a href="/cart" class="pe-btn">Kiểm tra giỏ hàng</a>
                    <a href="javascript:void(0)" class="pe-btn btn-confirm">Đồng ý</a>
                </div>

                <ul class="policy">
                    <li>
                        <span>
                            <i class="topzone-boxtskt"></i>
                            Bộ sản phẩm gồm: Hộp, Sách hướng dẫn, Cây lấy sim, Cáp Lightning - Type C
                        </span>
                    </li>
                    <li>
                        <span>
                            <i class="topzone-doitra"></i>
                            Hư gì đổi nấy <b>12 tháng</b> tại 3484 siêu thị trên toàn quốc <a
                                href="https://www.topzone.vn/bao-hanh-doi-tra"> Xem chi tiết chính sách bảo hành, đổi
                                trả </a>
                        </span>
                    </li>
                    <li>
                        <span>
                            <i class="topzone-baohanhpolicy"></i>
                            Bảo hành chính hãng 1 năm
                        </span>
                    </li>
                    <li>
                        <span>
                            <i class="topzone-giaohang"></i>
                            <!-- <i class="gg-comment"></i> -->
                              Giao hàng nhanh toàn quốc <a href="/giao-hang">Xem chi tiết</a>
                        </span>
                    </li>
                    <li>
                        <span>
                            <i class="topzone-tongdai"></i>
                            <!-- <i class="gg-phone"></i>    -->
                             Tổng đài: <a href="tel:1900969642">1900.9696.42</a> (9h00 - 21h00 mỗi ngày)
                        </span>
                    </li>
                </ul>
            </div>
        </aside>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/layouts/footer.php'; ?>
</body>

</html>