<?php

class ControladorSucursales
{

    /*=============================================
	MOSTRAR SUCURSALES
	=============================================*/

    static public function ctrMostrarSucursales($item, $valor)
    {

        $tabla = "stores";

        $respuesta = ModeloSucursales::mdlMostrarSucursales($tabla, $item, $valor);

        return $respuesta;
    }


    /*=============================================
	EDITAR SUCURSALES
	=============================================*/

    static public function ctrEditarSucursal()
    {

        if (isset($_POST["editarNombreSucursal"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreSucursal"])) {



                $datos = array(
                    "id" => $_POST["editarIdSucursal"],
                    "nombre" => $_POST["editarNombreSucursal"],
                    "domicilio" => $_POST["editarDomicilioSucursal"],
                    "colonia" => $_POST["editarColoniaSucursal"],
                    "cp" => $_POST["editarCpSucursal"],
                    "phone" => $_POST["editarPhoneSucursal"],
                    "phone2" => $_POST["editarPhone2Sucursal"]
                );


                $respuesta = ModeloSucursales::mdlEditarSucursal("stores", $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "La sucursal ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sucursales";

							}
						})

					</script>';
                }
            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡La sucursal no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

                return;
            }
        }
    }
}
