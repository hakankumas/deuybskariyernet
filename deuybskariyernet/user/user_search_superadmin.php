<?php

$ogrenci_no = htmlspecialchars($_GET["ogrenci_no"]);

include("baglan2.php");
include("sorgu_kullanicilar.php");
include("user_sorgu2.php");
include("user_sorgu3.php");
include("user_sorgu4.php");
include("user_sorgu5.php");
include("user_sorgu6.php");
include("user_sorgu7.php");
include("user_sorgu8.php");
include("user_sorgu9.php");
include("user_sorgu10.php");
include("user_sorgu11.php");
include("user_sorgu12.php");

?>


<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <title>deuybskariyer.net</title>
        <link rel="icon" type="image/png" href="/deuybskariyernet/tools/img/deuybs.png">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="deukariyer" name="keywords">
        <meta content="deukariyer" name="description">
        <link href="img/favicon.ico" rel="icon">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:300;400;600;700;800&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="51">
        <div class="wrapper">
            <div class="sidebar">
                <div class="sidebar-header">
                    <?php foreach ($kullanici_bilgisi_listesi as $kullanici_bilgisi_list){?>
                    <img style="width:200px; height:200px; border-radius: 100px; display: block; margin: auto;" src="<?= $kullanici_bilgisi_list->resim ?>">
                    <?php } ?>
                </div>
                <div class="sidebar-content">
                    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                        <a href="#" class="navbar-brand">Navigation</a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="nav navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/deuybskariyernet/superadmin/index.php">Ana Sayfa<i class="fa fa-home"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/deuybskariyernet/superadmin/user_edit.php">Kullanıcılar<i class="fa fa-user"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/deuybskariyernet/superadmin/kurum_edit.php">Kurumlar<i class="fa fa-building"></i></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="content">
                <div class="education" id="education">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>KİŞİSEL BİLGİ</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="edu-col">
                                    <?php foreach ($kullanici_bilgisi_listesi as $kullanici_bilgisi_list){

                                        $ad = $kullanici_bilgisi_list->kullanici_ad;
                                        $soyad = $kullanici_bilgisi_list->kullanici_soyad;
                                            if(($ad != NULL) AND ($soyad != NULL)){?>
                                                <span>Ad Soyad: <?= "$kullanici_bilgisi_list->kullanici_ad $kullanici_bilgisi_list->kullanici_soyad" ?></span>
                                            <?php }
                                        
                                        $kullanicituru = $kullanici_bilgisi_list->kullanicituru_ad;
                                            if($kullanicituru != NULL){?>
                                                <span>Kullanıcı Türü: <?= $kullanici_bilgisi_list->kullanicituru_ad ?></span>
                                            <?php } 
                                        
                                        $cinsiyet = $kullanici_bilgisi_list->cinsiyet_ad;
                                            if($cinsiyet != NULL){?>
                                                <span>Cinsiyet: <?= $kullanici_bilgisi_list->cinsiyet_ad ?></span>
                                            <?php } 
                                        
                                        $dogum_tarihi = $kullanici_bilgisi_list->kullanici_dogum_tarihi;
                                            if($dogum_tarihi != NULL){?>
                                                <span>Doğum Tarihi: <?= $kullanici_bilgisi_list->kullanici_dogum_tarihi ?></span>
                                            <?php }
                                        
                                        $telefon = $kullanici_bilgisi_list->kullanici_tel;
                                            if($telefon != NULL){?>
                                                <span>Telefon: <?= $kullanici_bilgisi_list->kullanici_tel ?></span>
                                            <?php } 
                                        
                                        $mail = $kullanici_bilgisi_list->kullanici_mail;
                                            if($mail != NULL){?>
                                                <span>Mail: <?= $kullanici_bilgisi_list->kullanici_mail ?></span>
                                            <?php } 
                                        
                                        $uyruk = $kullanici_bilgisi_list->ulke_ad;
                                            if($uyruk != NULL){?>
                                                <span>Uyruk: <?= $kullanici_bilgisi_list->ulke_ad ?></span>
                                            <?php } 
                                        
                                        $ikametgah = $kullanici_bilgisi_list->sehir_ad;
                                            if($ikametgah != NULL){?>
                                                <span>İkametgah: <?= $kullanici_bilgisi_list->sehir_ad ?></span>
                                            <?php } 
                                        
                                        $ehliyet = $kullanici_bilgisi_list->ehliyet_ad;
                                            if($ehliyet != NULL){?>
                                                <span>Ehliyet: <?= $kullanici_bilgisi_list->ehliyet_ad ?></span>
                                            <?php } 
                                        
                                        $cinsiyet_id = $kullanici_bilgisi_list->cinsiyet_id;
                                        $askerlikdurumu_id = $kullanici_bilgisi_list->askerlikdurumu_id;
                                            if(($cinsiyet_id == 1) AND ($askerlikdurumu_id != NULL)){?>
                                                <span>Askerlik Durumu: <?= $kullanici_bilgisi_list->askerlikdurumu_ad ?></span>
                                            <?php }
                                        
                                            if($askerlikdurumu_id == 2){?>
                                                <span>Tecil Tarihi: <?= $kullanici_bilgisi_list->tecil_tarihi ?></span>
                                            <?php } 
                                        
                                        $medenidurumu = $kullanici_bilgisi_list->medenidurumu_ad;
                                            if($medenidurumu != NULL){?>
                                                <span>Medeni Durum: <?= $kullanici_bilgisi_list->medenidurumu_ad ?></span>
                                            <?php }
                                        
                                        $engeldurumu = $kullanici_bilgisi_list->engeldurumu_ad;
                                            if($engeldurumu != NULL){?>
                                                <span>Engel Durumu: <?= $kullanici_bilgisi_list->engeldurumu_ad ?></span>
                                            <?php }
                                        
                                        $engeldurumu_id = $kullanici_bilgisi_list->engeldurumu_id;
                                            if(($engeldurumu_id != 1) AND ($engeldurumu_id != NULL)){?>
                                                <span>Engel Yüzdesi: <?= $kullanici_bilgisi_list->engelyuzdesi ?></span>
                                            <?php } 
                                        
                                        $calismadurumu = $kullanici_bilgisi_list->kullanicicalismadurumu_ad;
                                            if($calismadurumu != NULL){?>
                                                <span>Çalışma Durumu: <?= $kullanici_bilgisi_list->kullanicicalismadurumu_ad ?></span>
                                            <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="education" id="interest">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>HAKKINDA</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="edu-col">
                                    <?php foreach ($onyazi_bilgisi_listesi as $onyazi_bilgisi_list){?>
                                        <br>
                                        <span><strong><?= $onyazi_bilgisi_list->kullanici_onyazi_metin ?></strong></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="education" id="education">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>EĞİTİM GEÇMİŞİ</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="edu-col">
                                    <?php foreach ($egitim_bilgisi_listesi as $egitim_bilgisi_list){?>
                                        <br>
                                        <span><?= $egitim_bilgisi_list->baslangic_tarihi ?><i> / </i><?= $egitim_bilgisi_list->bitis_tarihi ?></span>
                                        <i><?= $egitim_bilgisi_list->egitimderecesi_ad ?></i>
                                        <h3><?= $egitim_bilgisi_list->okul_ad ?></h3>
                                        <p><?= $egitim_bilgisi_list->egitim_aciklama ?></p>
                                        <br>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="experience" id="experience">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>İŞ TECRÜBESİ</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="exp-col">
                                    <?php foreach ($is_bilgisi_listesi as $is_bilgisi_list){?>
                                        <br>
                                        <span><?= $is_bilgisi_list->k_i_t_baslangic_tarihi ?><i> / </i><?= $is_bilgisi_list->k_i_t_bitis_tarihi ?></span>
                                        <h4><?= $is_bilgisi_list->sehir_ad ?></h4>                                        
                                        <H5><a><?= $is_bilgisi_list->kurum_ad ?></a><i> - </i><a><?= $is_bilgisi_list->pozisyon_ad ?></a></H5>
                                        <p><?= $is_bilgisi_list->k_i_t_aciklama ?></p>
                                        <br>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="experience" id="project">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>PROJELER</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="exp-col">
                                    <?php foreach ($proje_bilgisi_listesi as $proje_bilgisi_list){?>
                                        <br>
                                        <span><?= $proje_bilgisi_list->tarih ?></span>
                                        <h4><?= $proje_bilgisi_list->proje_adi ?></h4> 
                                        <h5><?= $proje_bilgisi_list->proje_aciklama ?></h5>                                        
                                        <br>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="experience" id="certificate">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>SERTİFİKALAR</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="exp-col">
                                    <?php foreach ($sertifika_bilgisi_listesi as $sertifika_bilgisi_list){?>
                                        <br>
                                        <span><?= $sertifika_bilgisi_list->tarih ?></span>
                                        <h4><?= $sertifika_bilgisi_list->kurum_ad ?></h4>                                        
                                        <h5><?= $sertifika_bilgisi_list->sertifika_ad ?></h5>
                                        <p><?= $sertifika_bilgisi_list->sertifika_aciklama ?></p>
                                        <br>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="education" id="interest">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>YETENEKLER</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="edu-col">
                                    <?php foreach ($yetenek_bilgisi_listesi as $yetenek_bilgisi_list){?>
                                        <br>
                                        <span><h5><?= $yetenek_bilgisi_list->yetenek_ad ?></h5></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="education" id="interest">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>İLGİ ALANLARI</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="edu-col">
                                    <?php foreach ($ilgi_alani_bilgisi_listesi as $ilgi_alani_bilgisi_list){?>
                                        <br>
                                        <span><h5><?= $ilgi_alani_bilgisi_list->ilgialani_ad ?></h5></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="education" id="social">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>SOSYAL MEDYA ADRESLERİ</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="edu-col">
                                    <?php foreach ($sosyalmedya_bilgisi_listesi as $sosyalmedya_bilgisi_list){?>
                                        <br>
                                        <span><h5><a href="<?= $sosyalmedya_bilgisi_list->link ?>" target="_blank"><?= $sosyalmedya_bilgisi_list->sosyalmedya_platform ?></a><h5></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="education" id="education">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>REFERANSLAR</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="edu-col">
                                    <?php foreach ($referans_bilgisi_listesi as $referans_bilgisi_list){?>
                                        <br>
                                        <span><h3><?= $referans_bilgisi_list->kullanici_referans_ad ?> <?= $referans_bilgisi_list->kullanici_referans_soyad ?></h3></span>
                                        <i><?= $referans_bilgisi_list->kullanici_referans_kurumu ?></i><br>
                                        <i><?= $referans_bilgisi_list->kullanici_referans_pozisyonu ?></i><br>
                                        <i><?= $referans_bilgisi_list->kullanici_referans_mail ?></i><br>
                                        <i><?= $referans_bilgisi_list->kullanici_referans_telefon ?></i><br>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="education" id="education">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>EVLİLİK</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="edu-col">
                                    <?php foreach ($evlilik_bilgisi_listesi as $evlilik_bilgisi_list){?>
                                        <br>
                                        <span><h3><?= $evlilik_bilgisi_list->es_ad ?> <?= $evlilik_bilgisi_list->es_soyad ?></h3></span>
                                        <i><?= $evlilik_bilgisi_list->evlilik_tarihi ?></i><br>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="education" id="education">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>ÇOCUK</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="edu-col">
                                    <?php foreach ($cocuk_bilgisi_listesi as $cocuk_bilgisi_list){?>
                                        <br>
                                        <span><h3><?= $cocuk_bilgisi_list->cocuk_ad ?> <?= $cocuk_bilgisi_list->cocuk_soyad ?></h3></span>
                                        <i><?= $cocuk_bilgisi_list->cinsiyet_ad ?></i><br>
                                        <i><?= $cocuk_bilgisi_list->cocuk_dogum_tarihi ?></i><br>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-dark text-white font-size-normal p-4">
                    <div class="content-inner">
                        <div class="row justify-content-center">
                            <h6>Copyright © 2023 | Designed by DEU YBS | All Rights Reserved.</h6>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <h6>Distributed By: <a class="text-white" href="https://ybs.deu.edu.tr">DEU YBS</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        <script src="lib/typed/typed.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>