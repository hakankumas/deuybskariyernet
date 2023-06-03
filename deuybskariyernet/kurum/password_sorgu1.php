<?php
session_start();
include("baglan2.php");

if(!isset($_SESSION["oturum"])){
    header("location: /deuybskariyernet/index.php");
}

$kurum_username = $_SESSION["kurum_username"];

$sorgu = $db->prepare('SELECT kurum_id FROM kurum WHERE kurum_username =?');
$sorgu->execute([$kurum_username]);
$session_x = $sorgu->fetchAll(PDO::FETCH_OBJ);

foreach ($session_x as $session){
    $kurum_id = $session->kurum_id;
}

$query7 = "SELECT * FROM kurum_bilgisi WHERE kurum_id = '$kurum_id'";
$result7 = mysqli_query($connect, $query7);

$query8 = "SELECT * FROM kurum_bilgisi WHERE kurum_id = '$kurum_id'";
$result8 = mysqli_query($connect, $query8);

$query9 = "SELECT * FROM kurum_bilgisi WHERE kurum_id = '$kurum_id'";
$result9 = mysqli_query($connect, $query9);

$fetch = $db->query("SELECT * FROM kurum WHERE kurum_id = '$kurum_id'")->fetch();

?>



<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>deuybskariyer.net</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="icon" type="image/png" href="/deuybskariyernet/tools/img/deuybs.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/deuybskariyernet/admin/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/deuybskariyernet/admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="/deuybskariyernet/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_kurum_giris.css" rel="stylesheet">
    <link href="css/style_kurum_giris_sidebar2.css" rel="stylesheet">
</head>
<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <br>
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="me-2"></i>deuybskariyer.net</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" style="width:40px; height:40px; border-radius: 100px; display: block; margin: auto;" src="<?= $fetch["resim"]; ?>">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h5 class="mb-0">
                            <?php 
                                while($row7 = mysqli_fetch_array($result7)):;
                                echo $row7[3];
                                endwhile;
                            ?>
                        </h5>
                        <span>
                            <?php 
                                while($row8 = mysqli_fetch_array($result8)):;
                                echo "@$row8[1]";
                                endwhile;
                            ?>
                        </span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="kurum.php" class="nav-item nav-link"><i class="fa fa-user me-3"></i>Profilim</a>
                    <a href="kurum_ilan_olustur.php" class="nav-item nav-link"><i class="fa fa-bars me-3"></i>İlanlar</a>
                    <a href="kurum_etkinlik_olustur.php" class="nav-item nav-link"><i class="fa fa-calendar me-3"></i>Etkinlikler</a>
                    <a href="kurum_duyuru_olustur.php" class="nav-item nav-link"><i class="fa fa-bullhorn me-3"></i>Duyuru Yayınla</a>
                    <a href="users.php" class="nav-item nav-link"><i class="fa fa-users me-3"></i>Kullanıcılar</a>
                    <a href="kurums.php" class="nav-item nav-link"><i class="fa fa-briefcase me-3"></i>Kurumlar</a>
                </div>
            </nav>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <!-- <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a> -->
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" style="width:40px; height:40px; border-radius: 100px;" src="<?= $fetch["resim"]; ?>">
                            <span class="d-none d-lg-inline-flex">
                                <?php 
                                    while($row9 = mysqli_fetch_array($result9)):;
                                    echo $row9[3];
                                    endwhile;
                                ?>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="kurum_profil.php" class="dropdown-item">Profil Resmi</a>
                            <a href="password.php" class="dropdown-item">Şifre</a>
                            <a href="cikis.php" class="dropdown-item">Çıkış Yap</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="container-fluid pt-4 px-4 mb-5">
                <div class="row g-4">
                    <div class="col-md-10">
                        <div class="bg-light rounded h-100 p-4">
                            <form action="islem.php" method="POST">
                                <h3 class="mb-4">Şifre Güncelle</h3>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="post_kurum_password" id="floatingInput" required autofocus>
                                    <label for="floatingInput">Mevcut Şifreniz</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="new_kurum_password" id="floatingPassword" required>
                                    <label for="floatingPassword">Yeni Şifre</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="new2_kurum_password" id="floatingPassword" required>
                                    <label for="floatingPassword">Yeni Şifrenizi Tekrarlayınız!</label>
                                </div>
                                <br>
                                <button type="submit" name="password_update" class="btn btn-primary">Güncelle</button>
                                <button type="reset" class="btn btn-danger">Temizle</button>
                            </form>
                        </div>
                    </div>               
                </div>
            </div>
        </div>
        <div class="sidebar2 pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <br>
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-bell me-2"></i>BİLDİRİMLER</h3>
                </a>
                <div class="navbar-nav w-100">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-3" aria-hidden="true"></i>Admin</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="kurum_admin_duyuru.php" class="dropdown-item mt-1"><i class="fa fa-arrow-right me-3" aria-hidden="true"></i>Duyurular</a>
                            <a href="kurum_bildirimler.php" class="dropdown-item mt-3"><i class="fa fa-arrow-right me-3" aria-hidden="true"></i>Mesajlar</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-briefcase me-3" aria-hidden="true"></i>Kullanıcılar</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="kurum_user_bildirim.php" class="dropdown-item mt-3"><i class="fa fa-arrow-right me-3" aria-hidden="true"></i>Mesajlar</a>
                        </div>
                    </div>
                    <a href="kurum_sikayet.php" class="nav-item nav-link"><i class="fa fa-envelope me-3"></i>Öneri Bildir</a>
                </div>
            </nav>
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
    <script src="/deuybskariyernet/admin/lib/chart/chart.min.js"></script>
    <script src="/deuybskariyernet/admin/lib/easing/easing.min.js"></script>
    <script src="/deuybskariyernet/admin/lib/waypoints/waypoints.min.js"></script>
    <script src="/deuybskariyernet/admin/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/deuybskariyernet/admin/lib/tempusdominus/js/moment.min.js"></script>
    <script src="/deuybskariyernet/admin/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="/deuybskariyernet/admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/deuybskariyernet/admin/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="giris.js"></script>
</body>
</html>