<?php

require_once "../controladores/presentaciones.controlador.php";
require_once "../modelos/presentaciones.modelo.php";

class AjaxPresentaciones{

	/*=============================================
	EDITAR PRESENTACIONES
	=============================================*/	

	public $idPresentacion;

	public function ajaxEditarPresentacion(){

		$item = "id";
		$valor = $this->idPresentacion;

		$respuesta = ControladorPresentaciones::ctrMostrarPresentaciones($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR PRESENTACION
=============================================*/	
if(isset($_POST["idPresentacion"])){

	$presentacion = new AjaxPresentaciones();
	$presentacion -> idPresentacion = $_POST["idPresentacion"];
	$presentacion -> ajaxEditarPresentacion();
}
