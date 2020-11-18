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
MENSAJES
======================================-->
<?php

	if($_SESSION["rol"] == 0){

echo '<div id="bandejaMensajes" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

	 <div >
	    <h1>Bandeja de Entrada</h1>
	    <hr>
	 </div>';

	 	$mostrarMensajes = new MensajesController();
	 	$mostrarMensajes -> mostrarMensajesController();
	 	$mostrarMensajes -> borrarMensajesController();



echo'</div>

<div id="lecturaMensajes" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

	 <div >
	  <hr>
	   <button id="enviarCorreoMasivo"  class="btn btn-success">Enviar mensaje a todos los usuarios</button>
	    <hr>
	 </div>

	 <div id="visorMensajes">';

	 	$responderMensajes = new MensajesController();
	 	$responderMensajes -> responderMensajesController();
	 	$responderMensajes -> mensajesMasivosController();

	 echo'</div>

</div>';

}else{

	echo'<div class="alert-success" id="jumbotron">
        <h1 class="">Oops !!</h1>
        <h1>Nada por aquí !!</h1>
        <hr class="my-4">

        <div>
         <img class="img-thumbnail w3-card-4" id="image" src="views/images/galeria/photo04.jpg" alt="Card image cap">
         <p id="btn">
           <a class="btn btn-info btn-lg" href="inicio" role="button">Volver</a>
         </p>
        </div>
      </div>';
}

?>

<script>

$(window).load(function(){

	var datos = new FormData();

	datos.append("revisionMensajes", 1);

	$.ajax({
			url:"views/ajax/gestorRevision.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){}

		});


})

</script>

<!--====  Fin de MENSAJES  ====-->
