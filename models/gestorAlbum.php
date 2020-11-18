<?php

require_once "backend/models/conexion.php";


class AlbumModels{


		public function seleccionarAlbumModel($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT id,ruta FROM $tabla ORDER BY orden ASC");

			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->close();


			}

}

?>
