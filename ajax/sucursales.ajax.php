<?php

require_once "../controladores/sucursales.controlador.php";
require_once "../modelos/sucursales.modelo.php";


class AjaxSucursales
{


    /*=============================================
  ACTIVAR SUCURSAL
  =============================================*/

    public $activarSucursal;
    public $activarId;

    public function ajaxActivarSucursal()
    {

        $respuesta = ModeloSucursales::mdlActualizarSucursal("stores", "active", $this->activarSucursal, "id", $this->activarId);

        echo $respuesta;
    }
    /*=============================================
  EDITAR SUCURSAL
  =============================================*/

    public $idSucursal;

    public function ajaxEditarSucursal()
    {

        $item = "id";
        $valor = $this->idSucursal;

        $respuesta = ControladorSucursales::ctrMostrarSucursales($item, $valor);

        echo json_encode($respuesta);
    }
}
/*=============================================
ACTIVAR SUCURSAL
=============================================*/

if (isset($_POST["activarSucursal"])) {

    $activarSucursal = new AjaxSucursales();
    $activarSucursal->activarSucursal = $_POST["activarSucursal"];
    $activarSucursal->activarId = $_POST["activarId"];
    $activarSucursal->ajaxActivarSucursal();
}

/*=============================================
EDITAR SUCURSAL
=============================================*/
if (isset($_POST["idSucursal"])) {

    $editar = new AjaxSucursales();
    $editar->idSucursal = $_POST["idSucursal"];
    $editar->ajaxEditarSucursal();
}
