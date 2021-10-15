<?php

require_once 'conexion.php';

class ModeloProductos {

  /* -------------------------------------------------------------------------- */
  /*                           MOSTRAR TOTAL PRODUCTOS                          */
  /* -------------------------------------------------------------------------- */

  static public function mdlMostrarTotalProductos($tabla, $orden) {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");
    $stmt -> execute();
    return $stmt -> fetchAll();
    $stmt-> close();
    $stmt = null;
  }

  /* --------------------- End of MOSTRAR TOTAL PRODUCTOS --------------------- */

}