<div class="content-wrapper">

    <section class="content-header">

        <h1>
            Gestor Videos Clientes
        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Gestor Videos</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarVideos">

                    Agregar Video

                </button>

            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablaVideos" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Portada</th>
                            <th>Titulo</th>
                            <th>Estado</th>
                            <th>Link Video</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                </table>

            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL AGREGAR VIDEO
======================================-->

<div id="modalAgregarVideos" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar video</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!--=====================================
            ENTRADA DEL TITULO DEL BANNER
            ======================================-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input type="text" class="form-control input-lg tituloVideo" placeholder="Ingresar Titulo del Video" name="tituloVideo">

                            </div>

                        </div>
                        <!--=====================================
            ENTRADA DEL CODIGO DE VIDEO
            ======================================-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input type="text" class="form-control input-lg codigoVideo" placeholder="Ingresar codigo del Video" name="codigoVideo">

                            </div>

                        </div>
                        <!--=====================================
            ENTRADA PARA SUBIR IMAGEN DEL VIDEO
            ======================================-->

                        <div class="form-group">

                            <div class="panel">SUBIR IMAGEN VIDEO</div>

                            <input type="file" class="fotoVideo" name="fotoVideo" required>

                            <p class="help-block">Tamaño recomendado 383px * 323px <br> Peso máximo de la foto 2MB</p>

                            <img src="vistas/img/banner/default/default.jpg" class="img-thumbnail previsualizarVideo" width="100%">

                        </div>


                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar video</button>

                </div>

            </form>

            <?php

            $crearVideo = new ControladorVideos();
            $crearVideo->ctrCrearVideo();

            ?>

        </div>

    </div>

</div>


<!--=====================================
MODAL EDITAR VIDEO
======================================-->

<div id="modalEditarVideo" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar video</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">
                        <!--=====================================
            ENTRADA DEL TITULO DEL VIDEO
            ======================================-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input type="text" class="form-control input-lg editarTituloVideo" placeholder="Ingresar Titulo Video" name="editarTituloVideo">

                            </div>

                        </div>
                        <!--=====================================
            ENTRADA DEL CODIGO DE VIDEO
            ======================================-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input type="text" class="form-control input-lg editarCodigoVideo" placeholder="Ingresar codigo del Video" name="editarCodigoVideo">

                            </div>

                        </div>
                        <!--=====================================
            ENTRADA PARA EDITAR FOTO DE VIDEO
            ======================================-->

                        <div class="form-group">

                            <input type="hidden" class="idVideo" name="idVideo">

                            <div class="panel">CAMBIAR IMAGEN DE VIDEO</div>

                            <input type="file" class="fotoVideo" name="fotoVideo">
                            <input type="hidden" class="antiguaFotoVideo" name="antiguaFotoVideo">

                            <p class="help-block">Tamaño recomendado 383px * 323px <br> Peso máximo de la foto 2MB</p>

                            <img src="vistas/img/banner/default/default.jpg" class="img-thumbnail previsualizarVideo" width="100%">

                        </div>

                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar cambios video</button>

                </div>

            </form>

            <?php

            $editarVideo = new ControladorVideos();
            $editarVideo->ctrEditarVideo();

            ?>

        </div>

    </div>

</div>

<?php

$eliminarVideo = new ControladorVideos();
$eliminarVideo->ctrEliminarVideo();

?>