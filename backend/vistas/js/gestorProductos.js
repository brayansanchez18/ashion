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