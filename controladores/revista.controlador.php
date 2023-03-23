<?php

class ControladorRevista
{

    /*=============================================
	MOSTRAR REVISTA
	=============================================*/

    static public function ctrMostrarRevista($item, $valor)
    {

        $tabla = "magazine";

        $respuesta = ModeloRevista::mdlMostrarRevista($tabla, $item, $valor);

        return $respuesta;
    }


    /*=============================================
	EDITAR REVISTA
	=============================================*/

    static public function ctrEditarRevista()
    {

        if (isset($_POST["editarTituloRevista"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTituloRevista"])) {

                /*=============================================
				VALIDAR IMAGEN PORTADA
				=============================================*/

                $rutaPortada = $_POST["antiguaFotoPortada"];

                if (isset($_FILES["fotoPortada"]["tmp_name"]) && !empty($_FILES["fotoPortada"]["tmp_name"])) {

                    /*=============================================
					BORRAMOS ANTIGUA FOTO PORTADA
					=============================================*/

                    unlink($_POST["antiguaFotoPortada"]);

                    /*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

                    list($ancho, $alto) = getimagesize($_FILES["fotoPortada"]["tmp_name"]);

                    $nuevoAncho = 612;
                    $nuevoAlto = 792;

                    /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

                    if ($_FILES["fotoPortada"]["type"] == "image/jpeg") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $rutaPortada = "vistas/img/revista/" . $_POST["editarMarcaRevista"] . "/" . $_POST["editarIdRevista"] . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["fotoPortada"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $rutaPortada);
                    }

                    if ($_FILES["fotoPortada"]["type"] == "image/png") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $rutaPortada = "vistas/img/revista/" . $_POST["editarMarcaRevista"] . "/" . $_POST["editarIdRevista"] . ".png";

                        $origen = imagecreatefrompng($_FILES["fotoPortada"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagealphablending($destino, FALSE);

                        imagesavealpha($destino, TRUE);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $rutaPortada);
                    }
                }

                $datos = array(
                    "id" => $_POST["editarIdRevista"],
                    "titulo" => $_POST["editarTituloRevista"],
                    "brand" => $_POST["editarMarcaRevista"],
                    "imgPortada" => $rutaPortada
                );


                $respuesta = ModeloRevista::mdlEditarRevista("magazine", $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "Actualizado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "revista";

							}
						})

					</script>';
                }
            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡Los datos no pueden ser actualizados!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

                return;
            }
        }
    }
}
