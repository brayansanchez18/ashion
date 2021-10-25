<?php

require_once '../controladores/comercio.controlador.php';
require_once '../modelos/comercio.modelo.php';

class AjaxComercio {

  /* -------------------------------------------------------------------------- */
  /*                              CAMBIAR LOGOTIPO                              */
  /* -------------------------------------------------------------------------- */

  public $imagenLogo;

	public function ajaxCambiarLogotipo() {
		$item = 'logo';
		$valor = $this->imagenLogo;
		$respuesta = ControladorComercio::ctrActualizarLogoIcono($item, $valor);
		echo $respuesta;
	}

  /* ------------------------- End of CAMBIAR LOGOTIPO ------------------------ */

  /* -------------------------------------------------------------------------- */
  /*                                CAMBIAR ICONO                               */
  /* -------------------------------------------------------------------------- */

  public $imagenIcono;

	public function ajaxCambiarIcono() {
		$item = 'icono';
		$valor = $this->imagenIcono;
		$respuesta = ControladorComercio::ctrActualizarLogoIcono($item, $valor);
		echo $respuesta;
	}

  /* -------------------------- End of CAMBIAR ICONO -------------------------- */

}

/* -------------------------------------------------------------------------- */
/*                              CAMBIAR LOGOTIPO                              */
/* -------------------------------------------------------------------------- */

if (isset($_FILES['imagenLogo'])) {
	$logotipo = new AjaxComercio();
	$logotipo -> imagenLogo = $_FILES['imagenLogo'];
	$logotipo -> ajaxCambiarLogotipo();
}

/* ------------------------- End of CAMBIAR LOGOTIPO ------------------------ */

/* -------------------------------------------------------------------------- */
/*                                CAMBIAR ICONO                               */
/* -------------------------------------------------------------------------- */

if (isset($_FILES['imagenIcono'])) {
	$icono = new AjaxComercio();
	$icono -> imagenIcono = $_FILES['imagenIcono'];
	$icono -> ajaxCambiarIcono();
}

/* -------------------------- End of CAMBIAR ICONO -------------------------- */