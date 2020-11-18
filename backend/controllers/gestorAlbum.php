<?php

class GestorAlbum{

	#MOSTRAR IMAGEN ALBUM AJAX
	#------------------------------------------------------------
	public function mostrarImagenController($datos){

		list($ancho, $alto) = getimagesize($datos);

		if($ancho < 800 || $alto < 400){

			echo 0;

		}

		else{

			$aleatorio = mt_rand(100, 999);

			$ruta = "../../views/images/album/album".$aleatorio.".jpg";

			//$nuevo_ancho = 1024;
			//$nuevo_alto = 768;

			$origen = imagecreatefromjpeg($datos);

			#imagecreatetruecolor — Crear una nueva imagen de color verdadero
			//$destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

			#imagecopyresized() - copia una porción de una imagen a otra imagen.

			#bool imagecopyresized( $destino, $origen, int $destino_x, int $destino_y, int $origen_x, int $origen_y, int $destino_w, int $destino_h, int $origen_w, int $origen_h)

			//imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto); // Copiar la antigua imágen a una nueva imágen pero con tamaño nuevo, sería redimensionada sin recortar.

			imagejpeg($origen, $ruta); // Guardamos la imágen creada que viene como temporal de orígen a la ruta.

			GestorAlbumModel::subirImagenAlbumModel($ruta, "album");

			$respuesta = GestorAlbumModel::mostrarImagenAlbumModel($ruta, "album");

			echo $respuesta["ruta"];

		}

	}

	#MOSTRAR IMAGENES EN LA VISTA
	#------------------------------------------------------------

	public function mostrarImagenVistaController(){

		$respuesta = GestorAlbumModel::mostrarImagenVistaModel("album");

		foreach($respuesta as $row => $item){

			echo '<li id="'.$item["id"].'" class="bloqueGaleria">
					<span class="fa fa-times eliminarFoto_album" ruta="'.$item["ruta"].'"></span>
					<a rel="grupo" href="'.substr($item["ruta"],6).'">
					<img src="'.substr($item["ruta"],6).'" class="handleImg">
					</a>
				</li>';

		}

	}

	#SELECCIONAR FOTOS DEL ALBUM
	#------------------------------------------------------------

	public function seleccionarFotoAlbumController($datos){

		$respuesta = GestorAlbumModel::mostrarImgAlbumModel($datos,"album");

		foreach($respuesta as $row => $item){

			echo '<img src="backend/'.substr($item["ruta"],6).'" width="100%" style="margin-bottom:20px">';

			}

		}

	#ELIMINAR ITEM DEL ALBUM
	#-----------------------------------------------------------
	public function eliminarAlbumController($datos){

		$respuesta = GestorAlbumModel::eliminarAlbumModel($datos, "album");

		unlink($datos["rutaGaleria"]);	 // Desactivar para borrar imágen de la carpeta..

		echo $respuesta;

	}

	#ACTUALIZAR ORDEN
	#---------------------------------------------------
	public function actualizarOrdenController($datos){

		GestorAlbumModel::actualizarOrdenModel($datos, "album");

		//$respuesta = GestorGaleriaModel::seleccionarOrdenModel("galeria");

		/*foreach($respuesta as $row => $item){

			/*echo '<li id="'.$item["id"].'" class="bloqueGaleria">
					<span class="fa fa-times eliminarFoto" ruta="'.$item["ruta"].'"></span>
					<a rel="grupo" href="'.substr($item["ruta"],6).'">
					<img src="'.substr($item["ruta"],6).'" class="handleImg">
					</a>
				</li>';

		}*/


	}

}
