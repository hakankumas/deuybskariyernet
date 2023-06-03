<?php
session_start();
$admin_username = $_SESSION["admin_username"];
$admin_password = $_SESSION["admin_password"];

if(!isset($_SESSION["oturum"])){
    header("location: /deuybskariyernet/index.php");
}

include("baglan2.php");
include("index_sorgu1.php");
include("index_sorgu2.php");
include("index_sorgu3.php");
include("index_sorgu4.php");
include("index_sorgu5.php");
include("index_sorgu6.php");
include("index_sorgu7.php");

?>



<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>deuybskariyer.net</title>
    <link rel="icon" type="image/png" href="/deuybskariyernet/tools/img/deuybs.png">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <?php foreach ($admin_bilgisi as $admin_bilgi){?>
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <br>
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="me-2"></i>deuybskariyer.net</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h5 class="mb-0">
                            <?= $admin_bilgi->admin_username ?>
                        </h5>
                        <span>
                            <?= $admin_bilgi->adminturu_ad ?>
                        </span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-home me-2"></i>Ana Sayfa</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-users me-2" aria-hidden="true"></i>Kullanıcı</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="user_add.php" class="dropdown-item mt-1"><i class="fa fa-arrow-right me-2" aria-hidden="true"></i>Kullanıcı Ekle</a>
                            <a href="user_atama.php" class="dropdown-item mt-3"><i class="fa fa-arrow-right me-2" aria-hidden="true"></i>Kullanıcı Türünü Güncelle</a>
                            <a href="user_edit.php" class="dropdown-item mt-3"><i class="fa fa-arrow-right me-2" aria-hidden="true"></i>Kullanıcı Bilgileri</a>
                            <a href="user_duyuru.php" class="dropdown-item mt-3"><i class="fa fa-arrow-right me-2" aria-hidden="true"></i>Duyuru Yayınla</a>
                            <a href="user_mesaj_oku.php" class="dropdown-item mt-3"><i class="fa fa-arrow-right me-2" aria-hidden="true"></i>Gelen Mesajlar</a>
                            <a href="user_mesaj_yaz.php" class="dropdown-item mt-3"><i class="fa fa-arrow-right me-2" aria-hidden="true"></i>Mesaj Gönder</a>
                            <a href="user_password.php" class="dropdown-item mt-3"><i class="fa fa-arrow-right me-2" aria-hidden="true"></i>Şifre Değişikliği</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-briefcase me-2" aria-hidden="true"></i>Kurum</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="kurum_add.php" class="dropdown-item mt-1"><i class="fa fa-arrow-right me-2" aria-hidden="true"></i>Kurum Ekle</a>
                            <a href="kurum_edit.php" class="dropdown-item mt-3"><i class="fa fa-arrow-right me-2" aria-hidden="true"></i>Kurum Bilgileri</a>
                            <a href="kurum_duyuru.php" class="dropdown-item mt-3"><i class="fa fa-arrow-right me-2" aria-hidden="true"></i>Duyuru Yayınla</a>
                            <a href="kurum_mesaj_oku.php" class="dropdown-item mt-3"><i class="fa fa-arrow-right me-2" aria-hidden="true"></i>Gelen Mesajlar</a>
                            <a href="kurum_mesaj_yaz.php" class="dropdown-item mt-3"><i class="fa fa-arrow-right me-2" aria-hidden="true"></i>Mesaj Gönder</a>
                            <a href="kurum_password.php" class="dropdown-item mt-3"><i class="fa fa-arrow-right me-2" aria-hidden="true"></i>Şifre Değişikliği</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.png" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">
                                <?= $admin_bilgi->admin_username ?>
                            </span>
                        </a>
                        <?php } ?>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="password.php" class="dropdown-item">Şifre Güncelle</a>
                            <a href="cikis.php" class="dropdown-item">Çıkış Yap</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-7 col-xl-12">
                        <div class="bg-light rounded d-flex align-items-center justify-content-center">
                            <i class="fa fa-chart-line fa-5x text-primary p-4"></i>
                            <div class="ms-3">
                                <h3 class="mb-3">Toplam Kullanıcı</h3>
                                <h1 class="mb-0">
                                    <?php foreach ($kullanici_sayisi_bilgisi as $kullanici_sayisi){
                                        echo $kullanici_sayisi->kullanici_sayisi ;
                                    }
                                    ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-center">
                            <i class="fa fa-chart-bar fa-5x text-primary p-4"></i>
                            <div class="ms-3">
                                <h3 class="mb-3">Mezun</h3>
                                <h1 class="mb-0">
                                    <?php foreach ($mezun_sayisi_bilgisi as $mezun_sayisi)
                                        echo $mezun_sayisi->mezun_sayisi ;
                                    ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-center">
                            <i class="fa fa-chart-bar fa-5x text-primary p-4"></i>
                            <div class="ms-3">
                                <h3 class="mb-3">Öğrenci</h3>
                                <h1 class="mb-0">
                                    <?php foreach ($ogrenci_sayisi_bilgisi as $ogrenci_sayisi)
                                        echo $ogrenci_sayisi->ogrenci_sayisi ;
                                    ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-xl-12">
                        <div class="bg-light rounded d-flex align-items-center justify-content-center">
                            <i class="fa fa-chart-line fa-5x text-info p-4"></i>
                            <div class="ms-3">
                                <h3 class="mb-3">Kurum</h3>
                                <h1 class="mb-0">
                                    <?php foreach ($kurum_sayisi_bilgisi as $kurum_sayisi)
                                        echo $kurum_sayisi->kurum_sayisi ;
                                    ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-center">
                            <i class="fa fa-chart-bar fa-5x text-info p-4"></i>
                            <div class="ms-3">
                                <h3 class="mb-3">İş İlanı</h3>
                                <h1 class="mb-0">
                                    <?php foreach ($is_ilani_sayisi_bilgisi as $is_ilani_sayisi)
                                        echo $is_ilani_sayisi->is_sayisi ;
                                    ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-center">
                            <i class="fa fa-chart-bar fa-5x text-info p-4"></i>
                            <div class="ms-3">
                                <h3 class="mb-3">Staj İlanı</h3>
                                <h1 class="mb-0">
                                    <?php foreach ($staj_ilani_sayisi_bilgisi as $staj_ilani_sayisi)
                                        echo $staj_ilani_sayisi->staj_sayisi ;
                                    ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>    
    <div class="container-fluid">
        <div class="footer">
            <p>Copyright © 2023 | Designed by DEU YBS | All Rights Reserved.<br><br>
               Distributed By: <a href="https://ybs.deu.edu.tr">DEU YBS</a>
            </p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>