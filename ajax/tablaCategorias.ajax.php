<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/cabeceras.controlador.php";
require_once "../modelos/cabeceras.modelo.php";

class TablaCategorias
{

	/*=============================================
  MOSTRAR LA TABLA DE CATEGORÍAS
  =============================================*/

	public function mostrarTabla()
	{

		$item = null;
		$valor = null;

		$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		$datosJson = '{
		 
		  "data": [ ';

		for ($i = 0; $i < count($categorias); $i++) {

			/*=============================================
			REVISAR ESTADO
			=============================================*/

			if ($categorias[$i]["state"] == 0) {

				$colorEstado = "btn-danger";
				$textoEstado = "Desactivado";
				$estadoCategoria = 1;
			} else {

				$colorEstado = "btn-success";
				$textoEstado = "Activado";
				$estadoCategoria = 0;
			}

			$estado = "<button class='btn " . $colorEstado . " btn-xs btnActivar' estadoCategoria='" . $estadoCategoria . "' idCategoria='" . $categorias[$i]["id"] . "'>" . $textoEstado . "</button>";

			/*=============================================
			REVISAR IMAGEN PORTADA
			=============================================*/

			$item = "route";
			$valor = $categorias[$i]["route"];

			$cabeceras = ControladorCabeceras::ctrMostrarCabeceras($item, $valor);

			if ($cabeceras["frontPage"] != "") {

				$imgPortada = "<img class='img-thumbnail imgPortadaCategorias' src='" . $cabeceras["frontPage"] . "' width='100px'>";
			} else {

				$imgPortada = "<img class='img-thumbnail imgPortadaCategorias' src='vistas/img/cabeceras/default/default.png' width='100px'>";
			}

			/*=============================================
			REVISAR OFERTAS
			=============================================*/

			if ($categorias[$i]["offer"] != 0) {

				if ($categorias[$i]["offerPrice"] != 0) {

					$tipoOferta = "PRECIO";
					$valorOferta = "$ " . number_format($categorias[$i]["offerPrice"], 2);
				} else {

					$tipoOferta = "DESCUENTO";
					$valorOferta = $categorias[$i]["discountOffer"] . " %";
				}
			} else {

				$tipoOferta = "No tiene oferta";
				$valorOferta = 0;
			}

			if ($categorias[$i]["imageOffer"] != "") {

				$imgOfertas = "<img class='img-thumbnail imgOfertaCategorias' src='" . $categorias[$i]["imageOffer"] . "' width='100px'>";
			} else {

				$imgOfertas = "<img class='img-thumbnail imgOfertaCategorias' src='vistas/img/ofertas/default/default.jpg' width='100px'>";
			}

			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/

			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoria='" . $categorias[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarCategoria'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCategoria' idCategoria='" . $categorias[$i]["id"] . "' imgPortada='" . $cabeceras["frontPage"] . "'  rutaCabecera='" . $categorias[$i]["route"] . "' imgOferta='" . $categorias[$i]["imageOffer"] . "'><i class='fa fa-times'></i></button></div>";

			$datosJson	 .= '[
				      "' . ($i + 1) . '",
				      "' . $categorias[$i]["category"] . '",
				      "' . $categorias[$i]["route"] . '",
				      "' . $estado . '",
				      "' . $cabeceras["description"] . '",
				      "' . $cabeceras["keywords"] . '",
				      "' . $imgPortada . '",
				      "' . $tipoOferta . '",
				      "' . $valorOferta . '",
				      "' . $imgOfertas . '",
				      "' . $categorias[$i]["expiredOffer"] . '",
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
ACTIVAR TABLA DE CATEGORÍAS
=============================================*/
$activar = new TablaCategorias();
$activar->mostrarTabla();
