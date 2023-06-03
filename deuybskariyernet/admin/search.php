<?php

include("baglan.php");


// ADMİNİN KULLANICI ARAMA İŞLEMİ //
if(isset($_GET["kullanici_listesiid"])){
    $search = $_GET["kullanici_listesiid"];

    header("location:/deuybskariyernet/user/user_search_admin.php?ogrenci_no=$search");

}


// ADMİNİN KURUM ARAMA İŞLEMİ //
if(isset($_GET["kurum_listesiid"])){
    $search = $_GET["kurum_listesiid"];

    header("location:/deuybskariyernet/kurum/kurum_search_admin.php?kurum_id=$search");

}


// ADMİNİN MESAJLARDA KULLANICI ARAMA İŞLEMİ //
if(isset($_GET["kullanici_mesajlistesiid"])){
    $search = $_GET["kullanici_mesajlistesiid"];

    header("location:/deuybskariyernet/user/user_search_admin.php?ogrenci_no=$search");

}


// ADMİNİN MESAJLARDA KURUM ARAMA İŞLEMİ //
if(isset($_GET["kurum_mesajlistesiid"])){
    $search = $_GET["kurum_mesajlistesiid"];

    header("location:/deuybskariyernet/kurum/kurum_search_admin.php?kurum_id=$search");

}
?>