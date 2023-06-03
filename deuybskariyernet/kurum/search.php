<?php

include("baglan.php");


// KULLANICININ KULLANICI ARAMA İŞLEMİ //
if(isset($_GET["kullanici_listesiid"])){
    $search = $_GET["kullanici_listesiid"];

    header("location:/deuybskariyernet/user/user_search_kurum.php?ogrenci_no=$search");

}


// KULLANICININ KURUM ARAMA İŞLEMİ //
if(isset($_GET["kurum_listesiid"])){
    $search = $_GET["kurum_listesiid"];

    header("location:/deuybskariyernet/kurum/kurum_search_kurum.php?kurum_id=$search");

}


// KURUM İLANLARA BAŞVURANLARA BAKMA İŞLEMİ //
if(isset($_GET["kurumun_ilanlari_basvuru_listesiid"])){
    $search = $_GET["kurumun_ilanlari_basvuru_listesiid"];

    header("location: kurum_ilana_basvuranlar.php?ilan_id=$search");

}


// KURUMUN İLANINA BAŞVURANIN LİNKİNE GİTME İŞLEMİ //
if(isset($_GET["kurumun_ilanlarina_basvuran_listesiid"])){
    $search = $_GET["kurumun_ilanlarina_basvuran_listesiid"];

    header("location:/deuybskariyernet/user/user_search_kurum.php?ogrenci_no=$search");

}


// KURUM ETKİNLİKLERE BAŞVURANLARA BAKMA İŞLEMİ //
if(isset($_GET["kurumun_etkinlikleri_basvuru_listesiid"])){
    $search = $_GET["kurumun_etkinlikleri_basvuru_listesiid"];

    header("location: kurum_etkinliklere_basvuranlar.php?etkinlik_id=$search");

}


// KURUMUN ETKİNLİKLERİNE BAŞVURANIN LİNKİNE GİTME İŞLEMİ //
if(isset($_GET["kurumun_etkinliklerine_basvuran_listesiid"])){
    $search = $_GET["kurumun_etkinliklerine_basvuran_listesiid"];

    header("location:/deuybskariyernet/user/user_search_kurum.php?ogrenci_no=$search");

}


// KURUMA GELEN MESAJLARDAN KULLANICI ARAMA İŞLEMİ //
if(isset($_GET["kurum_user_bildirim_listesiid"])){
    $search = $_GET["kurum_user_bildirim_listesiid"];

    header("location:/deuybskariyernet/user/user_search_kurum.php?ogrenci_no=$search");

}


// İNDEX SAYFASINDAN KULLANICI ARAMA İŞLEMİ //
if(isset($_GET["kurumun_istegine_uygun_kullanicilar_listesiid"])){
    $search = $_GET["kurumun_istegine_uygun_kullanicilar_listesiid"];

    header("location:/deuybskariyernet/user/user_search_kurum.php?ogrenci_no=$search");

}



















?>