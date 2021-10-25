/* -------------------------------------------------------------------------- */
/*                               SUBIR LOGOTIPO                               */
/* -------------------------------------------------------------------------- */

$("#subirLogo").change(function() {

  var imagenLogo = this.files[0];

  /* -------------------------------------------------------------------------- */
  /*               VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG              */
  /* -------------------------------------------------------------------------- */

  if (imagenLogo["type"] != "image/jpeg" && imagenLogo["type"] != "image/png") {

    $("#subirLogo").val("");

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
  /*                      VALIDAMOS EL TAMAÑO DE LA IMAGEN                      */
  /* -------------------------------------------------------------------------- */

  else if (imagenLogo["size"] > 10000000) {

    $("#subirLogo").val("");

    Swal.fire({
      title: "¡Error al subir la imagen!",
      text: "La imagen no debe pesar más de 10MB",
      icon: "error",
      confirmButtonText: "Cerrar",
      closeOnConfirm: false,
    });

  }

  /* ----------------- End of VALIDAMOS EL TAMAÑO DE LA IMAGEN ---------------- */

  /* -------------------------------------------------------------------------- */
  /*                          PREVISUALIZAMOS LA IMAGEN                         */
  /* -------------------------------------------------------------------------- */

  else {

    var datosImagen = new FileReader;
    datosImagen.readAsDataURL(imagenLogo);

    $(datosImagen).on("load", function(event){
      var rutaImagen = event.target.result;
      $(".previsualizarLogo").attr("src", rutaImagen);
    })

  }

  /* -------------------- End of PREVISUALIZAMOS LA IMAGEN -------------------- */

  /* -------------------------------------------------------------------------- */
  /*                             GUARDAR EL LOGOTIPO                            */
  /* -------------------------------------------------------------------------- */

  $("#guardarLogo").click(function() {

    var datos = new FormData();
    datos.append("imagenLogo", imagenLogo);

    $.ajax({
      url:"ajax/comercio.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta) {
        if (respuesta == "ok") {
          Swal.fire({
            title: "¡Cambios guardados!",
            text: "La plantilla ha sido actualizada correctamente",
            icon: "success",
            confirmButtonText: "Cerrar",
            closeOnConfirm: false,
          }).then((isConfirm) => {
            if (isConfirm) {
              window.location = 'comercio';
            }
          });
        }
      }
    })

  })

  /* ----------------------- End of GUARDAR EL LOGOTIPO ----------------------- */

})

/* -------------------------- End of SUBIR LOGOTIPO ------------------------- */

/* -------------------------------------------------------------------------- */
/*                                 SUBIR ICONO                                */
/* -------------------------------------------------------------------------- */

$("#subirIcono").change(function() {
  var imagenIcono = this.files[0];

  /* -------------------------------------------------------------------------- */
  /*               VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG              */
  /* -------------------------------------------------------------------------- */

  if (imagenIcono["type"] != "image/jpeg" && imagenIcono["type"] != "image/png") {

    $("#subirIcono").val("");

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
  /*                      VALIDAMOS EL TAMAÑO DE LA IMAGEN                      */
  /* -------------------------------------------------------------------------- */

  else if(imagenIcono["size"] > 10000000) {

    $("#subirLogo").val("");

    Swal.fire({
      title: "¡Error al subir la imagen!",
      text: "La imagen no debe pesar más de 10MB",
      icon: "error",
      confirmButtonText: "Cerrar",
      closeOnConfirm: false,
    });

  }

  /* ----------------- End of VALIDAMOS EL TAMAÑO DE LA IMAGEN ---------------- */

  /* -------------------------------------------------------------------------- */
  /*                          PREVISUALIZAMOS LA IMAGEN                         */
  /* -------------------------------------------------------------------------- */

  else {

    var datosImagen = new FileReader;
    datosImagen.readAsDataURL(imagenIcono);

    $(datosImagen).on("load", function(event) {
      var rutaImagen = event.target.result;
      $(".previsualizarIcono").attr("src", rutaImagen);
    })

  }

  /* -------------------- End of PREVISUALIZAMOS LA IMAGEN -------------------- */

  /* -------------------------------------------------------------------------- */
  /*                              GUARDAR EL ICONO                              */
  /* -------------------------------------------------------------------------- */

  $("#guardarIcono").click(function() {

    var datos = new FormData();
		datos.append("imagenIcono", imagenIcono);

    $.ajax({

			url:"ajax/comercio.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
        if (respuesta == "ok") {
          Swal.fire({
            title: "¡Cambios guardados!",
            text: "La plantilla ha sido actualizada correctamente",
            icon: "success",
            confirmButtonText: "Cerrar",
            closeOnConfirm: false,
          }).then((isConfirm) => {
            if (isConfirm) {
              window.location = 'comercio';
            }
          });
        }
			}
		});

  })

  /* ------------------------- End of GUARDAR EL ICONO ------------------------ */

})

/* --------------------------- End of SUBIR ICONO --------------------------- */

/* -------------------------------------------------------------------------- */
/*                         CAMBIAR URL REDES SOCIALES                         */
/* -------------------------------------------------------------------------- */

var checkBox = $(".seleccionarRed");

$(".cambiarUrlRed").change(function() {
	var cambiarUrlRed = $(".cambiarUrlRed");

	for (var i = 0; i < cambiarUrlRed.length; i++) {
		$(checkBox[i]).attr("ruta", $(cambiarUrlRed[i]).val());
	}

	crearDatosJsonRedes();

})

/* -------------------- End of CAMBIAR URL REDES SOCIALES ------------------- */

/* -------------------------------------------------------------------------- */
/*                              QUITAR RED SOCIAL                             */
/* -------------------------------------------------------------------------- */

$(".seleccionarRed").on("ifUnchecked",function() {
	// $(this).attr("validarRed","");
	// crearDatosJsonRedes();
  console.log('esta deseleccionado')
})

/* ------------------------ End of QUITAR RED SOCIAL ------------------------ */

/* -------------------------------------------------------------------------- */
/*                             AGREGAR RED SOCIAL                             */
/* -------------------------------------------------------------------------- */

$(".seleccionarRed").on("ifChecked",function() {
	// $(this).attr("validarRed", $(this).attr("red"));
	// crearDatosJsonRedes();
  console.log('esta seleccionado')
})

/* ------------------------ End of AGREGAR RED SOCIAL ----------------------- */

/* -------------------------------------------------------------------------- */
/*                    CREAR DATOS JSON PARA ALMACENAR EN BD                   */
/* -------------------------------------------------------------------------- */

function crearDatosJsonRedes() {

  var redesSociales = [];

  for (var i = 0; i < checkBox.length; i++) {

    if ($(checkBox[i]).attr("validarRed") != "") {

      redesSociales.push({"red": $(checkBox[i]).attr("red"),
                          "url": $(checkBox[i]).attr("ruta"),
                          "activo": 1})


    }

    $("#valorRedesSociales").val(JSON.stringify(redesSociales));

  }

}

/* -------------- End of CREAR DATOS JSON PARA ALMACENAR EN BD -------------- */

/* -------------------------------------------------------------------------- */
/*                           GUARDAR REDES SOCIALES                           */
/* -------------------------------------------------------------------------- */

$("#guardarRedesSociales").click(function(){

  var valorRedesSociales = $("#valorRedesSociales").val();

  var datos = new FormData();
  datos.append("redesSociales", valorRedesSociales);

  $.ajax({

    url:"ajax/comercio.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta){
      console.log('%cMyProject%cline:307%crespuesta', 'color:#fff;background:#ee6f57;padding:3px;border-radius:2px', 'color:#fff;background:#1f3c88;padding:3px;border-radius:2px', 'color:#fff;background:rgb(178, 190, 126);padding:3px;border-radius:2px', respuesta)
    }

  })

})

/* ---------------------- End of GUARDAR REDES SOCIALES --------------------- */