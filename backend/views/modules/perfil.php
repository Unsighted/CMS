<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>

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
PERFIL
======================================-->
<div id="editarPerfil" class="w3-card-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
<div class="card">
<li><a id="btnEditarPerfil"><button type="button" class="btn btn-lg btn-default btn-block">Editar Perfil</button></a></li>
  <img src="<?php echo $_SESSION["photo"];?>" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b><?php echo $_SESSION["usuario"];?></b></h4>

    <h4>Perfil: <?php

       if( $_SESSION["rol"] == 0){

         echo "Administrador";

      }

      else{

         echo "Editor";

      }

     ?></h4>

    <p><h4>Email: <?php echo $_SESSION["email"];?></h4>
  	<h4>Contraseña: *******</ph4></p>
  </div>
</div>
</div>

<!--=====================================
EDITAR PERFIL
======================================-->

<div id="formEditarPerfil" style="display:none" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

   <form style="padding:20px" method="post" enctype="multipart/form-data">

      <input name="idPerfil" type="hidden" value="<?php echo $_SESSION["id"];?>">

      <input name="actualizarSesion" type="hidden" value="ok">

     <div class="form-group">

      <input name="editarUsuario" type="text" class="form-control" value="<?php echo $_SESSION["usuario"];?>" required>

     </div>

      <div class="form-group">

          <input name="editarPassword" type="password" placeholder="Ingrese la Contraseña hasta 10 caracteres" maxlength="10" class="form-control" required>

      </div>

      <div class="form-group">

         <input name="editarEmail" type="email" value="<?php echo $_SESSION["email"];?>" class="form-control" required>

      </div>

      <?php

       if( $_SESSION["rol"] == 0){

      echo'<div class="form-group">

        <select name="editarRol" class="form-control" required>

            <option value="">Seleccione el Rol</option>
            <option value="0">Administrador</option>
            <option value="1">Editor</option>

        </select>

      </div>';

    }else{

      echo'<div class="form-group">

        <select name="editarRol" class="form-control" required>

            <option value="1">Editor</option>

        </select>

      </div>';

    }

      ?>

       <div class="form-group text-center">

          <img src="<?php echo $_SESSION["photo"]; ?>" width="50%" class="img-circle">

           <input type="hidden" value="<?php echo $_SESSION["photo"]; ?>" name="editarPhoto">

           <a href="#"><img src="../views/images/image.png" data-toggle="tooltip" title="Editar Imágen ..." id="imgp"></a>

          <input type="file" class="btn btn-default" name="file" disabled id="cambiarFotoPerfil" style="display:none; margin:10px 0">

          <p><p class="text-center" id="parrafo" hidden style="font-size:12px">Peso recomendado de imagen: máximo 2MB</p></p>

       </div>

    <input type="submit" id="guardarPerfiledit" style="margin-left:85px" value="Actualizar Perfil" class="btn btn-primary">

  </form>

</div>


<!--=====================================
CREAR PERFIL
======================================-->

<?php

if($_SESSION["rol"] == 0){

echo '<div id="crearPerfil" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

	<button id="registrarPerfil" style="margin-bottom:20px" class="btn btn-default">Registrar un nuevo miembro</button>

  <form id="formularioPerfil" style="display:none" method="post" enctype="multipart/form-data">

     <div class="form-group">

      <input name="nuevoUsuario" type="text" placeholder="Ingrese el nombre de Usuario hasta 10 caracteres" maxlength="10" class="form-control"  required>

     </div>

      <div class="form-group">

          <input name="nuevoPassword" type="password" placeholder="Ingrese la Contraseña hasta 10 caracteres" maxlength="10" class="form-control" required>

      </div>

      <div class="form-group">

         <input name="nuevoEmail" type="email" placeholder="Ingrese el Correo Electrónico" class="form-control" required>

      </div>

      <div class="form-group">

        <select name="nuevoRol" class="form-control" required>

            <option value="">Seleccione el Rol</option>
            <option value="0">Administrador</option>
            <option value="1">Editor</option>

        </select>

      </div>

       <div class="form-group text-center">

          <input type="file" class="btn btn-default" id="subirFotoPerfil" style="display:inline-block; margin:10px 0">

          <p class="text-center" style="font-size:12px">Tamaño recomendado de la imagen: 800px * 400px, peso máximo 2MB</p>

       </div>

    <input type="submit" id="guardarPerfil" value="Guardar Perfil" class="btn btn-primary">

  </form>';


}
      $crearPerfil = new GestorPerfiles();
      $crearPerfil -> guardarPerfilController();
      $crearPerfil -> editarPerfilController();

  ?>

	<hr>

	<div class="table-responsive">

	<table id="tablaSuscriptores" class="table table-striped display">
    <thead>
      <tr>
        <th>Usuario</th>
        <th>Perfil</th>
        <th>Email</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

    <?php

      $verPerfiles = new GestorPerfiles();
      $verPerfiles -> verPerfilesController();
      $verPerfiles -> borrarPerfilController();


    ?>

    </tbody>
  </table>

  </div>
</div>

<!--====  Fin de PERFIL  ====-->


<script>

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

</script>
