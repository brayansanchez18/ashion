<?php $frontend = Ruta::ctrRuta(); $backend = Ruta::ctrRutaServidor(); session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel de Control</title>
  <link rel="shortcut icon" href="vistas/img/plantilla/icono.png" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link rel="stylesheet" href="vistas/plugins/icheck/skins/square/_all.css">


  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- jQuery -->
  <script src="vistas/plugins/jquery/jquery.min.js"></script>
  <script src="vistas/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="vistas/plugins/icheck/icheck.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>
    <!-- ChartJS -->
  <script src="vistas/plugins/chart.js/Chart.min.js"></script>
</head>

<?php if (isset($_SESSION['validarSesionBackend']) && $_SESSION['validarSesionBackend'] === 'ok'): ?>
  <body class="hold-transition layout-fixed sidebar-mini sidebar-collapse layout-navbar-fixed layout-footer-fixed">
<?php else: ?>
  <body class="hold-transition login-page sidebar-mini">
<?php endif ?>

<?php

  if (isset($_SESSION['validarSesionBackend']) && $_SESSION['validarSesionBackend'] === 'ok') {

    echo '<div class="wrapper">';
      include 'modulos/header.php';
      include 'modulos/lateral.php';

      if (isset($_GET['ruta'])) {

        if ($_GET['ruta']== 'inicio' ||
            $_GET['ruta'] == 'salir' ||
            $_GET['ruta'] == 'banner' ||
            $_GET['ruta'] == 'categorias' ||
            $_GET['ruta'] == 'comercio' ||
            $_GET['ruta'] == 'mensajes' ||
            $_GET['ruta'] == 'perfil' ||
            $_GET['ruta'] == 'perfiles' ||
            $_GET['ruta'] == 'productos' ||
            $_GET['ruta'] == 'subcategorias' ||
            $_GET['ruta'] == 'usuarios' ||
            $_GET['ruta'] == 'ventas') {

          include 'modulos/'.$_GET['ruta'].'.php';

        }

      } else {
        include 'modulos/inicio.php';
      }

      include 'modulos/footer.php';
    echo '</div>';

  } else {
    include_once 'modulos/login.php';
  }

?>
  <script src="vistas/js/plantilla.js"></script>
  <script src="vistas/js/gestorComercio.js"></script>
</body>
</html>
