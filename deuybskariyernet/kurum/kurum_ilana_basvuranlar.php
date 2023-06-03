<?php

$ilan_id = htmlspecialchars($_GET["ilan_id"]);
include("baglan2.php");
include("kurum_ilana_basvuranlar_sorgu1.php");

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="tools/jquery-ui.min.css">
    <title>deuybskariyer.net</title>
    <link rel="icon" type="image/png" href="/deuybskariyernet/tools/img/deuybs.png">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary p-4" style="font-size: 17px;">
        <a class="navbar-brand" href="index.php">Ana Sayfa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active ml-4 mr-4">
                    <a class="nav-link" href="kurum.php">Profilim</a>
                </li>
                <li class="nav-item active ml-4 mr-4">
                    <a class="nav-link" href="kurum_ilan_olustur.php">İlanlar</a>
                </li>
                <li class="nav-item active ml-4 mr-4">
                    <a class="nav-link" href="kurum_etkinlik_olustur.php">Etkinlikler</a>
                </li>
                <li class="nav-item active ml-4 mr-4">
                    <a class="nav-link" href="kurum_duyuru_olustur.php">Duyuru Yayınla</a>
                </li>
                <li class="nav-item active ml-4 mr-4">
                    <a class="nav-link" href="users.php">Kullanıcılar</a>
                </li>
                <li class="nav-item active ml-4 mr-4">
                    <a class="nav-link" href="kurums.php">Kurumlar</a>
                </li>
                <li class="nav-item dropdown active ml-4 mr-4">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="kurum_admin_duyuru.php">Duyurular</a>
                        <a class="dropdown-item" href="kurum_bildirimler.php">Mesajlar</a>
                    </div>
                </li>
                <li class="nav-item active ml-4 mr-4">
                    <a class="nav-link" href="kurum_user_bildirim.php">Kullanıcı Mesajları</a>
                </li>
                <li class="nav-item active ml-4 mr-4">
                    <a class="nav-link" href="kurum_sikayet.php">Öneri Bildir</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12">
                <br><br><br>
                <h3 class="mb-1 p-5 bg-light font-weight-bold" style="text-align: center">İLANA BAŞVURANLAR</h3>
                <table class="table table-bordered table-striped">
                    <tr class="font-weight-bold">
                        <td hidden>İlan Başvurusu ID</td>
                        <td style="text-align: center;">İlan ID</td>
                        <td style="text-align: center;">Pozisyon</td>
                        <td style="text-align: center;">Şehir</td>
                        <td style="text-align: center;">İlan Türü</td>
                        <td style="text-align: center;">Öğrenci No</td>
                        <td style="text-align: center;">Profiline Git</td>
                    </tr>
                    <?php foreach ($kurumun_ilan_basvuru_bilgisi_listesi as $kurumun_ilan_basvuru_bilgisi_list){?>
                    <tr>
                        <td hidden><?= $kurumun_ilan_basvuru_bilgisi_list->ilan_basvurusu_id ?></td>
                        <td style="width: %10; text-align: center;"><?= $kurumun_ilan_basvuru_bilgisi_list->ilan_id ?></td>
                        <td style="width: %30; text-align: center;"><?= $kurumun_ilan_basvuru_bilgisi_list->pozisyon_ad ?></td>
                        <td style="width: %20; text-align: center;"><?= $kurumun_ilan_basvuru_bilgisi_list->sehir_ad ?></td>
                        <td style="width: %20; text-align: center;"><?= $kurumun_ilan_basvuru_bilgisi_list->ilanturu_ad ?></td>
                        <td style="width: %10; text-align: center;"><?= $kurumun_ilan_basvuru_bilgisi_list->ogrenci_no ?></td>
                        <td style="width: %10; text-align: center;"><a href="search.php?kurumun_ilanlarina_basvuran_listesiid=<?= $kurumun_ilan_basvuru_bilgisi_list->ogrenci_no ?>" class="btn btn-info">Profiline Git</a></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <br>
    <div class="container-fluid mt-5 pt-5">
        <div class="footer">
            <p class="font-weight-bold">Copyright © 2023 | Designed by DEU YBS | All Rights Reserved.<br><br>
               Distributed By: <a href="https://ybs.deu.edu.tr">DEU YBS</a>
            </p>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/script.js"></script>
    <script src="tools/jquery-3.3.1.min.js"></script>  
    <script src="tools/jquery-ui.min.js"></script> 
</body>
</html>