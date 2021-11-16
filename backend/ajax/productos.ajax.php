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

  /* -------------------------------------------------------------------------- */
  /*                         VALIDAR NO REPETIR PRODUCTO                        */
  /* -------------------------------------------------------------------------- */

  public $validarProducto;

  public function ajaxValidarProducto() {
    $item = 'titulo';
    $valor = $this->validarProducto;
    $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);
    echo json_encode($respuesta);
  }

  /* ------------------- End of VALIDAR NO REPETIR PRODUCTO ------------------- */

  /* -------------------------------------------------------------------------- */
  /*                             RECIBIR MULTIMEDIA                             */
  /* -------------------------------------------------------------------------- */

  public $imagenMultimedia;
  public $rutaMultimedia;

  public function  ajaxRecibirMultimedia() {
    $datos = $this->imagenMultimedia;
    $ruta = $this->rutaMultimedia;
    $respuesta = ControladorProductos::ctrSubirMultimedia($datos, $ruta);
    echo $respuesta;
  }

  /* ------------------------ End of RECIBIR MULTIMEDIA ----------------------- */

  /* -------------------------------------------------------------------------- */
  /*                     GUARDAR PRODUCTO Y EDITAR PRODUCTO                     */
  /* -------------------------------------------------------------------------- */

  public $tituloProducto;
  public $rutaProducto;
  public $detalles;
  public $seleccionarCategoria;
  public $seleccionarSubCategoria;
  public $descripcionProducto;
  public $pClavesProducto;
  public $precio;
  public $peso;
  public $entrega;
  public $stock;
  public $multimedia;
  public $fotoPortada;
  public $fotoPrincipal;
  public $selActivarOferta;
  public $precioOferta;
  public $descuentoOferta;
  public $finOferta;

  public function  ajaxCrearProducto() {

    $datos = array(
      'tituloProducto'=>$this->tituloProducto,
      'rutaProducto'=>$this->rutaProducto,
      'detalles'=>$this->detalles,
      'categoria'=>$this->seleccionarCategoria,
      'subCategoria'=>$this->seleccionarSubCategoria,
      'descripcionProducto'=>$this->descripcionProducto,
      'pClavesProducto'=>$this->pClavesProducto,
      'precio'=>$this->precio,
      'peso'=>$this->peso,
      'entrega'=>$this->entrega,
      'stock'=>$this->stock,
      'multimedia'=>$this->multimedia,
      'fotoPortada'=>$this->fotoPortada,
      'fotoPrincipal'=>$this->fotoPrincipal,
      'selActivarOferta'=>$this->selActivarOferta,
      'precioOferta'=>$this->precioOferta,
      'descuentoOferta'=>$this->descuentoOferta,
      'finOferta'=>$this->finOferta
    );

    $respuesta = ControladorProductos::ctrCrearProducto($datos);
    echo $respuesta;

  }

  /* ---------------- End of GUARDAR PRODUCTO Y EDITAR PRODUCTO --------------- */

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

/* -------------------------------------------------------------------------- */
/*                         VALIDAR NO REPETIR PRODUCTO                        */
/* -------------------------------------------------------------------------- */

if (isset($_POST['validarProducto'])) {
  $valProducto = new AjaxProductos();
  $valProducto -> validarProducto = $_POST['validarProducto'];
  $valProducto -> ajaxValidarProducto();
}

/* ------------------- End of VALIDAR NO REPETIR PRODUCTO ------------------- */

/* -------------------------------------------------------------------------- */
/*                             RECIBIR MULTIMEDIA                             */
/* -------------------------------------------------------------------------- */

if (isset($_FILES['file'])) {
  $multimedia = new AjaxProductos();
  $multimedia -> imagenMultimedia = $_FILES['file'];
  $multimedia -> rutaMultimedia = $_POST['ruta'];
  $multimedia -> ajaxRecibirMultimedia();
}

/* ------------------------ End of RECIBIR MULTIMEDIA ----------------------- */

/* -------------------------------------------------------------------------- */
/*                     GUARDAR PRODUCTO Y EDITAR PRODUCTO                     */
/* -------------------------------------------------------------------------- */

if (isset($_POST['tituloProducto'])) {

  $producto = new AjaxProductos();
  $producto -> tituloProducto = $_POST['tituloProducto'];
  $producto -> rutaProducto = $_POST['rutaProducto'];
  $producto -> detalles = $_POST['detalles'];
  $producto -> seleccionarCategoria = $_POST['seleccionarCategoria'];
  $producto -> seleccionarSubCategoria = $_POST['seleccionarSubCategoria'];
  $producto -> descripcionProducto = $_POST['descripcionProducto'];
  $producto -> pClavesProducto = $_POST['pClavesProducto'];
  $producto -> precio = $_POST['precio'];
  $producto -> peso = $_POST['peso'];
  $producto -> entrega = $_POST['entrega'];
  $producto -> stock = $_POST['stock'];
  $producto -> multimedia = $_POST['multimedia'];

  if (isset($_FILES['fotoPortada'])) {
    $producto -> fotoPortada = $_FILES['fotoPortada'];
  } else {
    $producto -> fotoPortada = null;
  }

  if (isset($_FILES['fotoPrincipal'])) {
    $producto -> fotoPrincipal = $_FILES['fotoPrincipal'];
  } else {
    $producto -> fotoPrincipal = null;
  }

  $producto -> selActivarOferta = $_POST['selActivarOferta'];
  $producto -> precioOferta = $_POST['precioOferta'];
  $producto -> descuentoOferta = $_POST['descuentoOferta'];
  $producto -> finOferta = $_POST['finOferta'];
  $producto -> ajaxCrearProducto();

}

/* ---------------- End of GUARDAR PRODUCTO Y EDITAR PRODUCTO --------------- */