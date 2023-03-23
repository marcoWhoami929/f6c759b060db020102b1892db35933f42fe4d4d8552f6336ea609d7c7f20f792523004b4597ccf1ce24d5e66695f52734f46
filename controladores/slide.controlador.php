<?php

class ControladorSlide
{

	/*=============================================
	MOSTRAR SLIDE
	=============================================*/

	static public function ctrMostrarSlide()
	{

		$tabla = "slide";

		$respuesta = ModeloSlide::mdlMostrarSlide($tabla);

		return $respuesta;
	}

	/*=============================================
	CREAR SLIDE
	=============================================*/

	static public function ctrCrearSlide($datos)
	{

		$tabla = "slide";

		$traerSlide = ModeloSlide::mdlMostrarSlide($tabla);

		foreach ($traerSlide as $key => $value) {
		}

		$orden = $value["orden"] + 1;

		$respuesta = ModeloSlide::mdlCrearSlide($tabla, $datos, $orden);

		return $respuesta;
	}

	/*=============================================
	ACTUALIZAR ORDEN SLIDE
	=============================================*/

	static public function ctrActualizarOrdenSlide($datos)
	{

		$tabla = "slide";

		$respuesta = ModeloSlide::mdlActualizarOrdenSlide($tabla, $datos);

		return $respuesta;
	}

	/*=============================================
	ACTUALIZAR SLIDE
	=============================================*/

	static public function ctrActualizarSlide($datos)
	{

		$tabla = "slide";
		$ruta1 = null;

		/*=============================================
		SI HAY CAMBIO DE FONDO
		=============================================*/

		if ($datos["subirFondo"] != null) {

			/*=============================================
			BORRAMOS EL ANTIGUO FONDO DEL SLIDE
			=============================================*/

			if ($datos["image"] != "vistas/img/slide/default/fondo.png") {

				unlink("../" . $datos["image"]);
			}

			/*=============================================
			CREAMOS EL DIRECTORIO SI NO EXISTE
			=============================================*/

			$directorio = "../vistas/img/slide/slide" . $datos["id"];

			if (!file_exists($directorio)) {

				mkdir($directorio, 0755);
			}

			/*=============================================
			CAPTURAMOS EL ANCHO Y ALTO DEL FONDO DEL SLIDE
			=============================================*/

			list($ancho, $alto) = getimagesize($datos["subirFondo"]["tmp_name"]);

			$nuevoAncho = 1360;
			$nuevoAlto = 420;

			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

			if ($datos["subirFondo"]["type"] == "image/jpeg") {

				$ruta1 = $directorio . "/fondo.jpg";

				$origen = imagecreatefromjpeg($datos["subirFondo"]["tmp_name"]);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $ruta1);
			}

			if ($datos["subirFondo"]["type"] == "image/png") {

				$ruta1 = $directorio . "/fondo.png";

				$origen = imagecreatefrompng($datos["subirFondo"]["tmp_name"]);

				imagealphablending($destino, FALSE);

				imagesavealpha($destino, TRUE);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagepng($destino, $ruta1);
			}


			$rutaFondo = substr($ruta1, 3);
		} else {

			$rutaFondo = $datos["image"];
		}



		$respuesta = ModeloSlide::mdlActualizarSlide($tabla, $rutaFondo, $datos);

		return $respuesta;
	}

	/*=============================================
	ELIMINAR SLIDE
	=============================================*/

	public function ctrEliminarSlide()
	{

		if (isset($_GET["idSlide"])) {

			if ($_GET["image"] != "vistas/img/slide/default/fondo.png") {

				unlink($_GET["image"]);
			}



			rmdir('vistas/img/slide/slide' . $_GET["idSlide"]);

			$tabla = "slide";
			$id = $_GET["idSlide"];

			$respuesta = ModeloSlide::mdlEliminarSlide($tabla, $id);

			if ($respuesta == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "El slide ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",		
					  }).then((result) => {
								if (result.value) {

								window.location = "slide";

								}
							})

				</script>';
			}
		}
	}
}
