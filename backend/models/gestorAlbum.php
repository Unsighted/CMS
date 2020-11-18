<?php

require_once "conexion.php";

class GestorAlbumModel{

	#SUBIR LA RUTA DE LA IMAGEN
	#------------------------------------------------------------
	public function subirImagenAlbumModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (ruta) VALUES (:ruta)");

		$stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}
		else{

			return "error";
		}

		$stmt->close();
	}

	#SELECCIONAR LA RUTA DE LA IMAGEN
	#------------------------------------------------------------
	public function mostrarImagenAlbumModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT ruta FROM $tabla WHERE ruta = :ruta");

		$stmt -> bindParam(":ruta", $datos, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}

	#MOSTRAR IMAGEN EN LA VISTA
	#---------------------------------------------------------
	public function mostrarImagenVistaModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, ruta FROM $tabla ORDER BY orden ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}


		#MOSTRAR IMAGEN DEL ALBUM
		#---------------------------------------------------------
		public function mostrarImgAlbumModel($datos,$tabla){

			$stmt = Conexion::conectar()->prepare("SELECT ruta FROM $tabla WHERE id = :id");

			$stmt -> bindParam(":id", $datos["img"], PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt -> close();

		}

	#ELIMINAR ITEM DEL ALBUM
	#-----------------------------------------------------------

	public function eliminarAlbumModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos["idAlbum"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#ACTUALIZAR ORDEN
	#---------------------------------------------------

	public function actualizarOrdenModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET orden = :orden WHERE id = :id");

		$stmt -> bindParam(":orden", $datos["ordenItem"], PDO::PARAM_INT);
		$stmt -> bindParam(":id", $datos["ordenAlbum"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		}

		else{
			return "error";
		}

		$stmt -> close();

	}

	#SELECCIONAR ORDEN
	#---------------------------------------------------

	/*public function seleccionarOrdenModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, ruta FROM $tabla ORDER BY orden ASC");

		$stmt -> execute();

		return $stmt->fetchAll();

		$stmt->close();

	}*/


}
