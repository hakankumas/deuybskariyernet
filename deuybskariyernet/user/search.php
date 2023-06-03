<?php

include("baglan.php");


// KULLANICININ KULLANICI ARAMA İŞLEMİ //
if(isset($_GET["kullanici_listesiid"])){
    $search = $_GET["kullanici_listesiid"];

    header("location:/deuybskariyernet/user/user_search_user.php?ogrenci_no=$search");

}


// KULLANICININ KURUM ARAMA İŞLEMİ //
if(isset($_GET["kurum_listesiid"])){
    $search = $_GET["kurum_listesiid"];

    header("location:/deuybskariyernet/kurum/kurum_search_user.php?kurum_id=$search");

}


// KULLANICININ İLANLARDAN KURUM ARAMA İŞLEMİ //
if(isset($_GET["user_ilanbilgisi_listesiid"])){
    $search = $_GET["user_ilanbilgisi_listesiid"];

    header("location:/deuybskariyernet/kurum/kurum_search_user.php?kurum_id=$search");

}


// KULLANICININ ETKİNLİKLERDEN KURUM ARAMA İŞLEMİ //
if(isset($_GET["user_etkinlikbilgisi_listesiid"])){
    $search = $_GET["user_etkinlikbilgisi_listesiid"];

    header("location:/deuybskariyernet/kurum/kurum_search_user.php?kurum_id=$search");

}


// KULLANICININ İŞ İLANINA BAŞVURDUĞU KURUMLARI ARAMA İŞLEMİ //
if(isset($_GET["kullanicinin_basvurdugu_is_ilanlari_listesiid"])){
    $search = $_GET["kullanicinin_basvurdugu_is_ilanlari_listesiid"];

    header("location:/deuybskariyernet/kurum/kurum_search_user.php?kurum_id=$search");

}


// KULLANICININ ETKİNLİKLERE BAŞVURDUĞU KURUMLARI ARAMA İŞLEMİ //
if(isset($_GET["kullanicinin_basvurdugu_etkinlikler_listesiid"])){
    $search = $_GET["kullanicinin_basvurdugu_etkinlikler_listesiid"];

    header("location:/deuybskariyernet/kurum/kurum_search_user.php?kurum_id=$search");

}


// KULLANICIYA GELEN MESAJLARDAN KURUM ARAMA İŞLEMİ //
if(isset($_GET["user_kurum_bildirim_listesiid"])){
    $search = $_GET["user_kurum_bildirim_listesiid"];

    header("location:/deuybskariyernet/kurum/kurum_search_user.php?kurum_id=$search");

}


// KULLANICIYA GELEN DUYURULARDAN KURUM ARAMA İŞLEMİ //
if(isset($_GET["kurum_duyuru_listesiid"])){
    $search = $_GET["kurum_duyuru_listesiid"];

    header("location:/deuybskariyernet/kurum/kurum_search_user.php?kurum_id=$search");

}

// KULLANICI İNDEX SAYFASINDAKİ İLANLARDAN KURUM ARAMA İŞLEMİ //
if(isset($_GET["kullanicinin_profiline_uygun_ilanlar_listesiid"])){
    $search = $_GET["kullanicinin_profiline_uygun_ilanlar_listesiid"];

    header("location:/deuybskariyernet/kurum/kurum_search_user.php?kurum_id=$search");

}










?>