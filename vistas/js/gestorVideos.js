/*=============================================
CARGAR LA TABLA DINÁMICA DE VIDEOS
=============================================*/
$(".tablaVideos").DataTable({
  ajax: "ajax/tablaVideos.ajax.php",
  deferRender: true,
  retrieve: true,
  processing: true,
  language: {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sSearch: "Buscar:",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
      sFirst: "Primero",
      sLast: "Último",
      sNext: "Siguiente",
      sPrevious: "Anterior",
    },
    oAria: {
      sSortAscending: ": Activar para ordenar la columna de manera ascendente",
      sSortDescending:
        ": Activar para ordenar la columna de manera descendente",
    },
  },
});

/*=============================================
  ACTIVAR VIDEOS
  =============================================*/

$(".tablaVideos tbody").on("click", ".btnActivar", function () {
  var idVideo = $(this).attr("idVideo");
  var estadoVideo = $(this).attr("estadoVideo");

  var datos = new FormData();
  datos.append("activarId", idVideo);
  datos.append("activarVideo", estadoVideo);

  $.ajax({
    url: "ajax/videos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      console.log("respuesta", respuesta);
    },
  });

  if (estadoVideo == 0) {
    $(this).removeClass("btn-success");
    $(this).addClass("btn-danger");
    $(this).html("Desactivado");
    $(this).attr("estadoVideo", 1);
  } else {
    $(this).addClass("btn-success");
    $(this).removeClass("btn-danger");
    $(this).html("Activado");
    $(this).attr("estadoVideo", 0);
  }
});

/*=============================================
  SUBIENDO LA FOTO DE VIDEO
  =============================================*/

$(".fotoVideo").change(function () {
  var imagen = this.files[0];

  /*=============================================
        VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
        =============================================*/
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".fotoVideo").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });

    return;
  } else if (imagen["size"] > 2000000) {
    $(".fotoVideo").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen no debe pesar más de 2MB!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });

    return;
  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function (event) {
      var rutaImagen = event.target.result;

      $(".previsualizarVideo").attr("src", rutaImagen);
    });
  }
});

/*=============================================
  EDITAR VIDEO
  =============================================*/

$(".tablaVideos tbody").on("click", ".btnEditarVideo", function () {
  var idVideo = $(this).attr("idVideo");

  var datos = new FormData();
  datos.append("idVideo", idVideo);

  $.ajax({
    url: "ajax/videos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#modalEditarVideo .idVideo").val(respuesta["id"]);

      /*=============================================
              CARGAMOS LA IMAGEN DE BANNER
              =============================================*/

      $("#modalEditarVideo .previsualizarVideo").attr(
        "src",
        respuesta["image"]
      );
      $("#modalEditarVideo .antiguaFotoVideo").val(respuesta["image"]);
      $("#modalEditarVideo .editarTituloVideo").val(respuesta["title"]);
      $("#modalEditarVideo .editarCodigoVideo").val(respuesta["url"]);
    },
  });
});

/*=============================================
  ELIMINAR VIDEO
  =============================================*/
$(".tablaVideos tbody").on("click", ".btnEliminarVideo", function () {
  var idVideo = $(this).attr("idVideo");
  var imgVideo = $(this).attr("imgVideo");

  swal({
    title: "¿Está seguro de borrar el video?",
    text: "¡Si no lo está puede cancelar la accíón!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar video!",
  }).then(function (result) {
    if (result.value) {
      window.location =
        "index.php?ruta=videos&idVideo=" + idVideo + "&imgVideo=" + imgVideo;
    }
  });
});
