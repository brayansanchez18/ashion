<?php $frontend = Ruta::ctrRuta(); $backend = Ruta::ctrRutaServidor();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Ashion Template">
  <meta name="keywords" content="Ashion, unica, creative, html">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>BS E-commerce</title>

  <link rel="shortcut icon" href="<?=$frontend?>/vistas/img/icono.png" />

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
  rel="stylesheet">

  <!-- Css Styles -->
  <link rel="stylesheet" href="<?=$frontend?>vistas/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="<?=$frontend?>vistas/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?=$frontend?>vistas/css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="<?=$frontend?>vistas/css/jquery-ui.min.css" type="text/css">
  <link rel="stylesheet" href="<?=$frontend?>vistas/css/magnific-popup.css" type="text/css">
  <link rel="stylesheet" href="<?=$frontend?>vistas/css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="<?=$frontend?>vistas/css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="<?=$frontend?>vistas/css/style.css" type="text/css">
</head>
<body>
  <!-- Page Preloder -->
  <!-- <div id="preloder"><div class="loader"></div></div> -->

  <?php
    include_once 'modulos/header.php';
    include_once 'modulos/banner1.php';
    include_once 'modulos/productos.php';
    // include_once 'modulos/tienda.php';
    // include_once 'modulos/detalles-producto.php';
    include_once 'modulos/footer.php';
  ?>

  <!-- Js Plugins -->
  <script src="<?=$frontend?>vistas/js/jquery-3.3.1.min.js"></script>
  <script src="<?=$frontend?>vistas/js/bootstrap.min.js"></script>
  <script src="<?=$frontend?>vistas/js/jquery.magnific-popup.min.js"></script>
  <script src="<?=$frontend?>vistas/js/jquery-ui.min.js"></script>
  <script src="<?=$frontend?>vistas/js/mixitup.min.js"></script>
  <script src="<?=$frontend?>vistas/js/jquery.countdown.min.js"></script>
  <script src="<?=$frontend?>vistas/js/jquery.slicknav.js"></script>
  <script src="<?=$frontend?>vistas/js/owl.carousel.min.js"></script>
  <script src="<?=$frontend?>vistas/js/jquery.nicescroll.min.js"></script>
  <script src="<?=$frontend?>vistas/js/main.js"></script>
</body>
</html>