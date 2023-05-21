<link rel="stylesheet" href="/shopping_cart/vanchuyen.css">
<script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anomymous"></script>
<header>
    <div class="logo">
        <a href="index.php">
            <img src="/img/MR.LEE.png" style="width: 100px; height: 50px; float: left"></img>
        </a>
    </div>
    <div class="menu">
        <li><a href="/products/iphone/iphone.php">iPhone</a>
            <ul class="menu1">
                <li><a href="/products/iphone/iphone_phanloai.php?phanloai=1">iPhone 14</a></li>
                <li><a href="/products/iphone/iphone_phanloai.php?phanloai=2">iPhone 13</a></li>
                <li><a href="/products/iphone/iphone_phanloai.php?phanloai=3">iPhone 12</a></li>
                <li><a href="/products/iphone/iphone_phanloai.php?phanloai=4">iPhone 11</a></li>
                <li><a href="/products/iphone/iphone_phanloai.php?phanloai=5">iPhone SE</a></li>
            </ul>
        </li>
        <li><a href="/products/mac/mac.php">Mac</a>
            <ul class="menu2">
                <li><a href="/products/mac/mac_phanloai.php?phanloai=6">Macbook Air</a></li>
                <li><a href="/products/mac/mac_phanloai.php?phanloai=7">Macbook Pro</a></li>
                <li><a href="/products/mac/mac_phanloai.php?phanloai=20">iMac</a></li>
                <li><a href="/products/mac/mac_phanloai.php?phanloai=21">Mac Mini</a></li>
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
    <form id="products-search" method="GET" action="/products/iphone/iphone.php">
        <div class="others">
            <li><input placeholder="Tìm kiếm" type="text" value="<?= isset($_GET['tensanpham']) ? $_GET['tensanpham'] : "" ?>" name="tensanpham"><i class="fas fa-search"></i></li>
            <li><a class="fa fa-shopping-bag" href="/shopping_cart/shopping_cart.php"></a></li>
            <li><a class="fa fa-user" href="./account/login.php"></a></li>
        </div>
    </form>
</header>
<h4>Thông tin vận chuyển</h4>
<?php
    require_once("../connect.php");
    if (isset($_POST['themvanchuyen']))
    {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $id_dangky = $_SESSION['id_khachhang'];
        $sql_vanchuyen = mysqli_query($conn, "INSERT INTO tb_shipping (name, phone, address, note, id_dangky) VALUES('$name', '$phone', '$address', '$note', '$id_dangky')");
        if ($sql_vanchuyen)
        {
            echo '<script>alert("Cập nhật vận chuyển thành công")</script>';
        }
    }
    elseif(isset($_POST['capnhatvanchuyen']))
    {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $id_dangky = $_SESSION['id_khachhang'];
        $sql_update_vanchuyen = mysqli_query($conn, "UPDATE tb_shipping SET name = '$name', phone= '$phone', address = '$address', note = '$note', id_dangky = '$id_dangky' WHERE id_dangky = '$id_dangky'");
        if ($sql_update_vanchuyen)
        {
            echo '<script>alert("Cập nhật vận chuyển thành công")</script>';
        }
    }
?>
<div class="row">
    <?php
        $id_dangky = $_SESSION['id_khachhang'] ?? '';
        $sql_get_vanchuyen = mysqli_query($conn, "SELECT * FROM tb_shipping WHERE id_dangky = '$id_dangky' LIMIT 1");
        $count = mysqli_num_rows($sql_get_vanchuyen);
        if ($count > 0)
        {
            $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
            $name = $row_get_vanchuyen('name');
            $phone = $row_get_vanchuyen('phone');
            $address = $row_get_vanchuyen('address');
            $note = $row_get_vanchuyen('note');
        }
        else 
        {
            $name = '';
            $phone = '';
            $address = '';
            $note = '';
        }
    ?>
    <div class="col-md-12">
        <form action="" autocomplete="off" method="POST">
        <div class="infor">
            <div class="form-group">
                <label for="email">Họ và tên:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
            </div>
            <div class="form-group">
                <label for="phone">Điện thoại:</label>
                <input type="text" class="form-control" name="phone" value="<?php echo $phone ?>">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" name="address" value="<?php echo $address ?>">
            </div>
            <div class="form-group">
                <label for="note">Ghi chú:</label>
                <input type="text" class="form-control" name="note" value="<?php echo $note ?>">
            </div>
        </div>
        <?php
            if ($name == '' && $phone == '')
            {
                ?>
                <button type="submit" name="themvanchuyen" class="btn btn-success">Thêm vận chuyển</button>
                <?php
            }
            else if ($name != '' && $phone != '')
            {
                ?>
                <button type="submit" name="capnhatvanchuyen" class="btn btn-success">Cập nhật vận chuyển</button>
                <?php
            }
                ?>
        
        </form>
    </div>
</div>