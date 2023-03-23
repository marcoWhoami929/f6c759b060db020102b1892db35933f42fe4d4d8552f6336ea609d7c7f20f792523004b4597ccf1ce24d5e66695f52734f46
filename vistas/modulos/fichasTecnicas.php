<?php
$servidor = Ruta::ctrRutaServidor();

?>
<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Fichas Técnicas

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Fichas Técnicas</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <div class="panel panel-primary">
                    <div class="panel-body">

                        <form name="form1" id="form1" method="post" action="?" enctype="multipart/form-data">
                            <div class="form-group">

                                <div class="col-lg-3 col-md-3 col-sm-3">

                                    <select class="form-control input-lg idProducto" id="idProducto" name="idProducto" required>

                                        <option value="">Seleccionar Producto</option>

                                        <?php
                                        $item = null;
                                        $valor = null;
                                        $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

                                        foreach ($productos as $key => $value) {

                                            echo '<option value="' . $value["id"] . '">' . $value["title"] . '</option>';
                                        }

                                        ?>

                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <input type="text" class="form-control input-lg" id="title" name="title" placeholder="Título de la ficha técnica">
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <input type="file" class="form-control input-lg" id="fichas[]" name="fichas[]" multiple="" required accept="application/pdf">
                                </div>

                                <button type="submit" class="btn btn-primary" name="subir"><i class="fa fa-file-pdf"></i>Cargar</button>
                            </div>

                        </form>
                        <?php
                        include_once("ajax/uploadFichas.ajax.php");
                        ?>

                    </div>
                </div>
            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablaFichasTecnicas" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Producto</th>
                            <th>Title</th>
                            <th>Ruta</th>
                            <th>Ficha</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        $item = null;
                        $valor = null;

                        $perfiles = ControladorProductos::ctrMostrarFichasTecnicas($item, $valor);

                        foreach ($perfiles as $key => $value) {

                            echo ' <tr>
                          <td>' . ($key + 1) . '</td>
                          <td>' . $value["producto"] . '</td>
                          <td>' . $value["title"] . '</td>
                          <td>' . $value["url"] . '</td>
                          <td><a href="' . $servidor . $value["url"] . '" target="_blank"><button type="button" class="btn btn-success"><i class="fa fa-file-pdf"></i></button></a></td>';

                            echo '<td>

                          <div class="btn-group">

                            <button class="btn btn-danger btnEliminarFicha" idFicha="' . $value["id"] . '" url="' . $value["url"] . '"><i class="fa fa-times"></i></button>

                          </div>  

                        </td>

                      </tr>';
                        }


                        ?>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>
<?php


$eliminarFicha = new ControladorProductos();
$eliminarFicha->ctrEliminarFichaTecnica();

?>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 5000);

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>