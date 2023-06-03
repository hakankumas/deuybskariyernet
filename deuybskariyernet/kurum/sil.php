<?php
include("baglan2.php");

// KURUM İLAN BİLGİSİ SİL //
if(isset($_GET["kurumun_ilanlari_bilgisi_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kurum_ilanlari WHERE ilan_id=?');
    $sonuc = $sorgu->execute([$_GET['kurumun_ilanlari_bilgisi_listesiid']]);
    if($sonuc){
        header("Location:kurum_ilan_olustur.php");
    }else{
        echo 0;
    }
}


// KURUM ETKİNLİK BİLGİSİ SİL //
if(isset($_GET["kurumun_etkinlikleri_bilgisi_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kurum_etkinlikleri WHERE etkinlik_id=?');
    $sonuc = $sorgu->execute([$_GET['kurumun_etkinlikleri_bilgisi_listesiid']]);
    if($sonuc){
        header("Location:kurum_etkinlik_olustur.php");
    }else{
        echo 0;
    }
}


// KURUM SOSYAL MEDYA BİLGİSİ SİL //
if(isset($_GET["kurumun_sosyalmedya_bilgisi_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kurum_sosyalmedya WHERE kurum_sosyalmedya_id=?');
    $sonuc = $sorgu->execute([$_GET['kurumun_sosyalmedya_bilgisi_listesiid']]);
    if($sonuc){
        header("Location:kurum_sosyalmedya_olustur.php");
    }else{
        echo 0;
    }
}


// KURUM ŞİKAYET BİLGİSİ SİL //
if(isset($_GET["kurumun_sikayet_bilgisi_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kurum_sikayet WHERE sikayet_id=?');
    $sonuc = $sorgu->execute([$_GET['kurumun_sikayet_bilgisi_listesiid']]);
    if($sonuc){
        header("Location:kurum_sikayet.php");
    }else{
        echo 0;
    }
}


// KURUM BİLDİRİM SİL //
if(isset($_GET["kurum_bildirim_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM admintokurum WHERE admintokurum_id=?');
    $sonuc = $sorgu->execute([$_GET['kurum_bildirim_listesiid']]);
    if($sonuc){
        header("Location:kurum_bildirimler.php");
    }else{
        echo 0;
    }
}


// KURUMA GELEN KULLANICI MESAJINI SİL //
if(isset($_GET["kurum_user_bildirim_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kullanicitokurum WHERE kullanicitokurum_id=?');
    $sonuc = $sorgu->execute([$_GET['kurum_user_bildirim_listesiid']]);
    if($sonuc){
        header("Location:kurum_user_bildirim.php");
    }else{
        echo 0;
    }
}


// KURUM DUYURU SİL //
if(isset($_GET["kurum_duyuru_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kurumtokullanici_duyuru WHERE kurumtokullanici_duyuru_id=?');
    $sonuc = $sorgu->execute([$_GET['kurum_duyuru_listesiid']]);
    if($sonuc){
        header("Location:kurum_duyuru_olustur.php");
    }else{
        echo 0;
    }
}


// KURUM İLANLARI YETENEK BİLGİSİ SİL //
if(isset($_GET["kurum_ilanlari_yetenek_bilgisi_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kurum_ilanlari_yetenek WHERE kurum_ilanlari_yetenek_id=?');
    $sonuc = $sorgu->execute([$_GET['kurum_ilanlari_yetenek_bilgisi_listesiid']]);
    if($sonuc){
        header("Location:kurum_ilan_olustur.php");
    }else{
        echo 0;
    }
}





?>