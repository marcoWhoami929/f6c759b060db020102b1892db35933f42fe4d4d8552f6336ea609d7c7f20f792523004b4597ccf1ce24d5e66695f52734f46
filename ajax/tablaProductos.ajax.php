<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/subcategorias.controlador.php";
require_once "../modelos/subcategorias.modelo.php";

require_once "../controladores/cabeceras.controlador.php";
require_once "../modelos/cabeceras.modelo.php";

class TablaProductos
{

	/*=============================================
  MOSTRAR LA TABLA DE PRODUCTOS
  =============================================*/

	public function mostrarTablaProductos()
	{

		$item = null;
		$valor = null;

		$productos = ControladorProductos::ctrMostrarProductos($item, $valor);


		if (count($productos) == 0) {

			$datosJson = '{ "data":[]}';

			echo $datosJson;

			return;
		}
		$datosJson = '

  		{	
  			"data":[';

		for ($i = 0; $i < count($productos); $i++) {

			/*=============================================
  			TRAER LAS CATEGORÍAS
  			=============================================*/

			$item = "id";
			$valor = $productos[$i]["categoryId"];

			$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

			if ($categorias["category"] == "") {

				$categoria = "SIN CATEGORÍA";
			} else {

				$categoria = $categorias["category"];
			}

			/*=============================================
  			TRAER LAS SUBCATEGORÍAS
  			=============================================*/

			$item2 = "id";
			$valor2 = $productos[$i]["subcategoryId"];

			$subcategorias = ControladorSubCategorias::ctrMostrarSubCategorias($item2, $valor2);

			if ($subcategorias[0]["subcategory"] == "") {

				$subcategoria = "SIN SUBCATEGORÍA";
			} else {

				$subcategoria = $subcategorias[0]["subcategory"];
			}

			/*=============================================
  			AGREGAR ETIQUETAS DE ESTADO
  			=============================================*/

			if ($productos[$i]["state"] == 0) {

				$colorEstado = "btn-danger";
				$textoEstado = "Desactivado";
				$estadoProducto = 1;
			} else {

				$colorEstado = "btn-success";
				$textoEstado = "Activado";
				$estadoProducto = 0;
			}

			$estado = "<button class='btn btn-xs btnActivar " . $colorEstado . "' idProducto='" . $productos[$i]["id"] . "' estadoProducto='" . $estadoProducto . "'>" . $textoEstado . "</button>";

			/*=============================================
  			AGREGAR ETIQUETAS DE MAS VENDIDO
  			=============================================*/

			if ($productos[$i]["selled"] == 0) {

				$colorEstadoVendido = "btn-warning";
				$textoEstadoVendido = "Ocultar";
				$estadoProductoVendido = 1;
			} else {

				$colorEstadoVendido = "btn-info";
				$textoEstadoVendido = "Mostrar";
				$estadoProductoVendido = 0;
			}

			$estadoVendido = "<button class='btn btn-xs btnActivarVendido " . $colorEstadoVendido . "' idProducto='" . $productos[$i]["id"] . "' estadoProducto='" . $estadoProductoVendido . "'>" . $textoEstadoVendido . "</button>";

			/*=============================================
  			TRAER LAS CABECERAS
  			=============================================*/

			$item3 = "route";
			$valor3 = $productos[$i]["route"];

			$cabeceras = ControladorCabeceras::ctrMostrarCabeceras($item3, $valor3);

			if ($cabeceras["frontPage"] != "") {

				$imagenPortada = "<img src='" . $cabeceras["frontPage"] . "' class='img-thumbnail imgPortadaProductos' width='100px'>";
			} else {

				$imagenPortada = "<img src='vistas/img/cabeceras/default/default.png' class='img-thumbnail imgPortadaProductos' width='100px'>";
			}

			/*=============================================
  			TRAER IMAGEN PRINCIPAL
  			=============================================*/

			$imagenPrincipal = "<img src='" . $productos[$i]["frontPage"] . "' class='img-thumbnail imgTablaPrincipal' width='100px'>";

			/*=============================================
			TRAER MULTIMEDIA
  			=============================================*/

			if ($productos[$i]["multimedia"] != null) {

				$multimedia = json_decode($productos[$i]["multimedia"], true);

				if ($multimedia[0]["foto"] != "") {

					$vistaMultimedia = "<img src='" . $multimedia[0]["foto"] . "' class='img-thumbnail imgTablaMultimedia' width='100px'>";
				} else {

					$vistaMultimedia = "<img src='http://i3.ytimg.com/vi/" . $productos[$i]["multimedia"] . "/hqdefault.jpg' class='img-thumbnail imgTablaMultimedia' width='100px'>";
				}
			} else {

				$vistaMultimedia = "<img src='vistas/img/multimedia/default/default.jpg' class='img-thumbnail imgTablaMultimedia' width='100px'>";
			}

			/*=============================================
  			TRAER DETALLES
  			=============================================*/

			$detalles = json_decode($productos[$i]["details"], true);


			$marca = json_encode($detalles["Marca"]);

			$vistaDetalles =  "Marca: " . str_replace(array("[", "]", '"'), "", $marca);

			$codigo = json_encode($detalles["Codigo"]);

			$vistaDetalles .=  "<br>Codigo: " . str_replace(array("[", "]", '"'), "", $codigo);


			/*=============================================
  			REVISAR SI HAY OFERTAS
  			=============================================*/

			if ($productos[$i]["offer"] != 0) {

				if ($productos[$i]["offerPrice"] != 0) {

					$tipoOferta = "PRECIO";
					$valorOferta = "$ " . number_format($productos[$i]["offerPrice"], 2);
				} else {

					$tipoOferta = "DESCUENTO";
					$valorOferta = $productos[$i]["discountOffer"] . " %";
				}
			} else {

				$tipoOferta = "No tiene oferta";
				$valorOferta = 0;
			}

			/*=============================================
  			TRAER IMAGEN OFERTA
  			=============================================*/

			if ($productos[$i]["imgOffer"] != "") {

				$imgOferta = "<img src='" . $productos[$i]["imgOffer"] . "' class='img-thumbnail imgTablaProductos' width='100px'>";
			} else {

				$imgOferta = "<img src='vistas/img/ofertas/default/default.jpg' class='img-thumbnail imgTablaProductos' width='100px'>";
			}

			/*=============================================
  			TRAER LAS ACCIONES
  			=============================================*/

			$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='" . $productos[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='" . $productos[$i]["id"] . "' imgOferta='" . $productos[$i]["imgOffer"] . "' rutaCabecera='" . $productos[$i]["route"] . "' imgPortada='" . $cabeceras["frontPage"] . "' imgPrincipal='" . $productos[$i]["frontPage"] . "'><i class='fa fa-times'></i></button></div>";

			/*=============================================
  			CONSTRUIR LOS DATOS JSON
  			=============================================*/


			$datosJson .= '[
					
					"' . ($i + 1) . '",
					"' . $productos[$i]["title"] . '",
					"' . $categoria . '",
					"' . $subcategoria . '",
					"' . $productos[$i]["route"] . '",
					"' . $estado . '",
					"' . $estadoVendido . '",
				  	"' . $cabeceras["keywords"] . '",
				  	"' . $imagenPortada . '",
				  	"' . $imagenPrincipal . '",
			 	  	"' . $vistaMultimedia . '",
				  	"' . $vistaDetalles . '",
				  	"' . $tipoOferta . '",
				  	"' . $valorOferta . '",
				  	"' . $imgOferta . '",
				  	"' . $productos[$i]["expiredOffer"] . '",			
				  	"' . $acciones . '"	   

			],';
		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']

		}';

		echo $datosJson;
	}
}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/
$activarProductos = new TablaProductos();
$activarProductos->mostrarTablaProductos();
