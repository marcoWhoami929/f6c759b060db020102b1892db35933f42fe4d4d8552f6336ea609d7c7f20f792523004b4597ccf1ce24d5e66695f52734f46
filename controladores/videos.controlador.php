<?php

class ControladorVideos
{

    /*=============================================
	MOSTRAR VIDEOS
	=============================================*/

    static public function ctrMostrarVideos($item, $valor)
    {

        $tabla = "videos";

        $respuesta = ModeloVideos::mdlMostrarVideos($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	CREAR VIDEO
	=============================================*/

    static public function ctrCrearVideo()
    {

        if (isset($_POST["codigoVideo"])) {

            /*=============================================
			VALIDAR IMAGEN VIDEO
			=============================================*/

            $rutaVideo = "";

            if (isset($_FILES["fotoVideo"]["tmp_name"]) && !empty($_FILES["fotoVideo"]["tmp_name"])) {

                /*=============================================
				DEFINIMOS LAS MEDIDAS
				=============================================*/

                list($ancho, $alto) = getimagesize($_FILES["fotoVideo"]["tmp_name"]);

                $nuevoAncho = 383;
                $nuevoAlto = 323;

                /*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

                if ($_FILES["fotoVideo"]["type"] == "image/jpeg") {

                    /*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

                    $rutaVideo = "vistas/img/videos/" . $_FILES["fotoVideo"]["name"];

                    $origen = imagecreatefromjpeg($_FILES["fotoVideo"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $rutaVideo);
                }

                if ($_FILES["fotoVideo"]["type"] == "image/png") {

                    /*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

                    $rutaVideo = "vistas/img/videos/" . $_FILES["fotoVideo"]["name"];

                    $origen = imagecreatefrompng($_FILES["fotoVideo"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagealphablending($destino, FALSE);

                    imagesavealpha($destino, TRUE);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $rutaVideo);
                }
            }


            $datos = array(
                "img" => $rutaVideo,
                "estado" => 1,
                "titulo" => $_POST["tituloVideo"],
                "ruta" => $_POST["codigoVideo"]
            );

            $respuesta = ModeloVideos::mdlIngresarVideo("videos", $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El video ha sido guardado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						window.location = "videos";

						}
					})

				</script>';
            }
        }
    }


    /*=============================================
	EDITAR VIDEO
	=============================================*/

    static public function ctrEditarVideo()
    {

        if (isset($_POST["editarCodigoVideo"])) {

            /*=============================================
			VALIDAR IMAGEN VIDEO
			=============================================*/

            $rutaVideo = $_POST["antiguaFotoVideo"];

            if (isset($_FILES["fotoVideo"]["tmp_name"]) && !empty($_FILES["fotoVideo"]["tmp_name"])) {

                /*=============================================
				DEFINIMOS LAS MEDIDAS
				=============================================*/

                list($ancho, $alto) = getimagesize($_FILES["fotoVideo"]["tmp_name"]);

                $nuevoAncho = 383;
                $nuevoAlto = 323;

                /*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

                if ($_FILES["fotoVideo"]["type"] == "image/jpeg") {

                    /*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

                    $rutaVideo = "vistas/img/videos/" . $_FILES["fotoVideo"]["name"];

                    $origen = imagecreatefromjpeg($_FILES["fotoVideo"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $rutaVideo);
                }

                if ($_FILES["fotoVideo"]["type"] == "image/png") {

                    /*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

                    $rutaVideo = "vistas/img/videos/" . $_FILES["fotoVideo"]["name"];

                    $origen = imagecreatefrompng($_FILES["fotoVideo"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagealphablending($destino, FALSE);

                    imagesavealpha($destino, TRUE);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $rutaVideo);
                }
            }

            $datos = array(
                "id" => $_POST["idVideo"],
                "img" => $rutaVideo,
                "estado" => 1,
                "titulo" => $_POST["editarTituloVideo"],
                "ruta" => $_POST["editarCodigoVideo"]

            );

            $respuesta = ModeloVideos::mdlEditarVideo("videos", $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El video ha sido editado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						window.location = "videos";

						}
					})

				</script>';
            }
        }
    }

    /*=============================================
	ELIMINAR VIDEO
	=============================================*/

    static public function ctrEliminarVideo()
    {

        if (isset($_GET["idVideo"])) {

            /*=============================================
			ELIMINAR IMAGEN VIDEO
			=============================================*/

            if ($_GET["imgVideo"] != "") {

                unlink($_GET["imgVideo"]);
            }

            $respuesta = ModeloVideos::mdlEliminarVideo("videos", $_GET["idVideo"]);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El video ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "videos";

								}
							})

				</script>';
            }
        }
    }
}
