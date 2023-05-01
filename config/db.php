<?php
    $username = "root";
    $password = "";
    $sever = "localhost";
    $dtbname = "shopjkb";
    $conn = mysqli_connect("$sever", "$username", "$password", "$dtbname")
    or die ("Không thể kết nối đến database");
    mysqli_select_db($conn, "$dtbname") or die ("Chưa có database");
    mysqli_query($conn, "SET NAMES 'utf8'");
?>