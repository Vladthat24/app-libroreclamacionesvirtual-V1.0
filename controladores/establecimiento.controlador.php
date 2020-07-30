<?php

class ControladorEstablecimiento{


	/*=============================================
	MOSTRAR ESTABLECIMIENTO
	=============================================*/

	static public function ctrMostrarEstablecimiento($item, $valor){

		$tabla = "tap_establecimiento";

		$respuesta = ModeloEstablecimiento::mdlMostrarEstablecimiento($tabla, $item, $valor);

		return $respuesta;
	
	}


}
