<?php

$kurum_id = htmlspecialchars($_GET["kurum_id"]);

include("baglan2.php");
include("kurum_sorgu1.php");
include("kurum_sorgu2.php");
include("kurum_sorgu3.php");
include("kurum_sorgu4.php");

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
        <link href="css/style2.css" rel="stylesheet">
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="51">
    <?php foreach ($kurum_bilgisi_listesi as $kurum_bilgisi_list){?>
        <div class="wrapper">
            <div class="sidebar">
                <div class="sidebar-header">
                    <img style="width:200px; height:200px; border-radius: 100px; display: block; margin: auto;" src="<?= $kurum_bilgisi_list->resim ?>">
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
                <div class="contact" id="contact">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>KURUMSAL BİLGİ</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="contact-info">
                                    <p><i class="fa fa-user"></i><?= $kurum_bilgisi_list->kurum_ad ?></p>
                                    <p><i class="fa fa-tag"></i><?= $kurum_bilgisi_list->sektor_ad ?></p>
                                    <p><i class="fa fa-envelope"></i><?= $kurum_bilgisi_list->kurum_mail ?></p>
                                    <p><i class="fa fa-phone"></i><?= $kurum_bilgisi_list->kurum_telefon ?></p>
                                    <p><i class="fa fa-map-marker"></i><?= $kurum_bilgisi_list->sehir_ad ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="about" id="about">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>HAKKIMIZDA</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6 col-lg-11">
                                <span><h5>
                                    <?= $kurum_bilgisi_list->kurum_hakkinda ?>
                                </h5></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="education" id="advert">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>İLANLARIMIZ</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="edu-col">
                                    <?php foreach ($kurum_ilan_bilgisi_listesi as $kurum_ilan_bilgisi_list){?>
                                        <br>
                                        <span><h4><?= $kurum_ilan_bilgisi_list->pozisyon_ad ?><i> - </i><?= $kurum_ilan_bilgisi_list->ilanturu_ad ?></h4></span>
                                        <i><?= $kurum_ilan_bilgisi_list->sehir_ad ?></i>
                                        <h6><?= $kurum_ilan_bilgisi_list->ilan_aciklama ?></h6>
                                        <br>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="education" id="activity">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>ETKİNLİKLERİMİZ</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="edu-col">
                                    <?php foreach ($kurum_etkinlik_bilgisi_listesi as $kurum_etkinlik_bilgisi_list){?>
                                        <br>
                                        <span><h4><?= $kurum_etkinlik_bilgisi_list->etkinlik_ad ?></h4></span>
                                        <h6><?= $kurum_etkinlik_bilgisi_list->etkinlik_tarihi ?></h6>
                                        <h6><?= $kurum_etkinlik_bilgisi_list->etkinlik_aciklama ?></h6>
                                        <p><a class="text-danger" href="<?= $kurum_etkinlik_bilgisi_list->etkinlik_link ?>" class="btn btn-success" target="_blank">Link Adresi</a></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="education" id="social">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>SOSYAL MEDYA ADRESLERİMİZ</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="edu-col">
                                    <?php foreach ($kurum_sosyalmedya_bilgisi_listesi as $k_sosyalmedya_bilgisi_list){?>
                                        <br>
                                        <span><h5><a href="<?= $k_sosyalmedya_bilgisi_list->link ?>" target="_blank"><?= $k_sosyalmedya_bilgisi_list->sosyalmedya_platform ?></a><h5></span>
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
