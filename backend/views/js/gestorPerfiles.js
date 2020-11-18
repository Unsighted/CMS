/*=============================================
Mostrar Formulario Registro Perfil
=============================================*/
$("#registrarPerfil").click(function(){
	$("#formularioPerfil").toggle("fast");

});

$("#subirFotoPerfil").change(function(){
	$("#subirFotoPerfil").attr("name","nuevaImagen");

});

/*=============================================
Mostrar Formulario Editar Perfil
=============================================*/
$("#btnEditarPerfil").click(function(){
	//$("#cambiarFotoPerfil").css({"width":"95%"}); // Ancho del input file.
	$("#editarPerfil").hide("fast");
	$("#formEditarPerfil").show("fast");

});

$("#cambiarFotoPerfil").change(function(){
	$("#cambiarFotoPerfil").attr("name","editarImagen")

});

$("#imgp").click(function(){
	$("#cambiarFotoPerfil").toggle("fast");
	$("#cambiarFotoPerfil").attr("disabled",false);
	$("#parrafo").toggle("fast");

});
