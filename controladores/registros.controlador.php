<?php

class ControladorRegistros{

	/*=============================================
	CREAR REGISTROS
	=============================================*/

	static public function ctrCrearRegistro(){

		if(isset($_POST["nuevoregistro"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoRegistro"])){

				$tabla = "registro";

				$datos = $_POST["nuevoRegistro"];

				$respuesta = ModeloRegistros::mdlIngresarRegistro($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El registro ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "registros";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El registro no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "registros";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR REGISTROS
	=============================================*/

	static public function ctrMostrarRegistros($item, $valor){

		$tabla = "registro";

		$respuesta = ModeloRegistros::mdlMostrarRegistro($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR Registro
	=============================================*/

	static public function ctrEditarRegistro(){

		if(isset($_POST["editarRegistro"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarRegistro"])){

				$tabla = "registro";

				$datos = array("registro"=>$_POST["editarRegistro"],
							   "id"=>$_POST["idRegistro"]);

				$respuesta = ModeloRegistros::mdlEditarRegistro($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El registro ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "registros";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El registro no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "registros";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR REGISTROS
	=============================================*/

	static public function ctrBorrarRegistro(){

		if(isset($_GET["idRegistro"])){

			$tabla ="registro";
			$datos = $_GET["idRegistro"];

			$respuesta = ModeloRegistros::mdlBorrarRegistro($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El registro ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "registros";

									}
								})

					</script>';
			}
		}
		
	}
}
