<div class="content-wrapper">

    <section class="content-header">

        <h1>
            Revista Digital
        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Revista</li>

        </ol>

    </section>

    <section class="content">


        <div class="box">


            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablaRevista" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Titulo</th>
                            <th>Estado</th>
                            <th>Marca</th>
                            <th>Portada</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                </table>

            </div>
            <div class="container" style="margin-top:-200px">
                <div class="row">

                    <div class="content"> </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Cargar Revistas</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-6">
                                <form method="POST" action="ajax/uploadMagazine.ajax.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <select name="nameMagazine" id="nameMagazine" class="form-control" required="">
                                            <option value="excelo">Excelo</option>
                                            <option value="flex">Flex</option>
                                        </select>
                                        <label class="btn btn-primary" for="my-file-selector">
                                            <input required="" type="file" name="file" id="exampleInputFile">
                                        </label>

                                    </div>
                                    <button class="btn btn-primary" type="submit">Cargar Revista</button>
                                </form>
                            </div>
                            <div class="col-lg-6"> </div>
                        </div>
                    </div>

                    <!--tabla-->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Revistas Disponibles</h3>
                        </div>
                        <div class="panel-body">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="7%">#</th>
                                        <th width="70%">Nombre del Archivo</th>
                                        <th width="13%"></th>
                                        <th width="10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $archivos = scandir("revistas");
                                    $num = 0;
                                    for ($i = 2; $i < count($archivos); $i++) {
                                        $num++;
                                    ?>
                                        <p>
                                        </p>

                                        <tr>
                                            <th scope="row"><?php echo $num; ?></th>
                                            <td><?php echo $archivos[$i]; ?></td>

                                            <td><a title="Descargar Archivo" href="revistas/<?php echo $archivos[$i]; ?>" download="<?php echo $archivos[$i]; ?>" style="color: #337AB7; font-size:18px;"> <i class="fa-solid fa-download"></i> </a></td>
                                            <td><a title="Eliminar Archivo" href="ajax/deleteMagazine.ajax.php?name=../revistas/<?php echo $archivos[$i]; ?>" style="color: red; font-size:18px;" onclick="return confirm('Esta seguro de eliminar el archivo?');"> <i class="fa-solid fa-trash"></i> </a></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Fin tabla-->
                </div>
            </div>


        </div>

    </section>

</div>

<!--=====================================
MODAL EDITAR REVISTA
======================================-->

<div id="modalEditarRevista" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar revista digital</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!--=====================================
            ENTRADA DEL TITULO DE LA SUCURSAL
            ======================================-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input type="text" class="form-control input-lg tituloRevista" placeholder="Ingresar titulo" name="editarTituloRevista">

                                <input type="hidden" class="editarIdRevista" name="editarIdRevista">

                            </div>

                        </div>

                        <!--=====================================
            ENTRADA MARCA DE LA REVISTA
            ======================================-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lg marcaRevista" name="editarMarcaRevista" id="editarMarcaRevista">
                                    <option value="EXCELO">Excelo</option>
                                    <option value="FLEX">Flex</option>
                                </select>

                            </div>

                        </div>

                        <!--=====================================
            ENTRADA PARA SUBIR FOTO DE PORTADA
            ======================================-->

                        <div class="form-group">

                            <div class="panel">SUBIR FOTO PORTADA</div>

                            <input type="file" class="fotoPortada" name="fotoPortada">
                            <input type="hidden" class="antiguaFotoPortada" name="antiguaFotoPortada">

                            <p class="help-block">Tamaño recomendado 612px * 792px <br> Peso máximo de la foto 2MB</p>

                            <img src="vistas/img/revista/default/default.png" class="img-thumbnail previsualizarPortada" width="100%">

                        </div>


                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar cambios</button>

                </div>

            </form>

            <?php


            $editarRevista = new ControladorRevista();
            $editarRevista->ctrEditarRevista();

            ?>

        </div>

    </div>

</div>


<!--=====================================
BLOQUEO DE LA TECLA ENTER
======================================-->

<script>
    $(document).keydown(function(e) {

        if (e.keyCode == 13) {

            e.preventDefault();

        }

    })
</script>