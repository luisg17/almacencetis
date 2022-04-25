/*=============================================
EDITAR PRESENTACION
=============================================*/
$(".tablas").on("click", ".btnEditarPresentacion", function(){

	var idPresentacion = $(this).attr("idPresentacion");

	var datos = new FormData();
	datos.append("idPresentacion", idPresentacion);

	$.ajax({
		url: "ajax/presentaciones.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarPresentacion").val(respuesta["presentacion"]);
     		$("#idPresentacion").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR PRESENTACION
=============================================*/
$(".tablas").on("click", ".btnEliminarPresentacion", function(){

	 var idPresentacion = $(this).attr("idPresentacion");

	 swal({
	 	title: '¿Está seguro de borrar la presentacion?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar presentacion!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=presentaciones&idPresentacion="+idPresentacion;

	 	}

	 })

})