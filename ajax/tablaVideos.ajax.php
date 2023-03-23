<?php

require_once "../controladores/videos.controlador.php";
require_once "../modelos/videos.modelo.php";

class TablaVideos
{

    /*=============================================
  	MOSTRAR LA TABLA DE VIDEOS
  	=============================================*/

    public function mostrarTabla()
    {

        $item = null;
        $valor = null;

        $video = ControladorVideos::ctrMostrarVideos($item, $valor);

        $datosJson = '{
		 
		  "data": [ ';

        for ($i = 0; $i < count($video); $i++) {

            /*=============================================
			REVISAR ESTADO
			=============================================*/

            if ($video[$i]["state"] == 0) {

                $colorEstado = "btn-danger";
                $textoEstado = "Desactivado";
                $estadoVideo = 1;
            } else {

                $colorEstado = "btn-success";
                $textoEstado = "Activado";
                $estadoVideo = 0;
            }

            $estado = "<button class='btn " . $colorEstado . " btn-xs btnActivar' estadoVideo='" . $estadoVideo . "' idVideo='" . $video[$i]["id"] . "'>" . $textoEstado . "</button>";

            /*=============================================
			REVISAR IMAGEN BANNER
			=============================================*/

            $imgVideo = "<img class='img-thumbnail imgVideo' src='" . $video[$i]["image"] . "' width='100px'>";


            /*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/

            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarVideo' idVideo='" . $video[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarVideo'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarVideo' idVideo='" . $video[$i]["id"] . "' imgVideo='" . $video[$i]["image"] . "'><i class='fa fa-times'></i></button></div>";

            $datosJson     .= '[
					 	"' . ($i + 1) . '",
					 	"' . $imgVideo . '",
						 "' . $video[$i]["title"] . '",
				 	 	"' . $estado . '",
				      	"' . $video[$i]["url"] . '",
				      	"' . $acciones . '"		   

  			  ],';
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .=  ']
		  
		}';

        echo $datosJson;
    }
}


/*=============================================
ACTIVAR TABLA DE VIDEOS
=============================================*/
$activar = new TablaVideos();
$activar->mostrarTabla();
