function validarIngreso(){

	var expresion = /^[a-zA-Z0-9]*$/;

	if(!expresion.test($("#usuarioIngreso").val())){

		$("#modalA").click();

		return false;
	}

	if(!expresion.test($("#passwordIngreso").val())){

		$("#modalB").click();

		return false;
	}

	return true;

}
