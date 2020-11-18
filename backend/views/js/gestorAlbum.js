/*=============================================
Área de arrastre de imágenes
=============================================*/

if($("#lightbox_album").html() == 0){

	$("#lightbox_album").css({"height":"100px"});

}

else{

	$("#lightbox_album").css({"height":"auto"});

}


/*=============================================
Subir múltiples Imagenes
=============================================*/
$("body").on("dragover", function(e){

	e.preventDefault();
	e.stopPropagation();

})


$("#lightbox_album").on("dragover", function(e){

	e.preventDefault();
	e.stopPropagation();

	$("#lightbox_album").css({"background":"url(views/images/pattern.jpg)"})

});

/*=============================================
Soltar las Imágenes
=============================================*/

$("body").on("drop", function(e){

	e.preventDefault();
	e.stopPropagation();

});

var imagenSize = [];	// Recibir los datos del push.
var imagenType = [];	// Recibir los datos del push.

$("#lightbox_album").on("drop", function(e){

	e.preventDefault();
	e.stopPropagation();

	$("#lightbox_album").css({"background":"white"})

	// El objeto DataTransfer es usado como contenedor de datos que estan siendo manipulados durante la operación de drag and drop. Este puede contener uno o varios objetos, de uno o varios tipos de datos.

	archivo = e.originalEvent.dataTransfer.files;

	for(var i = 0; i < archivo.length; i++){

		imagen = archivo[i];
		imagenSize.push(imagen.size); // Capturar el peso de la imágen.
		imagenType.push(imagen.type); // Capturar el tipo de la imágen.

		if(Number(imagenSize[i]) > 2000000){

			$("#lightbox_album").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 2mb</div>')

		}

		else{

			$(".alerta").remove();

		}

		if(imagenType[i] == "image/jpeg" || imagenType[i] == "image/png"){

			$(".alerta").remove();

		}
		else{

			$("#lightbox_album").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

		}

		if(Number(imagenSize[i]) < 2000000 && imagenType[i] == "image/jpeg" || imagenType[i] == "image/png"){

			var datos = new FormData();

			datos.append("imagen", imagen);

			$.ajax({
				url:"views/ajax/gestorAlbum.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function(){

					$("#lightbox_album").append('<li  id="status"><img src="views/images/status.gif"></li>');
				},
				success: function(respuesta){

					$("#status").remove();

					if(respuesta == 0){

						$("#lightbox_album").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')

					}
					else{

						$("#lightbox_album").css({"height":"auto"});

						$("#lightbox_album").append('<li><span class="fa fa-times"></span><a rel="grupo" href="'+respuesta.slice(6)+'"><img src="'+respuesta.slice(6)+'"></a></li>');

						swal({
						title: "¡OK!",
						text: "¡La imagen se subió correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},

						function(isConfirm){
							if (isConfirm){
								window.location = "album";
							}
						});

					}

				}

			})

		}

	}

})

/*=============================================
Eliminar Item Album
=============================================*/

$(".eliminarFoto_album").click(function(){

	if($(".eliminarFoto_album").length == 1){

		$("#lightbox_album").css({"height":"100px"});

	}

	idAlbum = $(this).parent().attr("id");
	rutaAlbum = $(this).attr("ruta");

	$(this).parent().remove();

	var borrarItem = new FormData();
	borrarItem.append("idAlbum", idAlbum);
	borrarItem.append("rutaAlbum", rutaAlbum);

	$.ajax({

		url:"views/ajax/gestorAlbum.php",
		method: "POST",
		data: borrarItem,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			console.log('respuesta', respuesta);
		}

	})

});

/*=============================================
Ordenar Item Album
=============================================*/


var almacenarOrdenId = [];
var ordenItem = [];

$("#ordenarAlbum").click(function(){

	$("#ordenarAlbum").hide();
	$("#guardarAlbum").show();

	$("#lightbox_album").css({"cursor":"move"})
	$("#lightbox_album span").hide()

	$("#lightbox_album").sortable({
		revert: true,
		connectWith: ".bloqueGaleria",
		handle: ".handleImg",
		stop: function(event){

			for(var i= 0; i < $("#lightbox_album li").length; i++){

				almacenarOrdenId[i] = event.target.children[i].id;
				ordenItem[i]  =  i+1;

			}

		}

	})

})

$("#guardarAlbum").click(function(){

	$("#ordenarAlbum").show();
	$("#guardarAlbum").hide();

	for(var i= 0; i < $("#lightbox_album li").length; i++){

		var actualizarOrden = new FormData();
		actualizarOrden.append("actualizarOrdenAlbum", almacenarOrdenId[i]);
		actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);

		$.ajax({

			url:"views/ajax/gestorAlbum.php",
			method: "POST",
			data: actualizarOrden,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){

				$("#lightbox_album").html(respuesta);

				swal({
						title: "¡OK!",
						text: "¡El orden se ha actualizado correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "album";
							}
						});

			}


		})

	}

})
