<?php

require_once "../controladores/sucursales.controlador.php";
require_once "../modelos/sucursales.modelo.php";

class TablaSucursales
{

    /*=============================================
  MOSTRAR LA TABLA DE SUCURSALES
  =============================================*/

    public function mostrarTabla()
    {

        $item = null;
        $valor = null;

        $sucursales = ControladorSucursales::ctrMostrarSucursales($item, $valor);

        $datosJson = '{
		 
		  "data": [ ';

        for ($i = 0; $i < count($sucursales); $i++) {

            /*=============================================
			REVISAR ESTADO
			=============================================*/

            if ($sucursales[$i]["active"] == 0) {

                $colorEstado = "btn-danger";
                $textoEstado = "Desactivado";
                $estadoSucursal = 1;
            } else {

                $colorEstado = "btn-success";
                $textoEstado = "Activado";
                $estadoSucursal = 0;
            }

            $estado = "<button class='btn " . $colorEstado . " btn-xs btnActivar' estadoSucursal='" . $estadoSucursal . "' idSucursal='" . $sucursales[$i]["id"] . "'>" . $textoEstado . "</button>";



            /*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/

            $acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarSucursal' idSucursal='" . $sucursales[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarSucursal'><i class='fa fa-pencil'></i></button></div>";

            $datosJson     .= '[
				      "' . ($i + 1) . '",
				    
				      "' . $sucursales[$i]["store"] . '",
				      "' . $estado . '",
				      "' . $sucursales[$i]["domicile"] . '",
				      "' . $sucursales[$i]["suburb"]  . '",
                      "' . $sucursales[$i]["postalCode"]  . '",
                      "' . $sucursales[$i]["phone"]  . '",
                      "' . $sucursales[$i]["phone2"]  . '",
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
ACTIVAR TABLA DE SUCURSALES
=============================================*/
$activar = new TablaSucursales();
$activar->mostrarTabla();
