<div class="content-wrapper">

    <section class="content-header">

        <h1>
            Sucursales
        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Sucursales</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">



            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablaSucursales" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Sucursal</th>
                            <th>Estado</th>
                            <th>Domicilio</th>
                            <th>Colonia</th>

                            <th>Cp</th>
                            <th>Tel 1</th>
                            <th>Tel 2</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                </table>

            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL EDITAR sucursal
======================================-->

<div id="modalEditarSucursal" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar sucursal</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">


                        <!--=====================================
            ENTRADA DEL NOMBRE DE LA SUCURSAL
            ======================================-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input type="text" class="form-control input-lg nombreSucursal" placeholder="Ingresar nombre sucursal" name="editarNombreSucursal" required>
                                <input type="hidden" class="editarIdSucursal" name="editarIdSucursal">

                            </div>

                        </div>



                        <!--=====================================
            ENTRADA PARA LA DOMICILIO DE LA SUCURSAL
            ======================================-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                                <textarea maxlength="200" class="form-control input-lg editarDomicilioSucursal" name="editarDomicilioSucursal" rows="3" placeholder="Ingresar domicilio sucursal" required></textarea>

                            </div>

                        </div>
                        <!--=====================================
            ENTRADA PARA LA COLONIA DE LA SUCURSAL
            ======================================-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                                <textarea maxlength="200" class="form-control input-lg coloniaSucursal" name="editarColoniaSucursal" rows="3" placeholder="Ingresar colonia sucursal" required></textarea>

                            </div>

                        </div>
                        <!--=====================================
            ENTRADA DE CP,PHONE1,PHONE2
            ======================================-->

                        <div class="container col-lg-12 col-md-12 col-sm-12">

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">



                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <input type="text" class="form-control input-lg codigoPostalSucursal" placeholder="Ingresar cp" name="editarCpSucursal" required>


                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">



                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                    <input type="text" class="form-control input-lg phoneSucursal" placeholder="Ingresar telefono 1" name="editarPhoneSucursal">


                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">



                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                    <input type="text" class="form-control input-lg phone2Sucursal" placeholder="Ingresar telefono 2" name="editarPhone2Sucursal">


                                </div>
                            </div>




                        </div>

                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar cambios sucursal</button>

                </div>

            </form>

            <?php


            $editarSucursal = new ControladorSucursales();
            $editarSucursal->ctrEditarSucursal();

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