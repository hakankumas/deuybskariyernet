<?php
session_start();
$kurum_username = $_SESSION["kurum_username"];
$kurum_password = $_SESSION["kurum_password"];

if(!isset($_SESSION["oturum"])){
    header("location: /deuybskariyernet/index.php");
}

include("baglan2.php");
include("index_sorgu1.php");
include("info_sorgu1.php");
include("info_sorgu2.php");

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
                <li class="nav-item dropdown active ml-4 mr-4">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bilgilerimi Güncelle</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="info.php">Kişisel Bilgiler</a>
                        <a class="dropdown-item" href="kurum_profil.php">Profil Resmi</a>
                        <a class="dropdown-item" href="kurum_sosyalmedya_olustur.php">Sosyal Medya</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12 justify-content-center align-items-center text-center yukseklik">
                <br><br><br>
                <h3 class="mb-1 p-5 bg-light font-weight-bold" style="text-align: center">KURUMSAL BİLGİLER</h3>
            </div>
            <div class="col-md-12">
                <?php foreach ($kurum_bilgisi_listesi as $kurum_bilgisi_list){?>
                <form action="islem.php" method="POST" class="form-signup">
                    <table class="table table-responsive-md table-bordered table-striped" style="text-align: left;">
                        <input type="hidden" name="kurum_id" value="<?= $kurum_bilgisi_list->kurum_id ?>">
                        <tr>
                            <th class="py-3 pl-5" style="width:250px;">Kullanıcı Adı:</th>
                            <td>
                                <select class="form-control" name="kurum_username"  disabled selected>
                                    <option value="<?= $kurum_bilgisi_list->kurum_username ?>">
                                    <?= $kurum_bilgisi_list->kurum_username ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="py-3 pl-5" >Kurum Adı:</th>
                            <td>
                                <input value="<?= $kurum_bilgisi_list->kurum_ad ?>"
                                type="text" name="kurum_ad" class="form-control">
                            </td>             
                        </tr>
                        <tr>
                            <th class="py-3 pl-5" >Sektör:</th>
                            <td>
                                <select name="sektor_id" class="form-control">
                                    <option value="<?= $kurum_bilgisi_list->sektor_id ?>">
                                    <?= $kurum_bilgisi_list->sektor_ad ?>
                                    </option>
                                    <?php foreach ($sektorler as $sektor){?>
                                    <option value="<?= $sektor->sektor_id ?>"><?= $sektor->sektor_ad ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="py-3 pl-5" >Konum:</th>
                            <td>
                                <select name="sehir_id" class="form-control">
                                    <option value="<?= $kurum_bilgisi_list->sehir_id ?>">
                                    <?= $kurum_bilgisi_list->sehir_ad ?>
                                    </option>
                                    <?php foreach ($sehirler as $sehir){?>
                                    <option value="<?= $sehir->sehir_id ?>"><?= $sehir->sehir_ad ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="py-3 pl-5" >Telefon Numarası:</th>
                            <td>
                                <input value="<?= $kurum_bilgisi_list->kurum_telefon ?>"
                                type="tel" name="kurum_telefon" class="form-control"  maxlength="10">
                            </td>             
                        </tr>
                        <tr>
                            <th class="py-3 pl-5" >Mail Adresi:</th>
                            <td>
                                <input value="<?= $kurum_bilgisi_list->kurum_mail ?>"
                                type="email" name="kurum_mail" class="form-control">
                            </td>             
                        </tr>
                        <tr>
                            <th class="py-3 pl-5" >Hakkımızda:</th>
                            <td>
                                <input value="<?= $kurum_bilgisi_list->kurum_hakkinda ?>"
                                type="text" name="kurum_hakkinda" class="form-control">
                            </td>             
                        </tr>
                    </table>
                    <button class="btn btn-success btn-block btn-lg p-3" name="kurum_info_guncelle" type="submit">GÜNCELLE</button>
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
</body>
</html>