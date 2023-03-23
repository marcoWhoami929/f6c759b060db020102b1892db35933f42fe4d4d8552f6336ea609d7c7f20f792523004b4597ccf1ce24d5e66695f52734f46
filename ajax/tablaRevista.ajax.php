<?php

require_once "../controladores/revista.controlador.php";
require_once "../modelos/revista.modelo.php";

class TablaRevista
{

    /*=============================================
  MOSTRAR LA TABLA DE REVISTA
  =============================================*/

    public function mostrarTabla()
    {

        $item = null;
        $valor = null;

        $revista = ControladorRevista::ctrMostrarRevista($item, $valor);

        $datosJson = '{
		 
		  "data": [ ';

        for ($i = 0; $i < count($revista); $i++) {

            /*=============================================
			REVISAR ESTADO
			=============================================*/

            if ($revista[$i]["active"] == 0) {

                $colorEstado = "btn-danger";
                $textoEstado = "Desactivado";
                $estadoRevista = 1;
            } else {

                $colorEstado = "btn-success";
                $textoEstado = "Activado";
                $estadoRevista = 0;
            }

            $estado = "<button class='btn " . $colorEstado . " btn-xs btnActivar' estadoRevista='" . $estadoRevista . "' idRevista='" . $revista[$i]["id"] . "'>" . $textoEstado . "</button>";

            /*=============================================
			REVISAR IMAGEN PORTADA
			=============================================*/

            if ($revista[$i]["image"] != "") {

                $imgPortada = "<img class='img-thumbnail imgPortadaRevista' src='" . $revista[$i]["image"] . "' width='100px'>";
            } else {

                $imgPortada = "";
            }


            /*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/

            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarRevista' idRevista='" . $revista[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarRevista'><i class='fa fa-pencil'></i></button></div>";

            $datosJson     .= '[
				      "' . ($i + 1) . '",
				    
				      "' . $revista[$i]["title"] . '",
				      "' . $estado . '",
				      "' . $revista[$i]["brand"] . '",  
				      "' . $imgPortada . '",
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
ACTIVAR TABLA DE REVISTA
=============================================*/
$activar = new TablaRevista();
$activar->mostrarTabla();
