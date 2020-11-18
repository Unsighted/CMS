<?php

require_once "../../models/gestorAlbum.php";
require_once "../../controllers/gestorAlbum.php";

#CLASE Y MÉTODOS
#-------------------------------------------------------------
class Ajax{

	#SUBIR LA IMAGEN DE LA GALERIA
	#----------------------------------------------------------
	public $imagenTemporal;

	public function gestorAlbumAjax(){

		$datos = $this->imagenTemporal;

		$respuesta = GestorAlbum::mostrarImagenController($datos);

		echo $respuesta;

	}

	#ELIMINAR ITEM GALERIA
	#----------------------------------------------------------

	public $idAlbum;
	public $rutaAlbum;

	public function eliminarAlbumAjax(){

		$datos = array("idAlbum" => $this->idAlbum,
					   			 "rutaAlbum" => $this->rutaAlbum);

		$respuesta = GestorAlbum::eliminarAlbumController($datos);

		echo $respuesta;

	}

	#ACTUALIZAR ORDEN
	#---------------------------------------------
	public $actualizarOrdenAlbum;
	public $actualizarOrdenItem;

	public function actualizarOrdenAjax(){

		$datos = array("ordenAlbum" => $this->actualizarOrdenAlbum,
			           	 "ordenItem" => $this->actualizarOrdenItem);

		$respuesta = GestorAlbum::actualizarOrdenController($datos);

		echo $respuesta;

	}

	#SELECCIONAR FOTO DEL ALBUM
	#---------------------------------------------
	public $seleccionarFoto;

	public function seleccionarFotoModel(){

		$datos = array("img" => $this->seleccionarFoto);

		$respuesta = GestorAlbum::seleccionarFotoAlbumController($datos);

		echo $respuesta;

	}

}

#OBJETOS
#-----------------------------------------------------------
if(isset($_FILES["imagen"]["tmp_name"])){

	$a = new Ajax();
	$a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
	$a -> gestorAlbumAjax();

}

if(isset($_POST["idAlbum"])){

	$b = new Ajax();
	$b -> idAlbum = $_POST["idAlbum"];
	$b -> rutaAlbum = $_POST["rutaAlbum"];
	$b -> eliminarAlbumAjax();

}

if(isset($_POST["actualizarOrdenAlbum"])){

	$c = new Ajax();
	$c -> actualizarOrdenAlbum = $_POST["actualizarOrdenAlbum"];
	$c -> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
	$c -> actualizarOrdenAjax();

}


if(isset($_POST["img"])){

	$d = new Ajax();
	$d -> seleccionarFoto = $_POST["img"];
	$d -> seleccionarFotoModel();

}

?>
