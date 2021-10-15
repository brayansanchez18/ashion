<?php

class ControladorProductos {

  /* -------------------------------------------------------------------------- */
  /*                           MOSTRAR TOTAL PRODUCTOS                          */
  /* -------------------------------------------------------------------------- */

  static public function ctrMostrarTotalProductos($orden){
    $tabla = 'productos';
    $respuesta = ModeloProductos::mdlMostrarTotalProductos($tabla, $orden);
    return $respuesta;
  }

  /* --------------------- End of MOSTRAR TOTAL PRODUCTOS --------------------- */

}