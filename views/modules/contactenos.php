<footer class="row" id="contactenos">

	<hr>

	<h1 class="text-center text-info"><b>CONTÁCTENOS</b></h1>

	<hr>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3287.576565530332!2d-58.7412590850302!3d-34.51361766024277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sar!4v1512163614391" width="100%"  frameborder="0" style="border:0" allowfullscreen></iframe>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

    		<h4 class="blockquote-reverse text-primary">
    			<ul>
				  <li><span class="glyphicon glyphicon-phone"></span>  (+54) 11 0000-0000</li>
	              <li><span class="glyphicon glyphicon-map-marker"></span>  Dirección</li>
	              <li><span class="glyphicon glyphicon-envelope"></span>  email</li>
	          	</ul>
    		</h4>

			</div>

	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="formulario" >

		<ol>
    		<li>
        		<a href="http://www.facebook.com" target="_blank">
          		<i class="fa fa-facebook" style="line-height:inherit;font-size:24px;"></i>
       		 	</a>
   			</li>

    		<li>
        		<a href="http://www.youtube.com" target="_blank">
          		<i class="fa fa-youtube" style="line-height:inherit;font-size:24px;"></i>
       			</a>
    		</li>

    		<li>
        		<a href="http://www.vimeo.com" target="_blank">
          		<i class="fa fa-vimeo" style="line-height:inherit;font-size:24px;"></i>
        		</a>
    		</li>
			</ol>

			<form method="post" onsubmit="return validarMensaje()">

			    <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Nombre" required>

			    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>

			    <textarea name="mensaje" id="mensaje" cols="30" rows="10" placeholder="Contenido del Mensaje" class="form-control" required></textarea>


			  	<input type="submit" class="btn btn-default" value="Enviar">
		  </form>

		<?php

		$mensajes = new MensajesController();
		$mensajes -> registroMensajesController();

		?>

	</div>

</footer>
