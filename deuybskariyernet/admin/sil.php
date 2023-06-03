<?php
include("baglan.php");


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