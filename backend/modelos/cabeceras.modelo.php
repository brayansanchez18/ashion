<?php

require_once 'conexion.php';

class ModeloCabeceras {

  /* -------------------------------------------------------------------------- */
  /*                              OSTRAR CABECERAS                              */
  /* -------------------------------------------------------------------------- */

  static public function mdlMostrarCabeceras($tabla, $item, $valor) {

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

  /* ------------------------ End of MOSTRAR CABECERAS ------------------------ */

  /* -------------------------------------------------------------------------- */
  /*                               CREAR CABECERAS                              */
  /* -------------------------------------------------------------------------- */

  static public function mdlIngresarCabecera($tabla, $datos) {

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (ruta, titulo, descripcion, palabrasClaves, portada) VALUES (:ruta, :titulo, :descripcion, :palabrasClaves, :portada)");

    $stmt->bindParam(':ruta', $datos['ruta'], PDO::PARAM_STR);
    $stmt->bindParam(':titulo', $datos['titulo'], PDO::PARAM_STR);
    $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
    $stmt->bindParam(':palabrasClaves', $datos['palabrasClaves'], PDO::PARAM_STR);
    $stmt->bindParam(':portada', $datos['imgPortada'], PDO::PARAM_STR);

    if ($stmt->execute()) {
      return 'ok';
    } else {
      return 'error';
    }

    $stmt->close();
    $stmt = null;

  }

  /* ------------------------- End of CREAR CABECERAS ------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                              EDITAR CABECERAS                              */
  /* -------------------------------------------------------------------------- */

  static public function mdlEditarCabecera($tabla, $datos) {

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ruta = :ruta, titulo = :titulo, descripcion = :descripcion, palabrasClaves = :palabrasClaves, portada = :portada WHERE id = :id");

    $stmt->bindParam(':ruta', $datos['ruta'], PDO::PARAM_STR);
    $stmt->bindParam(':titulo', $datos['titulo'], PDO::PARAM_STR);
    $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
    $stmt->bindParam(':palabrasClaves', $datos['palabrasClaves'], PDO::PARAM_STR);
    $stmt->bindParam(':portada', $datos['imgPortada'], PDO::PARAM_STR);
    $stmt -> bindParam(':id', $datos['idCabecera'], PDO::PARAM_INT);

    if ($stmt->execute()) {
      return 'ok';
    } else {
      return 'error';
    }

    $stmt->close();
    $stmt = null;

  }

  /* ------------------------- End of EDITAR CABECERAS ------------------------ */

  /* -------------------------------------------------------------------------- */
  /*                              ELIMINAR CABECERA                             */
  /* -------------------------------------------------------------------------- */

  static public function mdlEliminarCabecera($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE ruta = :ruta");
    $stmt -> bindParam(':ruta', $datos, PDO::PARAM_STR);

    if ($stmt -> execute()) {
      return 'ok';
    } else {
      return 'error';
    }

    $stmt -> close();
    $stmt = null;

  }

  /* ------------------------ End of ELIMINAR CABECERA ------------------------ */
}