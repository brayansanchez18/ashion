<?php

require_once 'controladores/plantilla.controlador.php';
require_once 'controladores/productos.controlador.php';
require_once 'controladores/banner.controlador.php';
require_once 'modelos/productos.modelo.php';
require_once 'modelos/banner.modelo.php';
require_once 'controladores/rutas.php';

$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();