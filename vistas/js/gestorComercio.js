/*=============================================
SUBIR LOGOTIPO
=============================================*/

$("#subirLogo").change(function () {
  var imagenLogo = this.files[0];

  /*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  if (imagenLogo["type"] != "image/jpeg" && imagenLogo["type"] != "image/png") {
    $("#subirLogo").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });

    /*=============================================
  	VALIDAMOS EL TAMAÑO DE LA IMAGEN
  	=============================================*/
  } else if (imagenLogo["size"] > 2000000) {
    $("#subirLogo").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen no debe pesar más de 2MB!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });

    /*=============================================
  	PREVISUALIZAMOS LA IMAGEN
  	=============================================*/
  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagenLogo);

    $(datosImagen).on("load", function (event) {
      var rutaImagen = event.target.result;

      $(".previsualizarLogo").attr("src", rutaImagen);
    });
  }

  /*=============================================
  	GUARDAR EL LOGOTIPO
  	=============================================*/

  $("#guardarLogo").click(function () {
    var datos = new FormData();
    datos.append("imagenLogo", imagenLogo);

    $.ajax({
      url: "ajax/comercio.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function (respuesta) {
        if (respuesta == "ok") {
          swal({
            title: "Cambios guardados",
            text: "¡La plantilla ha sido actualizada correctamente!",
            type: "success",
            confirmButtonText: "¡Cerrar!",
          });
        }
      },
    });
  });
});

/*=============================================
SUBIR ICONO
=============================================*/

$("#subirIcono").change(function () {
  var imagenIcono = this.files[0];

  /*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  if (
    imagenIcono["type"] != "image/jpeg" &&
    imagenIcono["type"] != "image/png"
  ) {
    $("#subirIcono").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });

    /*=============================================
  	VALIDAMOS EL TAMAÑO DE LA IMAGEN
  	=============================================*/
  } else if (imagenIcono["size"] > 2000000) {
    $("#subirIcono").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen no debe pesar más de 2MB!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });

    /*=============================================
  	PREVISUALIZAMOS LA IMAGEN
  	=============================================*/
  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagenIcono);

    $(datosImagen).on("load", function (event) {
      var rutaImagen = event.target.result;

      $(".previsualizarIcono").attr("src", rutaImagen);
    });
  }

  /*=============================================
  	GUARDAR EL ICONO
  	=============================================*/

  $("#guardarIcono").click(function () {
    var datos = new FormData();
    datos.append("imagenIcono", imagenIcono);

    $.ajax({
      url: "ajax/comercio.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function (respuesta) {
        if (respuesta == "ok") {
          swal({
            title: "Cambios guardados",
            text: "¡La plantilla ha sido actualizada correctamente!",
            type: "success",
            confirmButtonText: "¡Cerrar!",
          });
        }
      },
    });
  });
});

/*=============================================
CAMBIAR COLOR
=============================================*/

$("#guardarColores").click(function () {
  var messageSuperior = $("#messageSuperior").val();

  var nuestraEmpresa = $("#nuestraEmpresa").val();

  var phoneSuperior = $("#phoneSuperior").val();

  var emailSuperior = $("#emailSuperior").val();

  var barraSuperior = $("#barraSuperior").val();

  var textoSuperior = $("#textoSuperior").val();

  var colorFondo = $("#colorFondo").val();

  var colorTexto = $("#colorTexto").val();

  var datos = new FormData();
  datos.append("messageSuperior", messageSuperior);
  datos.append("nuestraEmpresa", nuestraEmpresa);
  datos.append("phoneSuperior", phoneSuperior);
  datos.append("emailSuperior", emailSuperior);
  datos.append("barraSuperior", barraSuperior);
  datos.append("textoSuperior", textoSuperior);
  datos.append("colorFondo", colorFondo);
  datos.append("colorTexto", colorTexto);

  $.ajax({
    url: "ajax/comercio.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      console.log("respuesta", respuesta);

      if (respuesta == "ok") {
        swal({
          title: "Cambios guardados",
          text: "¡La plantilla ha sido actualizada correctamente!",
          type: "success",
          confirmButtonText: "¡Cerrar!",
        });
      }
    },
  });
});
/*=============================================
CAMBIAR COLOR REDES SOCIALES
=============================================*/

var checkBox = $(".seleccionarRed");

$("input[name='colorRedSocial']").on("ifChecked", function () {
  var color = $(this).val();
  var colorRed = null;

  var iconos = $(".redSocial");
  var redes = [
    "facebook",
    "instagram",
    "linkedin",
    "youtube",
    "tiktok",
    "whatsapp",
    "envelope",
  ];

  if (color == "color") {
    colorRed = "Color";
  } else if (color == "blanco") {
    colorRed = "Blanco";
  } else {
    colorRed = "Negro";
  }

  for (var i = 0; i < iconos.length; i++) {
    if (redes[i] == "envelope") {
      $(iconos[i]).attr(
        "class",
        "fa-solid fa-" + redes[i] + " " + redes[i] + colorRed + " redSocial"
      );
    } else {
      $(iconos[i]).attr(
        "class",
        "fa-brands fa-" + redes[i] + " " + redes[i] + colorRed + " redSocial"
      );
    }

    $(checkBox[i]).attr("estilo", redes[i] + colorRed);
  }

  crearDatosJsonRedes();
});

/*=============================================
CAMBIAR URL REDES SOCIALES
=============================================*/
$(".cambiarUrlRed").change(function () {
  var cambiarUrlRed = $(".cambiarUrlRed");

  for (var i = 0; i < cambiarUrlRed.length; i++) {
    $(checkBox[i]).attr("ruta", $(cambiarUrlRed[i]).val());
  }

  crearDatosJsonRedes();
});

/*=============================================
QUITAR RED SOCIAL
=============================================*/
$(".seleccionarRed").on("ifUnchecked", function () {
  $(this).attr("validarRed", "");

  crearDatosJsonRedes();
});

/*=============================================
AGREGAR RED SOCIAL
=============================================*/

$(".seleccionarRed").on("ifChecked", function () {
  $(this).attr("validarRed", $(this).attr("red"));

  crearDatosJsonRedes();
});

/*=============================================
CREAR DATOS JSON PARA ALMACENAR EN BD
=============================================*/

function crearDatosJsonRedes() {
  var redesSociales = [];

  for (var i = 0; i < checkBox.length; i++) {
    if ($(checkBox[i]).attr("validarRed") != "") {
      redesSociales.push({
        red: $(checkBox[i]).attr("red"),
        estilo: $(checkBox[i]).attr("estilo"),
        url: $(checkBox[i]).attr("ruta"),
        activo: 1,
      });
    } else {
      redesSociales.push({
        red: $(checkBox[i]).attr("red"),
        estilo: $(checkBox[i]).attr("estilo"),
        url: $(checkBox[i]).attr("ruta"),
        activo: 0,
      });
    }

    $("#valorRedesSociales").val(JSON.stringify(redesSociales));
  }
}

/*=============================================
GUARDAR REDES SOCIALES
=============================================*/

$("#guardarRedesSociales").click(function () {
  var valorRedesSociales = $("#valorRedesSociales").val();

  var datos = new FormData();
  datos.append("redesSociales", valorRedesSociales);

  $.ajax({
    url: "ajax/comercio.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      if (respuesta == "ok") {
        swal({
          title: "Cambios guardados",
          text: "¡La plantilla ha sido actualizada correctamente!",
          type: "success",
          confirmButtonText: "¡Cerrar!",
        });
      }
    },
  });
});

/*=============================================
CAMBIAR CÓDIGOS
=============================================*/

$(".cambioScript").change(function () {
  var apiFacebook = $("#apiFacebook").val();

  var pixelFacebook = $("#pixelFacebook").val();

  var googleAnalytics = $("#googleAnalytics").val();

  $("#guardarScript").click(function () {
    var datos = new FormData();
    datos.append("apiFacebook", apiFacebook);
    datos.append("pixelFacebook", pixelFacebook);
    datos.append("googleAnalytics", googleAnalytics);

    $.ajax({
      url: "ajax/comercio.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function (respuesta) {
        if (respuesta == "ok") {
          swal({
            title: "Cambios guardados",
            text: "¡La plantilla ha sido actualizada correctamente!",
            type: "success",
            confirmButtonText: "¡Cerrar!",
          });
        }
      },
    });
  });
});
