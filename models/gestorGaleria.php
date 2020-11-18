<?php

require_once "backend/models/conexion.php";

class GaleriaModels{

	public function obtenerHash($hash){

		$stmt = Conexion::conectar()->prepare("SELECT hash_data FROM galeria g where g.hash_data = '$hash'");
	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

	public function seleccionarGaleriaModel($hsh){

		$stmt = Conexion::conectar()->prepare("SELECT ruta FROM galeria g where g.hash_data = '$hsh' ORDER BY orden ASC");
	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

	public function seleccionarGaleriaPrivadaModel($hsh){

		$stmt = Conexion::conectar()->prepare("SELECT ruta FROM galeria g where g.hash_data != '$hsh' ORDER BY orden ASC");
	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}
}