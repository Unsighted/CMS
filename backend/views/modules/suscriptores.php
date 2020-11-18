<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

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
SUSCRIPTORES
======================================-->
<?php

if($_SESSION["rol"] == 0){

echo'<div id="suscriptores" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

 <div>

	<table id="tablaSuscriptores" class="table table-striped dt-responsive nowrap">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Acciones</th>
        <th></th>
      </tr>
    </thead>
    <tbody>';

      $suscriptores = new SuscriptoresController();
      $suscriptores -> mostrarSuscriptoresController();
      $suscriptores -> borrarSuscriptoresController();

    echo'</tbody>
        </table>

  <a href="tcpdf/pdf/suscriptores.php" target="blank">
  <button class="btn btn-warning pull-right" style="margin:20px;">Imprimir Suscriptores</button>
  </a>
  </div>

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

  datos.append("revisionSuscriptores", 1);

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

<!--====  Fin de SUSCRIPTORES  ====-->
