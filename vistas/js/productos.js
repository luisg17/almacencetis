/*=============================================
CARGAR LA TABLA DINÁMICA DE PRODUCTOS
=============================================*/

$.ajax({

	url: "ajax/datatable-productos.ajax.php",
	success:function(respuesta){
		
        //Validar Check Nuevo Producto
		const idRegistro = document.getElementById('registrosebi');
        
        idRegistro.addEventListener("change", validarCheck, false);
        
        function validarCheck(){
            let checado = idRegistro.checked;
                //console.log(checado);
                if(checado){
                    document.querySelector('#lproducto').classList.remove('hidden');
                    document.querySelector('#lvalidacion').classList.remove('hidden');

                }else {
                    document.querySelector('#lproducto').classList.add('hidden');
                    document.querySelector('#lvalidacion').classList.add('hidden');
                }
    
            
        } //aqui termina Validar Check Nuevo Producto

        //Validar Check actualizar Producto
		const idRegistroDos = document.getElementById('registrosebiAct');
        
        idRegistroDos.addEventListener("change", validarCheckDos, false);
        
        function validarCheckDos(){
            let checado = idRegistroDos.checked;
                console.log(checado);
                if(checado){
                    document.querySelector('#lproductoAct').classList.remove('hidden');
                    document.querySelector('#lvalidacionAct').classList.remove('hidden');

                }else {
                    document.querySelector('#lproductoAct').classList.add('hidden');
                    document.querySelector('#lvalidacionAct').classList.add('hidden');
                }
    
            
        } //aqui termina Validar Check actualizar Producto

        

        

	}

})

var perfilOculto = $("#perfilOculto").val();

$('.tablaProductos').DataTable( {
    "ajax": "ajax/datatable-productos.ajax.php?perfilOculto="+perfilOculto,
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );



/*=============================================
EDITAR PRODUCTO
=============================================*/

$(".tablaProductos tbody").on("click", "button.btnEditarProducto", function(){

	var idProducto = $(this).attr("idProducto");
   // console.log(idProducto);
	
	var datos = new FormData();
    datos.append("idProducto", idProducto);
    //console.log(idProducto);

     $.ajax({

      url:"ajax/productos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
          //Agremos id categoria;
          var datosCategoria = new FormData();
          datosCategoria.append("idCategoria",respuesta["id_categoria"]);
           $.ajax({

              url:"ajax/categorias.ajax.php",
              method: "POST",
              data: datosCategoria,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                  console.log(respuesta);
                  $("#editarCategoria").val(respuesta["id"]);
                  $("#editarCategoria").html(respuesta["categoria"]);

              }

          })

          //Agremos id presentacion;
          var datosPresentacion = new FormData();
          datosPresentacion.append("idPresentacion",respuesta["id_presentacion"]);
           $.ajax({

              url:"ajax/presentaciones.ajax.php",
              method: "POST",
              data: datosPresentacion,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                  console.log(respuesta);
                  $("#editarPresentacion").val(respuesta["id"]);
                  $("#editarPresentacion").html(respuesta["presentacion"]);

              }

          })

            //Agremos id registro;
            var datosRegistro = new FormData();
            datosRegistro.append("idRegistro",respuesta["id_registro"]);
             $.ajax({
  
                url:"ajax/registros.ajax.php",
                method: "POST",
                data: datosRegistro,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success:function(respuesta){
                    console.log(respuesta);
                    $("#editarRegistro").val(respuesta["id"]);
                    $("#editarRegistro").html(respuesta["nombre"]);
  
                }
  
            })

          
            $("#idProducto").val(respuesta["id"]);
          
            $("#valorCategoria").val(respuesta["id_categoria"]);

            $("#valorRegistro").val(respuesta["id_registro"]);
            
            $("#editarCodigo").val(respuesta["codigo"]);

            $("#editarDescripcion").val(respuesta["descripcion"]);

            $("#editarStock").val(respuesta["stock"]);

            $("#valorPresentacion").val(respuesta["id_presentacion"]);

            $("#editarPrecioCompra").val(respuesta["precio_compra"]);

            $("#editarFechaEntrada").val(respuesta["fecha"]);


      }

  })

})

/*=============================================
ELIMINAR PRODUCTO
=============================================*/

$(".tablaProductos tbody").on("click", "button.btnEliminarProducto", function(){

	var idProducto = $(this).attr("idProducto");
	var codigo = $(this).attr("codigo");
	var imagen = $(this).attr("imagen");
	
	swal({

		title: '¿Está seguro de borrar el producto?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar producto!'
        }).then(function(result) {
        if (result.value) {

        	window.location = "index.php?ruta=productos&idProducto="+idProducto+"&imagen="+imagen+"&codigo="+codigo;

        }


	})

})
	


