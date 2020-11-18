<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<meta charset="utf-8">
		<title></title>
	</head>

<?php

class Articulos{

	public function seleccionarArticulosController(){

		$respuesta = ArticulosModels::seleccionarArticulosModel("articulos");

			echo '<div class="w3-container w3-responsive w3-three mt-4" style="height:500px;">
							<table class = "">
							<div class="w3-container w3-text-white w3-card-4 ml-3 w3-padding w3-margin-bottom" style="background-color:rgb(191, 117, 161)">
							<h4>Listado de imagenes</h4>
					  </div>';

		foreach ($respuesta as $row => $item){

			echo	'<div class="container" id="img" class="mb-5"></div>

				 		<div class="w3-row-padding">
							 <div class="w3-three">

									<div class="w3-container">
									<img src="backend/'.$item["ruta"].'" class="img-thumbnail w3-card-4" style="width:100%;">
										<a href="#articulo'.$item["id"].'" data-toggle="modal">
										<button class="btn btn-danger" style="margin-top:20px; margin-bottom:40px;">Leer Más</button>
										</a>
										<!--h1>'.$item["titulo"].'</h1-->
										<!--p>'.$item["introduccion"].'</p-->
									</div>
								</div>
							</div>

				<div id="articulo'.$item["id"].'" class="modal fade">

					<div class="modal-dialog modal-content">

						<div class="modal-header" style="border:1px solid #eee">

			   				<button type="button" class="close" data-dismiss="modal">&times;</button>
			  		 		<h3 class="modal-title">'.$item["titulo"].'</h3>

						</div>

						<div class="modal-body" style="border:1px solid #eee">

			    			<img src="backend/'.$item["ruta"].'" width="100%" style="margin-bottom:20px">
			    			<p class="parrafoContenido text-justify">'.$item["contenido"].'</p>

						</div>

							<div class="modal-footer" style="border:1px solid #eee">

			    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

							</div>

					</div>

				</div>

			</table>';

		}
	}
}
