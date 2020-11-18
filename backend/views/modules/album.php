<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:ingreso");

	exit();

}

include "views/modules/botonera.php";
include "views/modules/cabezote.php";

?>

<!--=====================================
ALBUM ADMINISTRABLE
======================================-->

<div id="galeria" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

<hr>

<p><span class="fa fa-arrow-down"></span>  Arrastra aquí tu imagen (Tamaño recomendado: 800px * 400px, peso permitido: 2Mb)</p>

<ul id="lightbox">
	<div id="lightbox_album">

		<?php

		$album = new GestorAlbum();
		$album -> mostrarImagenVistaController();

		?>

	</div>
</ul>

	<button id="ordenarAlbum" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Imágenes</button>

	<button id="guardarAlbum" class="btn btn-primary pull-right" style="margin:10px 30px; display:none">Guardar Orden Imágenes</button>

</div>

<!--====  Fin de Album ADMINISTRABLE  ====-->
