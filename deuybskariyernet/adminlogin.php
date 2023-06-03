<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="tools/img/deuybs.png">
  <link rel="icon" type="image/png" href="tools/img/deuybs.png">
  <title>deuybskariyer.net</title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="tools/logins_assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="tools/logins_assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="tools/logins_assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="bg-gray-200">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid ps-2 pe-0">
            <div class="collapse navbar-collapse d-flex" id="navigation">
              <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 mr-auto p-2" href="index.php">deuybskariyer.net</a>
              <ul class="navbar-nav mx-auto me-1">
                <li class="nav-item p-2">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="userlogin.php"><i class="fa fa-users opacity-6 text-dark me-1"></i>Kullanıcı</a>
                </li>
                <li class="nav-item p-2">
                  <a class="nav-link me-2" href="kurumlogin.php"><i class="fa fa-building opacity-6 text-dark me-1"></i>Kurum</a>
                </li>
                <li class="nav-item p-2">
                  <a class="nav-link me-2" href="adminlogin.php"><i class="fas fa-user opacity-6 text-dark me-1"></i>Yönetici</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://img.freepik.com/free-vector/3d-earth-graphic-symbolizing-global-trade-illustration_456031-125.jpg?w=1380&t=st=1681107470~exp=1681108070~hmac=fdb9b786a5047a98242629a86ba037989be1ea58c0a3c423c1f4af14810523e9');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Yönetici Giriş Ekranı</h4>
                </div>
              </div>
              <div class="card-body">
                <form action="/deuybskariyernet/tools/islem.php" method="POST" class="text-start">
                  <br>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Kullanıcı Adı</label>
                    <input type="text" name="admin_username" class="form-control" autofocus>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Şifre</label>
                    <input type="password" name="admin_password" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="admin_giris" class="btn bg-gradient-success w-100 my-4 mb-2">Giriş Yap</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                © Copyright <script>
                  document.write(new Date().getFullYear())
                </script>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://ybs.deu.edu.tr" class="font-weight-bold text-white" target="_blank">Designed by DEU YBS</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="tools/logins_assets/js/core/popper.min.js"></script>
  <script src="tools/logins_assets/js/core/bootstrap.min.js"></script>
  <script src="tools/logins_assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="tools/logins_assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="tools/logins_assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>