<?php
include("baglan.php");
session_start();
error_reporting(0);


// KULLANICI GİRİŞ EKRANI //
if(isset($_POST["kullanici_giris"])){
    if(empty($_POST["ogrenci_no"]) || empty($_POST["kullanici_password"])){
        $message = '<label>All field is required</label>';
    }else{
        $query = "SELECT * FROM kullanici WHERE ogrenci_no = :ogrenci_no AND kullanici_password = :kullanici_password";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                'ogrenci_no' => $_POST["ogrenci_no"],
                'kullanici_password' => $_POST["kullanici_password"],

                )
        );
        $count = $statement->rowCount();
        if($count > 0){
            $_SESSION["ogrenci_no"] = $_POST["ogrenci_no"];
            $_SESSION["kullanici_password"] = $_POST["kullanici_password"];
            $_SESSION["oturum"] = true;
            
            header("location:index.php");
        }else{
            header("location:/deuybskariyernet/userlogin.php");
        }
    }
}


// KULLANICI ŞİFRE GÜNCELLEME EKRANI //
if(isset($_POST["password_update"])){
    $ogrenci_no = $_SESSION["ogrenci_no"];
    $kullanici_password = $_SESSION["kullanici_password"];
    $post_kullanici_password = $_POST["post_kullanici_password"];
    $new_kullanici_password = $_POST["new_kullanici_password"];
    $new2_kullanici_password = $_POST["new2_kullanici_password"];

    $sorgu = $db->prepare("SELECT * FROM kullanici WHERE ogrenci_no = '$ogrenci_no' AND kullanici_password = '$kullanici_password'");
    $ekle = $sorgu->execute();
    if($kullanici_password == $post_kullanici_password){
        if($new_kullanici_password != $new2_kullanici_password){
            echo "Yeni şifreler örtüşmemektedir.";
            header('Refresh:2; password.php');
        }elseif($kullanici_password == $new_kullanici_password){
            echo "Şifreler zaten aynı!";
            header('Refresh:2; password.php');
        }else{
            $sorgu2 = $db->prepare("UPDATE kullanici SET kullanici_password =? 
            WHERE ogrenci_no = '$ogrenci_no' AND kullanici_password = '$kullanici_password'");
            $ekle = $sorgu2->execute([$new_kullanici_password]);
            if($ekle){
                $_SESSION["kullanici_password"] = $new_kullanici_password;
                echo "Şifreniz Başarıyla Güncellendi!";
                header('Refresh:2; password.php');
            }
        }
    }elseif($kullanici_password != $post_kullanici_password){
        echo "Mevcut şifreniz doğru değil!";
        header('Refresh:2; password.php');
    }
}


// KULLANICI BİLGİLERİNİ GÜNCELLEME EKRANI //
if(isset($_POST["user_info_guncelle"])){
    $ogrenci_no = $_SESSION["ogrenci_no"];
    $kullanici_password = $_SESSION["kullanici_password"];
    $kullanici_ad = $_POST["kullanici_ad"];
    $kullanici_soyad = $_POST["kullanici_soyad"];
    $cinsiyet_id = $_POST["cinsiyet_id"];
    $kullanici_tel = $_POST["kullanici_tel"];
    $kullanici_mail = $_POST["kullanici_mail"];
    $sehir_id = $_POST["sehir_id"];
    $kullanici_dogum_tarihi = $_POST["kullanici_dogum_tarihi"];
    $askerlikdurumu_id = $_POST["askerlikdurumu_id"];
    $tecil_tarihi = $_POST["tecil_tarihi"];
    $medenidurumu_id = $_POST["medenidurumu_id"];
    $engeldurumu_id = $_POST["engeldurumu_id"];
    $kullanicicalismadurumu_id = $_POST["kullanicicalismadurumu_id"];
    $ehliyet_id = $_POST["ehliyet_id"];
    $ulke_id = $_POST["ulke_id"];
    $engelyuzdesi = $_POST["engelyuzdesi"];


    $kullanici_ad = Transliterator::create('tr-title')->transliterate($kullanici_ad);
    $kullanici_soyad = Transliterator::create('tr-upper')->transliterate($kullanici_soyad);
    $kullanici_mail = strip_tags(trim($_POST["kullanici_mail"]));
    $kullanici_mail = mb_strtolower($kullanici_mail,'utf8');
    $kullanici_mail = str_replace("ı","i",$kullanici_mail);
    $kullanici_dogum_tarihi = strip_tags(trim($_POST["kullanici_dogum_tarihi"]));
    $tecil_tarihi = strip_tags(trim($_POST["tecil_tarihi"]));
    $kullanici_tel = strip_tags(trim($_POST["kullanici_tel"]));

    if($kullanici_ad == NULL){$kullanici_ad = NULL;}
    if($kullanici_soyad == NULL){$kullanici_soyad = NULL;}
    if($cinsiyet_id == NULL){$cinsiyet_id = NULL;}
    if($kullanici_tel == NULL){$kullanici_tel = NULL;}
    if($kullanici_mail == NULL){$kullanici_mail = NULL;}
    if($sehir_id == NULL){$sehir_id = NULL;}
    if($kullanici_dogum_tarihi == NULL){$kullanici_dogum_tarihi = NULL;}
    if($askerlikdurumu_id == NULL){$askerlikdurumu_id = NULL;}
    if($tecil_tarihi == NULL){$tecil_tarihi = NULL;}
    if($medenidurumu_id == NULL){$medenidurumu_id = NULL;}
    if($engeldurumu_id == NULL){$engeldurumu_id = NULL;}
    if($kullanicicalismadurumu_id == NULL){$kullanicicalismadurumu_id = NULL;}
    if($ehliyet_id == NULL){$ehliyet_id = NULL;}
    if($ulke_id == NULL){$ulke_id = NULL;}
    if($engelyuzdesi == NULL){$engelyuzdesi = NULL;}
    if($cinsiyet_id == 2){$askerlikdurumu_id = NULL; $tecil_tarihi = NULL;}
    if($engeldurumu_id == 1){$engelyuzdesi = NULL;}

    $sql = "UPDATE kullanici SET kullanici_ad =? , kullanici_soyad =?  , cinsiyet_id =?  ,
    kullanici_tel =?  , kullanici_mail =?  , sehir_id =?  , kullanici_dogum_tarihi =?  , askerlikdurumu_id =?  ,
    tecil_tarihi =? , medenidurumu_id =?  , engeldurumu_id =? , kullanicicalismadurumu_id =? , ehliyet_id =? ,
    ulke_id =? , engelyuzdesi =?  
    WHERE ogrenci_no = '$ogrenci_no' AND kullanici_password = '$kullanici_password'";
    $stmt= $connect->prepare($sql);
    $stmt->execute([$kullanici_ad, $kullanici_soyad, $cinsiyet_id, 
    $kullanici_tel, $kullanici_mail, $sehir_id, $kullanici_dogum_tarihi, $askerlikdurumu_id, 
    $tecil_tarihi, $medenidurumu_id, $engeldurumu_id, $kullanicicalismadurumu_id, $ehliyet_id, 
    $ulke_id, $engelyuzdesi]);
    header("location:info.php");
    
}


// KULLANICI PROFİL FOTOĞRAFI GÜNCELLEME EKRANI //
if(isset($_POST["user_pp_ekle"])){
    $ogrenci_no = $_SESSION["ogrenci_no"];
    $kullanici_password = $_SESSION["kullanici_password"];

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
    
    $sorgu = $db->prepare("UPDATE kullanici SET resim =? 
    WHERE ogrenci_no = '$ogrenci_no' AND kullanici_password = '$kullanici_password'");
    $ekle = $sorgu->execute([$path]);
    if($ekle){
        header("location:index.php");
    }
}


// KULLANICI EĞİTİM EKLEME İŞLEMİ //
if(isset($_POST['user_egitim_ekle'])){
    $ogrenci_no = $_SESSION["ogrenci_no"];
    $egitimderecesi_id = $_POST["egitimderecesi_id"];
    $okul_ad = $_POST["okul_ad"];
    $baslangic_tarihi = $_POST["baslangic_tarihi"];
    $bitis_tarihi = $_POST["bitis_tarihi"];
    $egitim_aciklama = $_POST["egitim_aciklama"];
    if($bitis_tarihi == NULL){
        $bitis_tarihi = NULL;
    }
    if($egitim_aciklama == NULL){
        $egitim_aciklama = NULL;
    }
    $sorgu = $db->prepare('INSERT INTO kullanici_egitim SET ogrenci_no =?, egitimderecesi_id =?, okul_ad =?, baslangic_tarihi =?, bitis_tarihi =?, egitim_aciklama =?');
    $ekle = $sorgu->execute([$ogrenci_no, $egitimderecesi_id, $okul_ad, $baslangic_tarihi, $bitis_tarihi, $egitim_aciklama]);
    if($ekle){
        header("location:user_egitim.php");

    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_egitim.php');
    }
}


// KULLANICI İŞ TECRÜBESİ EKLEME İŞLEMİ //
if(isset($_POST['user_istecrube_ekle'])){
    $ogrenci_no = $_SESSION["ogrenci_no"];
    $kurum_ad = $_POST["kurum_ad"];
    $sektor_id = $_POST["sektor_id"];
    $pozisyon_id = $_POST["pozisyon_id"];
    $sehir_id = $_POST["sehir_id"];
    $k_i_t_baslangic_tarihi = $_POST["k_i_t_baslangic_tarihi"];
    $k_i_t_bitis_tarihi = $_POST["k_i_t_bitis_tarihi"];
    $k_i_t_aciklama = $_POST["k_i_t_aciklama"];

    if($k_i_t_bitis_tarihi == NULL){
        $k_i_t_bitis_tarihi = NULL;
    }
    if($k_i_t_aciklama == NULL){
        $k_i_t_aciklama = NULL;
    }
    $sorgu = $db->prepare('INSERT INTO kullanici_is_tecrubesi SET ogrenci_no =?, kurum_ad =?, sektor_id =?, pozisyon_id =?, sehir_id =?, k_i_t_baslangic_tarihi =?, k_i_t_bitis_tarihi =?, k_i_t_aciklama =?');
    $ekle = $sorgu->execute([$ogrenci_no, $kurum_ad, $sektor_id, $pozisyon_id, $sehir_id, $k_i_t_baslangic_tarihi, $k_i_t_bitis_tarihi, $k_i_t_aciklama]);
    if($ekle){
        header("location:user_istecrube.php");

    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_istecrube.php');
    }
}


// KULLANICI SERTİFİKA EKLEME İŞLEMİ //
if(isset($_POST['user_sertifika_ekle'])){
    $ogrenci_no = $_SESSION["ogrenci_no"];
    $sertifika_ad = $_POST["sertifika_ad"];
    $kurum_ad = $_POST["kurum_ad"];
    $sertifika_aciklama = $_POST["sertifika_aciklama"];
    $tarih = $_POST["tarih"];

    if($sertifika_aciklama == NULL){
        $sertifika_aciklama = NULL;
    }
    if($tarih == NULL){
        $tarih = NULL;
    }
    $sorgu = $db->prepare('INSERT INTO kullanici_sertifika SET ogrenci_no =?, sertifika_ad =?, kurum_ad =?, sertifika_aciklama =?, tarih =?');
    $ekle = $sorgu->execute([$ogrenci_no, $sertifika_ad, $kurum_ad, $sertifika_aciklama, $tarih]);
    if($ekle){
        header("location:user_sertifika.php");

    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_sertifika.php');
    }
}


// KULLANICI İLGİ ALANI EKLEME İŞLEMİ //
if(isset($_POST['user_ilgialani_ekle'])){
    $ogrenci_no = $_SESSION["ogrenci_no"];
    $ilgialani_ad = $_POST["ilgialani_ad"];
    $ilgialani_ad = Transliterator::create('tr-title')->transliterate($ilgialani_ad);

    $sorgu = $db->prepare('INSERT INTO kullanici_ilgi_alani SET ogrenci_no =?, ilgialani_ad =?');
    $ekle = $sorgu->execute([$ogrenci_no, $ilgialani_ad]);
    if($ekle){
        header("location:user_ilgialani.php");

    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_ilgialani.php');
    }
}


// KULLANICI YETENEK EKLEME İŞLEMİ //
if(isset($_POST['user_yetenek_ekle'])){
    $ogrenci_no = $_SESSION["ogrenci_no"];
    $yetenek_ad = $_POST["yetenek_ad"];
    $yetenek_ad = Transliterator::create('tr-title')->transliterate($yetenek_ad);
    $sorgu = $db->prepare('INSERT INTO kullanici_yetenek SET ogrenci_no =?, yetenek_ad =?');
    $ekle = $sorgu->execute([$ogrenci_no, $yetenek_ad]);

    if($ekle){
        header("location:user_yetenek.php");

    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_yetenek.php');
    }
}


// KULLANICI SOSYAL MEDYA EKLEME İŞLEMİ //
if(isset($_POST['user_sosyalmedya_ekle'])){
    $ogrenci_no = $_SESSION["ogrenci_no"];
    $sosyalmedya_id = $_POST["sosyalmedya_id"];
    $link = $_POST["link"];

    $sorgu = $db->prepare('INSERT INTO kullanici_sosyalmedya SET ogrenci_no =?, sosyalmedya_id =?, link =?');
    $ekle = $sorgu->execute([$ogrenci_no, $sosyalmedya_id, $link]);
    if($ekle){
        header("location:user_sosyalmedya.php");

    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_sosyalmedya.php');
    }
}


// KULLANICI ŞİKAYET EKLEME İŞLEMİ //
if(isset($_POST['user_sikayet_ekle'])){
    $ogrenci_no = $_SESSION["ogrenci_no"];
    $sikayet_baslik = $_POST["sikayet_baslik"];
    $sikayet_metni = $_POST["sikayet_metni"];

    $sorgu = $db->prepare('INSERT INTO kullanici_sikayet SET ogrenci_no =?, sikayet_baslik =?, sikayet_metni =?');
    $ekle = $sorgu->execute([$ogrenci_no, $sikayet_baslik, $sikayet_metni]);
    if($ekle){
        header("location:user_sikayet.php");

    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_sikayet.php');
    }
}


// KULLANICI EVLİLİK BİLGİSİ EKLEME İŞLEMİ //
if(isset($_POST['user_evlilik_ekle'])){
    $ogrenci_no = $_SESSION["ogrenci_no"];
    $es_ad = $_POST["es_ad"];
    $es_soyad = $_POST["es_soyad"];
    $evlilik_tarihi = $_POST["evlilik_tarihi"];

    $sorgu = $db->prepare('INSERT INTO kullanici_es SET ogrenci_no =?, es_ad =?, es_soyad =?, evlilik_tarihi =?');
    $ekle = $sorgu->execute([$ogrenci_no, $es_ad, $es_soyad, $evlilik_tarihi]);
    if($ekle){
        header("location:user_aile.php");

    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_aile.php');
    }
}


// KULLANICI ÇOCUK BİLGİSİ EKLEME İŞLEMİ //
if(isset($_POST['user_cocuk_ekle'])){
    $ogrenci_no = $_SESSION["ogrenci_no"];
    $cocuk_ad = $_POST["cocuk_ad"];
    $cocuk_soyad = $_POST["cocuk_soyad"];
    $cinsiyet_id = $_POST["cinsiyet_id"];
    $cocuk_dogum_tarihi = $_POST["cocuk_dogum_tarihi"];

    $sorgu = $db->prepare('INSERT INTO kullanici_cocuk SET ogrenci_no =?, cocuk_ad =?, cocuk_soyad =?, cinsiyet_id =?, cocuk_dogum_tarihi =?');
    $ekle = $sorgu->execute([$ogrenci_no, $cocuk_ad, $cocuk_soyad, $cinsiyet_id, $cocuk_dogum_tarihi]);
    if($ekle){
        header("location:user_aile.php");

    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_aile.php');
    }
}


// KULLANICI PROJE EKLEME İŞLEMİ //
if(isset($_POST['user_proje_ekle'])){
    $ogrenci_no = $_SESSION["ogrenci_no"];
    $proje_adi = $_POST["proje_adi"];
    $proje_aciklama = $_POST["proje_aciklama"];
    $tarih = $_POST["tarih"];

    if($proje_aciklama == NULL){
        $proje_aciklama = NULL;
    }
    if($tarih == NULL){
        $tarih = NULL;
    }
    $sorgu = $db->prepare('INSERT INTO kullanici_proje SET ogrenci_no =?, proje_adi =?, proje_aciklama =?, tarih =?');
    $ekle = $sorgu->execute([$ogrenci_no, $proje_adi, $proje_aciklama, $tarih]);
    if($ekle){
        header("location: user_proje.php");

    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_proje.php');
    }
}


// KULLANICI REFERANS EKLEME İŞLEMİ //
if(isset($_POST['user_referans_ekle'])){
    $ogrenci_no = $_SESSION["ogrenci_no"];
    $kullanici_referans_ad = $_POST["kullanici_referans_ad"];
    $kullanici_referans_soyad = $_POST["kullanici_referans_soyad"];
    $kullanici_referans_kurumu = $_POST["kullanici_referans_kurumu"];
    $kullanici_referans_pozisyonu = $_POST["kullanici_referans_pozisyonu"];
    $kullanici_referans_telefon = $_POST["kullanici_referans_telefon"];
    $kullanici_referans_mail = $_POST["kullanici_referans_mail"];

    $sorgu = $db->prepare('INSERT INTO kullanici_referans SET ogrenci_no =?, kullanici_referans_ad =?, kullanici_referans_soyad =?, 
    kullanici_referans_kurumu =?, kullanici_referans_pozisyonu =?, kullanici_referans_telefon =?, kullanici_referans_mail =?');
    $ekle = $sorgu->execute([$ogrenci_no, $kullanici_referans_ad, $kullanici_referans_soyad, $kullanici_referans_kurumu, 
    $kullanici_referans_pozisyonu, $kullanici_referans_telefon, $kullanici_referans_mail, ]);
    if($ekle){
        header("location:user_referans.php");

    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_referans.php');
    }
}


// KULLANICI ÖNYAZI EKLEME İŞLEMİ //
if(isset($_POST['user_onyazi_ekle'])){
    $ogrenci_no = $_SESSION["ogrenci_no"];
    $kullanici_onyazi_metin = $_POST["kullanici_onyazi_metin"];

    $sorgu = $db->prepare('INSERT INTO kullanici_onyazi SET ogrenci_no =?, kullanici_onyazi_metin =?');
    $ekle = $sorgu->execute([$ogrenci_no, $kullanici_onyazi_metin]);
    if($ekle){
        header("location:user_onyazi.php");

    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_onyazi.php');
    }
}


// KULLANICIDAN KURUMA MESAJ ATMA İŞLEMİ //
if(isset($_POST['kullanicitokurum'])){
    $ogrenci_no = $_SESSION["ogrenci_no"];
    $kurum_id = $_POST["kurum_id"];
    $kullanicitokurum_mesaj = $_POST["kullanicitokurum_mesaj"];

    $sorgu = $db->prepare('INSERT INTO kullanicitokurum SET ogrenci_no =?, kurum_id =?, kullanicitokurum_mesaj =?');
    $ekle = $sorgu->execute([$ogrenci_no, $kurum_id, $kullanicitokurum_mesaj]);
    
    if($ekle){
        echo "Mesajınız başarıyla kullanıcıya ulaştırıldı. <br>";
        echo "Yönlendiriliyorsunuz!";
        header("Refresh:3; /deuybskariyernet/kurum/kurum_search_user.php?kurum_id=$kurum_id");
    
    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header("Refresh:3; /deuybskariyernet/kurum/kurum_search_user.php?kurum_id=$kurum_id");
    }
}

































                    














?>