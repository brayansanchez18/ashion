<?php

require_once 'conexion.php';

class ModeloProductos {

  /* -------------------------------------------------------------------------- */
  /*                             MOSTRAR CATEGORIAS                             */
  /* -------------------------------------------------------------------------- */

  static public function mdlMostrarCategorias($tabla, $item, $valor) {

    if ($item != null) {

      $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE $item = :$item");
      $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
      $stmt -> execute();
      return $stmt -> fetch();

    } else {

			$stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt -> fetchAll();

		}

		$stmt -> close();
		$stmt = null;

	}

  /* ------------------------ End of MOSTRAR CATEGORIAS ----------------------- */

  /* -------------------------------------------------------------------------- */
  /*                           MOSTRAR SUB CATEGORIAS                           */
  /* -------------------------------------------------------------------------- */

  static public function mdlMostrarSubCategorias($tabla, $item, $valor) {

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetchAll();

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt -> fetchAll();

		}

		$stmt -> close();
		$stmt = null;

	}

  /* ---------------------- End of MOSTRAR SUB CATEGORIAS --------------------- */

	/* -------------------------------------------------------------------------- */
	/*                              MOSTRAR PRODUCTOS                             */
	/* -------------------------------------------------------------------------- */

	static public function mdlMostrarProductos($tabla, $ordenar, $item, $valor, $base, $tope, $modo){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND estado = 1 ORDER BY $ordenar $modo LIMIT $base, $tope");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 1 ORDER BY $ordenar $modo LIMIT $base, $tope");
			$stmt -> execute();
			return $stmt -> fetchAll();

		}

		$stmt -> close();
		$stmt = null;

	}

	/* ------------------------ End of MOSTRAR PRODUCTOS ------------------------ */

	/* -------------------------------------------------------------------------- */
	/*                           MOSTRAR INFO PRODUCTOS                           */
	/* -------------------------------------------------------------------------- */

	static public function mdlMostrarInfoProducto($tabla, $item, $valor) {

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt ->fetch();
		$stmt -> close();
		$stmt = null;

	}

	/* ---------------------- End of MOSTRAR INFO PRODUCTOS --------------------- */

	/* -------------------------------------------------------------------------- */
	/*                              LISTAR PRODUCTOS                              */
	/* -------------------------------------------------------------------------- */

	static public function mdlListarProductos($tabla, $ordenar, $item, $valor) {
		if ($item != null) {
			$stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $ordenar DESC");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetchAll();
		} else {
			$stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla ORDER BY $ordenar DESC");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;

	}

	/* ------------------------- End of LISTAR PRODUCTOS ------------------------ */

	/* -------------------------------------------------------------------------- */
	/*                                  BUSCADOR                                  */
	/* -------------------------------------------------------------------------- */

	static public function mdlBuscarProductos($tabla, $busqueda, $ordenar, $modo, $base, $tope){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta like '%$busqueda%' OR titulo like '%$busqueda%' OR titular like '%$busqueda%' OR descripcion like '%$busqueda%' ORDER BY $ordenar $modo LIMIT $base, $tope");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

	/* ----------------------------- End of BUSCADOR ---------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                          LISTAR PRODUCTOS BUSCADOR                         */
	/* -------------------------------------------------------------------------- */

	static public function mdlListarProductosBusqueda($tabla, $busqueda){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta like '%$busqueda%' OR titulo like '%$busqueda%' OR titular like '%$busqueda%' OR descripcion like '%$busqueda%'");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

	/* -------------------- End of LISTAR PRODUCTOS BUSCADOR -------------------- */

}