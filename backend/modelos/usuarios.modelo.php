<?php

require_once 'conexion.php';

class ModeloUsuarios {

  /* -------------------------------------------------------------------------- */
  /*                        MOSTRAR EL TOTAL DE USUARIOS                        */
  /* -------------------------------------------------------------------------- */

  static public function mdlMostrarTotalUsuarios($tabla, $orden) {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");
    $stmt -> execute();
    return $stmt -> fetchAll();
    $stmt-> close();
    $stmt = null;
  }

  /* ------------------- End of MOSTRAR EL TOTAL DE USUARIOS ------------------ */

  /* -------------------------------------------------------------------------- */
  /*                              MOSTRAR USUARIOS                              */
  /* -------------------------------------------------------------------------- */

  static public function mdlMostrarUsuarios($tabla, $item, $valor) {

    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
      $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
      $stmt -> execute();
      return $stmt -> fetch();
    } else {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
      $stmt -> execute();
      return $stmt -> fetchAll();
    }

    $stmt -> close();
    $stmt = null;

  }

  /* ------------------------- End of MOSTRAR USUARIOS ------------------------ */

}