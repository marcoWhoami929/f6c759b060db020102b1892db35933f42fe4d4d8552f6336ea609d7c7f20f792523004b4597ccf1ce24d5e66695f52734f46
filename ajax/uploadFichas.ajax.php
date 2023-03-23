<?php
require_once "controladores/productos.controlador.php";
if (isset($_POST["subir"]) && empty($_POST["fichas"])) {
    foreach ($_FILES["fichas"]['tmp_name'] as $key => $tmp_name) {


        if ($_FILES["fichas"]["name"][$key]) {
            $filename = $_FILES["fichas"]["name"][$key];
            $source = $_FILES["fichas"]["tmp_name"][$key];

            $directorio = 'vistas/fichas';

            if (!file_exists($directorio)) {
                mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
            }

            $dir = opendir($directorio);
            $target_path = $directorio . '/' . $filename;

            $datos = array(
                "idProducto" => $_POST["idProducto"],
                "title" => $_POST["title"],
                "url" => $target_path
            );

            $respuesta = ControladorProductos::ctrUploadFicha($datos);

            if (move_uploaded_file($source, $target_path) && $respuesta == "ok") {
                echo '<div class="alert alert-success form-group">
                        <strong>Ficha técnica subida correctamente</strong>        
                    </div>';
            } else {
                echo '<div class="alert alert-warning form-group">
                    <strong>Ha ocurrido un error al subir la ficha</strong>        
                </div>';
            }
            closedir($dir);
        }
    }
}
