<?php

class Galeria{



	public function seleccionarGaleriaController($hash){

		$dataHash = GaleriaModels::obtenerHash($hash); // traigo hash en base al que le paso.

		$hsh = $hash;

		$respuesta = GaleriaModels::seleccionarGaleriaModel($hsh); // preparo la respuesta si es true el if.

		$privatePhoto = GaleriaModels::seleccionarGaleriaPrivadaModel($hsh); // preparo la respuesta si es true el if.

		if ($hash = $dataHash) {

		foreach ($respuesta as $row => $item){

			echo '<li>
					<a rel="grupo" href="backend/'.substr($item["ruta"], 6).'">
					<img src="backend/'.substr($item["ruta"], 6).'">
					</a>
				</li>';
		}

		

		foreach ($privatePhoto as $row => $item){
			
			echo '<li>
					<img src="./views/images/logo.png">
				  </li>';
		}
	 }
  }
}