<?php
session_start();
$kurum_username = $_SESSION["kurum_username"];
$kurum_password = $_SESSION["kurum_password"];

if(!isset($_SESSION["oturum"])){
    header("location: /deuybskariyernet/index.php");
}

include("baglan2.php");
include("index_sorgu2.php");
include("kurum_sosyalmedya_olustur_sorgu1.php");
include("kurum_sosyalmedya_olustur_sorgu2.php");

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
            <div class="col-md-12 d-flex justify-content-center align-items-center text-center yukseklik">
                <div id="logreg-forms" class="w-50 px-5 py-5 mt-5 mx-auto bg-light text-dark">
                    <form action="islem.php" method="post" class="form-signup">
                        <h1 class="h3 mb-3 font-weight-bold" style="text-align: center">SOSYAL MEDYA ADRESİ EKLE</h1>
                        <br><br>
                        <input type="hidden" name="kurum_id" value="<?= $kurum_id;?>">
                        <select name="sosyalmedya_id" class="form-control" required autofocus>
                            <option value="" disabled selected>Platform</option>
                            <?php foreach ($sosyalmedyalar as $sosyalmedya){?>
                            <option value="<?= $sosyalmedya->sosyalmedya_id ?>"><?= $sosyalmedya->sosyalmedya_platform ?></option>
                            <?php } ?>
                        </select>
                        <br>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder=" Adres Linki"
                                name="link" style="height: 100px;" required></textarea>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-block" name="kurum_sosyalmedya_ekle" type="submit">Ekle</button>
                        <br>          
                        <button class="btn btn-danger btn-block" type="reset">Temizle</button>
                    </form>
                </div>
            </div>
            <div class="col">
                <br><br><br>
                <h3 class="mb-1 p-5 bg-light font-weight-bold" style="text-align: center">Sosyal Medya Adresleriniz</h3>
                <table class="table table-bordered table-striped">
                    <tr class="font-weight-bold">
                        <td hidden>Kurum Sosyal Medya ID</td>
                        <td style="text-align: center;">Platform</td>
                        <td style="text-align: center;">Link</td>
                        <td style="text-align: center;">Sil</td>
                    </tr>
                    <?php foreach ($kurumun_sosyalmedya_bilgisi_listesi as $kurumun_sosyalmedya_bilgisi_list){?>
                    <tr>
                        <td hidden><?= $kurumun_sosyalmedya_bilgisi_list->kurum_sosyalmedya_id ?></td>
                        <td style="width: 270px; text-align: center;"><?= $kurumun_sosyalmedya_bilgisi_list->sosyalmedya_platform ?></td>
                        <td style="text-align: center;"><?= $kurumun_sosyalmedya_bilgisi_list->link ?></td>
                        <td style="width: 130px; text-align: center;"><a href="sil.php?kurumun_sosyalmedya_bilgisi_listesiid=<?= $kurumun_sosyalmedya_bilgisi_list->kurum_sosyalmedya_id ?>" class="btn btn-danger">Sil</a></td>
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