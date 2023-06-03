<?php
session_start();
$kurum_username = $_SESSION["kurum_username"];
$kurum_password = $_SESSION["kurum_password"];

if(!isset($_SESSION["oturum"])){
    header("location: /deuybskariyernet/index.php");
}

include("baglan2.php");
include("index_sorgu2.php");
include("info_sorgu1.php");
include("kurum_ilan_olustur_sorgu1.php");
include("kurum_ilan_olustur_sorgu2.php");
include("kurum_ilan_olustur_sorgu3.php");

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
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center align-items-center text-center yukseklik">
                <div id="logreg-forms" class="w-50 px-5 py-5 mt-5 mx-auto bg-light text-dark">
                    <form action="islem.php" method="post" class="form-signup">
                        <h1 class="h3 mb-3 font-weight-bold" style="text-align: center">YENİ BİR İLAN OLUŞTUR</h1>
                        <br><br>
                        <input type="hidden" name="kurum_id" value="<?= $kurum_id;?>">
                        <select name="pozisyon_id" class="form-control" required autofocus>
                            <option value="" disabled selected>Pozisyon</option>
                            <?php foreach ($pozisyonlar as $pozisyon){?>
                            <option value="<?= $pozisyon->pozisyon_id ?>"><?= $pozisyon->pozisyon_ad ?></option>
                            <?php } ?>
                        </select>
                        <br>
                        <select name="sehir_id" class="form-control" required>
                            <option value="" disabled selected>Şehir</option>
                            <?php foreach ($sehirler as $sehir){?>
                            <option value="<?= $sehir->sehir_id ?>"><?= $sehir->sehir_ad ?></option>
                            <?php } ?>
                        </select>
                        <br>
                        <select name="ilanturu_id" class="form-control" required>
                            <option value="" disabled selected>İlan Türü</option>
                            <?php foreach ($ilanturleri as $ilantur){?>
                            <option value="<?= $ilantur->ilanturu_id ?>"><?= $ilantur->ilanturu_ad ?></option>
                            <?php } ?>
                        </select>
                        <br>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder=" İlan Açıklaması"
                                name="ilan_aciklama" style="height: 100px;" required></textarea>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-block" name="kurum_ilan_ekle" type="submit">Ekle</button>
                        <br>          
                        <button class="btn btn-danger btn-block" type="reset">Temizle</button>
                    </form>
                </div>
            </div>
            <div class="col">
                <br><br><br>
                <h3 class="mb-1 p-5 bg-light font-weight-bold" style="text-align: center">Kurum Tarafından Oluşturulan İlanlar</h3>
                <table class="table table-bordered table-striped">
                    <tr class="font-weight-bold">
                        <td hidden>İlan ID</td>
                        <td style="text-align: center;">Pozisyon</td>
                        <td style="text-align: center;">Şehir</td>
                        <td style="text-align: center;">İlan Türü</td>
                        <td style="text-align: center;">İlan Açıklaması</td>
                        <td style="text-align: center;">Yetenek Ekle</td>
                        <td style="text-align: center;">Başvuru Listesi</td>
                        <td style="text-align: center;">Sil</td>
                    </tr>
                    <?php foreach ($kurumun_ilanlari_bilgisi_listesi as $kurumun_ilanlari_bilgisi_list){?>
                    <tr>
                        <td hidden><?= $kurumun_ilanlari_bilgisi_list->ilan_id ?></td>
                        <td style="width: 250px; text-align: center;"><?= $kurumun_ilanlari_bilgisi_list->pozisyon_ad ?></td>
                        <td style="width: 150px; text-align: center;"><?= $kurumun_ilanlari_bilgisi_list->sehir_ad ?></td>
                        <td style="width: 150px; text-align: center;"><?= $kurumun_ilanlari_bilgisi_list->ilanturu_ad ?></td>
                        <td style="text-align: left;"><?= $kurumun_ilanlari_bilgisi_list->ilan_aciklama ?></td>
                        <td style="width: 150px; text-align: center;"><a href="kurum_ilana_yetenek_ekle.php?kurumun_ilanlarina_yetenek_ekle_id=<?= $kurumun_ilanlari_bilgisi_list->ilan_id ?>" class="btn btn-warning">Yetenek Ekle</a></td>
                        <td style="width: 150px; text-align: center;"><a href="search.php?kurumun_ilanlari_basvuru_listesiid=<?= $kurumun_ilanlari_bilgisi_list->ilan_id ?>" class="btn btn-info" target="_blank">Başvuranlar</a></td>
                        <td style="width: 130px; text-align: center;"><a href="sil.php?kurumun_ilanlari_bilgisi_listesiid=<?= $kurumun_ilanlari_bilgisi_list->ilan_id ?>" class="btn btn-danger">Sil</a></td>
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