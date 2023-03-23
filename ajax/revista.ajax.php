<?php

require_once "../controladores/revista.controlador.php";
require_once "../modelos/revista.modelo.php";


class AjaxRevista
{


    /*=============================================
  ACTIVAR REVISTA
  =============================================*/

    public $activarRevista;
    public $activarId;

    public function ajaxActivarRevista()
    {

        $respuesta = ModeloRevista::mdlActualizarRevista("magazine", "active", $this->activarRevista, "id", $this->activarId);

        echo $respuesta;
    }
    /*=============================================
  EDITAR REVISTA
  =============================================*/

    public $idRevista;

    public function ajaxEditarRevista()
    {

        $item = "id";
        $valor = $this->idRevista;

        $respuesta = ControladorRevista::ctrMostrarRevista($item, $valor);

        echo json_encode($respuesta);
    }
}
/*=============================================
ACTIVAR REVISTA
=============================================*/

if (isset($_POST["activarRevista"])) {

    $activarRevista = new AjaxRevista();
    $activarRevista->activarRevista = $_POST["activarRevista"];
    $activarRevista->activarId = $_POST["activarId"];
    $activarRevista->ajaxActivarRevista();
}

/*=============================================
EDITAR REVISTA
=============================================*/
if (isset($_POST["idRevista"])) {

    $editar = new AjaxRevista();
    $editar->idRevista = $_POST["idRevista"];
    $editar->ajaxEditarRevista();
}
