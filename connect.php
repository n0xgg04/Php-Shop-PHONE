<?php
// định nghia url.
$url_server =$_SERVER['HTTP_HOST'];
define('_WEB_URL', 'http://' . $url_server);

require_once("database.php");

$username = "root";
$password = "";
$sever = "localhost";
$dbname = "shop";

$conn = mysqli_connect("$sever", "$username", "$password", "$dbname")
    or die("Không thể kết nối đến database");

mysqli_select_db($conn, "$dbname") or die("Chưa có database");

mysqli_query($conn, "SET NAMES 'utf8'");
