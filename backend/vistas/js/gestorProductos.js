/* -------------------------------------------------------------------------- */
/*                    CARGAR LA TABLA DINÁMICA DE PRODUCTOS                   */
/* -------------------------------------------------------------------------- */

// $.ajax({

// 	url:"ajax/tablaProductos.ajax.php",
// 	success:function(respuesta) {
// 		console.log('%cMyProject%cline:8%crespuesta', 'color:#fff;background:#ee6f57;padding:3px;border-radius:2px', 'color:#fff;background:#1f3c88;padding:3px;border-radius:2px', 'color:#fff;background:rgb(248, 147, 29);padding:3px;border-radius:2px', respuesta)
// 	}

// })

$(".tablaProductos").DataTable({
	"ajax": "ajax/tablaProductos.ajax.php",
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

});

/* -------------- End of CARGAR LA TABLA DINÁMICA DE PRODUCTOS -------------- */

/* -------------------------------------------------------------------------- */
/*                              ACTIVAR PRODUCTO                              */
/* -------------------------------------------------------------------------- */

$('.tablaProductos tbody').on("click", ".btnActivar", function() {

	var idProducto = $(this).attr("idProducto");
	var estadoProducto = $(this).attr("estadoProducto");

	var datos = new FormData();
	datos.append("activarId", idProducto);
	datos.append("activarProducto", estadoProducto);

	$.ajax({
		url:"ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){}
	})

	if (estadoProducto == 0) {
		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoProducto',1);
	} else {
		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html('Activado');
		$(this).attr('estadoProducto',0);
	}

})

/* ------------------------- End of ACTIVAR PRODUCTO ------------------------ */

/* -------------------------------------------------------------------------- */
/*                         EDITOR DE TEXTO ENRIQUZIDO                         */
/* -------------------------------------------------------------------------- */

var quill = new Quill('#descripcionProducto', {
	theme: 'snow'
});

quill.on('text-change', function() {
	var contenido = $('#descripcionProducto .ql-editor').html();
	$("#modalAgregarProducto #descripcionProducto").val(contenido);
});

/* -------------------- End of EDITOR DE TEXTO ENRIQUZIDO ------------------- */

/* -------------------------------------------------------------------------- */
/*                 REVISAR SI EL TITULO DEL PRODUCTO YA EXISTE                */
/* -------------------------------------------------------------------------- */

$(".validarProducto").change(function() {

	$(".alert").remove();
	var producto = $(this).val();
	var datos = new FormData();
	datos.append("validarProducto", producto);

	$.ajax({
		url:"ajax/productos.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta) {

			if (respuesta.length != 0) {

				$(".validarProducto").parent().after('<div class="alert alert-warning">Este producto ya existe, intente con un nombre diferente</div>');
				$(".validarProducto").val("");

			}

		}

	})

})

/* ----------- End of REVISAR SI EL TITULO DEL PRODUCTO YA EXISTE ----------- */

/* -------------------------------------------------------------------------- */
/*                                RUTA PRODUCTO                               */
/* -------------------------------------------------------------------------- */

function limpiarUrl(texto) {
  var texto = texto.toLowerCase();
  texto = texto.replace(/[á]/, 'a');
  texto = texto.replace(/[é]/, 'e');
  texto = texto.replace(/[í]/, 'i');
  texto = texto.replace(/[ó]/, 'o');
  texto = texto.replace(/[ú]/, 'u');
  texto = texto.replace(/[ñ]/, 'n');
  texto = texto.replace(/ /g, "-")
  return texto;
}

$(".tituloProducto").change(function(){ $(".rutaProducto").val(limpiarUrl($(".tituloProducto").val())); })

/* -------------------------- End of RUTA PRODUCTO -------------------------- */

/* -------------------------------------------------------------------------- */
/*                       AGREGAR MULTIMEDIA CON DROPZONE                      */
/* -------------------------------------------------------------------------- */

var arrayFiles = [];

$(".multimediaFisica").dropzone({
	url: "https://localhost/ashion/backend/",
	addRemoveLinks: true,
	acceptedFiles: "image/jpeg, image/png",
	maxFilesize: 2,
	maxFiles: 10,
	init: function() {

		this.on("addedfile", function(file) { arrayFiles.push(file); })

		this.on("removedfile", function(file) {
			var index = arrayFiles.indexOf(file);
			arrayFiles.splice(index, 1);
		})

	}

})

/* ----------------- End of AGREGAR MULTIMEDIA CON DROPZONE ----------------- */

/* -------------------------------------------------------------------------- */
/*                          SELECCIONAR SUBCATEGORÍA                          */
/* -------------------------------------------------------------------------- */

$(".seleccionarCategoria").change(function() {

	var categoria = $(this).val();
	$(".seleccionarSubCategoria").html("");
	$("#modalEditarProducto .seleccionarSubCategoria").html("");

	var datos = new FormData();
	datos.append("idCategoria", categoria);

	$.ajax({
		url:"ajax/subCategorias.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta) {

			$(".entradaSubcategoria").show();
			respuesta.forEach(funcionForEach);

			function funcionForEach(item, index) {
				$(".seleccionarSubCategoria").append( '<option value="'+item["id"]+'">'+item["subcategoria"]+'</option>' )
			}

		}

	})

})

/* --------------------- End of SELECCIONAR SUBCATEGORÍA -------------------- */

/* -------------------------------------------------------------------------- */
/*                         SUBIENDO LA FOTO DE PORTADA                        */
/* -------------------------------------------------------------------------- */

var imagenPortada = null;

$(".fotoPortada").change(function() {
	imagenPortada = this.files[0];

	/* -------------------------------------------------------------------------- */
	/*               VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG              */
	/* -------------------------------------------------------------------------- */

	if (imagenPortada["type"] != "image/jpeg" && imagenPortada["type"] != "image/png") {

		$(".fotoPortada").val("");

		Swal.fire({
      title: "¡Error al subir la imagen!",
      text: "La imagen debe estar en formato JPG o PNG",
      icon: "error",
      confirmButtonText: "Cerrar",
      closeOnConfirm: false,
    });

	}

	/* --------- End of VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG --------- */

	/* -------------------------------------------------------------------------- */
	/*                     VALIDAMOS EL EL TAMAÑO DE LA IMAGEN                    */
	/* -------------------------------------------------------------------------- */

	else if (imagenPortada["size"] > 4000000) {

		$(".fotoPortada").val("");

		Swal.fire({
      title: "¡Error al subir la imagen!",
      text: "La imagen no debe pesar más de 4MB",
      icon: "error",
      confirmButtonText: "Cerrar",
      closeOnConfirm: false,
    });

	}

	/* --------------- End of VALIDAMOS EL EL TAMAÑO DE LA IMAGEN --------------- */

	/* -------------------------------------------------------------------------- */
	/*                            VISUALIZAR LA IMAGEN                            */
	/* -------------------------------------------------------------------------- */

	else {

		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagenPortada);

		$(datosImagen).on("load", function(event) {
			var rutaImagen = event.target.result;
			$(".previsualizarPortada").attr("src", rutaImagen);
		})

	}

	/* ----------------------- End of VISUALIZAR LA IMAGEN ---------------------- */

})

/* ------------------- End of SUBIENDO LA FOTO DE PORTADA ------------------- */

/* -------------------------------------------------------------------------- */
/*                         SUBIENDO LA FOTO PRINCIPAL                         */
/* -------------------------------------------------------------------------- */

var imagenFotoPrincipal = null;

$(".fotoPrincipal").change(function() {

	imagenFotoPrincipal = this.files[0];

	/* -------------------------------------------------------------------------- */
	/*               VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG              */
	/* -------------------------------------------------------------------------- */

	if (imagenFotoPrincipal["type"] != "image/jpeg" && imagenFotoPrincipal["type"] != "image/png") {

		$(".fotoPrincipal").val("");

		Swal.fire({
      title: "¡Error al subir la imagen!",
      text: "La imagen debe estar en formato JPG o PNG",
      icon: "error",
      confirmButtonText: "Cerrar",
      closeOnConfirm: false,
    });

	}

	/* --------- End of VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG --------- */

	/* -------------------------------------------------------------------------- */
	/*                     VALIDAMOS EL EL TAMAÑO DE LA IMAGEN                    */
	/* -------------------------------------------------------------------------- */

	else if (imagenFotoPrincipal["size"] > 4000000) {

		$(".fotoPrincipal").val("");

		Swal.fire({
      title: "¡Error al subir la imagen!",
      text: "La imagen no debe pesar más de 4MB",
      icon: "error",
      confirmButtonText: "Cerrar",
      closeOnConfirm: false,
    });

	}

	/* --------------- End of VALIDAMOS EL EL TAMAÑO DE LA IMAGEN --------------- */

	/* -------------------------------------------------------------------------- */
	/*                            VISUALIZAR LA IMAGEN                            */
	/* -------------------------------------------------------------------------- */

	else {

		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagenFotoPrincipal);

		$(datosImagen).on("load", function(event) {
			var rutaImagen = event.target.result;
			$(".previsualizarPrincipal").attr("src", rutaImagen);
		})

	}

	/* ----------------------- End of VISUALIZAR LA IMAGEN ---------------------- */

})

/* -------------------- End of SUBIENDO LA FOTO PRINCIPAL ------------------- */

/* -------------------------------------------------------------------------- */
/*                               ACTIVAR OFERTA                               */
/* -------------------------------------------------------------------------- */

function activarOferta(event) {

	if (event == "oferta") {
		$(".datosOferta").show();
		$(".valorOferta").prop("required",true);
		$(".valorOferta").val("");
	} else {
		$(".datosOferta").hide();
		$(".valorOferta").prop("required",false);
		$(".valorOferta").val("");
	}

}


$(".selActivarOferta").change(function() { activarOferta($(this).val()) })

/* -------------------------- End of ACTIVAR OFERTA ------------------------- */

/* -------------------------------------------------------------------------- */
/*                                VALOR OFERTA                                */
/* -------------------------------------------------------------------------- */

$("#modalAgregarProducto .valorOferta").change(function() {

	if ($(".precio").val()!= 0) {

		if ($(this).attr("tipo") == "oferta") {

			var descuento = 100 - (Number($(this).val())*100/Number($(".precio").val()));

			$(".precioOferta").prop("readonly",true);
			$(".descuentoOferta").prop("readonly",false);
			$(".descuentoOferta").val(Math.ceil(descuento));

		}

		if ($(this).attr("tipo") == "descuento") {

			var oferta = Number($(".precio").val())-(Number($(this).val())*Number($(".precio").val())/100);

			$(".descuentoOferta").prop("readonly",true);
			$(".precioOferta").prop("readonly",false);
			$(".precioOferta").val(oferta);

		}

	} else {

		Swal.fire({
      title: "¡Error al agregar la oferta!",
      text: "Primero agregue un precio al producto",
      icon: "error",
      confirmButtonText: "Cerrar",
      closeOnConfirm: false,
    });

		$(".precioOferta").val(0);
		$(".descuentoOferta").val(0);
		$(".finOferta").val('');

		return;

	}

})

/* --------------------------- End of VALOR OFERTA -------------------------- */

/* -------------------------------------------------------------------------- */
/*                              CAMBIAR EL PRECIO                             */
/* -------------------------------------------------------------------------- */

$(".precio").change(function() {
	$(".precioOferta").val(0);
	$(".descuentoOferta").val(0);
})

/* ------------------------ End of CAMBIAR EL PRECIO ------------------------ */

/* -------------------------------------------------------------------------- */
/*                             GUARDAR EL PRODUCTO                            */
/* -------------------------------------------------------------------------- */

var multimediaFisica = null;

$(".guardarProducto").click(function() {

	/* -------------------------------------------------------------------------- */
	/*             PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS            */
	/* -------------------------------------------------------------------------- */

	if ($(".tituloProducto").val() != "" &&
			$(".seleccionarCategoria").val() != "" &&
			$(".seleccionarSubCategoria").val() != "" &&
			$("#descripcionProducto").val() != "" &&
			$(".pClavesProducto").val() != "") {

		/* -------------------------------------------------------------------------- */
		/*               PREGUNTAMOS SI VIENEN IMÁGENES PARA MULTIMEDIA               */
		/* -------------------------------------------------------------------------- */

		if ($(".rutaProducto").val() != "") {

			if (arrayFiles.length > 0) {

				var listaMultimedia = [];
				var finalFor = 0;

				for (var i = 0; i < arrayFiles.length; i++) {

					var datosMultimedia = new FormData();
					datosMultimedia.append("file", arrayFiles[i]);
					datosMultimedia.append("ruta", $(".rutaProducto").val());

					$.ajax({
						url:"ajax/productos.ajax.php",
						method: "POST",
						data: datosMultimedia,
						cache: false,
						contentType: false,
						processData: false,
						beforeSend: function() {

							$(".modal-footer .preload").html(`
								<center>
									<img src="vistas/img/plantilla/status.gif" id="status" />
									<br>
								</center>`);

						}, success: function(respuesta) {

							$("#status").remove();
							listaMultimedia.push({"foto" : respuesta.substr(3)})
							multimediaFisica = JSON.stringify(listaMultimedia);

							if ((finalFor + 1) == arrayFiles.length) {
								agregarMiProducto(multimediaFisica);
								finalFor = 0;
							}

							finalFor++;

						}

					})

				}

			} else {

				Swal.fire({
					title: "¡Llenar todos los campos!",
					text: "El campo multimedia no puede ir vacio",
					icon: "error",
					confirmButtonText: "Cerrar",
					closeOnConfirm: false,
				});

			}

		}

		/* ---------- End of PREGUNTAMOS SI VIENEN IMÁGENES PARA MULTIMEDIA --------- */

	} else {

		Swal.fire({
      title: "¡Llenar todos los campos!",
      text: "Todos los campos son obligatorios",
      icon: "error",
      confirmButtonText: "Cerrar",
      closeOnConfirm: false,
    });

	}

	/* ------- End of PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS ------- */

})

function agregarMiProducto(imagen) {

	var tituloProducto = $(".tituloProducto").val();
	var rutaProducto = $(".rutaProducto").val();
	var seleccionarCategoria = $(".seleccionarCategoria").val();
	var seleccionarSubCategoria = $(".seleccionarSubCategoria").val();
	var descripcionProducto = $("#descripcionProducto").val();
	var pClavesProducto = $(".pClavesProducto").val();
	var precio = $(".precio").val();
	var peso = $(".peso").val();
	var entrega = $(".entrega").val();
	var stock = $(".stock").val();
	var selActivarOferta = $(".selActivarOferta").val();
	var precioOferta = $(".precioOferta").val();
	var descuentoOferta = $(".descuentoOferta").val();
	var finOferta = $(".finOferta").val();

	var detalles = {"Talla": $(".detalleTalla").tagsinput('items'),
									"Color": $(".detalleColor").tagsinput('items')};

	var detallesString = JSON.stringify(detalles);

	var datosProducto = new FormData();
	datosProducto.append("tituloProducto", tituloProducto);
	datosProducto.append("rutaProducto", rutaProducto);
	datosProducto.append("detalles", detallesString);
	datosProducto.append("seleccionarCategoria", seleccionarCategoria);
	datosProducto.append("seleccionarSubCategoria", seleccionarSubCategoria);
	datosProducto.append("descripcionProducto", descripcionProducto);
	datosProducto.append("pClavesProducto", pClavesProducto);
	datosProducto.append("precio", precio);
	datosProducto.append("peso", peso);
	datosProducto.append("entrega", entrega);
	datosProducto.append("stock", stock);
	datosProducto.append("multimedia", imagen);
	datosProducto.append("fotoPortada", imagenPortada);
	datosProducto.append("fotoPrincipal", imagenFotoPrincipal);
	datosProducto.append("selActivarOferta", selActivarOferta);
	datosProducto.append("precioOferta", precioOferta);
	datosProducto.append("descuentoOferta", descuentoOferta);
	datosProducto.append("finOferta", finOferta);

	$.ajax({
		url:"ajax/productos.ajax.php",
		method: "POST",
		data: datosProducto,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta) {

			if (respuesta == "ok") {

				Swal.fire({
					title: "¡GUARDADO!",
					text: "El producto ha sido guardado correctamente",
					icon: "success",
					confirmButtonText: "Cerrar",
					closeOnConfirm: false,
				}).then((isConfirm) => {
					if (isConfirm) {
						window.location = "productos";
					}
				})

			}

		}

	})

}

/* ----------------------- End of GUARDAR EL PRODUCTO ----------------------- */