<?php

include("baglan.php");


// KULLANICI EĞİTİM BİLGİSİ SİL //
if(isset($_GET["user_egitim_bilgisi_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kullanici_egitim WHERE kullanici_egitim_id=?');
    $sonuc = $sorgu->execute([$_GET['user_egitim_bilgisi_listesiid']]);
    if($sonuc){
        header("Location:user_egitim.php");
    }else{
        echo 0;
    }
}


// KULLANICI İŞ TECTÜBESİ SİL //
if(isset($_GET["user_istecrubesi_bilgisi_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kullanici_is_tecrubesi WHERE k_i_t_id=?');
    $sonuc = $sorgu->execute([$_GET['user_istecrubesi_bilgisi_listesiid']]);
    if($sonuc){
        header("Location:user_istecrube.php");
    }else{
        echo 0;
    }
}


// KULLANICI SERTİFİKA SİL //
if(isset($_GET["user_sertifika_bilgisi_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kullanici_sertifika WHERE kullanici_sertifika_id=?');
    $sonuc = $sorgu->execute([$_GET['user_sertifika_bilgisi_listesiid']]);
    if($sonuc){
        header("Location:user_sertifika.php");
    }else{
        echo 0;
    }
}


// KULLANICI İLGİ ALANI SİL //
if(isset($_GET["user_ilgi_alani_bilgisi_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kullanici_ilgi_alani WHERE kullanici_ilgi_alani_id=?');
    $sonuc = $sorgu->execute([$_GET['user_ilgi_alani_bilgisi_listesiid']]);
    if($sonuc){
        header("Location:user_ilgialani.php");
    }else{
        echo 0;
    }
}


// KULLANICI YETENEK SİL //
if(isset($_GET["user_yetenek_bilgisi_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kullanici_yetenek WHERE kullanici_yetenek_id=?');
    $sonuc = $sorgu->execute([$_GET['user_yetenek_bilgisi_listesiid']]);
    if($sonuc){
        header("Location:user_yetenek.php");
    }else{
        echo 0;
    }
}


// KULLANICI SOSYAL MEDYA SİL //
if(isset($_GET["user_sosyalmedya_bilgisi_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kullanici_sosyalmedya WHERE kullanici_sosyalmedya_id=?');
    $sonuc = $sorgu->execute([$_GET['user_sosyalmedya_bilgisi_listesiid']]);
    if($sonuc){
        header("Location:user_sosyalmedya.php");
    }else{
        echo 0;
    }
}


// KULLANICI ŞİKAYET BİLGİSİ SİL //
if(isset($_GET["user_sikayet_bilgisi_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kullanici_sikayet WHERE sikayet_id=?');
    $sonuc = $sorgu->execute([$_GET['user_sikayet_bilgisi_listesiid']]);
    if($sonuc){
        header("Location:user_sikayet.php");
    }else{
        echo 0;
    }
}


// KULLANICI EVLİLİK BİLGİSİ SİL //
if(isset($_GET["user_es_bilgisi_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kullanici_es WHERE kullanici_es_id=?');
    $sonuc = $sorgu->execute([$_GET['user_es_bilgisi_listesiid']]);
    if($sonuc){
        header("Location:user_aile.php");
    }else{
        echo 0;
    }
}


// KULLANICI ÇOCUK BİLGİSİ SİL //
if(isset($_GET["user_cocuk_bilgisi_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kullanici_cocuk WHERE kullanici_cocuk_id=?');
    $sonuc = $sorgu->execute([$_GET['user_cocuk_bilgisi_listesiid']]);
    if($sonuc){
        header("Location:user_aile.php");
    }else{
        echo 0;
    }
}


// KULLANICI BİLDİRİM SİL //
if(isset($_GET["user_bildirim_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM admintouser WHERE admintouser_id=?');
    $sonuc = $sorgu->execute([$_GET['user_bildirim_listesiid']]);
    if($sonuc){
        header("Location:user_bildirimler.php");
    }else{
        echo 0;
    }
}


// KULLANICININ BAŞVURDUĞU İŞ İLANINI SİL //
if(isset($_GET["kullanicinin_basvurdugu_is_ilanlari_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kullanici_ilan_basvurusu WHERE ilan_basvurusu_id=?');
    $sonuc = $sorgu->execute([$_GET['kullanicinin_basvurdugu_is_ilanlari_listesiid']]);
    if($sonuc){
        header("Location:user_is_staj_ara.php");
    }else{
        echo 0;
    }
}


// KULLANICININ BAŞVURDUĞU ETKİNLİKLERİ SİL //
if(isset($_GET["kullanicinin_basvurdugu_etkinlikler_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kullanici_etkinlik_basvurusu WHERE etkinlik_basvurusu_id=?');
    $sonuc = $sorgu->execute([$_GET['kullanicinin_basvurdugu_etkinlikler_listesiid']]);
    if($sonuc){
        header("Location:user_etkinlik_ara.php");
    }else{
        echo 0;
    }
}


// KULLANICI PROJE BİLGİSİ SİL //
if(isset($_GET["user_proje_bilgisi_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kullanici_proje WHERE kullanici_proje_id=?');
    $sonuc = $sorgu->execute([$_GET['user_proje_bilgisi_listesiid']]);
    if($sonuc){
        header("Location:user_proje.php");
    }else{
        echo 0;
    }
}


// KULLANICI REFERANS BİLGİSİ SİL //
if(isset($_GET["user_referans_bilgisi_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kullanici_referans WHERE kullanici_referans_id=?');
    $sonuc = $sorgu->execute([$_GET['user_referans_bilgisi_listesiid']]);
    if($sonuc){
        header("Location:user_referans.php");
    }else{
        echo 0;
    }
}


// KULLANICI ÖNYAZI BİLGİSİ SİL //
if(isset($_GET["user_onyazi_bilgisi_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kullanici_onyazi WHERE kullanici_onyazi_id=?');
    $sonuc = $sorgu->execute([$_GET['user_onyazi_bilgisi_listesiid']]);
    if($sonuc){
        header("Location:user_onyazi.php");
    }else{
        echo 0;
    }
}


// KULLANICIYA GELEN KURUM MESAJINI SİL //
if(isset($_GET["user_kurum_bildirim_listesiid"])){
    $sorgu = $db->prepare('DELETE FROM kurumtokullanici WHERE kurumtokullanici_id=?');
    $sonuc = $sorgu->execute([$_GET['user_kurum_bildirim_listesiid']]);
    if($sonuc){
        header("Location:user_kurum_bildirim.php");
    }else{
        echo 0;
    }
}














































?>