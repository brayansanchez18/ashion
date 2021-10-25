<?php

require_once 'conexion.php';

class ModeloComercio {

	/* -------------------------------------------------------------------------- */
	/*                            SELECCIONAR PLANTILLA                           */
	/* -------------------------------------------------------------------------- */

	static public function mdlSeleccionarPlantilla($tabla) {
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}

  /* ---------------------- End of SELECCIONAR PLANTILLA ---------------------- */

	/* -------------------------------------------------------------------------- */
	/*                           ACTUALIZAR LOGO O ICONO                          */
	/* -------------------------------------------------------------------------- */

	static public function mdlActualizarLogoIcono($tabla, $id, $item, $valor) {

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE id = :id");
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}

	/* --------------------- End of ACTUALIZAR LOGO O ICONO --------------------- */

}