<?php
session_start();
$admin_username = $_SESSION["admin_username"];
$admin_password = $_SESSION["admin_password"];

if(!isset($_SESSION["oturum"])){
    header("location: /deuybskariyernet/index.php");
}

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
                <li class="nav-item dropdown active ml-4 mr-4">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="admin_add.php">Admin Ekle</a>
                        <a class="dropdown-item" href="admin_atama.php">Admin Türünü Güncelle</a>
                        <a class="dropdown-item" href="admin_password.php">Şifre Değişikliği</a>
                    </div>
                </li>
                <li class="nav-item dropdown active ml-4 mr-4">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kullanıcı</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="user_add.php">Kullanıcı Ekle</a>
                        <a class="dropdown-item" href="user_atama.php">Kullanıcı Türünü Güncelle</a>
                        <a class="dropdown-item" href="user_edit.php">Kullanıcı Bilgileri</a>
                        <a class="dropdown-item" href="user_duyuru.php">Duyuru Yayınla</a>
                        <a class="dropdown-item" href="user_mesaj_oku.php">Gelen Mesajlar</a>
                        <a class="dropdown-item" href="user_mesaj_yaz.php">Mesaj Gönder</a>
                        <a class="dropdown-item" href="user_password.php">Şifre Değişikliği</a>

                    </div>
                </li>
                <li class="nav-item dropdown active ml-4 mr-4">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kurum</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="kurum_add.php">Kurum Ekle</a>
                        <a class="dropdown-item" href="kurum_edit.php">Kurum Bilgileri</a>
                        <a class="dropdown-item" href="kurum_duyuru.php">Duyuru Yayınla</a>
                        <a class="dropdown-item" href="kurum_mesaj_oku.php">Gelen Mesajlar</a>
                        <a class="dropdown-item" href="kurum_mesaj_yaz.php">Mesaj Gönder</a>
                        <a class="dropdown-item" href="kurum_password.php">Şifre Değişikliği</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid pt-4 px-4 pb-5">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <form action="islem.php" method="post">
                    <h1 class="mb-2 p-5 bg-light font-weight-bold" style="text-align: center">ADMİN BİLGİLERİ</h1>
                    <table class="table table-bordered table-striped"  style="text-align: center; justify-content: center;">
                        <thead>
                            <tr>
                                <th style="width: 150px;">
                                    <button type="submit" name="superadmin_ata" class="btn btn-info">Superadmin (1)</button>
                                </th>
                                <th style="width: 150px;">
                                    <button type="submit" name="admin_ata" class="btn btn-success">Admin (2)</button>
                                </th>
                                <th style="text-align: center; width: auto;">Kullanıcı Adı</th>
                                <th style="text-align: center; width: auto;">Kullanıcı Türü</th>
                                <th style="width: 200px;">
                                    <button type="submit" name="admin_sil" class="btn btn-danger">Sil</button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include("baglan3.php");
                                $query = "SELECT * FROM admin WHERE admin_id NOT IN (1) AND admin_username NOT IN ('$admin_username') ORDER BY adminturu_id ASC, admin_id ASC";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach ($query_run as $row) 
                                    {
                                        ?>
                                        <tr>
                                            <td style="width:100px; text-align:center;">
                                                <input type="checkbox" name="superadmin_id[]" value="<?= $row['admin_id'];?>">
                                            </td>
                                            <td style="width:100px; text-align:center;">
                                                <input type="checkbox" name="admin_id[]" value="<?= $row['admin_id'];?>">
                                            </td>
                                            
                                            <td><?= $row['admin_username'];?></td>
                                            <td><?= $row['adminturu_id'];?></td>
                                            <td style="width:100px; text-align:center;">
                                                <input type="checkbox" name="admin_sil_id[]" value="<?= $row['admin_id'];?>">
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                        <tr>
                                            <td colspan="5">Kayıt yok</td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/script.js"></script>
    <script src="tools/jquery-3.3.1.min.js"></script>  
    <script src="tools/jquery-ui.min.js"></script>
</body>
</html>