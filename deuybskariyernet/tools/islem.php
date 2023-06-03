<?php
include("baglan.php");
session_start();
error_reporting(0);

// YÖNETİCİ GİRİŞ EKRANI //
if(isset($_POST["admin_giris"])){

    $admin_username = $_POST["admin_username"];
    $admin_password = $_POST["admin_password"];
    $adminturu_id = $_POST["adminturu_id"];
    
    // SUPERADMİN GİRİŞ //
    $sql = "SELECT admin_username, admin_password, adminturu_id FROM admin WHERE admin_username ='$admin_username' and admin_password='$admin_password' and adminturu_id=1";

    $sorgu = mysqli_query($baglanti, $sql);
    $dizi = mysqli_fetch_array($sorgu);

    if($dizi!=0){
        $_SESSION["admin_username"] = $_POST["admin_username"];
        $_SESSION["admin_password"] = $_POST["admin_password"];
        $_SESSION["oturum"] = true;
        header("location:/deuybskariyernet/superadmin/index.php");
    }

    // ADMİN GİRİŞ //
    $sql = "SELECT admin_username, admin_password, adminturu_id FROM admin WHERE admin_username ='$admin_username' and admin_password='$admin_password' and adminturu_id=2";

    $sorgu = mysqli_query($baglanti, $sql);
    $dizi = mysqli_fetch_array($sorgu);

    if($dizi!=0){
            $_SESSION["admin_username"] = $_POST["admin_username"];
            $_SESSION["admin_password"] = $_POST["admin_password"];
            $_SESSION["oturum"] = true;
        header("location:/deuybskariyernet/admin/index.php");
    }
    
    else{
        header('Refresh:0; /deuybskariyernet/adminlogin.php');
    }
}





















?>