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

	/* -------------------------------------------------------------------------- */
	/*                           CAMBIAR REDES SOCIALES                           */
	/* -------------------------------------------------------------------------- */

	public $redesSociales;

	public function ajaxCambiarRedes() {
		$item = 'redesSociales';
		$valor = $this->redesSociales;
		$respuesta = ControladorComercio::ctrActualizarLogoIcono($item, $valor);
		echo $respuesta;
	}

	/* ---------------------- End of CAMBIAR REDES SOCIALES --------------------- */

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

/* -------------------------------------------------------------------------- */
/*                           CAMBIAR REDES SOCIALES                           */
/* -------------------------------------------------------------------------- */

if (isset($_POST["redesSociales"])) {
	$redesSociales = new AjaxComercio();
	$redesSociales -> redesSociales = $_POST["redesSociales"];
	$redesSociales -> ajaxCambiarRedes();
}

/* ---------------------- End of CAMBIAR REDES SOCIALES --------------------- */