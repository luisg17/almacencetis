<?php

require_once "conexion.php";

class ModeloPresentaciones{

	/*=============================================
	CREAR Presentacion
	=============================================*/

	static public function mdlIngresarPresentacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(presentacion) VALUES (:presentacion)");

		$stmt->bindParam(":presentacion", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR PRESENTACIONES
	=============================================*/

	static public function mdlMostrarPresentacion($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR PRESENTACION
	=============================================*/

	static public function mdlEditarPresentacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET presentacion = :presentacion WHERE id = :id");

		$stmt -> bindParam(":presentacion", $datos["presentacion"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR PRESENTACION
	=============================================*/

	static public function mdlBorrarPresentacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

