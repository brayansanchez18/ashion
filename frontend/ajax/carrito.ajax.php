<?php

require_once '../extensiones/paypal/paypal.controlador.php';

require_once '../controladores/carrito.controlador.php';
require_once '../modelos/carrito.modelo.php';

require_once '../controladores/productos.controlador.php';
require_once '../modelos/productos.modelo.php';

class AjaxCarrito {

  /* -------------------------------------------------------------------------- */
  /*                                METODO PAYAPL                               */
  /* -------------------------------------------------------------------------- */

  public $divisa;
	public $total;
	// public $totalEncriptado;
	public $impuesto;
	public $envio;
	public $subtotal;
	public $tituloArray;
	public $cantidadArray;
	public $valorItemArray;
	public $idProductoArray;

  public function ajaxEnviarPaypal() {

    $datos = array(
      "divisa"=>$this->divisa,
      "total"=>$this->total,
      "impuesto"=>$this->impuesto,
      "envio"=>$this->envio,
      "subtotal"=>$this->subtotal,
      "tituloArray"=>$this->tituloArray,
      "cantidadArray"=>$this->cantidadArray,
      "valorItemArray"=>$this->valorItemArray,
      "idProductoArray"=>$this->idProductoArray,
    );

    $respuesta = Paypal::mdlPagoPaypal($datos);

    echo $respuesta;

  }

  /* -------------------------- End of METODO PAYAPL -------------------------- */

}

/* -------------------------------------------------------------------------- */
/*                                METODO PAYPAL                               */
/* -------------------------------------------------------------------------- */

if (isset($_POST['divisa'])) {

  $paypal = new AjaxCarrito();
	$paypal -> divisa = $_POST['divisa'];
	$paypal -> total = $_POST['total'];
	// $paypal -> totalEncriptado = $_POST["totalEncriptado"];
	$paypal -> impuesto = $_POST['impuesto'];
	$paypal -> envio = $_POST['envio'];
	$paypal -> subtotal = $_POST['subtotal'];
	$paypal -> tituloArray = $_POST['tituloArray'];
	$paypal -> cantidadArray = $_POST['cantidadArray'];
	$paypal -> valorItemArray = $_POST['valorItemArray'];
	$paypal -> idProductoArray = $_POST['idProductoArray'];

	$paypal -> ajaxEnviarPaypal();

}

/* -------------------------- End of METODO PAYPAL -------------------------- */