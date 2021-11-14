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

  /* -------------------------------------------------------------------------- */
  /*                              MOSTRAR PRODUCTOS                             */
  /* -------------------------------------------------------------------------- */

  static public function ctrMostrarProductos($item, $valor) {
    $tabla = 'productos';
    $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);
    return $respuesta;
  }

  /* ------------------------ End of MOSTRAR PRODUCTOS ------------------------ */

  /* -------------------------------------------------------------------------- */
  /*                              SUBIR MULTIMEDIA                              */
  /* -------------------------------------------------------------------------- */

  static public function ctrSubirMultimedia($datos, $ruta) {

    if (isset($datos['tmp_name']) && !empty($datos['tmp_name'])) {

      /* -------------------------------------------------------------------------- */
      /*                            DEFINIMOS LAS MEDIDAS                           */
      /* -------------------------------------------------------------------------- */

      list($ancho, $alto) = getimagesize($datos['tmp_name']);
			$nuevoAncho = 1000;
			$nuevoAlto = 1000;

      /* ---------------------- End of DEFINIMOS LAS MEDIDAS ---------------------- */

      /* -------------------------------------------------------------------------- */
      /*          CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA MULTIMEDIA         */
      /* -------------------------------------------------------------------------- */

      $directorio = '../vistas/img/multimedia/'.$ruta;

      /* ---- End of CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA MULTIMEDIA ---- */

      /* -------------------------------------------------------------------------- */
      /*       PREGUNTAMOS SI EXISTE UN DIRECTORIO DE MULTIMEDIA CON ESTA RUTA      */
      /* -------------------------------------------------------------------------- */

      if (!file_exists($directorio)) { mkdir($directorio, 0755); }

      /* - End of PREGUNTAMOS SI EXISTE UN DIRECTORIO DE MULTIMEDIA CON ESTA RUTA - */

      /* -------------------------------------------------------------------------- */
      /*         DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES DE PHP        */
      /* -------------------------------------------------------------------------- */

      if ($datos['type'] == 'image/jpeg') {

        /* -------------------------------------------------------------------------- */
        /*                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO                    */
        /* -------------------------------------------------------------------------- */

        $rutaMultimedia = $directorio.'/'.$datos['name'];
        $origen = imagecreatefromjpeg($datos['tmp_name']);
        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
        imagejpeg($destino, $rutaMultimedia);

        /* --------------- End of GUARDAMOS LA IMAGEN EN EL DIRECTORIO -------------- */

      }

      if ($datos['type'] == 'image/png') {

        /* -------------------------------------------------------------------------- */
        /*                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO                    */
        /* -------------------------------------------------------------------------- */

        $rutaMultimedia = $directorio.'/'.$datos['name'];
        $origen = imagecreatefrompng($datos['tmp_name']);
        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
        imagealphablending($destino, FALSE);
        imagesavealpha($destino, TRUE);
        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
        imagepng($destino, $rutaMultimedia);

        /* --------------- End of GUARDAMOS LA IMAGEN EN EL DIRECTORIO -------------- */

      }

      return $rutaMultimedia;

      /* --- End of DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES DE PHP --- */

    }

  }

  /* ------------------------- End of SUBIR MULTIMEDIA ------------------------ */

}