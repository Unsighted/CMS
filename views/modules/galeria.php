<div class="row" id="galeria">

	<hr>

	<h1 class="text-center text-info"><b>GALERÍA DE IMÁGENES</b></h1>

	<hr>

	<ul>

		<?php
			$hash = 'f127902913523c5edfead2897cb14cc5';
			$galeria = new Galeria();
			$galeria -> seleccionarGaleriaController($hash);

		?>

	</ul>

</div>
