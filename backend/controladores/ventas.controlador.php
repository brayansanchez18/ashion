<?php

class ControladorVentas {

  /* -------------------------------------------------------------------------- */
  /*                            MOSTRAR TOTAL VENTAS                            */
  /* -------------------------------------------------------------------------- */

  public function ctrMostrarTotalVentas() {
    $tabla = 'compras';
    $respuesta = ModeloVentas::mdlMostrarTotalVentas($tabla);
    return $respuesta;
  }

  /* ----------------------- End of MOSTRAR TOTAL VENTAS ---------------------- */

  /* -------------------------------------------------------------------------- */
  /*                               MOSTRAR VENTAS                               */
  /* -------------------------------------------------------------------------- */

  public function ctrMostrarVentas($modo) {
    $tabla = 'compras';
    $respuesta = ModeloVentas::mdlMostrarVentas($tabla, $modo);
    return $respuesta;
  }

  /* -------------------------- End of MOSTRAR VENTAS ------------------------- */

}