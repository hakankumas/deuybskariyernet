<?php
session_start();
$ogrenci_no = $_SESSION["ogrenci_no"];
$kullanici_password = $_SESSION["kullanici_password"];

if(!isset($_SESSION["oturum"])){
    header("location: /deuybskariyernet/index.php");
}

include("baglan2.php");
include("kurums_sorgu1.php");

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>deuybskariyer.net</title>
    <link rel="icon" type="image/png" href="/deuybskariyernet/tools/img/deuybs.png">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- FONT -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- BOOTSTRAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.js"></script>
    <!-- DATATABLE -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary p-4" style="font-size: 17px;">
        <a class="navbar-brand" href="index.php">Ana Sayfa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active ml-4 mr-4">
                    <a class="nav-link" href="user.php">Profilim</a>
                </li>
                <li class="nav-item active ml-4 mr-4">
                    <a class="nav-link" href="user_is_staj_ara.php">İlanlar</a>
                </li>
                <li class="nav-item active ml-4 mr-4">
                    <a class="nav-link" href="user_etkinlik_ara.php">Etkinlikler</a>
                </li>
                <li class="nav-item active ml-4 mr-4">
                    <a class="nav-link" href="kurums.php">Kurumlar</a>
                </li>
                <li class="nav-item active ml-4 mr-4">
                    <a class="nav-link" href="users.php">Kullanıcılar</a>
                </li>
                <li class="nav-item dropdown active ml-4 mr-4">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin Bildirimleri</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="user_admin_duyuru.php">Duyurular</a>
                        <a class="dropdown-item" href="user_bildirimler.php">Mesajlar</a>
                    </div>
                </li>
                <li class="nav-item dropdown active ml-4 mr-4">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kurum Bildirimleri</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="user_kurum_duyuru.php">Duyurular</a>
                        <a class="dropdown-item" href="user_kurum_bildirim.php">Mesajlar</a>
                    </div>
                </li>
                <li class="nav-item active ml-4 mr-4">
                    <a class="nav-link" href="user_sikayet.php">Öneri Bildir</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid mt-5 pb-5">
        <div class="col-md-12 col-xl-12">
            <h1 align="center" class="mb-2 p-5 bg-light font-weight-bold">KURUM BİLGİLERİ</h1>  
            <br>      
            <div class="table-responsive">
                <table id="myTable" class="table table-striped table-bordered display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th hidden>Kurum ID</th>
                            <th style="text-align: center;">Kurum Adı</th>
                            <th style="text-align: center;">Sektör</th>
                            <th style="text-align: center;">Konum</th>
                            <th style="text-align: center;">Telefon</th>
                            <th style="text-align: center;">Mail</th>
                            <th style="text-align: center;">Profiline Git</th>
                        </tr>
                    </thead>
                    <?php foreach ($kurum_listesi as $kurum_list){?>
                    <tr>
                        <td hidden><?= $kurum_list->kurum_id ?></td>
                        <td style="width: 200px; text-align: center;"><?= $kurum_list->kurum_ad ?></td>
                        <td style="width: 200px; text-align: center;"><?= $kurum_list->sektor_ad ?></td>
                        <td style="width: 200px; text-align: center;"><?= $kurum_list->sehir_ad ?></td>
                        <td style="width: 200px; text-align: center;"><?= $kurum_list->kurum_telefon ?></td>
                        <td style="width: 200px; text-align: center;"><?= $kurum_list->kurum_mail ?></td>
                        <td style="width: 100px; text-align: center;"><a href="search.php?kurum_listesiid=<?= $kurum_list->kurum_id ?>" class="btn btn-info" target="_blank">Profiline Git</a></td>
                    </tr>
                    <?php } ?>
                </table>
            </div> 
        </div> 
    </div>
    <div class="container-fluid mt-5 pt-5">
        <div class="footer">
            <p>Copyright © 2023 | Designed by DEU YBS | All Rights Reserved.<br><br>
               Distributed By: <a href="https://ybs.deu.edu.tr">DEU YBS</a>
            </p>
        </div>
    </div>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</body>
</html>

