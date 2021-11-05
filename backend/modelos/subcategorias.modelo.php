<?php

require_once 'conexion.php';

class ModeloSubCategorias {

  /* -------------------------------------------------------------------------- */
  /*                          ACTUALIZAR SUBCATEGORIAS                          */
  /* -------------------------------------------------------------------------- */

  static public function mdlActualizarSubCategorias($tabla, $item1, $valor1, $item2, $valor2) {

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
    $stmt -> bindParam(':'.$item1, $valor1, PDO::PARAM_STR);
    $stmt -> bindParam(':'.$item2, $valor2, PDO::PARAM_STR);

    if ($stmt -> execute()) {
      return 'ok';
    } else {
      return 'error';
    }

    $stmt -> close();
    $stmt = null;

  }

  /* --------------------- End of ACTUALIZAR SUBCATEGORIAS -------------------- */

  /* -------------------------------------------------------------------------- */
  /*                       ACTUALIZAR OFERTA SUBCATEGORIAS                      */
  /* -------------------------------------------------------------------------- */

  static public function mdlActualizarOfertaSubcategorias($tabla, $datos, $ofertadoPor) {

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $ofertadoPor = :$ofertadoPor, oferta = :oferta, precioOferta = :precioOferta, descuentoOferta = :descuentoOferta, finOferta = :finOferta WHERE id_categoria = :id_categoria");

    $stmt->bindParam(':'.$ofertadoPor, $datos['oferta'], PDO::PARAM_STR);
    $stmt->bindParam(':oferta', $datos['oferta'], PDO::PARAM_STR);
    $stmt->bindParam(':precioOferta', $datos['precioOferta'], PDO::PARAM_STR);
    $stmt->bindParam(':descuentoOferta', $datos['descuentoOferta'], PDO::PARAM_STR);
    $stmt->bindParam(':finOferta', $datos['finOferta'], PDO::PARAM_STR);
    $stmt -> bindParam(':id_categoria', $datos['id'], PDO::PARAM_INT);

    if ($stmt->execute()) {
      return 'ok';
    }else{
      return 'error';
    }

    $stmt->close();
    $stmt = null;

  }

  /* ----------------- End of ACTUALIZAR OFERTA SUBCATEGORIAS ----------------- */

  /* -------------------------------------------------------------------------- */
  /*                            MOSTRAR SUBCATEGORIAS                           */
  /* -------------------------------------------------------------------------- */

  static public function mdlMostrarSubCategorias($tabla, $item, $valor) {

    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
      $stmt -> bindParam(':'.$item, $valor, PDO::PARAM_STR);
      $stmt -> execute();
      return $stmt -> fetchAll();
    } else {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
      $stmt -> execute();
      return $stmt -> fetchAll();
    }

    $stmt -> close();
    $stmt = null;

  }

  /* ---------------------- End of MOSTRAR SUBCATEGORIAS ---------------------- */

}