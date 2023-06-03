<?php
session_start();
$ogrenci_no = $_SESSION["ogrenci_no"];
$kullanici_password = $_SESSION["kullanici_password"];

if(!isset($_SESSION["oturum"])){
    header("location: /deuybskariyernet/index.php");
}

include("baglan2.php");
include("user_egitim_sorgu1.php");

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
            <div class="col-md-12 d-flex justify-content-center align-items-center text-center yukseklik">
                <div id="logreg-forms" class="w-50 px-5 py-5 mt-5 mx-auto bg-light text-dark">
                    <form action="islem.php" method="post" class="form-signup">
                        <h1 class="h3 mb-3 font-weight-bold" style="text-align: center">YENİ BİR EĞİTİM BİLGİSİ EKLE</h1>
                        <br><br>
                        <select name="egitimderecesi_id" class="form-control" required autofocus>
                            <option value="" disabled selected>Eğitim Derecesi</option>
                            <option value="1">İlkokul</option>
                            <option value="2">Ortaokul</option>
                            <option value="3">Lise</option>
                            <option value="4">Ön Lisans</option>
                            <option value="5">Lisans</option>
                            <option value="6">Yüksek Lisans</option>
                            <option value="7">Doktora</option>
                            <option value="8">Diğer</option>
                        </select>
                        <br>
                        <input type="text" name="okul_ad" class="form-control" required placeholder=" Okul Adı">
                        <br>
                        <input type="text" name="baslangic_tarihi" id="datepicker1" class="form-control" required placeholder=" Başlangıç Tarihi">
                        <br>
                        <input type="text" name="bitis_tarihi" id="datepicker2" class="form-control" placeholder=" Bitiş Tarihi">
                        <br>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder=" Açıklama"
                                name="egitim_aciklama" style="height: 100px;"></textarea>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-block" name="user_egitim_ekle" type="submit">EKLE</button>
                        <br>          
                        <button class="btn btn-danger btn-block" type="reset">TEMİZLE</button>
                    </form>
                </div>
            </div>
            <div class="col">
                <br><br><br>
                <h3 class="mb-1 p-5 bg-light font-weight-bold" style="text-align: center">EĞİTİM BİLGİLERİM</h3>
                <table class="table table-bordered table-striped">
                    <tr class="font-weight-bold">
                        <td hidden>Kullanıcı Eğitim ID</td>
                        <td style="text-align: center;">Eğitim Derecesi</td>
                        <td style="text-align: center;">Okul Adı</td>
                        <td style="text-align: center;">Başlangıç Tarihi</td>
                        <td style="text-align: center;">Bitiş Tarihi</td>
                        <td style="text-align: center;">Açıklama</td>
                        <td style="text-align: center;">Sil</td>
                    </tr>
                    <?php foreach ($user_egitim_bilgisi_listesi as $user_egitim_bilgisi_list){?>
                    <tr>
                        <td hidden><?= $user_egitim_bilgisi_list->kullanici_egitim_id ?></td>
                        <td style="width: 200px; text-align: center;"><?= $user_egitim_bilgisi_list->egitimderecesi_ad ?></td>
                        <td style="width: 200px; text-align: center;"><?= $user_egitim_bilgisi_list->okul_ad ?></td>
                        <td style="width: 200px; text-align: center;"><?= $user_egitim_bilgisi_list->baslangic_tarihi ?></td>
                        <td style="width: 200px; text-align: center;"><?= $user_egitim_bilgisi_list->bitis_tarihi ?></td>
                        <td style="width: 200px; text-align: center;"><?= $user_egitim_bilgisi_list->egitim_aciklama ?></td>
                        <td style="width: 100px; text-align: center;"><a href="sil.php?user_egitim_bilgisi_listesiid=<?= $user_egitim_bilgisi_list->kullanici_egitim_id ?>" class="btn btn-danger">Sil</a></td>
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