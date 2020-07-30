<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/reclamo.controlador.php";
require_once "controladores/distrito.controlador.php";
require_once "controladores/establecimiento.controlador.php";


require_once "modelos/establecimiento.modelo.php";
require_once "modelos/reclamo.modelo.php";
require_once "modelos/distrito.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();