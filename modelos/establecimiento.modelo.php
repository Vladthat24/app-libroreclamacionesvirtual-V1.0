<?php

require_once "conexion.php";

class ModeloEstablecimiento{

	/*=============================================
	CREAR DISTRITO
	=============================================*/

	static public function mdlIngresarEstablecimiento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(establecimiento) VALUES (:establecimiento)");

		$stmt->bindParam(":establecimiento", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR DISTRITO
	=============================================*/

	static public function mdlMostrarEstablecimiento($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR DISTRITO
	=============================================*/

	static public function mdlEditarEstablecimiento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET establecimiento = :establecimiento WHERE id = :id");

		$stmt -> bindParam(":establecimiento", $datos["establecimiento"], PDO::PARAM_STR);
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
	BORRAR DISTRITO
	=============================================*/

	static public function mdlBorrarEstablecimiento($tabla, $datos){

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

