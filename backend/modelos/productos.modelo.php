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

  /* -------------------------------------------------------------------------- */
  /*                            ACTUALIZAR PRODUCTOS                            */
  /* -------------------------------------------------------------------------- */

  static public function mdlActualizarProductos($tabla, $item1, $valor1, $item2, $valor2) {

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

  /* ----------------------- End of ACTUALIZAR PRODUCTOS ---------------------- */

  /* -------------------------------------------------------------------------- */
  /*                         ACTUALIZAR OFERTA PRODUCTOS                        */
  /* -------------------------------------------------------------------------- */

  static public function mdlActualizarOfertaProductos($tabla, $datos, $ofertadoPor, $precioOfertaActualizado, $descuentoOfertaActualizado, $idOferta) {

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $ofertadoPor = :$ofertadoPor, oferta = :oferta, precioOferta = :precioOferta, descuentoOferta = :descuentoOferta, finOferta = :finOferta WHERE id = :id");

    $stmt->bindParam(':'.$ofertadoPor, $datos['oferta'], PDO::PARAM_STR);
    $stmt->bindParam(':oferta', $datos['oferta'], PDO::PARAM_STR);
    $stmt->bindParam(':precioOferta', $precioOfertaActualizado, PDO::PARAM_STR);
    $stmt->bindParam(':descuentoOferta', $descuentoOfertaActualizado, PDO::PARAM_STR);
    $stmt->bindParam(':finOferta', $datos['finOferta'], PDO::PARAM_STR);
    $stmt -> bindParam(':id', $idOferta, PDO::PARAM_INT);

    if ($stmt->execute()) {
      return 'ok';
    } else {
      return 'error';
    }

    $stmt->close();
    $stmt = null;

  }

  /* ------------------- End of ACTUALIZAR OFERTA PRODUCTOS ------------------- */

  /* -------------------------------------------------------------------------- */
  /*                              MOSTRAR PRODUCTOS                             */
  /* -------------------------------------------------------------------------- */

  static public function mdlMostrarProductos($tabla, $item, $valor) {

    if ($item != null) {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
      $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
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

  /* ------------------------ End of MOSTRAR PRODUCTOS ------------------------ */

}