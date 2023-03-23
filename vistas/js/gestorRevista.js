/*=============================================
CARGAR LA TABLA DINÁMICA DE REVISTA
=============================================*/
$(".tablaRevista").DataTable({
  ajax: "ajax/tablaRevista.ajax.php",
  deferRender: true,
  retrieve: true,
  pageLength: 100,
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
    ACTIVAR SUCURSAL
    =============================================*/

$(".tablaRevista tbody").on("click", ".btnActivar", function () {
  var idRevista = $(this).attr("idRevista");
  var estadoRevista = $(this).attr("estadoRevista");

  var datos = new FormData();
  datos.append("activarId", idRevista);
  datos.append("activarRevista", estadoRevista);

  $.ajax({
    url: "ajax/revista.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      // console.log("respuesta", respuesta);
    },
  });

  if (estadoRevista == 0) {
    $(this).removeClass("btn-success");
    $(this).addClass("btn-danger");
    $(this).html("Desactivado");
    $(this).attr("estadoRevista", 1);
  } else {
    $(this).addClass("btn-success");
    $(this).removeClass("btn-danger");
    $(this).html("Activado");
    $(this).attr("estadoRevista", 0);
  }
});

/*=============================================
    SUBIENDO LA FOTO DE PORTADA
    =============================================*/

$(".fotoPortada").change(function () {
  var imagen = this.files[0];

  /*=============================================
          VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
          =============================================*/
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".fotoPortada").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });

    return;
  } else if (imagen["size"] > 2000000) {
    $(".fotoPortada").val("");

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

      $(".previsualizarPortada").attr("src", rutaImagen);
    });
  }
});
/*=============================================
    EDITAR REVISTA
    =============================================*/

$(".tablaRevista tbody").on("click", ".btnEditarRevista", function () {
  var idRevista = $(this).attr("idRevista");

  var datos = new FormData();
  datos.append("idRevista", idRevista);

  $.ajax({
    url: "ajax/revista.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#modalEditarRevista .editarIdRevista").val(respuesta["id"]);
      $("#modalEditarRevista .tituloRevista").val(respuesta["title"]);
      $("#modalEditarRevista .marcaRevista").val(respuesta["brand"]);

      /*=============================================
      CARGAMOS LA IMAGEN DE PORTADA
      =============================================*/

      $("#modalEditarRevista .previsualizarPortada").attr(
        "src",
        respuesta["image"]
      );
      $("#modalEditarRevista .antiguaFotoPortada").val(respuesta["image"]);
    },
  });
});
