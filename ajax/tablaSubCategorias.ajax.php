<?php

require_once "../controladores/subcategorias.controlador.php";
require_once "../modelos/subcategorias.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/cabeceras.controlador.php";
require_once "../modelos/cabeceras.modelo.php";

class TablaSubCategorias
{

	/*=============================================
  MOSTRAR LA TABLA DE SUBCATEGORÍAS
  =============================================*/

	public function mostrarTablaSubCategoria()
	{

		$item = null;
		$valor = null;

		$subcategorias = ControladorSubCategorias::ctrMostrarSubCategorias($item, $valor);

		$datosJson = '{

      "data": [ ';

		for ($i = 0; $i < count($subcategorias); $i++) {

			/*=============================================
  			TRAER LAS CATEGORÍAS
  			=============================================*/

			$item = "id";
			$valor = $subcategorias[$i]["categoryId"];

			$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

			if ($categorias["category"] == "") {

				$categoria = "SIN CATEGORÍA";
			} else {

				$categoria = $categorias["category"];
			}

			/*=============================================
  			REVISAR ESTADO
  			=============================================*/

			if ($subcategorias[$i]["state"] == 0) {

				$colorEstado = "btn-danger";
				$textoEstado = "Desactivado";
				$estadoSubCategoria = 1;
			} else {

				$colorEstado = "btn-success";
				$textoEstado = "Activado";
				$estadoSubCategoria = 0;
			}

			$estado = "<button class='btn btn-xs btnActivar " . $colorEstado . "' idSubCategoria='" . $subcategorias[$i]["id"] . "' estadoSubCategoria='" . $estadoSubCategoria . "'>" . $textoEstado . "</button>";

			/*=============================================
  			REVISAR IMAGEN PORTADA
  			=============================================*/

			$item2 = "route";
			$valor2 = $subcategorias[$i]["route"];

			$cabeceras = ControladorCabeceras::ctrMostrarCabeceras($item2, $valor2);

			if ($cabeceras["frontPage"] != "") {

				$imagenPortada = "<img src='" . $cabeceras["frontPage"] . "' class='img-thumbnail imgPortadaSubCategorias' width='100px'>";
			} else {

				$imagenPortada = "<img src='vistas/img/cabeceras/default/default.png' class='img-thumbnail imgPortadaSubCategorias' width='100px'>";
			}

			/*=============================================
			REVISAR OFERTAS
			=============================================*/

			if ($subcategorias[$i]["offer"] != 0) {

				if ($subcategorias[$i]["offerPrice"] != 0) {

					$tipoOferta = "PRECIO";
					$valorOferta = "$ " . number_format($subcategorias[$i]["offerPrice"], 2);
				} else {

					$tipoOferta = "DESCUENTO";
					$valorOferta = $subcategorias[$i]["discountOffer"] . " %";
				}
			} else {

				$tipoOferta = "No tiene oferta";
				$valorOferta = 0;
			}

			if ($subcategorias[$i]["imgOffer"] != "") {

				$imgOferta = "<img src='" . $subcategorias[$i]["imgOffer"] . "' class='img-thumbnail imgTablaSubCategorias' width='100px'>";
			} else {

				$imgOferta = "<img src='vistas/img/ofertas/default/default.jpg' class='img-thumbnail imgTablaSubCategorias' width='100px'>";
			}

			/*=============================================
  			CREAR LAS ACCIONES
  			=============================================*/

			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarSubCategoria' idSubCategoria='" . $subcategorias[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarSubCategoria'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarSubCategoria' idSubCategoria='" . $subcategorias[$i]["id"] . "' imgOferta='" . $subcategorias[$i]["imgOffer"] . "' rutaCabecera='" . $subcategorias[$i]["route"] . "' imgPortada='" . $cabeceras["frontPage"] . "'><i class='fa fa-times'></i></button></div>";


			$datosJson .=  '
			 [
		      "' . ($i + 1) . '",
		      "' . $subcategorias[$i]["subcategory"] . '",
		      "' . $categoria . '",
		      "' . $subcategorias[$i]["route"] . '",
		      "' . $estado . '",
		      "' . $cabeceras["description"] . '",
		      "' . $cabeceras["keywords"] . '",
		      "' . $imagenPortada . '",
			  "' . $tipoOferta . '",
   	  		  "' . $valorOferta . '",
              "' . $imgOferta . '",
              "' . $subcategorias[$i]["expiredOffer"] . '",			
	          "' . $acciones . '"
	    	],';
		}

		$datosJson =  substr($datosJson, 0, -1);
		$datosJson .=  '
            
          ]
        }';

		echo $datosJson;
	}
}

/*=============================================
ACTIVAR TABLA DE SUBCATEGORÍAS
=============================================*/
$activarSubcategoria = new TablaSubCategorias();
$activarSubcategoria->mostrarTablaSubCategoria();
