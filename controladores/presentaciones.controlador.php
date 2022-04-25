<?php

class ControladorPresentaciones{

	/*=============================================
	CREAR PRESENTACION
	=============================================*/

	static public function ctrCrearPresentacion(){

		if(isset($_POST["nuevaPresentacion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaPresentacion"])){

				$tabla = "presentacion";

				$datos = $_POST["nuevaPresentacion"];

				$respuesta = ModeloPresentaciones::mdlIngresarPresentacion($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "presentaciones";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "presentaciones";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR PRESENTACIONES
	=============================================*/

	static public function ctrMostrarPresentaciones($item, $valor){

		$tabla = "presentacion";

		$respuesta = ModeloPresentaciones::mdlMostrarPresentacion($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR PRESENTACION
	=============================================*/

	static public function ctrEditarPresentacion(){

		if(isset($_POST["editarPresentacion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPresentacion"])){

				$tabla = "presentacion";

				$datos = array("presentacion"=>$_POST["editarPresentacion"],
							   "id"=>$_POST["idPresentacion"]);

				$respuesta = ModeloPresentaciones::mdlEditarPresentacion($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La presentacion ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "presentaciones";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La presentacion no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "presentaciones";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR PRESENTACION
	=============================================*/

	static public function ctrBorrarPresentacion(){

		if(isset($_GET["idPresentacion"])){

			$tabla ="presentacion";
			$datos = $_GET["idPresentacion"];

			$respuesta = ModeloPresentaciones::mdlBorrarPresentacion($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La presentación ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "presentaciones";

									}
								})

					</script>';
			}
		}
		
	}
}
