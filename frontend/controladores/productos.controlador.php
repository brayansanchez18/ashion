<?php

class ControladorProductos {

  /* -------------------------------------------------------------------------- */
  /*                             MOSTRAR CATEGORIAS                             */
  /* -------------------------------------------------------------------------- */

  static public function ctrMostrarCategorias($item, $valor) {
    $tabla = 'categorias';
    $respuesta = ModeloProductos::mdlMostrarCategorias($tabla, $item, $valor);
    return $respuesta;
  }

  /* ------------------------ End of MOSTRAR CATEGORIAS ----------------------- */

  /* -------------------------------------------------------------------------- */
  /*                           MOSTRAR SUB CATEGORIAS                           */
  /* -------------------------------------------------------------------------- */

  static public function ctrMostrarSubCategorias($item, $valor) {
    $tabla = 'subcategorias';
    $respuesta = ModeloProductos::mdlMostrarSubCategorias($tabla, $item, $valor);
    return $respuesta;
  }

  /* ---------------------- End of MOSTRAR SUB CATEGORIAS --------------------- */

  /* -------------------------------------------------------------------------- */
  /*                              MOSTRAR PRODUCTOS                             */
  /* -------------------------------------------------------------------------- */

  static public function ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo){
    $tabla = 'productos';
    $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $ordenar, $item, $valor, $base, $tope, $modo);
    return $respuesta;
  }

  /* ------------------------ End of MOSTRAR PRODUCTOS ------------------------ */

  /* -------------------------------------------------------------------------- */
  /*                            MOSTRAR INFO PRODUCTO                           */
  /* -------------------------------------------------------------------------- */

  static public function ctrMostrarInfoproducto($item, $valor) {
    $tabla = 'productos';
    $respuesta = ModeloProductos::mdlMostrarInfoProducto($tabla, $item, $valor);
    return $respuesta;
  }

  /* ---------------------- End of MOSTRAR INFO PRODUCTO ---------------------- */

  /* -------------------------------------------------------------------------- */
  /*                              LISTAR PRODUCTOS                              */
  /* -------------------------------------------------------------------------- */

  static public function ctrListarProductos($ordenar, $item, $valor) {
    $tabla = 'productos';
    $respuesta = ModeloProductos::mdlListarProductos($tabla, $ordenar, $item, $valor);
    return $respuesta;
  }

  /* ------------------------- End of LISTAR PRODUCTOS ------------------------ */

}