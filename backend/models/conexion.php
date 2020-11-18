<?php

class Conexion{

	public function conectar(){
		// conexión local
		$link = new PDO("mysql:host=localhost;dbname=eshos_21153446_landingpage","root","");
		
		// conexión Online
		//$link = new PDO("mysql:host=sql306.eshost.com.ar;dbname=eshos_21153446_landingpage","eshos_21153446","unsigted");
		return $link;

	}

}
