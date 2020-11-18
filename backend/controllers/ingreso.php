<?php

class Ingreso{

	public function ingresoController(){

		if(isset($_POST["usuarioIngreso"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioIngreso"])&&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordIngreso"])){

			  $encriptar = crypt($_POST["passwordIngreso"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datosController = array("usuario"=>$_POST["usuarioIngreso"]
														/*  ,"password"=>$encriptar */);

				$respuesta = IngresoModels::ingresoModel($datosController, "cmsusuarios");

			    $intentos = $respuesta["intentos"];

				$usuarioActual = $_POST["usuarioIngreso"];
				$maximoIntentos = 2;

                                if(isset($_POST["g-recaptcha-response"])){
																
                                $secret = "6LeKYzsUAAAAAKr37JJsaBkPwuI4JaZhU0SJ2dVK";
                                $response = $_POST["g-recaptcha-response"];
                                $remoteip = $_SERVER["REMOTE_ADDR"];
																
                                $result = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
                                $array = json_decode($result,TRUE);
																
                                if($array["success"]){
																
                                           $intentos = 0;
                                     }
																
                                }

				if($intentos < $maximoIntentos){

					if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $encriptar){

						$intentos = 0;

						$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "cmsusuarios");

						session_start();

						$_SESSION["validar"] = true;
						$_SESSION["usuario"] = $respuesta["usuario"];
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["password"] = $respuesta["password"];
						$_SESSION["email"] = $respuesta["email"];
						$_SESSION["photo"] = $respuesta["photo"];
						$_SESSION["rol"] = $respuesta["rol"];

						header("location:inicio");

					}

					else{

						++$intentos;

						$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "cmsusuarios");

						echo '<div class="alert alert-danger">Error al ingresar</div>';

					}

				}

				else{

						$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "cmsusuarios");

						echo '<div class="alert alert-danger">Ha fallado 3 veces, demuestre que no es un robot</div>

                                                         <div class="g-recaptcha" data-sitekey="6LeKYzsUAAAAAPxYR3u5NtPJKHaJtynJZl8S05pz"></div>';

				}

			}

		}
	}

}
