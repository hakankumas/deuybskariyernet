<?php
include("baglan.php");
session_start();
error_reporting(0);


// ADMİN KENDİ ŞİFRESİNİ GÜNCELLEME İŞLEMİ //
if(isset($_POST["admin_own_password_update"])){
    $admin_username = $_SESSION["admin_username"];
    $admin_password = $_SESSION["admin_password"];
    $post_admin_password = $_POST["post_admin_password"];
    $new_admin_password = $_POST["new_admin_password"];
    $new2_admin_password = $_POST["new2_admin_password"];

    $sorgu = $db->prepare("SELECT * FROM admin WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'");
    $ekle = $sorgu->execute();
    if($admin_password == $post_admin_password){
        if($new_admin_password != $new2_admin_password){
            echo "Yeni şifreler örtüşmemektedir.";
            header('Refresh:2; password.php');
        }elseif($admin_password == $new_admin_password){
            echo "Şifreler zaten aynı!";
            header('Refresh:2; password.php');
        }else{
            $sorgu2 = $db->prepare("UPDATE admin SET admin_password =? 
            WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'");
            $ekle = $sorgu2->execute([$new_admin_password]);
            if($ekle){
                $_SESSION["admin_password"] = $new_admin_password;
                echo "Şifreniz Başarıyla Güncellendi!";
                header('Refresh:2; password.php');
            }
        }
    }elseif($admin_password != $post_admin_password){
        echo "Mevcut şifreniz doğru değil!";
        header('Refresh:2; password.php');
    }
}


// ADMİN EKLEME İŞLEMİ //
if(isset($_POST['admin_adminekle'])){
    $admin_username = $_POST["admin_username"];
    $admin_password = $_POST["admin_password"];
    $adminturu_id = $_POST["adminturu_id"];

    if(!$_POST['admin_username'] || !$_POST['admin_password'] || !$_POST['adminturu_id']){
        echo "Eksik veri girişi yaptınız!";
        header('Refresh:2; admin_add.php');
    }elseif($_POST['admin_username'] && $_POST['admin_password'] && $_POST['adminturu_id']){
        $sorgu = $db->prepare('INSERT INTO admin SET admin_username =?, admin_password =?, adminturu_id =?');
        $ekle = $sorgu->execute([$admin_username, $admin_password, $adminturu_id]);
        if($ekle){
            echo"Kayıt Başarıyla Gerçekleştirildi.<br>Yönlendiriliyorsunuz... ";
            header('Refresh:2; admin_add.php');
        }else{
            echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        }
    }
}

// KULLANICI EKLEME İŞLEMİ //
if(isset($_POST['admin_kullaniciekle'])){
    $ogrenci_no = $_POST["ogrenci_no"];
    $kullanici_password = $_POST["kullanici_password"];
    $kullanicituru_id = $_POST["kullanicituru_id"];

    if(!$_POST['ogrenci_no'] || !$_POST['kullanici_password'] || !$_POST['kullanicituru_id']){
        echo "Eksik veri girişi yaptınız!";
        header('Refresh:2; user_add.php');
    }elseif($_POST['ogrenci_no'] && $_POST['kullanici_password'] && $_POST['kullanicituru_id']){
        $sorgu = $db->prepare('INSERT INTO kullanici SET ogrenci_no =?, kullanici_password =?, kullanicituru_id =?');
        $ekle = $sorgu->execute([$ogrenci_no, $kullanici_password, $kullanicituru_id]);
        if($ekle){
            echo"Kayıt Başarıyla Gerçekleştirildi.<br>Yönlendiriliyorsunuz... ";
            header('Refresh:2; user_add.php');
        }else{
            echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        }
    }    
}

// KURUM EKLEME İŞLEMİ //
if(isset($_POST['admin_kurumekle'])){
    $kurum_username = $_POST["kurum_username"];
    $kurum_password = $_POST["kurum_password"];

    if(!$_POST['kurum_username'] || !$_POST['kurum_password']){
        echo "Eksik veri girişi yaptınız!";
        header('Refresh:2; kurum_add.php');
    }elseif($_POST['kurum_username'] && $_POST['kurum_password']){
        $sorgu = $db->prepare('INSERT INTO kurum SET kurum_username =?, kurum_password =?');
        $ekle = $sorgu->execute([$kurum_username, $kurum_password]);
        if($ekle){
            echo"Kayıt Başarıyla Gerçekleştirildi.<br>Yönlendiriliyorsunuz... ";
            header('Refresh:2; kurum_add.php');
        }else{
            echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        }
    } 
}


// KULLANICIYA MESAJ GÖNDERME İŞLEMİ //
if(isset($_POST['admin_kullanici_mesaj_yaz'])){
    $ogrenci_no4 = $_POST["ogrenci_no4"];
    $admintouser_mesaj = $_POST["admintouser_mesaj"];
    
    if(!$_POST['ogrenci_no4'] || !$_POST['admintouser_mesaj']){
        echo "Eksik veri girişi yaptınız!";
        header('Refresh:2; user_mesaj_yaz.php');
    }elseif($_POST['ogrenci_no4'] && $_POST['admintouser_mesaj']){
        
        $sorgu = $db->prepare('INSERT INTO admintouser SET ogrenci_no4 =?, admintouser_mesaj =?');
        $ekle = $sorgu->execute([$ogrenci_no4, $admintouser_mesaj]);
        if($ekle){
            echo"Mesajınız Başarıyla Gönderildi.<br>Yönlendiriliyorsunuz... ";
            header('Refresh:2; user_mesaj_yaz.php');
        }else{
            echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        }
    }    
}


// KURUMA MESAJ GÖNDERME İŞLEMİ //
if(isset($_POST['admin_kurum_mesaj_yaz'])){
    $kurum_id = $_POST["kurum_id"];
    $admintokurum_mesaj = $_POST["admintokurum_mesaj"];
    
    if(!$_POST['kurum_id'] || !$_POST['admintokurum_mesaj']){
        echo "Eksik veri girişi yaptınız!";
        header('Refresh:2; kurum_mesaj_yaz.php');
    }elseif($_POST['kurum_id'] && $_POST['admintokurum_mesaj']){
        
        $sorgu = $db->prepare('INSERT INTO admintokurum SET kurum_id =?, admintokurum_mesaj =?');
        $ekle = $sorgu->execute([$kurum_id, $admintokurum_mesaj]);
        if($ekle){
            echo"Mesajınız Başarıyla Gönderildi.<br>Yönlendiriliyorsunuz... ";
            header('Refresh:2; kurum_mesaj_yaz.php');
        }else{
            echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        }
    }    
}


// TOPLU MEZUN ATAMA //
if(isset($_POST['user_mezun_ata'])){
    $all_id = $_POST['user_mezun_id'];
    $extract_id = implode(',' , $all_id);
    $query = "UPDATE kullanici SET kullanicituru_id = 2 WHERE ogrenci_no IN($extract_id)";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        header("location: user_atama.php");
    }
}


// TOPLU ÖĞRENCİ ATAMA //
if(isset($_POST['user_ogrenci_ata'])){
    $all_id = $_POST['user_ogrenci_id'];
    $extract_id = implode(',' , $all_id);
    $query = "UPDATE kullanici SET kullanicituru_id = 1 WHERE ogrenci_no IN($extract_id)";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        header("location: user_atama.php");
    }
}


// TOPLU KULLANICI SİL //
if(isset($_POST['user_sil'])){
    $all_id = $_POST['user_sil_id'];
    $extract_id = implode(',' , $all_id);
    // echo $extract_id;
    $query = "DELETE FROM kullanici WHERE ogrenci_no IN($extract_id)";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        header("location: user_atama.php");
    }
}


// KULLANICILARA TOPLU DUYURU GÖNDERME İŞLEMİ //
if(isset($_POST['admintouser_duyuru'])){
    $admintouser_duyuru_mesaji = $_POST["admintouser_duyuru_mesaji"];

    $sorgu = $db->prepare("INSERT INTO admintouser_duyuru SET admintouser_duyuru_mesaji =?");
    $ekle = $sorgu->execute([$admintouser_duyuru_mesaji]);
    if($ekle){
        header("location: user_duyuru.php");

    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_duyuru.php');
    }
}


// KURUMLARA TOPLU DUYURU GÖNDERME İŞLEMİ //
if(isset($_POST['admintokurum_duyuru'])){
    $admintokurum_duyuru_mesaji = $_POST["admintokurum_duyuru_mesaji"];

    $sorgu = $db->prepare("INSERT INTO admintokurum_duyuru SET admintokurum_duyuru_mesaji =?");
    $ekle = $sorgu->execute([$admintokurum_duyuru_mesaji]);
    if($ekle){
        header("location: kurum_duyuru.php");

    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; kurum_duyuru.php');
    }
}

 
// TOPLU KULLANICI EKLEME İŞLEMİ //
if(isset($_POST["admin_multiuseradd"])){
    require_once('tools/vendor/php-excel-reader/excel_reader2.php');
    require_once('tools/vendor/SpreadsheetReader.php'); 
    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'tools/uploads_user/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++){

            $Reader->ChangeSheet($i);

            foreach ($Reader as $Row){

                $ogrenci_no = "";
                if(isset($Row[0])) {
                    $ogrenci_no = mysqli_real_escape_string($conn,$Row[0]);
                }

                $kullanici_password = "";
                if(isset($Row[1])) {
                    $kullanici_password = mysqli_real_escape_string($conn,$Row[1]);
                }

                $kullanicituru_id = "";
                if(isset($Row[2])) {
                    $kullanicituru_id = mysqli_real_escape_string($conn,$Row[2]);
                }

                if (!empty($ogrenci_no) || !empty($kullanici_password) || !empty($kullanicituru_id)) {
                    $query = "INSERT INTO kullanici(ogrenci_no,kullanici_password,kullanicituru_id) VALUES('".$ogrenci_no."','".$kullanici_password."','".$kullanicituru_id."')";
                    $result = mysqli_query($conn, $query);

                    if (! empty($result)) {
                        echo "Veri Başarıyla Aktarıldı.</br>";
                        header("Refresh:3; user_edit.php");
                    } else {
                        echo "Çakışan veriler oluştu.</br>";
                        echo "Lütfen verilerinizi kontrol ediniz.";
                        header('Refresh:3; user_add.php');
                        exit;
                    }
                }
            }
        }
    }
    else{ 
        echo "Excel Dosyası Seçilmedi. Lütfen Dosyayı Kontrol Edin";
    }
}

 
// TOPLU KURUM EKLEME İŞLEMİ //
if(isset($_POST["admin_multikurumadd"])){
    require_once('tools/vendor/php-excel-reader/excel_reader2.php');
    require_once('tools/vendor/SpreadsheetReader.php'); 
    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'tools/uploads_kurum/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++){

            $Reader->ChangeSheet($i);

            foreach ($Reader as $Row){

                $kurum_username = "";
                if(isset($Row[0])) {
                    $kurum_username = mysqli_real_escape_string($conn,$Row[0]);
                }

                $kurum_password = "";
                if(isset($Row[1])) {
                    $kurum_password = mysqli_real_escape_string($conn,$Row[1]);
                }

                if (!empty($kurum_username) || !empty($kurum_password)) {
                    $query = "INSERT INTO kurum(kurum_username,kurum_password) VALUES('".$kurum_username."','".$kurum_password."')";
                    $result = mysqli_query($conn, $query);

                    if (! empty($result)) {
                        echo "Veri Başarıyla Aktarıldı.</br>";
                        header("Refresh:3; kurum_edit.php");
                    } else {
                        echo "Çakışan veriler oluştu.</br>";
                        echo "Lütfen verilerinizi kontrol ediniz.";
                        header('Refresh:3; kurum_add.php');
                        exit;
                    }
                }
            }
        }
    }
    else{ 
        echo "Excel Dosyası Seçilmedi. Lütfen Dosyayı Kontrol Edin";
    }
}

 
// TOPLU KULLANICI TÜRÜ DEĞİŞTİRME İŞLEMİ //
if(isset($_POST["user_type_multi_update"])){
    require_once('tools/vendor/php-excel-reader/excel_reader2.php');
    require_once('tools/vendor/SpreadsheetReader.php'); 
    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'tools/uploads_kullanicituru/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++){

            $Reader->ChangeSheet($i);

            foreach ($Reader as $Row){

                $ogrenci_no = "";
                if(isset($Row[0])) {
                    $ogrenci_no = mysqli_real_escape_string($conn,$Row[0]);
                }

                $kullanicituru_id = "";
                if(isset($Row[1])) {
                    $kullanicituru_id = mysqli_real_escape_string($conn,$Row[1]);
                }

                if (!empty($ogrenci_no) || !empty($kullanicituru_id)) {
                    $query = "UPDATE kullanici SET kullanicituru_id = '$kullanicituru_id' WHERE ogrenci_no = '$ogrenci_no'";
                    $result = mysqli_query($conn, $query);

                    if (! empty($result)) {
                        echo "Veri Başarıyla Güncellendi.</br>";
                        header("Refresh:3; user_atama.php");
                    } else {
                        echo "Çakışan veriler oluştu.</br>";
                        echo "Lütfen verilerinizi kontrol ediniz.";
                        header('Refresh:3; user_atama.php');
                        exit;
                    }
                }
            }
        }
    }
    else{ 
        echo "Excel Dosyası Seçilmedi. Lütfen Dosyayı Kontrol Edin";
    }
}


// TOPLU SUPERADMIN ATAMA //
if(isset($_POST['superadmin_ata'])){
    $all_id = $_POST['superadmin_id'];
    $extract_id = implode(',' , $all_id);
    $query = "UPDATE admin SET adminturu_id = 1 WHERE admin_id IN($extract_id)";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        header("location: admin_atama.php");
    }
}


// TOPLU ADMIN ATAMA //
if(isset($_POST['admin_ata'])){
    $all_id = $_POST['admin_id'];
    $extract_id = implode(',' , $all_id);
    $query = "UPDATE admin SET adminturu_id = 2 WHERE admin_id IN($extract_id)";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        header("location: admin_atama.php");
    }
}


// TOPLU ADMIN SİL //
if(isset($_POST['admin_sil'])){
    $all_id = $_POST['admin_sil_id'];
    $extract_id = implode(',' , $all_id);
    // echo $extract_id;
    $query = "DELETE FROM admin WHERE admin_id IN($extract_id)";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        header("location: admin_atama.php");
    }
}


// ADMİNİN ŞİFRESİNİ GÜNCELLEME İŞLEMİ //
if(isset($_POST['admin_update_password'])){
    $admin_id = $_POST["admin_id"];
    $admin_password = $_POST["admin_password"];
    
    if(!$_POST['admin_id'] || !$_POST['admin_password']){
        echo "Eksik veri girişi yaptınız!";
        header('Refresh:2; admin_password.php');
    }elseif($_POST['admin_id'] && $_POST['admin_password']){
        
        $sorgu = $db->prepare("UPDATE admin SET admin_password =? WHERE admin_id = '$admin_id'");
        $ekle = $sorgu->execute([$admin_password]);
        if($ekle){
            echo"İşleminiz Başarıyla Gerçekleştirildi.<br>Yönlendiriliyorsunuz... ";
            header('Refresh:2; admin_password.php');
        }else{
            echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        }
    }    
}


// KULLANICININ ŞİFRESİNİ GÜNCELLEME İŞLEMİ //
if(isset($_POST['kullanici_update_password'])){
    $ogrenci_no = $_POST["ogrenci_no"];
    $kullanici_password = $_POST["kullanici_password"];
    
    if(!$_POST['ogrenci_no'] || !$_POST['kullanici_password']){
        echo "Eksik veri girişi yaptınız!";
        header('Refresh:2; user_password.php');
    }elseif($_POST['ogrenci_no'] && $_POST['kullanici_password']){
        
        $sorgu = $db->prepare("UPDATE kullanici SET kullanici_password =? WHERE ogrenci_no = '$ogrenci_no'");
        $ekle = $sorgu->execute([$kullanici_password]);
        if($ekle){
            echo"İşleminiz Başarıyla Gerçekleştirildi.<br>Yönlendiriliyorsunuz... ";
            header('Refresh:2; user_password.php');
        }else{
            echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        }
    }    
}


// KURUMUN ŞİFRESİNİ GÜNCELLEME İŞLEMİ //
if(isset($_POST['kurum_update_password'])){
    $kurum_id = $_POST["kurum_id"];
    $kurum_password = $_POST["kurum_password"];
    
    if(!$_POST['kurum_id'] || !$_POST['kurum_password']){
        echo "Eksik veri girişi yaptınız!";
        header('Refresh:2; kurum_password.php');
    }elseif($_POST['kurum_id'] && $_POST['kurum_password']){
        
        $sorgu = $db->prepare("UPDATE kurum SET kurum_password =? WHERE kurum_id = '$kurum_id'");
        $ekle = $sorgu->execute([$kurum_password]);
        if($ekle){
            echo"İşleminiz Başarıyla Gerçekleştirildi.<br>Yönlendiriliyorsunuz... ";
            header('Refresh:2; kurum_password.php');
        }else{
            echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        }
    }    
}


























?>



