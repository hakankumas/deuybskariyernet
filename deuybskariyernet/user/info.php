<?php
session_start();
$ogrenci_no = $_SESSION["ogrenci_no"];
$kullanici_password = $_SESSION["kullanici_password"];

if(!isset($_SESSION["oturum"])){
    header("location: /deuybskariyernet/index.php");
}

include("baglan2.php");
include("sorgu_kullanicilar.php");
include("info_sorgu2.php");
include("info_sorgu3.php");
include("info_sorgu4.php");

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
                    <a class="nav-link" href="user.php">Profilim</a>
                </li>
                <li class="nav-item dropdown active ml-4 mr-4">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bilgilerimi Güncelle</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="info.php">Kişisel Bilgi</a>
                        <a class="dropdown-item" href="user_onyazi.php">Hakkımda</a>
                        <a class="dropdown-item" href="user_egitim.php">Eğitim Geçmişi</a>
                        <a class="dropdown-item" href="user_istecrube.php">İş Tecrübesi</a>
                        <a class="dropdown-item" href="user_proje.php">Projeler</a>
                        <a class="dropdown-item" href="user_sertifika.php">Sertifikalar</a>
                        <a class="dropdown-item" href="user_yetenek.php">Yetenekler</a>
                        <a class="dropdown-item" href="user_ilgialani.php">İlgi Alanları</a>
                        <a class="dropdown-item" href="user_sosyalmedya.php">Sosyal Medya Adresleri</a>
                        <a class="dropdown-item" href="user_referans.php">Referanslar</a>
                        <a class="dropdown-item" href="user_aile.php">Aile</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12 justify-content-center align-items-center text-center yukseklik">
                <br><br><br>
                <h3 class="mb-1 p-5 bg-light font-weight-bold" style="text-align: center">KİŞİSEL BİLGİLERİM</h3>
            </div>
            <div class="col-md-12">
                <?php foreach ($kullanici_bilgisi_listesi as $kullanici_bilgisi_list){?>
                <form action="islem.php" method="POST" class="form-signup">
                    <table class="table table-responsive-md table-bordered table-striped" style="text-align: left;">
                        <tr>
                            <th>Öğrenci No:</th>
                            <td>
                                <select class="form-control" disabled selected>
                                    <option value="<?= $kullanici_bilgisi_list->ogrenci_no ?>">
                                    <?= $kullanici_bilgisi_list->ogrenci_no ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Kullanıcı Türü:</th>
                            <td>
                                <select class="form-control" disabled selected>
                                    <option value="<?= $kullanici_bilgisi_list->kullanicituru_id ?>">
                                    <?= $kullanici_bilgisi_list->kullanicituru_ad ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Ad:</th>
                            <td>
                                <input value="<?= $kullanici_bilgisi_list->kullanici_ad ?>"
                                type="text" name="kullanici_ad" class="form-control" 
                                placeholder="<?= $kullanici_bilgisi_list->kullanici_ad ?>">
                            </td>             
                        </tr>
                        <tr>
                            <th>Soyad:</th>
                            <td>
                                <input value="<?= $kullanici_bilgisi_list->kullanici_soyad ?>"
                                type="text" name="kullanici_soyad" class="form-control" 
                                placeholder="<?= $kullanici_bilgisi_list->kullanici_soyad ?>">
                            </td>             
                        </tr>
                        <tr>
                            <th>Cinsiyet:</th>
                            <td>
                                <select name="cinsiyet_id" class="form-control">
                                    <option value="<?= $kullanici_bilgisi_list->cinsiyet_id ?>">
                                    <?= $kullanici_bilgisi_list->cinsiyet_ad ?>
                                    </option>
                                    <option value="1">Erkek</option>
                                    <option value="2">Kadın</option>
                                </select>
                            </td>
                        </tr>
                        <?php
                            $cinsiyet = $kullanici_bilgisi_list->cinsiyet_id; 
                                if ($cinsiyet == 1) {?>
                                <tr>
                                    <th>Askerlik Durumu:</th>
                                    <td>
                                        <select name="askerlikdurumu_id" class="form-control">
                                            <option value="<?= $kullanici_bilgisi_list->askerlikdurumu_id ?>"><?= $kullanici_bilgisi_list->askerlikdurumu_ad ?></option>
                                            <option value="1">Yapıldı</option>
                                            <option value="2">Tecilli</option>
                                            <option value="3">Muaf</option>
                                            <option value="4">Yapılıyor</option>
                                            <option value="5">Askerlik Çağına Gelmemiş</option>
                                            <option value="6">Diğer</option>
                                        </select>
                                    </td>
                                </tr>
                                    <?php 
                                        $askerlikdurumu = $kullanici_bilgisi_list->askerlikdurumu_id;
                                        if ($askerlikdurumu == 2) {?>
                                        <tr>
                                            <th>Tecil Tarihi:</th>
                                            <td>
                                                <input value="<?= $kullanici_bilgisi_list->tecil_tarihi ?>" 
                                                type="datetime" maxlength="10" name="tecil_tarihi" id="datepicker2" class="form-control" 
                                                placeholder="<?= $kullanici_bilgisi_list->tecil_tarihi ?>">
                                            </td>             
                                        </tr>
                                    <?php }?>
                            <?php }?>
                        <tr>
                            <th>Uyruk:</th>
                            <td>
                                <select name="ulke_id" class="form-control">
                                    <option value="<?= $kullanici_bilgisi_list->ulke_id ?>">
                                    <?= $kullanici_bilgisi_list->ulke_ad ?>
                                    </option>
                                    <?php foreach ($ulkeler as $ulke){?>
                                    <option value="<?= $ulke->ulke_id ?>">
                                    <?= $ulke->ulke_ad ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>İkametgah:</th>
                            <td>
                                <select name="sehir_id" class="form-control">
                                    <option value="<?= $kullanici_bilgisi_list->sehir_id ?>">
                                    <?= $kullanici_bilgisi_list->sehir_ad ?>
                                    </option>
                                    <?php foreach ($sehirler as $sehir){?>
                                    <option value="<?= $sehir->sehir_id ?>">
                                    <?= $sehir->sehir_ad ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Doğum Tarihi:</th>
                            <td>
                                <input value="<?= $kullanici_bilgisi_list->kullanici_dogum_tarihi ?>"
                                type="datetime" maxlength="10" name="kullanici_dogum_tarihi" id="datepicker1" class="form-control" 
                                placeholder="<?= $kullanici_bilgisi_list->kullanici_dogum_tarihi ?>">
                            </td>             
                        </tr>
                        <tr>
                            <th>Telefon:</th>
                            <td>
                                <input value="<?= $kullanici_bilgisi_list->kullanici_tel ?>"
                                type="tel" name="kullanici_tel" class="form-control"  maxlength="10"
                                placeholder="<?= $kullanici_bilgisi_list->kullanici_tel ?>">
                            </td>             
                        </tr>
                        <tr>
                            <th>Mail:</th>
                            <td>
                                <input value="<?= $kullanici_bilgisi_list->kullanici_mail ?>"
                                type="email" name="kullanici_mail" class="form-control" 
                                placeholder="<?= $kullanici_bilgisi_list->kullanici_mail ?>">
                            </td>             
                        </tr>
                        <tr>
                            <th>Medeni Durum:</th>
                            <td>
                                <select name="medenidurumu_id" class="form-control">
                                    <option value="<?= $kullanici_bilgisi_list->medenidurumu_id ?>">
                                    <?= $kullanici_bilgisi_list->medenidurumu_ad ?></option>
                                    <option value="1">Bekar</option>
                                    <option value="2">Evli</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Engel Durumu:</th>
                            <td>
                                <select name="engeldurumu_id" class="form-control">
                                    <option value="<?= $kullanici_bilgisi_list->engeldurumu_id ?>">
                                    <?= $kullanici_bilgisi_list->engeldurumu_ad ?></option>
                                    <option value="1">Yok</option>
                                    <option value="2">Fiziksel Engelli</option>
                                    <option value="3">Görme Engelli</option>
                                    <option value="4">İşitme Engelli</option>
                                    <option value="5">Konuşma Engelli</option>
                                    <option value="6">Otistik Spektrum Bozukluğu</option>
                                    <option value="7">Ruhsal Engelli</option>
                                    <option value="8">Zihinsel Engelli</option>
                                </select>
                            </td>
                        </tr>
                        <?php
                            $engeldurumu = $kullanici_bilgisi_list->engeldurumu_id; 
                                if (($engeldurumu != NULL) AND ($engeldurumu != 1)) {?>
                                    <tr>
                                        <th>Engel Yüzdesi:</th>
                                        <td>
                                            <input value="<?= $kullanici_bilgisi_list->engelyuzdesi ?>"
                                            type="number" min="0" max="100" maxlength="3" name="engelyuzdesi" class="form-control" 
                                            placeholder="<?= $kullanici_bilgisi_list->engelyuzdesi ?>">
                                        </td>             
                                    </tr>
                            <?php }?>
                        <tr>
                            <th>Ehliyet:</th>
                            <td>
                                <select name="ehliyet_id" class="form-control">
                                    <option value="<?= $kullanici_bilgisi_list->ehliyet_id ?>">
                                    <?= $kullanici_bilgisi_list->ehliyet_ad ?></option>
                                    <option value="0">Yok</option>
                                    <option value="1">A</option>
                                    <option value="2">A1</option>
                                    <option value="3">A2</option>
                                    <option value="4">B</option>
                                    <option value="5">B1</option>
                                    <option value="6">BE</option>
                                    <option value="7">C</option>
                                    <option value="8">C1</option>
                                    <option value="9">C1E</option>
                                    <option value="10">CE</option>
                                    <option value="11">D</option>
                                    <option value="12">D1</option>
                                    <option value="13">D1E</option>
                                    <option value="14">DE</option>
                                    <option value="15">F</option>
                                    <option value="16">G</option>
                                    <option value="17">M</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Çalışma Durumu:</th>
                            <td>
                                <select name="kullanicicalismadurumu_id" class="form-control">
                                    <option value="<?= $kullanici_bilgisi_list->kullanicicalismadurumu_id ?>">
                                    <?= $kullanici_bilgisi_list->kullanicicalismadurumu_ad ?></option>
                                    <?php foreach ($kullanicicalismadurumlari as $kullanicicalismadurum){?>
                                    <option value="<?= $kullanicicalismadurum->kullanicicalismadurumu_id ?>">
                                    <?= $kullanicicalismadurum->kullanicicalismadurumu_ad ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <button class="btn btn-success btn-block btn-lg p-3" name="user_info_guncelle" type="submit">GÜNCELLE</button>
                </form>
                <?php } ?>
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
    <script>
        $(document).ready(function(){
            $('#datepicker1').datepicker({
                dateFormat:"yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
        })
    </script>
        <script>
        $(document).ready(function(){
            $('#datepicker2').datepicker({
                dateFormat:"yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
        })
    </script>
</body>
</html>