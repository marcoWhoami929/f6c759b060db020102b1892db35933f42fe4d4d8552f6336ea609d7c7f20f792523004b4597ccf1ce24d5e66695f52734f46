/*=============================================
AGREGAR SLIDE
=============================================*/

$(".agregarSlide").click(function () {
  var image = "vistas/img/slide/default/fondo.png";
  var activeSlide = 1;
  var title = '{"texto":"#Expertos","color":"#ffffff"}';
  var subtitle = '{"texto":"en recubrimientos","color":"#ffffff"}';
  var textButton = "Ver más";
  var action = "";
  var buttonActive = 1;

  var datos = new FormData();
  datos.append("crearSlide", "ok");
  datos.append("image", image);
  datos.append("activeSlide", activeSlide);
  datos.append("title", title);
  datos.append("subtitle", subtitle);
  datos.append("textButton", textButton);
  datos.append("action", action);
  datos.append("buttonActive", buttonActive);

  $.ajax({
    url: "ajax/slide.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      if (respuesta == "ok") {
        swal({
          type: "success",
          title: "El slide ha sido agregado correctamente",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
        }).then((result) => {
          if (result.value) {
            window.location = "slide";
          }
        });
      }
    },
  });
});

/*=============================================
CAMBIAR EL ORDEN DEL SLIDE
=============================================*/
var itemSlide = $(".itemSlide");

$(".todo-list").sortable({
  placeholder: "sort-highlight",
  handle: ".handle",
  forcePlaceholderSize: true,
  zIndex: 999999,
  stop: function (event) {
    for (var i = 0; i < itemSlide.length; i++) {
      var datos = new FormData();
      datos.append("idSlide", event.target.children[i].id);
      datos.append("orden", i + 1);

      $.ajax({
        url: "ajax/slide.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {},
      });
    }
  },
});

/*=============================================
VARIABLES GLOBALES PARA CAMBIOS DEL SLIDE
=============================================*/

var guardarSlide = $(".guardarSlide");
var activeSlide = $(".activeSlide");
var activeSlideTrue = $(".activeSlideTrue");
var activeSlideFalse = $(".activeSlideFalse");
var buttonActive = $(".buttonActive");
var buttonActiveTrue = $(".buttonActiveTrue");
var buttonActiveFalse = $(".buttonActiveFalse");
var previsualizarFondo = $(".previsualizarFondo");
var subirFondo = null;

/*=============================================
ACTUALIZAR NOMBRE SLIDE
=============================================*/

$(".nombreSlide").change(function () {
  var nombre = $(this).val();
  var indiceSlide = $(this).attr("indice");

  $(guardarSlide[indiceSlide]).attr("nameSlide", nombre);
});

/*=============================================
CHECKED PARA ACTIVE SLIDE
=============================================*/
for (var i = 0; i < activeSlide.length; i++) {
  if ($(activeSlide[i]).val() == "1") {
    $(activeSlideTrue[i]).parent().addClass("checked");
  } else {
    $(activeSlideFalse[i]).parent().addClass("checked");
  }
}
/*=============================================
CAMBIO DE ACTIVE SLIDE
=============================================*/

for (var i = 0; i < activeSlide.length; i++) {
  $("input[name='activeSlide" + i + "']").on("ifChecked", function () {
    var activeSlide = $(this).val();
    var indiceSlide = $(this).attr("indice");
    $(guardarSlide[indiceSlide]).attr("activeSlide", activeSlide);
  });
}
/*=============================================
CHECKED PARA BUTTON ACTIVE
=============================================*/
for (var i = 0; i < buttonActive.length; i++) {
  if ($(buttonActive[i]).val() == "1") {
    $(buttonActiveTrue[i]).parent().addClass("checked");
  } else {
    $(buttonActiveFalse[i]).parent().addClass("checked");
  }
}
/*=============================================
CAMBIO DE TIPO DE SLIDE
=============================================*/

for (var i = 0; i < buttonActive.length; i++) {
  $("input[name='buttonActive" + i + "']").on("ifChecked", function () {
    var buttonActive = $(this).val();
    var indiceSlide = $(this).attr("indice");
    $(guardarSlide[indiceSlide]).attr("buttonActive", buttonActive);
  });
}
/*=============================================
CAMBIO DE FONDO
=============================================*/
$(".subirFondo").change(function () {
  var imagenFondo = this.files[0];

  var indiceSlide = $(this).attr("indice");

  /*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	=============================================*/

  if (
    imagenFondo["type"] != "image/jpeg" &&
    imagenFondo["type"] != "image/png"
  ) {
    $(".subirFondo").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else if (imagenFondo["size"] > 2000000) {
    $(".subirFondo").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen no debe pesar más de 2MB!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagenFondo);

    $(datosImagen).on("load", function (event) {
      var rutaImagen = event.target.result;
      $(previsualizarFondo[indiceSlide]).attr("src", rutaImagen);

      $(guardarSlide[indiceSlide]).attr("image", "");
    });
  }
});

/*=============================================
CAMBIAR TEXTO Y COLOR SLIDE
=============================================*/

// TEXTO Y COLOR 1

$(".cambioTituloTexto1").change(function () {
  var indiceSlide = $(this).attr("indice");
  var texto1 = $(this).val();

  $(guardarSlide[indiceSlide]).attr("titleTexto", texto1);
});

$(".cambioColorTexto1").change(function () {
  var indiceSlide = $(this).attr("indice");
  var color1 = $(this).val();

  $(guardarSlide[indiceSlide]).attr("titleColor", color1);
});

// TEXTO Y COLOR 2

$(".cambioTituloTexto2").change(function () {
  var indiceSlide = $(this).attr("indice");
  var texto2 = $(this).val();

  $(guardarSlide[indiceSlide]).attr("subtitleTexto", texto2);
});

$(".cambioColorTexto2").change(function () {
  var indiceSlide = $(this).attr("indice");
  var color2 = $(this).val();

  $(guardarSlide[indiceSlide]).attr("subtitleColor", color2);
});

/*=============================================
CAMBIO DE BOTÓN
=============================================*/

$(".botonSlide").change(function () {
  var textoBoton = $(this).val();
  var indiceSlide = $(this).attr("indice");

  $(guardarSlide[indiceSlide]).attr("textButton", textoBoton);
});

/*=============================================
CAMBIO DE URL BOTÓN
=============================================*/

$(".urlSlide").change(function () {
  var urlBoton = $(this).val();
  var indiceSlide = $(this).attr("indice");
  var botonSlide = $(".botonSlide");

  if ($(botonSlide[indiceSlide]).val() == "") {
    $(".urlSlide").val("");

    swal({
      title: "Error al poner la URL",
      text: "¡Debe escribir primero el texto del botón!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else {
    $(guardarSlide[indiceSlide]).attr("action", urlBoton);
  }
});

/*=============================================
GUARDAR SLIDE
=============================================*/

$(".guardarSlide").click(function () {
  var id = $(this).attr("id");
  var indiceSlide = $(this).attr("indice");
  var nameSlide = $(this).attr("nameSlide");
  var activeSlide = $(this).attr("activeSlide");
  var buttonActive = $(this).attr("buttonActive");

  // CAPTURAMOS EL CAMBIO DE FONDO

  var image = $(this).attr("image");

  if (image == "") {
    subirFondo = $(".subirFondo");

    image = $(this).attr("routeImage");
  }

  // CAPTURAMOS EL TÍTULO 1

  var titleTexto = $(this).attr("titleTexto");
  var titleColor = $(this).attr("titleColor");

  var title = { texto: titleTexto, color: titleColor };

  // CAPTURAMOS EL TÍTULO 2

  var subtitleTexto = $(this).attr("subtitleTexto");
  var subtitleColor = $(this).attr("subtitleColor");

  var subtitle = { texto: subtitleTexto, color: subtitleColor };

  var textButton = $(this).attr("textButton");
  var action = $(this).attr("action");

  /*=============================================
	AJAX
	=============================================*/

  var datos = new FormData();
  datos.append("id", id);
  datos.append("nameSlide", nameSlide);
  datos.append("activeSlide", activeSlide);
  datos.append("buttonActive", buttonActive);

  // ENVIAMOS EL CAMBIO DE FONDO

  datos.append("image", image);

  if (subirFondo != null) {
    datos.append("subirFondo", subirFondo[indiceSlide].files[0]);
  } else {
    datos.append("subirFondo", subirFondo);
  }

  // ENVIAMOS EL CAMBIO DE TITLE

  datos.append("title", JSON.stringify(title));

  // ENVIAMOS EL CAMBIO DE SUBTITLE

  datos.append("subtitle", JSON.stringify(subtitle));

  datos.append("textButton", textButton);
  datos.append("action", action);

  $.ajax({
    url: "ajax/slide.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      if (respuesta == "ok") {
        swal({
          type: "success",
          title: "El slide ha sido actualizado correctamente",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
        }).then((result) => {
          if (result.value) {
            window.location = "slide";
          }
        });
      }
    },
  });
});

/*=============================================
ELIMINAR SLIDE
=============================================*/

$(".eliminarSlide").click(function () {
  var idSlide = $(this).attr("id");
  var image = $(this).attr("image");

  swal({
    title: "¿Está seguro de borrar el slide?",
    text: "¡Si no lo está puede cancelar la accíón!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar slide!",
  }).then((result) => {
    if (result.value) {
      window.location =
        "index.php?ruta=slide&idSlide=" + idSlide + "&image=" + image;
    }
  });
});
