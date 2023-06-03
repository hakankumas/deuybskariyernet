<?php
include("baglan.php");


// ADMİN SİLME İŞLEMİ //
if(isset($_GET["adminlistesiid"])){
    $sorgu = $db->prepare('DELETE FROM admin WHERE admin_id=?');
    $sonuc = $sorgu->execute([$_GET['adminlistesiid']]);
    if($sonuc){
        header("Location:admin_edit.php");
    }else{
        echo 0;
    }
}


// KULLANICI SİLME İŞLEMİ //
if(isset($_GET["kullanicilistesiid"])){
    $sorgu = $db->prepare('DELETE FROM kullanici WHERE ogrenci_no=?');
    $sonuc = $sorgu->execute([$_GET['kullanicilistesiid']]);
    if($sonuc){
        header("Location:user_edit.php");
    }else{
        echo 0;
    }
}


// KURUM SİLME İŞLEMİ //
if(isset($_GET["kurumlistesiid"])){
    $sorgu = $db->prepare('DELETE FROM kurum WHERE kurum_id=?');
    $sonuc = $sorgu->execute([$_GET['kurumlistesiid']]);
    if($sonuc){
        header("Location:kurum_edit.php");
    }else{
        echo 0;
    }
}


// KULLANICI ŞİKAYET BİLGİSİ SİL //
if(isset($_GET["user_sikayet_bilgisi_oku_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kullanici_sikayet WHERE sikayet_id=?');
    $sonuc = $sorgu->execute([$_GET['user_sikayet_bilgisi_oku_listesiid']]);
    if($sonuc){
        header("Location:user_mesaj_oku.php");
    }else{
        echo 0;
    }
}


// KURUM ŞİKAYET BİLGİSİ SİL //
if(isset($_GET["kurum_sikayet_bilgisi_oku_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kurum_sikayet WHERE sikayet_id=?');
    $sonuc = $sorgu->execute([$_GET['kurum_sikayet_bilgisi_oku_listesiid']]);
    if($sonuc){
        header("Location:kurum_mesaj_oku.php");
    }else{
        echo 0;
    }
}


// ADMİNİN KULLANICILARA ATTIĞI DUYURUYU SİL //
if(isset($_GET["admintouser_duyuru_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM admintouser_duyuru WHERE admintouser_duyuru_id=?');
    $sonuc = $sorgu->execute([$_GET['admintouser_duyuru_listesiid']]);
    if($sonuc){
        header("Location:user_duyuru.php");
    }else{
        echo 0;
    }
}


// ADMİNİN KURUMLARA ATTIĞI DUYURUYU SİL //
if(isset($_GET["admintokurum_duyuru_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM admintokurum_duyuru WHERE admintokurum_duyuru_id=?');
    $sonuc = $sorgu->execute([$_GET['admintokurum_duyuru_listesiid']]);
    if($sonuc){
        header("Location:kurum_duyuru.php");
    }else{
        echo 0;
    }
}























?>