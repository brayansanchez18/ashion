<?php

require_once '../controladores/productos.controlador.php';
require_once '../controladores/categorias.controlador.php';
require_once '../controladores/subcategorias.controlador.php';
require_once '../controladores/cabeceras.controlador.php';
require_once '../modelos/productos.modelo.php';
require_once '../modelos/categorias.modelo.php';
require_once '../modelos/subcategorias.modelo.php';
require_once '../modelos/cabeceras.modelo.php';

class AjaxProductos {

  /* -------------------------------------------------------------------------- */
  /*                              ACTIVAR PRODUCTOS                             */
  /* -------------------------------------------------------------------------- */

  public $activarProducto;
  public $activarId;

  public function ajaxActivarProducto() {
    $tabla = 'productos';
    $item1 = 'estado';
    $valor1 = $this->activarProducto;
    $item2 = 'id';
    $valor2 = $this->activarId;
    $respuesta = ModeloProductos::mdlActualizarProductos($tabla, $item1, $valor1, $item2, $valor2);
    echo $respuesta;
  }

  /* ------------------------ End of ACTIVAR PRODUCTOS ------------------------ */

}

/* -------------------------------------------------------------------------- */
/*                              ACTIVAR PRODUCTOS                             */
/* -------------------------------------------------------------------------- */

if (isset($_POST['activarProducto'])) {
  $activarProducto = new AjaxProductos();
  $activarProducto -> activarProducto = $_POST['activarProducto'];
  $activarProducto -> activarId = $_POST['activarId'];
  $activarProducto -> ajaxActivarProducto();
}

/* ------------------------ End of ACTIVAR PRODUCTOS ------------------------ */