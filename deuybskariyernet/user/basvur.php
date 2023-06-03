<?php

include("baglan.php");
session_start();


// KULLANICININ İLAN BAŞVURUSUNU EKLEME İŞLEMİ //
if(isset($_GET["user_ilan_bilgisi_listesiid"])){
    $ogrenci_no = $_SESSION["ogrenci_no"];

    $sorgu = $db->prepare('INSERT INTO kullanici_ilan_basvurusu SET ogrenci_no =?, ilan_id =?');
    $ekle = $sorgu->execute([$ogrenci_no, $_GET['user_ilan_bilgisi_listesiid']]);
    if($ekle){
        echo "İşleminiz Başarıyla Gerçekleştirildi...";
        header("Refresh:2; user_is_staj_ara.php");
    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_is_staj_ara.php');
    }
}


// KULLANICININ ETKİNLİK BAŞVURUSUNU EKLEME İŞLEMİ //
if(isset($_GET["user_etkinlik_bilgisi_listesiid"])){
    $ogrenci_no = $_SESSION["ogrenci_no"];

    $sorgu = $db->prepare('INSERT INTO kullanici_etkinlik_basvurusu SET ogrenci_no =?, etkinlik_id =?');
    $ekle = $sorgu->execute([$ogrenci_no, $_GET['user_etkinlik_bilgisi_listesiid']]);
    if($ekle){
        echo "İşleminiz Başarıyla Gerçekleştirildi...";
        header("Refresh:2; user_etkinlik_ara.php");
    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_etkinlik_ara.php');
    }
}


// KULLANICININ İNDEX SAYFASINDA İLANA BAŞVURMA İŞLEMİ //
if(isset($_GET["kullanicinin_profiline_uygun_ilanlar_listesiid"])){
    $ogrenci_no = $_SESSION["ogrenci_no"];

    $sorgu = $db->prepare('INSERT INTO kullanici_ilan_basvurusu SET ogrenci_no =?, ilan_id =?');
    $ekle = $sorgu->execute([$ogrenci_no, $_GET['kullanicinin_profiline_uygun_ilanlar_listesiid']]);
    if($ekle){
        echo "İşleminiz Başarıyla Gerçekleştirildi...";
        header("Refresh:2; index.php");
    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; index.php');
    }
}


// KULLANICININ KURUMUN PROFİLİNDEN İLAN BAŞVURUSUNU EKLEME İŞLEMİ //
if(isset($_GET["user_kurum_ilan_bilgisi_listesiid"])){
    $ogrenci_no = $_SESSION["ogrenci_no"];

    $sorgu = $db->prepare('INSERT INTO kullanici_ilan_basvurusu SET ogrenci_no =?, ilan_id =?');
    $ekle = $sorgu->execute([$ogrenci_no, $_GET['user_kurum_ilan_bilgisi_listesiid']]);
    if($ekle){
        echo "İşleminiz Başarıyla Gerçekleştirildi...";
        header("Refresh:2; user_is_staj_ara.php");
    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_is_staj_ara.php');
    }
}

// KULLANICININ KURUMUN PROFİLİNDEN ETKİNLİK BAŞVURUSUNU EKLEME İŞLEMİ //
if(isset($_GET["user_kurum_etkinlik_bilgisi_listesiid"])){
    $ogrenci_no = $_SESSION["ogrenci_no"];

    $sorgu = $db->prepare('INSERT INTO kullanici_etkinlik_basvurusu SET ogrenci_no =?, etkinlik_id =?');
    $ekle = $sorgu->execute([$ogrenci_no, $_GET['user_kurum_etkinlik_bilgisi_listesiid']]);
    if($ekle){
        echo "İşleminiz Başarıyla Gerçekleştirildi...";
        header("Refresh:2; user_etkinlik_ara.php");
    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_etkinlik_ara.php');
    }
}


?>