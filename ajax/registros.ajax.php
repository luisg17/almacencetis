<?php

require_once "../controladores/registros.controlador.php";
require_once "../modelos/registros.modelo.php";

class AjaxRegistros{

	/*=============================================
	EDITAR Registros
	=============================================*/	

	public $idRegistro;

	public function ajaxEditarRegistro(){

		$item = "id";
		$valor = $this->idRegistro;

		$respuesta = ControladorRegistros::ctrMostrarRegistros($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR REGISTROS
=============================================*/	
if(isset($_POST["idRegistro"])){

	$registro = new AjaxRegistros();
	$registro -> idRegistro = $_POST["idRegistro"];
	$registro -> ajaxEditarRegistro();
}
