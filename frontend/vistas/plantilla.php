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

    $rutas = array();
    $ruta = null;
    $infoProductos = null;

    if (isset($_GET['ruta'])) {

      $rutas = explode('/', $_GET['ruta']);

      $item = "ruta";
      $valor = $rutas[0];

      $rutaCategorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

      if (is_array($rutaCategorias) && $valor == $rutaCategorias['ruta'] && $rutaCategorias['estado'] == 1) {
        $ruta = $valor;
      }

      $rutaSubCategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);

      foreach ($rutaSubCategorias as $key => $value) {
        if (is_array($value) && $valor == $value['ruta'] && $value['estado'] == 1) {
          $ruta = $valor;
        }
      }

      $rutaProductos = ControladorProductos::ctrMostrarInfoproducto($item, $valor);

      if (is_array($rutaProductos) && $rutas[0] == $rutaProductos['ruta'] && $rutaProductos['estado'] == 1) {
        $infoProductos = $valor;
      }

      if ($ruta != null || $rutas[0] == 'articulos-recientes' || $rutas[0] == 'lo-mas-vendido' || $rutas[0] == 'lo-mas-visto') {
        include 'modulos/productos2.php';
      }
      else if ($infoProductos != null) {
        include_once 'modulos/detalles-producto.php';
      }
      else if ($rutas[0] == 'buscador' || $rutas[0] == 'verificar' || $rutas[0] == 'salir' || $rutas[0] == 'perfil' || $rutas[0] == 'carrito-de-compras' || $rutas[0] == 'error' || $rutas[0] == 'finalizar-compra' || $rutas[0] == 'ofertas' || $rutas[0] == 'cancelado' || $rutas[0] == 'tienda') {
        include 'modulos/'.$rutas[0].'.php';
      }
      else if ($rutas[0] == 'inicio') {
        include_once 'modulos/banner1.php';
        include_once 'modulos/productos.php';
      }
      else {
        include 'modulos/error404.php';
      }

    } else {
      include_once 'modulos/banner1.php';
      include_once 'modulos/productos.php';
    }

    include_once 'modulos/footer.php';
  ?>

  <input type="hidden" value="<?=$frontend?>" id="rutaOculta">

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
  <script src="<?=$frontend?>vistas/js/buscador.js"></script>
  <script src="<?=$frontend?>vistas/js/infoproducto.js"></script>
</body>
</html>