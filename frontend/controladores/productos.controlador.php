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

}