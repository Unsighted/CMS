/*=============================================
Agregar artículo
=============================================*/
$("#btnAgregarArticulo").click(function(){

	$("#agregarArtículo").toggle(400);

});

/*=============================================
Subir Imagen a través del Input
=============================================*/
$("#subirFoto").change(function(){

	imagen = this.files[0]; // Guardar en una variable local la posición 0 del array.

	//Validar tamaño de la imagen

	imagenSize = imagen.size;

	if(Number(imagenSize) > 2000000){ // 2 MB.

		$("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>')

	}

	else{

		$(".alerta").remove();

	}

	// Validar tipo de la imagen

	imagenType = imagen.type;

	if(imagenType == "image/jpeg" || imagenType == "image/png"){

		$(".alerta").remove();
	}

	else{

		$("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

	}

	/*=============================================
	Mostrar imagen con AJAX
	=============================================*/
	if(Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png"){

		var datos = new FormData(); // Variable que contiene los datos del form.

		datos.append("imagen", imagen); // Enviamos la imágen agregada al final de datos.

		$.ajax({
			url:"views/ajax/gestorArticulos.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function(){

					$("#arrastreImagenArticulo").before('<img src="views/images/status.gif" id="status">');

				},
			success: function(respuesta){

					$("#status").remove();

					if(respuesta == 0){

						$("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')

					}else{

						$("#arrastreImagenArticulo").html('<div id="imagenArticulo"><img src="'+respuesta.slice(6)+'" class="img-thumbnail"></div>');

					}

			}

		})

	}

})

/*=============================================
Editar Artículo
=============================================*/

$(".editarArticulo").click(function(){

	idArticulo = $(this).parent().parent().attr("id"); // Capturamos el id.
	rutaImagen = $("#"+idArticulo).children("img").attr("src"); // Capturamos imágen.
	titulo = $("#"+idArticulo).children("h1").html(); // Captuamos el título.
	introduccion = $("#"+idArticulo).children("p").html(); // Capturamos el párrafo.
	contenido = $("#"+idArticulo).children("input").val();

	$("#"+idArticulo).html('<form method="post" enctype="multipart/form-data"><span><input style="width:10%; padding:5px 0; margin-top:4px" type="submit" class="btn btn-primary pull-right" value="Guardar"></span><div id="editarImagen"><input style="display:none" type="file" id="subirNuevaFoto" class="btn btn-default"><div id="nuevaFoto"><span class="fa fa-times cambiarImagen"></span><img src="'+rutaImagen+'" class="img-thumbnail"></div></div><input type="text" value="'+titulo+'" name="editarTitulo"><textarea cols="30" rows="5" name="editarIntroduccion">'+introduccion+'</textarea><textarea name="editarContenido" id="editarContenido" cols="30" rows="10">'+contenido+'</textarea><input type="hidden" value="'+idArticulo+'" name="id"><input type="hidden" value="'+rutaImagen+'" name="fotoAntigua"><hr></form>');

	$(".cambiarImagen").click(function(){ // Cuando cambiamos la imágen al editar.

		$(this).hide(); // Escondemos la imágen.

		$("#subirNuevaFoto").show(); // Mostramos el input file.
		$("#subirNuevaFoto").css({"width":"95%"}); // Ancho del input file.
		$("#nuevaFoto").html(""); // Vaciamos el input file para que se visualice la nueva imágen.
		$("#subirNuevaFoto").attr("name","editarImagen"); // Le asignamos un nombre para que la reciba el controller.
		$("#subirNuevaFoto").attr("required",true); // Será requerida pues no puede enviarse vacío el valor.

		$("#subirNuevaFoto").change(function(){

			imagen = this.files[0];		// Capturamos en un la posición cero del array una imágen.
			imagenSize = imagen.size;	// Guardamos el tamaño.

			if(Number(imagenSize) > 2000000){ // Si la imágen excede los 2 MB tiramos el mensaje de alerta.

				$("#editarImagen").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>')

			}

			else{

				$(".alerta").remove(); // De lo contrario removemos el alerta y procedemos a subir la imágen.

			}

			imagenType = imagen.type; // Capturamos el tipo de imágen.

			if(imagenType == "image/jpeg" || imagenType == "image/png"){

				$(".alerta").remove();

			}

			else{

				$("#editarImagen").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

			}

			if(Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png"){

				var datos = new FormData();

				datos.append("imagen", imagen); // Nombre de name asignado para enviar al controller.

				$.ajax({
						url:"views/ajax/gestorArticulos.php",
						method: "POST",
						data: datos,
						cache: false,
						contentType: false,
						processData: false,
						beforeSend: function(){ // Luego de enviar los datos al controller.

							$("#nuevaFoto").html('<img src="views/images/status.gif" style="width:15%" id="status2">'); // ícono de load.

						},
						success: function(respuesta){

							$("#status2").remove(); // Remuevo el gif de carga.

							if(respuesta == 0){

								$("#editarImagen").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')

							}

							else{

								$("#nuevaFoto").html('<img src="'+respuesta.slice(6)+'" class="img-thumbnail">');

							}

						}

				})

			}

		})

	})

});

/*=============================================
Ordenar Item Artículos
=============================================*/

var almacenarOrdenId = new Array();
var ordenItem = new Array();

$("#ordenarArticulos").click(function(){

	$("#ordenarArticulos").hide();
	$("#guardarOrdenArticulos").show();

	$("#editarArticulo").css({"cursor":"move"}); // Cursor de movimento al pasar sobre el ul que contiene el artículo.
	$("#editarArticulo span i").hide();	// Esconder botones de editar y eliminar.
	$("#editarArticulo button").hide();	// Esconder botón leer más.
	$("#editarArticulo img").hide();	// Esconder la imágen.
	$("#editarArticulo p").hide();	// Esconder párrafo.
	$("#editarArticulo hr").hide();	// Esconder HR.
	$("#editarArticulo div").remove();
	$(".bloqueArticulo h1").css({"font-size":"14px","position":"absolute","padding":"10px", "top":"-15px"});
	$(".bloqueArticulo").css({"padding":"2px"});
	$("#editarArticulo span").html('<i class="glyphicon glyphicon-move" style="padding:8px"></i>');

	$("body, html").animate({

		scrollTop:$("body").offset().top

	}, 500)

	$("#editarArticulo").sortable({
		revert: true,	// true si lo movemos y necesitamos que se revierta a su posición original.
		connectWith: ".bloqueArticulo",	// Conectamos con cada uno de los li.
		handle: ".handleArticle",	// Lo agarraremos desde el span que contiene esta clase.
		stop: function(event){

			for(var i= 0; i < $("#editarArticulo li").length; i++){ // Capturar toda la cantidad de posiciónes del ciclo for.

				almacenarOrdenId[i] = event.target.children[i].id;
				ordenItem[i]  =  i+1;

			}
		}
	})

	$("#guardarOrdenArticulos").click(function(){

		$("#ordenarArticulos").show();
		$("#guardarOrdenArticulos").hide();

		for(var i= 0; i < $("#editarArticulo li").length; i++){

			var actualizarOrden = new FormData();
			actualizarOrden.append("actualizarOrdenArticulos", almacenarOrdenId[i]);
			actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);

			$.ajax({

				url:"views/ajax/gestorArticulos.php",
				method: "POST",
				data: actualizarOrden,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){

					$("#editarArticulo").html(respuesta);

					swal({
						title: "¡OK!",
						text: "¡El orden se ha actualizado correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "articulos";
							}
						});


				}

			})



		}

	})

});
