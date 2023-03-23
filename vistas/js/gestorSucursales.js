/*=============================================
CARGAR LA TABLA DINÁMICA DE SUCURSALES
=============================================*/
$(".tablaSucursales").DataTable({
  ajax: "ajax/tablaSucursales.ajax.php",
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
  ACTIVAR SUCURSAL
  =============================================*/

$(".tablaSucursales tbody").on("click", ".btnActivar", function () {
  var idSucursal = $(this).attr("idSucursal");
  var estadoSucursal = $(this).attr("estadoSucursal");

  var datos = new FormData();
  datos.append("activarId", idSucursal);
  datos.append("activarSucursal", estadoSucursal);

  $.ajax({
    url: "ajax/sucursales.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      // console.log("respuesta", respuesta);
    },
  });

  if (estadoSucursal == 0) {
    $(this).removeClass("btn-success");
    $(this).addClass("btn-danger");
    $(this).html("Desactivado");
    $(this).attr("estadoSucursal", 1);
  } else {
    $(this).addClass("btn-success");
    $(this).removeClass("btn-danger");
    $(this).html("Activado");
    $(this).attr("estadoSucursal", 0);
  }
});

/*=============================================
  EDITAR SUCURSAL
  =============================================*/

$(".tablaSucursales tbody").on("click", ".btnEditarSucursal", function () {
  var idSucursal = $(this).attr("idSucursal");

  var datos = new FormData();
  datos.append("idSucursal", idSucursal);

  $.ajax({
    url: "ajax/sucursales.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#modalEditarSucursal .editarIdSucursal").val(respuesta["id"]);

      $("#modalEditarSucursal .nombreSucursal").val(respuesta["store"]);
      $("#modalEditarSucursal .editarDomicilioSucursal").val(
        respuesta["domicile"]
      );
      $("#modalEditarSucursal .coloniaSucursal").val(respuesta["suburb"]);
      $("#modalEditarSucursal .codigoPostalSucursal").val(
        respuesta["postalCode"]
      );
      $("#modalEditarSucursal .phoneSucursal").val(respuesta["phone"]);
      $("#modalEditarSucursal .phone2Sucursal").val(respuesta["phone2"]);
    },
  });
});
