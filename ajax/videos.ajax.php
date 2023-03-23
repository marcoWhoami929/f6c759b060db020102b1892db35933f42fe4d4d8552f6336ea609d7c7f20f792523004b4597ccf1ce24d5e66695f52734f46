<?php

require_once "../controladores/videos.controlador.php";
require_once "../modelos/videos.modelo.php";


class AjaxVideos
{

    /*=============================================
    ACTIVAR VIDEOS
    =============================================*/

    public $activarVideo;
    public $activarId;

    public function ajaxActivarVideo()
    {

        $respuesta = ModeloVideos::mdlActualizarEstadoVideo("videos", "state", $this->activarVideo, "id", $this->activarId);

        echo $respuesta;
    }

    /*=============================================
    EDITAR VIDEO
    =============================================*/

    public $idVideo;

    public function ajaxEditarVideo()
    {

        $item = "id";
        $valor = $this->idVideo;

        $respuesta = ControladorVideos::ctrMostrarVideos($item, $valor);

        echo json_encode($respuesta);
    }
}

/*=============================================
ACTIVAR VIDEO
=============================================*/

if (isset($_POST["activarVideo"])) {

    $activarVideo = new AjaxVideos();
    $activarVideo->activarVideo = $_POST["activarVideo"];
    $activarVideo->activarId = $_POST["activarId"];
    $activarVideo->ajaxactivarVideo();
}


/*=============================================
EDITAR VIDEO
=============================================*/
if (isset($_POST["idVideo"])) {

    $editar = new AjaxVideos();
    $editar->idVideo = $_POST["idVideo"];
    $editar->ajaxEditarVideo();
}
