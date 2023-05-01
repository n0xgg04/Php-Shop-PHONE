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
        <title>iPhone</title>
    </head>
    <body>
        <header>
            <div class="logo">
                <a href="../../index.php"><img src="../img/MR.LEE.png" style="width: 100px; height: 50px; float: left"></a>
            </div>
            <div class="menu">
                <li><a href="iphone.php">iPhone</a>
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
                <li><a class="fa fa-user" href=""></a></li>
            </div>
        </header>
        <!------------------------------ Category ------------------------------>
        <section class="cartegory">
            <div class="container">
                <div class="row">
                    <div class="cartegory-left">    
                        <ul>
                            <li class="cartegory-left-li"><a href="#">iPhone</a>
                                <ul>
                                    <li><a href="?item = iPhone14 "  >iPhone 14</a></li>
                                    <li><a href="?item = iPhone13 "  >iPhone 13</a></li>
                                    <li><a href="?item = iPhone12 "  >iPhone 12</a></li>
                                    <li><a href="?item = iPhone11 "  >iPhone 11</a></li>
                                    <li><a href="?item = iPhoneSE "  >iPhone SE</a></li>
                                </ul>
                            </li>
                            <li class="cartegory-left-li"><a href="#">Mac</a>
                                <ul>
                                    <li><a href="">Macbook Air</a></li>
                                    <li><a href="">Macbook Pro</a></li>
                                </ul>
                            </li>
                            <li class="cartegory-left-li"><a href="#">iPad</a>
                                <ul>
                                    <li><a href="">iPad Gen</a></li>
                                    <li><a href="">iPad Pro</a></li>
                                    <li><a href="">iPad Air</a></li>
                                </ul>
                            </li>
                            <li class="cartegory-left-li"><a href="#">Watch</a>
                                <ul>
                                    <li><a href="">Apple Watch Series 7</a></li>
                                    <li><a href="">Apple Watch Series 8</a></li>
                                    <li><a href="">Apple Watch Ultra</a></li>
                                </ul>
                            </li>
                            <li class="cartegory-left-li"><a href="#">HomePod</a>
                                <ul>
                                    <li><a href="">HomePod Mini</a></li>
                                    <li><a href="">HomePod</a></li>
                                </ul>
                            </li>
                            <li class="cartegory-left-li"><a href="#">Phụ kiện</a>
                                <ul>
                                    <li><a href="">Airpods</a></li>
                                    <li><a href="">Airtags</a></li>
                                    <li><a href="">Magsafe</a></li>
                                    <li><a href="">Case</a></li>
                                    <li><a href="">Keyboard</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!------------------------------ Products ------------------------------>
                    <div class="products">
                        <?php
                            $name = "iPhone14";
                            $item_per_page = 12;
                            $page = null;
                            $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
                            $offset = ($current_page - 1) * $item_per_page;
                            $total_item = mysqli_query($conn, "SELECT * FROM tb_sanpham");
                            $total_item = $total_item->num_rows;
                            $total_page = ceil($total_item / $item_per_page);
                            $sql = "SELECT * FROM tb_sanpham WHERE masp = '$name' ORDER BY 'id_sanpham' ASC LIMIT ".$item_per_page." OFFSET ".$offset;
                            
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<div class='container_main-product'>";    
                                    echo "<img src =".$row['hinhanh']." </img>";
                                    echo "<div class='product-name'>";
                                    echo "<h3>" . $row['tensanpham'] . "</h3>";
                                    echo "</div>";
                                    echo "<div class='product-price'>";
                                    echo "<h2>" . $row['giasp'] . "</h2>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                            }
                        ?>
                    </d
                    <div class="cartegory-right row">
                        <div class="cartegory-right-top-select">
                            <select name="" id="">
                                <option value="">Sắp xếp</option>
                                <option value="">Giá tăng dần</option>
                                <option value="">Giá giảm dần</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="cartegory-right-bottom row">
            <?php 
                if($current_page > 1){
                    $prev = $current_page - 1;    
                    echo "<a class='pagelink' href='?page=".$prev."'><h4> Prev </h4></a>";
                }

                if($current_page > 3){
                    $first_page = 1;   
                    echo "<a class='pagelink' href='?page=".$first_page."'><h4> First </h4></a>"; 
                }

                for ($i = 1; $i <= $total_page; $i++) { 
                    if($i != $current_page) {
                        if($i > $current_page - 3 && $i <$current_page + 3) {
                            echo "<a class='pagelink' href='?page=".$i."'><h4> $i </h4></a>";
                        }
                    } else {
                    echo "<strong class='pagelink' href='?page=".$i."'><h4> $i </h4></strong>";
                            } 
                        }

                if($current_page < $total_page - 3){
                    $last_page = $total_page;
                    echo "<a class='pagelink' href='?page=".$last_page."'><h4> Last </h4></a>";
                }

                if($current_page <$total_page){
                    $next = $current_page + 1;    
                    echo "<a class='pagelink' href='?page=".$next."'><h4> Next </h4></a>";
                }
            ?>
        </div>
        <section id="Slide">
        </section>
       <?php include($_SERVER['DOCUMENT_ROOT'].'/views/components/footer.php');?>
        <!------------------------------ script ------------------------------>
        <script src="<?php loadAsset('js','index');?>"></script>
    </body>
</html>