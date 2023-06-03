<?php
include("baglan.php");
session_start();
error_reporting(0);

// KURUM GİRİŞ EKRANI //
if(isset($_POST["kurum_giris"])){
    if(empty($_POST["kurum_username"]) || empty($_POST["kurum_password"])){
        $message = '<label>All field is required</label>';
    }else{
        $query = "SELECT * FROM kurum WHERE kurum_username = :kurum_username AND kurum_password = :kurum_password";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                'kurum_username' => $_POST["kurum_username"],
                'kurum_password' => $_POST["kurum_password"],
                )
        );
        $count = $statement->rowCount();
        if($count > 0){
            $_SESSION["kurum_username"] = $_POST["kurum_username"];
            $_SESSION["kurum_password"] = $_POST["kurum_password"];
            $_SESSION["oturum"] = true;

            header("location:index.php");
        }else{
            header("location:/deuybskariyernet/kurumlogin.php");
        }
    }
}


// KURUM ŞİFRE GÜNCELLEME EKRANI //
if(isset($_POST["password_update"])){
    $kurum_username = $_SESSION["kurum_username"];
    $kurum_password = $_SESSION["kurum_password"];
    $post_kurum_password = $_POST["post_kurum_password"];
    $new_kurum_password = $_POST["new_kurum_password"];
    $new2_kurum_password = $_POST["new2_kurum_password"];

    $sorgu = $db->prepare("SELECT * FROM kurum WHERE kurum_username = '$kurum_username' AND kurum_password = '$kurum_password'");
    $ekle = $sorgu->execute();
    if($kurum_password == $post_kurum_password){
        if($new_kurum_password != $new2_kurum_password){
            echo "Yeni şifreler örtüşmemektedir.";
            header('Refresh:2; password.php');
        }elseif($kurum_password == $new_kurum_password){
            echo "Şifreler zaten aynı!";
            header('Refresh:2; password.php');
        }else{
            $sorgu2 = $db->prepare("UPDATE kurum SET kurum_password =? 
            WHERE kurum_username = '$kurum_username' AND kurum_password = '$kurum_password'");
            $ekle = $sorgu2->execute([$new_kurum_password]);
            if($ekle){
                $_SESSION["kurum_password"] = $new_kurum_password;
                echo "Şifreniz Başarıyla Güncellendi!";
                header('Refresh:2; password.php');
            }
        }
    }elseif($kurum_password != $post_kurum_password){
        echo "Mevcut şifreniz doğru değil!";
        header('Refresh:2; password.php');
    }
}


// KURUM BİLGİLERİNİ GÜNCELLEME EKRANI //
if(isset($_POST["kurum_info_guncelle"])){
    $kurum_id = $_POST["kurum_id"];
    $kurum_username = $_POST["kurum_username"];
    $kurum_ad = $_POST["kurum_ad"];
    $sektor_id = $_POST["sektor_id"];
    $sehir_id = $_POST["sehir_id"];
    $kurum_telefon = $_POST["kurum_telefon"];
    $kurum_mail = $_POST["kurum_mail"];
    $kurum_hakkinda = $_POST["kurum_hakkinda"];

    $kurum_ad = Transliterator::create('tr-title')->transliterate($kurum_ad);

    $kurum_telefon = strip_tags(trim($_POST["kurum_telefon"]));
    $kurum_telefon = str_replace(" ","",$kurum_telefon);
    $telefon_ilk_index = $kurum_telefon[0];
    $sifir = '0';
    if($telefon_ilk_index === $sifir){
        $kurum_telefon[0] =str_replace("0"," ",$kurum_telefon);
        $kurum_telefon = str_replace(" ","",$kurum_telefon);
    }

    if($kurum_ad == NULL){$kurum_ad = NULL;}
    if($sektor_id == NULL){$sektor_id = NULL;}
    if($sehir_id == NULL){$sehir_id = NULL;}
    if($kurum_telefon == NULL){$kurum_telefon = NULL;}
    if($kurum_mail == NULL){$kurum_mail = NULL;}
    if($kurum_hakkinda == NULL){$kurum_hakkinda = NULL;}

    $sql = "UPDATE kurum SET kurum_ad =? , sektor_id =? , sehir_id =? , kurum_telefon =? , kurum_mail =? , kurum_hakkinda =? WHERE kurum_id = '$kurum_id'";
    $stmt= $connect->prepare($sql);
    $stmt->execute([$kurum_ad, $sektor_id, $sehir_id, $kurum_telefon, $kurum_mail, $kurum_hakkinda]);
    header("location:info.php");
    
}


// KURUM PROFİL FOTOĞRAFI GÜNCELLEME EKRANI //
if(isset($_POST["kurum_pp_ekle"])){
    $kurum_id = $_POST["kurum_id"];
    $kurum_password = $_SESSION["kurum_password"];

    if(!file_exists("upload")){
        mkdir("upload");
    }

    require_once("tools/class.upload.php");
    $foo = new Upload($_FILES["resim"]);
    $foo->file_new_name_body ='profile_'.rand(1,10000);
    $foo->Process('upload/');
    if($foo->processed){
        $path = "upload/".$foo->file_dst_name;
    }
    
    $sorgu = $db->prepare("UPDATE kurum SET resim =? 
    WHERE kurum_id = '$kurum_id' AND kurum_password = '$kurum_password'");
    $ekle = $sorgu->execute([$path]);
    if($ekle){
        header("location:kurum.php");
    }
}


// KURUM İLAN EKLEME İŞLEMİ //
if(isset($_POST['kurum_ilan_ekle'])){
    $kurum_id = $_POST["kurum_id"];
    $pozisyon_id = $_POST["pozisyon_id"];
    $sehir_id = $_POST["sehir_id"];
    $ilanturu_id = $_POST["ilanturu_id"];
    $ilan_aciklama = $_POST["ilan_aciklama"];

    $sorgu = $db->prepare('INSERT INTO kurum_ilanlari SET kurum_id =?, pozisyon_id =?, sehir_id =?, ilanturu_id =?, ilan_aciklama =?');
    $ekle = $sorgu->execute([$kurum_id, $pozisyon_id, $sehir_id, $ilanturu_id, $ilan_aciklama]);
    if($ekle){
        header("location:kurum_ilan_olustur.php");

    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; kurum_ilan_olustur.php');
    }
}


// KURUM ETKİNLİK EKLEME İŞLEMİ //
if(isset($_POST['kurum_etkinlik_ekle'])){
    $kurum_id = $_POST["kurum_id"];
    $etkinlik_ad = $_POST["etkinlik_ad"];
    $etkinlik_aciklama = $_POST["etkinlik_aciklama"];
    $etkinlik_tarihi = $_POST["etkinlik_tarihi"];
    $etkinlik_link = $_POST["etkinlik_link"];

    $sorgu = $db->prepare('INSERT INTO kurum_etkinlikleri SET kurum_id =?, etkinlik_ad =?, etkinlik_aciklama =?, etkinlik_tarihi =?, etkinlik_link =?');
    $ekle = $sorgu->execute([$kurum_id, $etkinlik_ad, $etkinlik_aciklama, $etkinlik_tarihi, $etkinlik_link]);
    if($ekle){
        header("location:kurum_etkinlik_olustur.php");

    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; kurum_etkinlik_olustur.php');
    }
}


// KURUM SOSYAL MEDYA EKLEME İŞLEMİ //
if(isset($_POST['kurum_sosyalmedya_ekle'])){
    $kurum_id = $_POST["kurum_id"];
    $sosyalmedya_id = $_POST["sosyalmedya_id"];
    $link = $_POST["link"];

    $sorgu = $db->prepare('INSERT INTO kurum_sosyalmedya SET kurum_id =?, sosyalmedya_id =?, link =?');
    $ekle = $sorgu->execute([$kurum_id, $sosyalmedya_id, $link]);
    if($ekle){
        header("location:kurum_sosyalmedya_olustur.php");

    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; kurum_sosyalmedya_olustur.php');
    }
}


// KURUM ŞİKAYET EKLEME İŞLEMİ //
if(isset($_POST['kurum_sikayet_ekle'])){
    $kurum_id = $_POST["kurum_id"];
    $sikayet_baslik = $_POST["sikayet_baslik"];
    $sikayet_metni = $_POST["sikayet_metni"];

    $sorgu = $db->prepare('INSERT INTO kurum_sikayet SET kurum_id =?, sikayet_baslik =?, sikayet_metni =?');
    $ekle = $sorgu->execute([$kurum_id, $sikayet_baslik, $sikayet_metni]);
    if($ekle){
        // header("location:kurum_sikayet.php");
        echo "İşleminiz Başarıyla Gerçekleştirildi.<br>";
        echo "Yönlendiriliyorsunuz...";
        header('Refresh:3; kurum_sikayet.php');

    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; kurum_sikayet.php');
    }
}


// KURUMDAN KULLANICIYA MESAJ ATMA İŞLEMİ //
if(isset($_POST['kurumtokullanici'])){
    $kurum_id = $_POST["kurum_id"];
    $ogrenci_no = $_POST["ogrenci_no"];
    $kurumtokullanici_mesaj = $_POST["kurumtokullanici_mesaj"];

    $sorgu = $db->prepare('INSERT INTO kurumtokullanici SET ogrenci_no =?, kurum_id =?, kurumtokullanici_mesaj =?');
    $ekle = $sorgu->execute([$ogrenci_no, $kurum_id, $kurumtokullanici_mesaj]);
    
    if($ekle){
        echo "Mesajınız başarıyla kullanıcıya ulaştırıldı. <br>";
        echo "Yönlendiriliyorsunuz!";
        header("Refresh:3; /deuybskariyernet/user/user_search_kurum.php?ogrenci_no=$ogrenci_no");
    
    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header("Refresh:3; /deuybskariyernet/user/user_search_kurum.php?ogrenci_no=$ogrenci_no");
    }
}


// KURUM DUYURU EKLEME İŞLEMİ //
if(isset($_POST['kurum_duyuru_ekle'])){
    $kurum_id = $_POST["kurum_id"];
    $kurumtokullanici_duyuru_mesaji = $_POST["kurumtokullanici_duyuru_mesaji"];

    $sorgu = $db->prepare('INSERT INTO kurumtokullanici_duyuru SET kurum_id =?, kurumtokullanici_duyuru_mesaji =?');
    $ekle = $sorgu->execute([$kurum_id, $kurumtokullanici_duyuru_mesaji]);
    
    if($ekle){
        header("location: kurum_duyuru_olustur");
    
    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header("Refresh:3; kurum_duyuru_olustur");
    }
}


// KURUM İLANINA YETENEK EKLEME İŞLEMİ //
if(isset($_POST['kurum_ilana_yetenek_ekle'])){
    $ilan_id = $_POST["ilan_id"];
    $yetenek_ad = $_POST["yetenek_ad"];
    $yetenek_ad = Transliterator::create('tr-title')->transliterate($yetenek_ad);
    $sorgu = $db->prepare('INSERT INTO kurum_ilanlari_yetenek SET ilan_id =?, yetenek_ad =?');
    $ekle = $sorgu->execute([$ilan_id, $yetenek_ad]);
    if($ekle){
        header("location:kurum_ilan_olustur.php");
    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; kurum_ilan_olustur.php');
    }
}


































?>