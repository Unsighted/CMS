<!DOCTYPE html>
<html>
	<head>
		<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>

<?php

	class Album{

			public function seleccionarModelController(){

			$respuesta = AlbumModels::seleccionarAlbumModel("album");

			foreach ($respuesta as $row => $item){

					echo'<figure><img src="backend/'.substr($item["ruta"],6).'" id = "image" onclick="enviarId('.$item["id"].');" width="100%" data-toggle="modal" href="#album" style="margin-bottom:20px"></figure>';

					}
				}
			}
?>


			<div id="album" class="modal fade">

				<div class="modal-dialog modal-content">

					<div class="modal-header" style="border:1px solid #eee">

						<button type="button" class="close" data-dismiss="modal">&times;</button>

					</div>

					<div class="modal-body" id="picture" style="border:1px solid #eee">

					</div>

					<div class="modal-footer" style="border:1px solid #eee">

						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

					</div>

				</div>

			</div>

<script>

function enviarId(imagen){

		var selectItem = new FormData();
		selectItem.append("img", imagen);

		//console.log(imagen);

		$.ajax({

			url:"backend/views/ajax/gestorAlbum.php",
			method: "POST",
			data: selectItem,
			cache: false,
			contentType: false,
			processData: false,

			beforeSend: function(){

				$("#picture").html('<li  id="status"><img src="backend/views/images/status.gif"></li>');
			}

			}).done(recibir).fail(manejarError);

			function recibir(datos){

			$('#picture').html(datos);

				//console.log(datos);

			};

			function manejarError(){

					alert ('Error en la respuesta del Servidor !');

				};
			};

</script>

</body>
</html>
	