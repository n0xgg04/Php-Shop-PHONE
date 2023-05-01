<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/db.php';
function loadAsset($type,$name){

    switch($type){
        case 'css' : echo '/assets/css/'.$name.'.css';
        break;

        case 'js' : echo '/assets/js/'.$name.'.js';
        break;

        case 'img' : echo '/assets/img/'.$name;
        break;

      }
}

?>