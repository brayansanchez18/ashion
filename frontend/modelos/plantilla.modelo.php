<?php

require_once "conexion.php";

class ModeloPlantilla {

  /* -------------------------------------------------------------------------- */
  /*                TRAEMOS LOS ESTILOS DINAMICOS DE LA PLANTILLA               */
  /* -------------------------------------------------------------------------- */

  static public function mdlEstiloPlantilla($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}

  /* ---------- End of TRAEMOS LOS ESTILOS DINAMICOS DE LA PLANTILLA ---------- */

}