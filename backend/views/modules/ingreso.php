<!--=====================================
FORMULARIO DE INGRESO
======================================-->

<div id="backIngreso">

	<form method="post" id="formIngreso" onsubmit="return validarIngreso()">

		<h1 id="tituloFormIngreso">INGRESO AL PANEL DE CONTROL</h1>

		<input class="form-control formIngreso" type="text" required placeholder="Ingrese su Usuario" name="usuarioIngreso" id="usuarioIngreso">
		<input class="form-control formIngreso" type="password" required placeholder="Ingrese su Contraseña" name="passwordIngreso" id="passwordIngreso">

		<?php

			$ingreso = new Ingreso();
			$ingreso -> ingresoController();

		?>

		<input class="form-control formIngreso btn btn-primary" type="submit" value="Enviar">

	</form>



	<div class="container">
	  <h2></h2>
	  <!-- Trigger the modal with a button -->
	  <button type="button" style="display:none;" id="modalA" class="btn" data-toggle="modal" data-target="#myModal">Modal</button>

	  <!-- Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog modal-sm">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Alerta del Sistema.</h4>
	        </div>
	        <div class="modal-body alert-danger">
	          <p>No se permiten caracteres especiales !</p>
	        </div>
	        <div class="modal-footer">
	          <!--button type="button" class="btn btn-default" data-dismiss="modal">Close</button-->
	        </div>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="container">
		<h2></h2>
		<!-- Trigger the modal with a button -->
		<button type="button" style="display:none;" id="modalB" class="btn" data-toggle="modal" data-target="#myModal">Modal</button>

		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Alerta del Sistema.</h4>
					</div>
					<div class="modal-body alert-danger">
						<p>No se permiten caracteres especiales !</p>
					</div>
					<div class="modal-footer">
						<!--button type="button" class="btn btn-default" data-dismiss="modal">Close</button-->
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<!--====  Fin de FORMULARIO DE INGRESO  ====-->
